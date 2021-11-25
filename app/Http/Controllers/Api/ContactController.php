<?php

namespace App\Http\Controllers\Api;

use App\Models\Contact;
use App\Models\MetaTag;
use App\Models\EmailBlock;
use App\Models\AddressBlock;
use Illuminate\Http\Request;
use App\Models\BusinessBlock;
use App\Models\DocumentBlock;
// use App\Models\PersonalDataBlock;
use App\Models\PersonalDataBlock;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\BaseController as BaseController;

class ContactController extends BaseController
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   
        $validator = Validator::make($request->all(), [
            'workspace_id' => 'required'
        ]);

        
        if ($validator->fails()) {
            $errors=$validator->errors();
            return $this->sendError($errors, ['error'=>'One of the required parameter is missing!!']);
        }
        
        DB::beginTransaction();
        
        $user = Auth()->user();
        $alldata = array_filter($request->all());
        
        $contact = Contact::validate($alldata);
        

        // return $this->sendError($alldata, ['error'=>'One of the required parameter is missing!!']);

        if(!empty($contact['error'])){
            return $this->sendError('Fields are missing/invalid', $contact);
        }
                            
        $workspace = Auth()->user()->workspace()->find($request->get('workspace_id'));
        if(empty($workspace->id)){
            return $this->sendError(['error' => $workspace], ['error'=> 'invalid Workspace']);
        }
        
        if($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');                       
            $contact['avatar'] = Contact::addImage($avatar,$workspace->id);
        }

        $contact = $workspace->contact()->create($contact);
        if($contact){
            $contact->attachTags($alldata);
        }
        
        if(!$contact->id) {
            if($request->hasFile('avatar')){
                Storage::delete($path);
            }
            return $this->sendError('Error creating contact', $contact);
        }

        if(!empty($alldata['company'])){        
            $check = $contact->attachCompanies($alldata['company'],$workspace);
            if($check['status'] == false){
                DB::rollBack();
                return $this->sendError($check['error'], []);
            }
        }
        if(!empty($alldata['email'])){        
            $email = json_decode($alldata['email'], true);
            $EmailBlock = EmailBlock::validate($email,'contact');
            if(!empty($EmailBlock['error'])){
                DB::rollBack();
                return $this->sendError('Fields are missing/invalid', $EmailBlock);
            }
            foreach($EmailBlock as $row){
                $contact->email()->create($row);
            }
        }

        
        if(!empty($alldata['personal_data'])){
            $pd = json_decode($alldata['personal_data'], true);
            $personal_data = PersonalDataBlock::validate($pd,'contact');
            if(!empty($personal_data['error'])){
                DB::rollBack();
                return $this->sendError('Fields are missing/invalid', $personal_data);
            }
            $contact->pd()->create($personal_data);
            
        }
        
        if(!empty($alldata['address'])){
            $Address = json_decode($alldata['address'], true);
            $address = AddressBlock::validate($Address,'contact');
            if(!empty($address['error'])){
                DB::rollBack();
                return $this->sendError('Fields are missing/invalid', $address);
            }
            foreach($address as $row){
                $contact->address()->create($row);
            }
        }
        
        if(!empty($alldata['business'])){
            $Business = json_decode($alldata['business'], true);
            $business = BusinessBlock::validate($Business,'contact');
            if(!empty($business['error'])){
                DB::rollBack();
                return $this->sendError('Fields are missing/invalid', $business);
            }
            $contact->business()->create($business);
        }

        if(!empty($alldata['note'])){
            $contact->note()->create(['entity' => 'contact',"note" => $alldata['note']]);
        }
        
        if($request->hasFile('media')) {                
            $media = $request->file('media');                
            foreach($media as $row){
                $path = $row->store('images/workspaces/'.$contact->workspace_id.'/entity/contact/media', 'public'); 
                $contact->media()->create(["path" => $path,"entity" => 'contact','type' => 'media']);
            }                
        }
        
        DB::commit();

        return $this->sendResponse('Contact added!!','Contact added!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Api\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'workspace_id' => 'required|integer',            
        ]);

        if ($validator->fails()) {
            $errors=$validator->errors();
            $error['error']=$errors->first('email');
            return $this->sendError($error, ['error'=> $errors->first('email')]);
        }
        
        // $contacts = DB::table('contacts')
        //                     ->where('workspace_id', '=', $request->get('workspace_id'))
        //                     ->orWhere('is_public', true)
        //                     ->leftJoin('email_blocks', 'contacts.id', '=', 'email_blocks.entity_id')
        //                     ->get();

        $contacts = Contact::with('email:email,type,is_primary')->where('workspace_id',$request->get('workspace_id'))
                                                                       ->orWhere('is_public', 1)
                                                                       ->get();
        // return $this->sendError(['invalid Workspace'], $workspace_contact);
        if( count($contacts) < 1 ){
            return $this->sendError(['No contacts found in current workspace'], $contacts);
        }

        return $this->sendResponse(["contact" => $contacts], ['success' =>'Contact List']);
    }


    /**
     * Get the specified contact in storage.
     * 
     * @param string $id
     * @return \Illuminate\Http\Response
     */
    public function get(Request $request,$id) {

        $validator = Validator::make($request->all(), [            
            'workspace_id' => 'required'
        ]);
        if ($validator->fails()) {
            $errors=$validator->errors();
            return $this->sendError($errors, ['error'=>'Unauthorised request or Invalid Workspace']);
        }
        $contact = Contact::canAccess($id,$request->get('workspace_id'));
                
        if(empty($contact) || empty($contact->id)) {
            
            return $this->sendError(['error'=>$contact], ['error'=>'No Contact found in current workspace']);
        }

        return $this->sendResponse(["contact" => $contact], ['Success' => 'Editing Contact']);

    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'workspace_id' => 'required'
        ]);
        
        if ($validator->fails()) {
            $errors=$validator->errors();
            return $this->sendError($errors, ['error'=>'Unauthorised request or Invalid Workspace']);
        }
        //print_r($request->all());
        $alldata = array_filter($request->all());


        $data = Contact::validate($alldata,true);
        // echo "<pre>";
        // print_r($data);
        // return "";

        if(!empty($data['error']) && !isset($data['id']) ){
            return $this->sendError('Fields are missing/invalid line 209', $data);
        }
        
        $workspace = Auth()->user()->workspace()->find($request->get('workspace_id'));        
        if(empty($workspace->id)){
            return $this->sendError(['error' => $workspace], ['error'=> 'invalid Workspace']);
        }

        //$contact = $workspace->contact()->find($request->get('id'));

        $contact = Contact::find($request->get('id')); //TODO: should come from workspace instatance or check for public or check if belong to curent user
        
        if (empty($contact)) {
            return $this->sendError("Contact not found. Wrong Request", $data);
        }
        
        if ($contact->workspace_id != $request->get('workspace_id') && $contact->is_public == 0) {
            return $this->sendError("Invalid Ownership. Wrong Workspace", $data);
        }
        

        DB::beginTransaction();
        try{

            if(!empty($alldata['email']) && !empty(json_decode($alldata['email'], true))){        
                $email = json_decode($alldata['email'], true);
                $EmailBlock = EmailBlock::validate($email,'contact');
                if(!empty($EmailBlock['error'])){
                    DB::rollBack();                   
                    return $this->sendError('Fields are missing/invalid', $EmailBlock);
                }
                $currentEmailBlock = $contact->email()->pluck('id')->toArray();
                $newEmailBlock = array_column($EmailBlock,'id');
                if(!empty($newEmailBlock)){
                    $deleteEmailBlock= array_diff($currentEmailBlock,$newEmailBlock);   //TODO:delete block via saprate api call
                    foreach($deleteEmailBlock as $row){
                        $temp = EmailBlock::find($row);
                        $temp->delete();
                    }
                }
                foreach($EmailBlock as $row){                    
                    if(!empty($row['id'])){
                        $temp = EmailBlock::find($row['id']);                        
                        $temp->update($row);                                                
                    }else{
                        $contact->email()->create($row);                        
                    }
                }                
            }
            
            if(!empty($alldata['company'])){        
                $check = $contact->attachCompanies($alldata['company'],$workspace);
                if($check['status'] != true){
                    DB::rollBack();
                    return $this->sendError($check['error'], []);
                }
            }
            
            if(!empty($alldata['personal_data']) && !empty(array_filter(json_decode($alldata['personal_data'], true)))){
                $pd = json_decode($alldata['personal_data'], true);
                $personal_data = PersonalDataBlock::validate($pd,'contact');
                if(!empty($personal_data['error'])){
                    DB::rollBack();
                    return $this->sendError('Fields are missing/invalid', $personal_data);
                }
                if(!empty($personal_data['id'])){//adding enpty values and ussing non filter variable
                    $temp = PersonalDataBlock::find($personal_data['id']);
                    $temp->update($pd);
                }else{
                    $contact->pd()->create($pd);
                }
            }
            
            if(!empty($alldata['address']) && !empty(json_decode($alldata['address'], true))){
                $Address = json_decode($alldata['address'], true);
                $address = AddressBlock::validate($Address,'contact');
                if(!empty($address['error'])){
                    DB::rollBack();
                    return $this->sendError('Fields are missing/invalid', $address);
                }
                $currentAddress = $contact->address()->pluck('id')->toArray();
                $newAddress = array_column($address,'id');
                if(!empty($newAddress)){
                    $currentAddress = array_diff($currentAddress,$newAddress);   //TODO:delete block via saprate api call
                    foreach($currentAddress as $row){
                        $temp = AddressBlock::find($row);
                        $temp->delete();
                    }
                }
                foreach($address as $row){                    
                    if(!empty($row['id'])){
                        $temp = AddressBlock::find($row['id']);                                                
                        $temp->update($row);                        
                    }else{
                        $contact->address()->create($row);
                    }
                }
                

            }
            
            if(!empty($alldata['business']) && !empty(array_filter(json_decode($alldata['business'], true)))){
                $Business = json_decode($alldata['business'], true);                
                $business = BusinessBlock::validate($Business,'contact');                
                if(!empty($business['error'])){
                    DB::rollBack();
                    return $this->sendError('Fields are missing/invalid', $business);
                }
                if(!empty($Business['id'])){ //adding enpty values and ussing non filter variable
                    $temp = BusinessBlock::find($Business['id']);
                    $temp->update($Business);
                }else{
                    $contact->business()->create($Business);
                }
            }
            if(!empty($alldata['note'])){
                $contact->note()->create(['entity' => 'contact',"note" => $alldata['note']]);
            }
            
            if($request->hasFile('media')) {                
                $media = $request->file('media');                
                foreach($media as $row){
                    $path = $row->store('images/workspaces/'.$contact->workspace_id.'/entity/contact/media', 'public'); 
                    $contact->media()->create(["path" => $path,"entity" => 'contact','type' => 'media']);
                }                
            }


            
            
        } catch(Exception $e) {
            DB::rollBack();
            $error['error']=$e->getMessage();
            return $this->sendError($error, ['error'=>$e->getMessage()]);
        }
        
        if($request->hasFile('avatar')) {
            Storage::delete($contact->avatar);
            $avatar = $request->file('avatar');
            $data['avatar'] = Contact::addImage($avatar,$contact->workspace_id);
        }
        
        if($contact->update($data)){
            $contact->attachTags($data);
        }

        DB::commit();
            
        return $this->sendResponse('Contact updates!!','Contact updated!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Api\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'workspace_id' => 'required'
        ]);

        if ($validator->fails()) {
            $errors=$validator->errors();
            return $this->sendError($errors, ['error'=>'One of the required parameter is missing!!']);
        }
        
        DB::beginTransaction();
        try{
            
            $workspace = Auth()->user()->workspace()->find($request->get('workspace_id'));        
            $contact = $workspace->contact()->find($request->get('id'));
            // return $this->sendError($workspace, ['error'=>'Contact not belong to this user']);
            if(!empty($contact->id) && $contact != null){
                $file_path = $contact->avatar;
                $flag = false;
                $contact->email()->delete();
                $contact->pd()->delete();
                $contact->business()->delete();
                $contact->address()->delete();
                if($contact->delete()){
                    $flag = true;
                }

            }else{
                return $this->sendError(['error'=>'Contact not belong to this workspace'], ['error'=>'Contact not belong to this workspace']);
            }

        } catch(Exception $e) {

            DB::rollBack();
            $error['error']=$e->getMessage();
            return $this->sendError($error, ['error'=>$e->getMessage()]);

        }
        DB::commit();
        
        if($flag){
            Storage::delete($file_path);
        }
        return $this->sendResponse([], ['success' =>'Contact Deleted !!']);
    }
    
    public function tags(Request $request)
    {
        $validator = Validator::make($request->all(), [         
            'workspace_id' => 'required'
        ]);

        if ($validator->fails()) {
            $errors=$validator->errors();
            return $this->sendError($errors, ['error'=>'One of the required parameter is missing!!']);
        }
        $workspace = Auth()->user()->workspace()->find($request->get('workspace_id'));
        if(empty($workspace->id)){
            return $this->sendError(['error' => $workspace], ['error'=> 'invalid Workspace']);
        }
        $contactTags = $workspace->contactTags;    
        //print_r($contactTags->tags());    
        if(!empty($contactTags)){
            $return = [];
            foreach($contactTags as $row){
                $row = $row->tags;
                $return[$row['type']][] = $row['name'];
                $return[$row['type']] = array_unique($return[$row['type']]);
                //$return[$row['type']] = array_filter(array_values($return[$row['type']]));
                
            }
            //$return = array_values($return);
        }
        
        return $this->sendResponse(["tags" => $return], ['success' =>'Tags List']);
    }

    public function addMedia(Request $request)
    {
        if($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');                       
            $contact['avatar'] = Contact::addImage($avatar,$workspace->id);
        }
    }
    public function addNote(Request $request)
    {
        if($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');                       
            $contact['avatar'] = Contact::addImage($avatar,$workspace->id);
        }
    }
    public function deletemedia($id,Request $request){
        
        $validator = Validator::make($request->all(), [
            'workspace_id' => 'required',
            'id' => "required"
        ]);

        
        if ($validator->fails()) {
            $errors=$validator->errors();
            return $this->sendError($errors, ['error'=>'One of the required parameter is missing!!']);
        }

        $workspace = Auth()->user()->workspace()->find($request->get('workspace_id'));
        if(empty($workspace->id)){
            return $this->sendError(['error' => $workspace], ['error'=> 'invalid Workspace']);
        }
        $contact = $workspace->contact()->find($request->get('id'));
        if(empty($contact->id)){
            return $this->sendError(['error' => $contact], ['error'=> 'invalid Contact']);
        }
        if(!empty($id)){
            $media = $contact->media()->find($id);
            if(empty($media->id)){
                return $this->sendError(['error' => $contact], ['error'=> 'invalid media Id']);
            }
            Storage::delete($media->path); //TODO:delete-path relative
            $media->delete();
            return $this->sendResponse([], ['success' =>'media deleted']);
        }

    }
}