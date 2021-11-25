<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Contact;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index(Request $request)
    {       
       $contacts = Contact::paginate(10);
       return view('contact.index', compact('contacts'));
    }




    public function store(Request $request) {
        $id = $request->input('id');
        $avatar = $request->input('avatar');
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');       
        $nickname = $request->input('nickname');
        $email = $request->input('email');
        $phone = $request->input('pphone');
        $description = $request->input('description');
        $status = $request->input('status');


      if($request->file('avatar') != ""){

        $path = $request->file('avatar')->store('avatarsContact');
        //return $path;
        $filename= explode("/",$path)[1];

        $obj = [
                'avatar' => $filename,
                'first_name'=>$firstname,
                'last_name' => $lastname,
                'nickname' => $nickname,
                'description' => $description,
                'status' => $status,
                'personal_phone' => $phone,
                'email' => $email,

            ];

        
      }
      else{

        if(isset($id) && $id != null){
            $obj = [
                    'id' => $id,
                    'first_name'=>$firstname,
                    'last_name' => $lastname,
                    'nickname' => $nickname,
                    'description' => $description,
                    'status' => $status,
                    'personal_phone' => $phone,
                    'email' => $email,

            ];
        }
        else{
            $obj = [
                'first_name'=>$firstname,
                'last_name' => $lastname,
                'nickname' => $nickname,
                'description' => $description,
                'status' => $status,
                'personal_phone' => $phone,
                'email' => $email,
            ];
        }
      }


    if(isset($id) && $id != null)
       $contact = Contact::where('id', '=', $id)->update($obj);
    else{
        $contact = Contact::create( $obj );
        $object = [  'contact_id'=>$contact->id ];
        DB::table('contact_business')->insertGetId($object);
        DB::table('contact_settings')->insertGetId($object);
    }

      

        if($contact != null){
            return redirect('/contacts')->with(['message' => 'Profile edited successfully']);
        }
        return redirect('/contacts')->with(['error' => 'Profile modification failed']);



    }



    public function edit(Request $request){
        
        $contact = Contact::where('id', '=', $request->id)->first();
        $business = DB::table('contact_business')->where('contact_id',$request->id)->first();
        $settings = DB::table('contact_settings')->where('contact_id',$request->id)->first();
        $notes = DB::table('contact_notes')->where('contact_id',$request->id)->first();
        $media = DB::table('contact_media')->where('contact_id',$request->id)->paginate(10);
        $contact_email  = DB::table('contact_email')->where('contact_id',$request->id)->paginate(10);
        $address = DB::table('contact_address')->where('contact_id',$request->id)->paginate(10);

        return view('contact.edit', compact('contact','business','settings','notes','media','contact_email','address'));
    }



    public function new(Request $request){
        
        $user = Auth()->user();
        $tags = DB::table('tag')->get();
        $types = DB::table('type')->where('user_id',$user->id)->get();
        $groups = DB::table('group')->where('user_id',$user->id)->get();

        $companies = DB::table('companies')->get();
        return view('contact.create', compact('tags','types','companies','groups'));
    }





    // BUSINESS
    public function storeBusiness(Request $request){
       
        try{

               $obj = [
                    'contact_id'=>$request->contactId,
                    'website'=>$request->website,
                    'fiscal_code' => $request->fiscal_code,
                    'vat_number' => $request->vat_number,
                    'business_registration' => $request->business_registration,
                    'business_phone' => $request->business_phone,
                    'business_fax' => $request->business_fax
                ];


                DB::table('contact_business')->where('contact_id',$request->contactId)->update($obj);               
               
                
                return redirect('/edit-contact/'.$request->contactId)->with(['message' => 'Section Business edited successfully']);
            
        }
        catch(Exception $e) {
            return redirect('/edit-contact/'.$request->contactId)->with(['error' => 'Updating Section Business failed!']);
        }
    }




    public function storeSettings(Request $request){
       
        try{

               $obj = [
                        'contact_id' => $request->contactId,
                        'legitimate_interest' => $request->has('legitimateInterest'),
                        'privacy_policy' => $request->has('privacyPolicy'),
                        'consent_To_Comm' => $request->has('consentToCommunicate'),
                        'consent_To_Process' => $request->has('consentToProcessData')

                    ];

                DB::table('contact_settings')->where('contact_id',$request->contactId)->update($obj); 
                return redirect('/edit-contact/'.$request->contactId)->with(['message' => 'Section Settings edited successfully']);
            
        }
        catch(Exception $e) {
            return redirect('/edit-contact/'.$request->contactId)->with(['error' => 'Updating Section Settings failed!']);
        }
    }



    public function storeNote(Request $request){
       
        try{

            $notes = DB::table('contact_notes')->where('contact_id',$request->contactId)->first();

            $obj = [
                'contact_id' => $request->contactId,
                'text' => $request->note,
            ];

            if($notes != null){
                DB::table('contact_notes')
                        ->where('contact_id', $request->contactId)
                        ->update($obj);
            }

                DB::table('contact_notes')->insertGetId( $obj );
            
                return redirect('/edit-contact/'.$request->contactId)->with(['message' => 'Notes edited successfully']);
        }
        catch(Exception $e) {
            return redirect('/edit-contact/'.$request->contactId)->with(['error' => 'Updating Notes failed!']);
        }
    }



    public function removeNote(Request $request){
       
        try{

            $setting = DB::table('contact_notes')->where('id',$request->id)->delete();
            
        }
        catch(Exception $e) {
            return $e->getMessage();
        }
    }




    //EMAIL


    public function storeEmail(Request $request){
       
        try{

            $notes = DB::table('contact_email')->where('contact_id',$request->contactId)->first();

            $obj = [
                'contact_id' => $request->contactId,
                'email' => $request->emailc,
                'email_type' => $request->emailcType,
            ];
                DB::table('contact_email')->insertGetId( $obj );
            
                return redirect('/edit-contact/'.$request->contactId)->with(['message' => 'Section Email edited successfully']);
        }
        catch(Exception $e) {
            return redirect('/edit-contact/'.$request->contactId)->with(['error' => 'Updating Section Email failed!']);
        }
    }



    public function removeEmail(Request $request){

        $res = array();
        $validator = Validator::make($request->all(), [           
            'id' => 'required',
        ]);

        try{
            $caddr = DB::table('contact_email')->where('id',$request->id)->delete();

            $res['code'] = true;
            $res['message'] = 'Email Address removed successfully!!';
            $res['data'] = null;
            echo json_encode($res);



        } catch(Exception $e) {
            return $e->getMessage();
        }


    }


    public function storeMedia(Request $request){
       
        try{
           // $media = $request->input('media');
            $path = $request->file('media')->store('mediaContact');
            //return $path;
            $filename= explode("/",$path)[1];


            DB::table('contact_media')->insertGetId([
                'contact_id' => $request->contactId,
                'path' => $path,
                'created_at' =>date("Y-m-d H:i:s")
            ]);

            return redirect('/edit-contact/'.$request->contactId)->with(['message' => 'Section Media edited successfully']);
            
        }
        catch(Exception $e) {
            return redirect('/edit-contact/'.$request->contactId)->with(['error' => 'Updating section Media failed!']);
        }
    }



    public function removeMedia(Request $request){
       

        $res = array();
        $validator = Validator::make($request->all(), [           
            'id' => 'required',
        ]);

        try{
            $caddr = DB::table('contact_media')->where('id',$request->id)->delete();

            $res['code'] = true;
            $res['message'] = 'Media removed successfully!!';
            $res['data'] = null;
            echo json_encode($res);



        } catch(Exception $e) {
            return $e->getMessage();
        }

    }




    public function addAddress(Request $request){
       
        try{

            DB::table('contact_address')->insertGetId([
                    'contact_id' => $request->contactId,
                    'type' => $request->addressType,
                    'city' => $request->city,
                    'state' => $request->state,
                    'street' => $request->street,
                    'pcode' => $request->pcode,
                    'country' => $request->country,
                    'description' => $request->description

            ]);
            
            return redirect('/edit-contact/'.$request->contactId)->with(['message' => 'Address created successfully']);
        }
        catch(Exception $e) {
            return redirect('/edit-contact/'.$request->contactId)->with(['error' => 'Creating Address failed!']);
        }
    }



    public function updateAddress(Request $request) {
       
        try{

            $obj = [
                'type' => $request->addressType,
                'city' => $request->city,
                'state' => $request->state,
                'street' => $request->street,
                'pcode' => $request->pcode,
                'country' => $request->country,
                'description' => $request->description
            ];

        DB::table('contact_address')
        ->where('id', $request->input('id'))
        ->update($obj);

        return redirect('/edit-contact/'.$request->contactId)->with(['message' => 'Address edited successfully']);
        }
        catch(Exception $e) {
            return redirect('/edit-contact/'.$request->contactId)->with(['error' => 'Updating Address failed!']);
        }

    }


    public function removeAddress(Request $request){


        $res = array();
        $validator = Validator::make($request->all(), [           
            'id' => 'required',
        ]);

        try{
            $caddr = DB::table('contact_address')->where('id',$request->id)->delete();

            $res['code'] = true;
            $res['message'] = 'Workspace removed successfully!!';
            $res['data'] = null;
            echo json_encode($res);



        } catch(Exception $e) {
            return $e->getMessage();
        }

    }



    

    public function addBusinessData(Request $request){
       
        try{

            DB::table('contact_business')->insertGetId([
                    'contact_id' => $request->id,
                    'website' => $request->website,
                    'fiscal_code' => $request->fiscal_code,
                    'vat_number' => $request->vat_number,
                    'business_registration' => $request->business_registration,
                    'business_phone' => $request->business_phone,
                    'business_fax' => $request->business_fax,
                    'created_at' => date("Y-m-d H:i:s")

            ]);
            
        }
        catch(Exception $e) {
            return $e->getMessage();
        }
    }



    public function updateBusinessData(Request $request) {
       
        try{

            $obj = [
                'website' => $request->website,
                    'fiscal_code' => $request->fiscal_code,
                    'vat_number' => $request->vat_number,
                    'business_registration' => $request->business_registration,
                    'business_phone' => $request->business_phone,
                    'business_fax' => $request->business_fax,
                    'updated_at' => date("Y-m-d H:i:s")
            ];

        DB::table('contact_business')
        ->where('id', $request->input('id'))
        ->update($obj);

        } catch(Exception $e) {
            return $e->getMessage();
        }

    }
}
