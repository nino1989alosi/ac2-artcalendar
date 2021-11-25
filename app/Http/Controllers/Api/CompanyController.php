<?php

namespace App\Http\Controllers\Api;

use App\Models\Company;
use App\Models\MetaTag;
use App\Models\EmailBlock;
use App\Models\AddressBlock;
use Illuminate\Http\Request;
use App\Models\BusinessBlock;
use App\Models\DocumentBlock;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\BaseController as BaseController;

class CompanyController extends BaseController
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
        
        $company = Company::validate($alldata);
        

        // return $this->sendError($alldata, ['error'=>'One of the required parameter is missing!!']);

        if(!empty($company['error'])){
            return $this->sendError('Fields are missing/invalid', $company);
        }
                            
        $workspace = Auth()->user()->workspace()->find($request->get('workspace_id'));
        if(empty($workspace->id)){
            return $this->sendError(['error' => $workspace], ['error'=> 'invalid Workspace']);
        }
        
        if($request->hasFile('logo')) {
            $logo = $request->file('logo');                       
            $company['logo'] = Company::addImage($logo,$workspace->id);
        }

        $company = $workspace->company()->create($company);
        if($company){
            $company->attachTags($alldata);
        }
        
        if(!$company->id) {
            if($request->hasFile('logo')){
                Storage::delete($path);
            }
            return $this->sendError('Error creating company', $company);
        }

        if(!empty($alldata['email'])){        
            $email = json_decode($alldata['email'], true);
            $EmailBlock = EmailBlock::validate($email,'company');
            if(!empty($EmailBlock['error'])){
                DB::rollBack();
                return $this->sendError('Fields are missing/invalid', $EmailBlock);
            }
            foreach($EmailBlock as $row){
                $company->email()->create($row);
            }
        }

        
        // if(!empty($alldata['personal_data'])){
        //     $pd = json_decode($alldata['personal_data'], true);
        //     $personal_data = PersonalDataBlock::validate($pd,'company');
        //     if(!empty($personal_data['error'])){
        //         DB::rollBack();
        //         return $this->sendError('Fields are missing/invalid', $personal_data);
        //     }
        //     $company->pd()->create($personal_data);
            
        // }
        
        if(!empty($alldata['address'])){
            $Address = json_decode($alldata['address'], true);
            $address = AddressBlock::validate($Address,'company');
            if(!empty($address['error'])){
                DB::rollBack();
                return $this->sendError('Fields are missing/invalid', $address);
            }
            foreach($address as $row){
                $company->address()->create($row);
            }
        }
        
        if(!empty($alldata['business'])){
            $Business = json_decode($alldata['business'], true);
            $business = BusinessBlock::validate($Business,'company');
            if(!empty($business['error'])){
                DB::rollBack();
                return $this->sendError('Fields are missing/invalid', $business);
            }
            $company->business()->create($business);
        }

        if(!empty($alldata['note'])){
            $company->note()->create(['entity' => 'company',"note" => $alldata['note']]);
        }
        
        if($request->hasFile('media')) {                
            $media = $request->file('media');                
            foreach($media as $row){
                $path = $row->store('images/workspaces/'.$company->workspace_id.'/entity/company/media', 'public'); 
                $company->media()->create(["path" => $path,"entity" => 'company','type' => 'media']);
            }                
        }
        
        DB::commit();

        return $this->sendResponse('Company added!!','Company added!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Api\Company  $company
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
        
        // $companys = DB::table('companys')
        //                     ->where('workspace_id', '=', $request->get('workspace_id'))
        //                     ->orWhere('is_public', true)
        //                     ->leftJoin('email_blocks', 'companys.id', '=', 'email_blocks.entity_id')
        //                     ->get();

        $companys = Company::with('email:email,type,is_primary')->where('workspace_id',$request->get('workspace_id'))
                                                                       ->orWhere('is_public', 1)
                                                                       ->get();
        // return $this->sendError(['invalid Workspace'], $workspace_company);
        if( count($companys) < 1 ){
            return $this->sendError(['No companines found in current workspace'], ['error' => ['Company' => ['No companines found in current workspace']]]);
        }

        return $this->sendResponse(["company" => $companys], ['success' =>'Company List']);
    }


    /**
     * Get the specified company in storage.
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
        $company = Company::canAccess($id,$request->get('workspace_id'));
                
        if(empty($company) || empty($company->id)) {
            
            return $this->sendError(['error'=>$company], ['error'=>'No company found in current workspace']);
        }

        return $this->sendResponse(["company" => $company], ['Success' => 'Editing company']);

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


        $data = Company::validate($alldata,true);
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

        //$company = $workspace->company()->find($request->get('id'));

        $company = Company::find($request->get('id')); //TODO: should come from workspace instatance or check for public or check if belong to curent user
        
        if (empty($company)) {
            return $this->sendError("Company not found. Wrong Request", $data);
        }
        
        if ($company->workspace_id != $request->get('workspace_id') && $company->is_public == 0) {
            return $this->sendError("Invalid Ownership. Wrong Workspace", $data);
        }
        

        DB::beginTransaction();
        try{

            if(!empty($alldata['email']) && !empty(json_decode($alldata['email'], true))){        
                $email = json_decode($alldata['email'], true);
                $EmailBlock = EmailBlock::validate($email,'company');
                if(!empty($EmailBlock['error'])){
                    DB::rollBack();                   
                    return $this->sendError('Fields are missing/invalid', $EmailBlock);
                }
                $currentEmailBlock = $company->email()->pluck('id')->toArray();
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
                        $company->email()->create($row);                        
                    }
                }                
            }
            
            
            // if(!empty($alldata['personal_data']) && !empty(array_filter(json_decode($alldata['personal_data'], true)))){
            //     $pd = json_decode($alldata['personal_data'], true);
            //     $personal_data = PersonalDataBlock::validate($pd,'company');
            //     if(!empty($personal_data['error'])){
            //         DB::rollBack();
            //         return $this->sendError('Fields are missing/invalid', $personal_data);
            //     }
            //     if(!empty($personal_data['id'])){//adding enpty values and ussing non filter variable
            //         $temp = PersonalDataBlock::find($personal_data['id']);
            //         $temp->update($pd);
            //     }else{
            //         $company->pd()->create($pd);
            //     }
            // }
            
            if(!empty($alldata['address']) && !empty(json_decode($alldata['address'], true))){
                $Address = json_decode($alldata['address'], true);
                $address = AddressBlock::validate($Address,'company');
                if(!empty($address['error'])){
                    DB::rollBack();
                    return $this->sendError('Fields are missing/invalid', $address);
                }
                $currentAddress = $company->address()->pluck('id')->toArray();
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
                        $company->address()->create($row);
                    }
                }
                

            }
            
            if(!empty($alldata['business']) && !empty(array_filter(json_decode($alldata['business'], true)))){
                $Business = json_decode($alldata['business'], true);                
                $business = BusinessBlock::validate($Business,'company');                
                if(!empty($business['error'])){
                    DB::rollBack();
                    return $this->sendError('Fields are missing/invalid', $business);
                }
                if(!empty($Business['id'])){ //adding enpty values and ussing non filter variable
                    $temp = BusinessBlock::find($Business['id']);
                    $temp->update($Business);
                }else{
                    $company->business()->create($Business);
                }
            }
            if(!empty($alldata['note'])){
                $company->note()->create(['entity' => 'company',"note" => $alldata['note']]);
            }
            
            if($request->hasFile('media')) {                
                $media = $request->file('media');                
                foreach($media as $row){
                    $path = $row->store('images/workspaces/'.$company->workspace_id.'/entity/company/media', 'public'); 
                    $company->media()->create(["path" => $path,"entity" => 'company','type' => 'media']);
                }                
            }


            
            
        } catch(Exception $e) {
            DB::rollBack();
            $error['error']=$e->getMessage();
            return $this->sendError($error, ['error'=>$e->getMessage()]);
        }
        
        if($request->hasFile('logo')) {
            Storage::delete($company->logo);
            $logo = $request->file('logo');
            $data['logo'] = Company::addImage($logo,$company->workspace_id);
        }
        
        if($company->update($data)){
            $company->attachTags($data);
        }

        DB::commit();
            
        return $this->sendResponse('Company updates!!','Company updated!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Api\Company  $company
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
            $company = $workspace->company()->find($request->get('id'));
            // return $this->sendError($workspace, ['error'=>'Company not belong to this user']);
            if(!empty($company->id) && $company != null){
                $file_path = $company->logo;
                $flag = false;
                $company->email()->delete();                
                $company->business()->delete();
                $company->address()->delete();
                if($company->delete()){
                    $flag = true;
                }

            }else{
                return $this->sendError(['error'=>'Company not belong to this workspace'], ['error'=>'Company not belong to this workspace']);
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
        return $this->sendResponse([], ['success' =>'Company Deleted !!']);
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
        $companyTags = $workspace->companyTags;    
        //print_r($companyTags->tags());    
        if(!empty($companyTags)){
            $return = [];
            foreach($companyTags as $row){
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
        if($request->hasFile('logo')) {
            $logo = $request->file('logo');                       
            $company['logo'] = Company::addImage($logo,$workspace->id);
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
        $company = $workspace->company()->find($request->get('id'));
        if(empty($company->id)){
            return $this->sendError(['error' => $company], ['error'=> 'invalid Company']);
        }
        if(!empty($id)){
            $media = $company->media()->find($id);
            if(empty($media->id)){
                return $this->sendError(['error' => $company], ['error'=> 'invalid media Id']);
            }
            Storage::delete($media->path); //TODO:delete-path relative
            $media->delete();
            return $this->sendResponse([], ['success' =>'media deleted']);
        }

    }
}