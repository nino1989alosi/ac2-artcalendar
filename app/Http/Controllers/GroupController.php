<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Group;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index(Request $request)
    {       
        $user = Auth()->user();
      
       $groups = Group::where('user_id',$user->id)
                            ->paginate(10);
                            return view('group.index', compact('groups'));
    }



    public function new(Request $request){
        
        $user = Auth()->user();
        $tags = DB::table('tag')->get();
        $types = DB::table('type')->where('user_id',$user->id)->get();
        return view('group.create', compact('tags','types'));
    }




    public function store(Request $request) {

        try{
                $user = Auth()->user();
                $id = $request->input('id');
                $name = $request->input('name');  
                $website = $request->input('website');
                $description = $request->input('description');
                $status = $request->input('status');

                $types = $request->input('types');
                $tags = $request->input('tags');
                $filename = "";

            if($request->file('logo') != ""){

                $path = $request->file('logo')->store('logosGroup');
                //return $path;
                $filename= explode("/",$path)[1];

                $obj = [
                        'user_id' =>$user->id,
                        'logo' => $filename,
                        'name'=>$name,
                        'description' => $description,
                        'status' => $status,
                        'website' => $website
                    ];

                
            }
            else{

                if(isset($id) && $id != null){
                    $obj = [
                            'id' => $id,
                            'user_id' =>$user->id,
                            'logo' => $filename,
                            'name'=>$name,
                            'description' => $description,
                            'status' => $status,
                            'website' => $website
                    ];
                }
                else{
                    $obj = [
                        'user_id' =>$user->id,
                        'logo' => $filename,
                        'name'=>$name,
                        'description' => $description,
                        'status' => $status,
                        'website' => $website
                    ];
                }
            }


            


            if(isset($id) && $id != null){
                Group::where('id', '=', $id)->update($obj);
                return redirect('/edit-group/'.$id)->with(['message' => 'Group created successfully']);
            }
            else{
                $group = Group::create( $obj );
                $object = [  'group_id'=>$id ];
                DB::table('group_settings')->insertGetId($object); 

                if(isset($types)){
                    foreach($types as $type)
                    {
                        $object = [ 'meta_types_id'=>$type, 'entity_id' => $id,'entity' =>'group'];
                        DB::table('entity_types')->insertGetId($object);
                    }
                }
            
            
                if(isset($tags) ){
                    foreach($tags as $tag)
                    {
                        $object = [ 'meta_tags_id'=>$tag, 'entity_id' => $id,'entity' =>'group'];
                        DB::table('entity_tags')->insertGetId($object);
                    }
                }


                return redirect('/edit-group/'.$id)->with(['message' => 'Group updated successfully']);       
            }


        }

        catch(Exception $e) {
            return redirect('/groupS')->with(['error' => 'Operation failed!']);
        }



    }




    public function edit(Request $request){
        $user = Auth()->user();
        $group = Group::where('id', '=', $request->id)->first();

        $element = $group;
        $settings = DB::table('group_settings')->where('group_id',$request->id)->first();

        $notes = DB::table('group_notes')->where('group_id',$request->id)->first();
        $media = DB::table('group_media')->where('group_id',$request->id)->paginate(10);


        $tags = DB::table('tag')->get();

       

        $Mytg = DB::table('entity_tags')
                        ->select(
                            'entity_tags.meta_tags_id'
                        )
                    ->where('entity_id',$request->id)
                    ->where('entity','group')
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
                        ->where('entity','group')
                        ->get();


        $Mytypes = "";
        foreach ($Myty as $tt) {

            $Mytypes = $Mytypes != "" ? $Mytypes.','.$tt->meta_types_id : $tt->meta_types_id;
        }



        $events = [];
        $projects = [];
        $tasks = [];


        $MyDocuments = DB::table('document_blocks')
        ->select(
            'document_blocks.*',
            'users.name'
        )
        ->join('users', 'users.id', '=', 'document_blocks.owner')
        ->where('entity_id',$request->id)
        ->where('entity',"group")->paginate(10);

        $documents = DB::table('document_blocks')
                                ->select(
                                    'document_blocks.*',
                                    'users.name'
                                )
                                ->join('users', 'users.id', '=', 'document_blocks.owner')
                                ->where('owner',$user->id)
                                ->where('entity',"group")->paginate(10);



        return view('group.edit', compact('group', 'element', 'MyDocuments','documents', 'settings','notes','tags','types','media','events','projects','tasks','Mytags', 'Mytypes'));
    }



    public function storeMedia(Request $request){
       
        try{
           // $media = $request->input('media');
            $path = $request->file('media')->store('mediaGroup');
            //return $path;
            $filename= explode("/",$path)[1];


            DB::table('group_media')->insertGetId([
                'group_id' => $request->groupId,
                'path' => $path,
                'created_at' =>date("Y-m-d H:i:s"),
                'media_name' =>$request->file('media')->getClientOriginalName()
            ]);

            return redirect('/edit-group/'.$request->groupId)->with(['message' => 'Section Media edited successfully']);
            
        }
        catch(Exception $e) {
            return redirect('/edit-group/'.$request->groupId)->with(['error' => 'Updating section Media failed!']);
        }
    }



    public function removeMedia(Request $request){
       

        $res = array();
        $validator = Validator::make($request->all(), [           
            'id' => 'required',
        ]);

        try{
            $caddr = DB::table('group_media')->where('id',$request->id)->delete();

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
                        'group_id' => $request->groupId,
                        'legitimate_interest' => $request->has('legitimateInterest'),
                        'privacy_policy' => $request->has('privacyPolicy'),
                        'consent_To_Comm' => $request->has('consentToCommunicate'),
                        'consent_To_Process' => $request->has('consentToProcessData')

                    ];

                DB::table('group_settings')->where('group_id',$request->groupId)->update($obj); 
                return redirect('/edit-group/'.$request->groupId)->with(['message' => 'Section Settings edited successfully']);
            
        }
        catch(Exception $e) {
            return redirect('/edit-group/'.$request->groupId)->with(['error' => 'Updating Section Settings failed!']);
        }
    }



    public function storeNote(Request $request){
       
        try{

            $notes = DB::table('group_notes')->where('group_id',$request->groupId)->first();

            $obj = [
                'group_id' => $request->groupId,
                'text' => $request->note,
            ];

            if($notes != null){
                DB::table('group_notes')
                        ->where('group_id', $request->groupId)
                        ->update($obj);
            }

                DB::table('group_notes')->insertGetId( $obj );
            
                return redirect('/edit-group/'.$request->groupId)->with(['message' => 'Notes edited successfully']);
        }
        catch(Exception $e) {
            return redirect('/edit-group/'.$request->groupId)->with(['error' => 'Updating Notes failed!']);
        }
    }


}
