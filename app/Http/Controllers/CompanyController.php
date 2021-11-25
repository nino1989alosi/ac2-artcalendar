<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Company;
use App\Models\MetaTag;
use App\Models\EmailBlock;
use App\Models\AddressBlock;
use App\Models\BusinessBlock;
use App\Models\DocumentBlock;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    public function index(Request $request)
    {       
        $user = Auth()->user();
       $companys = Company::where('owner',$user->id)
                            ->paginate(10);
                            return view('company.index', compact('companys'));
    }



    public function new(Request $request){
        
        $user = Auth()->user();
        $tags = DB::table('tag')
                        ->select(
                            'tag.*'
                        )
                        ->join('workspaces', 'workspaces.id', '=', 'tag.workspace_id')
                        ->where('workspaces.added_by',$user->id)->get();

        $types = DB::table('type')->where('user_id',$user->id)->get();
        $groups = DB::table('group')->where('user_id',$user->id)->get();
        return view('company.create', compact('tags','types','groups'));
    }




    public function store(Request $request) {

        try{
        $id = $request->input('id');
        $name = $request->input('name');
        $legalname = $request->input('legalname');       
        $fiscalcode = $request->input('fiscalcode');
        $website = $request->input('website');
        $email = $request->input('email');
        $fax = $request->input('fax');
        $phone = $request->input('phone');
        $registration = $request->input('registration');
        $vat_number = $request->input('vat_number');
        $employees = $request->input('employees');
        $annual_revenue = $request->input('annual_revenue');
        $description = $request->input('description');
        $status = $request->input('status');


        $groups = $request->input('groups');
        $types = $request->input('types');
        $tags = $request->input('tags');

     

        
        $filename="";

      if($request->file('logo') != "" && $request->file('logo') != null){

        $path = $request->file('logo')->store('avatarsContact');
        //return $path;
        $filename= explode("/",$path)[1];

        $obj = [
                'logo' => $filename,
                'name'=>$name,
                'legal_name' => $legalname,
                'phone' => $phone,
                'description' => $description,
                'status' => $status,
                'fax' => $fax,
                'email' => $email,
                'website' => $website,
                'fiscalcode' => $fiscalcode,
                'vat_number' => $vat_number,
                'registration' => $registration,
                'employees' => $employees,
                'annual_revenue' => $vat_number,
                'owner' => Auth()->user()->id,
            ];

        
      }
      else{

        if(isset($id) && $id != null){
            $obj = [
                    'id' => $id,
                    'logo' => $filename,
                    'name'=>$name,
                    'legal_name' => $legalname,
                    'phone' => $phone,
                    'description' => $description,
                    'status' => $status,
                    'fax' => $fax,
                    'email' => $email,
                    'website' => $website,
                    'fiscalcode' => $fiscalcode,
                    'vat_number' => $vat_number,
                    'registration' => $registration,
                    'annual_revenue' => $vat_number,
                    'registration' => $employees,
                    'owner' => Auth()->user()->id,

            ];
        }
        else{
            $obj = [
                'logo' => $filename,
                'name'=>$name,
                'legal_name' => $legalname,
                'phone' => $phone,
                'description' => $description,
                'status' => $status,
                'fax' => $fax,
                'email' => $email,
                'website' => $website,
                'fiscalcode' => $fiscalcode,
                'vat_number' => $vat_number,
                'registration' => $registration,
                'annual_revenue' => $vat_number,
                'registration' => $employees,
                'owner' => Auth()->user()->id,
            ];
        }
      }


      

    if(isset($id) && $id != null)
       $company = Company::where('id', '=', $id)->update($obj);
    else{
        $company = Company::create( $obj );
        $object = [  'company_id'=>$company->id ];
        DB::table('company_settings')->insertGetId($object);
    }


    if(isset($types)){
        foreach($types as $type)
        {
            $object = [ 'meta_types_id'=>$type, 'entity_id' => $company->id,'entity' =>'company'];
            DB::table('entity_types')->insertGetId($object);
        }
    }


    if(isset($tags) ){
        foreach($tags as $tag)
        {
            $object = [ 'meta_tags_id'=>$tag, 'entity_id' => $company->id,'entity' =>'company'];
            DB::table('entity_tags')->insertGetId($object);
        }
    }


    if(isset($groups)){
        foreach($groups as $group)
        {
            $object = [ 'group_id'=>$group, 'entity_id' => $company->id,'entity' =>'company'];
            DB::table('entity_groups')->insertGetId($object);
        }
    }

      

    
        return redirect('/companies')->with(['message' => 'Operation on Company completed successfully']);
        }

        catch(Exception $e) {
            return redirect('/companies')->with(['error' => 'Operation on Company failed!']);
        }



    }



    public function addAddress(Request $request){
       
        try{

            DB::table('company_address')->insertGetId([
                    'company_id' => $request->companyId,
                    'type' => $request->addressType,
                    'city' => $request->city,
                    'state' => $request->state,
                    'street' => $request->street,
                    'pcode' => $request->pcode,
                    'country' => $request->country,
                    'description' => $request->description

            ]);
            
            return redirect('/edit-company/'.$request->companyId)->with(['message' => 'Address created successfully']);
        }
        catch(Exception $e) {
            return redirect('/edit-company/'.$request->companyId)->with(['error' => 'Creating Address failed!']);
        }
    }


    public function edit(Request $request){
        $user = Auth()->user();
        $company = Company::where('id', '=', $request->id)->first();
        $element = $company;

        $settings = DB::table('company_settings')->where('company_id',$request->id)->first();

        $notes = DB::table('company_notes')->where('company_id',$request->id)->first();
        $media = DB::table('company_media')->where('company_id',$request->id)->paginate(10);

        $contact_email  = DB::table('company_email')->where('company_id',$request->id)->paginate(10);
        $address = DB::table('company_address')->where('company_id',$request->id)->paginate(10);

        $groups = DB::table('group')->where('user_id',$user->id)->get();
        $MyDocuments = DB::table('document_blocks')
        ->select(
            'document_blocks.*',
            'users.name'
        )
        ->join('users', 'users.id', '=', 'document_blocks.owner')
        ->where('entity_id',$request->id)
        ->where('entity',"company")->paginate(10);

        $documents = DB::table('document_blocks')
                                ->select(
                                    'document_blocks.*',
                                    'users.name'
                                )
                                ->join('users', 'users.id', '=', 'document_blocks.owner')
                                ->where('owner',$user->id)
                                ->where('entity',"company")->paginate(10);


        $events = [];
        $projects = [];
        $tasks = [];


        $tags = DB::table('tag')
                        ->select(
                            'tag.*'
                        )
                        ->join('workspaces', 'workspaces.id', '=', 'tag.workspace_id')
                        ->where('workspaces.added_by',$user->id)->get();

       

        $Mytg = DB::table('entity_tags')
                        ->select(
                            'entity_tags.meta_tags_id'
                        )
                    ->where('entity_id',$request->id)
                    ->where('entity','company')
                    ->get();


        $Mytags = "";
        foreach ($Mytg as $t) {

            $Mytags = $Mytags != "" ? $Mytags.','.$t->meta_tags_id : $t->meta_tags_id;
        }




        $types = DB::table('type')->where('user_id',$user->id)->get();

        $Myty = DB::table('entity_types')
                        ->select(
                            'entity_types.meta_types_id'
                        )
                        ->where('entity_id',$request->id)
                        ->where('entity','project')
                        ->get();


        $Mytypes = "";
        foreach ($Myty as $tt) {

            $Mytypes = $Mytypes != "" ? $Mytypes.','.$tt->meta_types_id : $tt->meta_types_id;
        }




    return view('company.edit', compact('company','element', 'contact_email','settings','address','events','projects','tasks','MyDocuments',
        'notes','tags','types','groups','media','documents','Mytags', 'Mytypes'));
    }




    public function storeNote(Request $request){
       
        try{

            $notes = DB::table('company_notes')->where('company_id',$request->companyId)->first();

            $obj = [
                'company_id' => $request->companyId,
                'text' => $request->note,
            ];

            if($notes != null){
                DB::table('company_notes')
                        ->where('company_id', $request->companyId)
                        ->update($obj);
            }

                DB::table('company_notes')->insertGetId( $obj );
            
                return redirect('/edit-company/'.$request->companyId)->with(['message' => 'Notes edited successfully']);
        }
        catch(Exception $e) {
            return redirect('/edit-company/'.$request->companyId)->with(['error' => 'Updating Notes failed!']);
        }
    }

    public function storeMedia(Request $request){
       
        try{
            $media = $request->file('media')->getClientOriginalName();

           //$this->file->storeAs( "", $fileName, 'public');
            $path = $request->file('media')->store('mediaCompany');
            //return $path;
            $filename= explode("/",$path)[1];


            DB::table('company_media')->insertGetId([
                'company_id' => $request->companyMediaId,
                'path' => $path,
                'media_name' =>$media
            ]);

            return redirect('/edit-company/'.$request->companyMediaId)->with(['message' => 'Section Media edited successfully']);
            
        }
        catch(Exception $e) {
            return redirect('/edit-company/'.$request->companyMediaId)->with(['error' => 'Updating section Media failed!']);
        }
    }



    public function removeMedia(Request $request){
       

        $res = array();
        $validator = Validator::make($request->all(), [           
            'id' => 'required',
        ]);

        try{
            $caddr = DB::table('company_media')->where('id',$request->id)->delete();

            $res['code'] = true;
            $res['message'] = 'Media removed successfully!!';
            $res['data'] = null;
            echo json_encode($res);



        } catch(Exception $e) {
            return $e->getMessage();
        }

    }



    public function storeSettings(Request $request){
       
        try{

               $obj = [
                        'company_id' => $request->companyId,
                        'legitimate_interest' => $request->has('legitimateInterest'),
                        'privacy_policy' => $request->has('privacyPolicy'),
                        'consent_To_Comm' => $request->has('consentToCommunicate'),
                        'consent_To_Process' => $request->has('consentToProcessData')

                    ];

                DB::table('company_settings')->where('company_id',$request->companyId)->update($obj); 
                return redirect('/edit-company/'.$request->companyId)->with(['message' => 'Section Settings edited successfully']);
            
        }
        catch(Exception $e) {
            return redirect('/edit-company/'.$request->companyId)->with(['error' => 'Updating Section Settings failed!']);
        }
    }





        //EMAIL


        public function storeEmail(Request $request){
       
            try{
    
                $notes = DB::table('company_email')->where('company_id',$request->companyId)->first();
    
                $obj = [
                    'company_id' => $request->companyId,
                    'email' => $request->emailc,
                    'email_type' => $request->emailcType,
                ];
                    DB::table('company_email')->insertGetId( $obj );
                
                    return redirect('/edit-company/'.$request->companyId)->with(['message' => 'Section Email edited successfully']);
            }
            catch(Exception $e) {
                return redirect('/edit-company/'.$request->companyId)->with(['error' => 'Updating Section Email failed!']);
            }
        }
    
    
    
        public function removeEmail(Request $request){
    
            $res = array();
            $validator = Validator::make($request->all(), [           
                'id' => 'required',
            ]);
    
            try{
                $caddr = DB::table('company_email')->where('id',$request->id)->delete();
    
                $res['code'] = true;
                $res['message'] = 'Email Address removed successfully!!';
                $res['data'] = null;
                echo json_encode($res);
    
    
    
            } catch(Exception $e) {
                return $e->getMessage();
            }
    
    
        }



}
