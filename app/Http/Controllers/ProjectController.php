<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\UserWorkspace;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    public function index(Request $request)
    {       

        $workspace = UserWorkspace::
        select(
            'workspaces.id'
        )
        ->join('workspaces', 'workspaces.id', '=', 'workspace_user.workspace_id')
        ->join('users', 'users.id', '=', 'workspace_user.user_id')
        ->where('workspace_user.user_id', '=', Auth()->user()->id)
        ->first();


       $projects = Project::where('workspace_id',$workspace->id)
                            ->paginate(10);
        return view('project.index', compact('projects'));
    }





    public function store(Request $request) {

        try{
                $user = Auth()->user();
                $id = $request->input('id');
                $wId = $request->input('wId');
                $name = $request->input('name');  
                $code = $request->input('code'); 
                $startDT = $request->input('startDT'); 
                $endDT = $request->input('endDT');  
                $website = $request->input('website');
                $description = $request->input('description');
                $status = $request->input('status');


                $filename = "";
            if($request->file('avatar') != ""){

                $path = $request->file('avatar')->store('AvatarsProjects');
                //return $path;
                $filename= explode("/",$path)[1];
            }



                if(isset($id) && $id != null){
                    $obj = [
                            'id' => $id,
                            'workspace_id' =>$wId,
                            'image' => $filename,
                            'name'=>$name,
                            'code'=>$code,
                            'startDT'=>$startDT,
                            'endDT'=>$endDT,
                            'description' => $description,
                            'status' => $status,
                            'website' => $website
                    ];
                }
                else{
                    $obj = [
                        'workspace_id' =>$wId,
                        'image' => $filename,
                        'name'=>$name,
                        'code'=>$code,
                        'startDT'=>$startDT,
                        'endDT'=>$endDT,
                        'description' => $description,
                        'status' => $status,
                        'website' => $website
                    ];
                }
            


            if(isset($id) && $id != null){
                $project = Project::where('id', '=', $id)->update($obj);
                return redirect('/edit-project/'.$project->id)->with(['message' => 'Project created successfully']);
            }
            else{
                $project = Project::create( $obj );    
                return redirect('/edit-project/'.$project->id)->with(['message' => 'Project updated successfully']);       
            }


            
            
           
        }

        catch(Exception $e) {
            return redirect('/projects')->with(['error' => 'Operation failed!']);
        }


    }









    public function edit(Request $request){
        $user = Auth()->user();
        $project = Project::where('id', '=', $request->id)->first();

        $element = $project;

        $notes = $project->note;
        $media = DB::table('project_media')->where('project_id',$request->id)->paginate(10);
        $entity = 'project';

        $tags = DB::table('tag')->get();

       

        $Mytg = DB::table('entity_tags')
                        ->select(
                            'entity_tags.meta_tags_id'
                        )
                    ->where('entity_id',$request->id)
                    ->where('entity','project')
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

        $events = [];
        $projects = [];
        $tasks =DB::table('tasks')
                    ->where('project_id',$request->id)
                    ->paginate(10);



      
       

        $users =DB::table('project_users')
                    ->select(
                        'users.id',
                        'users.name',
                        'users.email',
                        'users_profile.avatar as img'
                    )
                    ->join('users', 'users.id', '=', 'project_users.user_id')
                    ->leftjoin('users_profile', 'users_profile.user_id', '=', 'project_users.user_id')
                    ->where('project_id',$request->id)
                    ->get();


                  
        $count= count($users);

         foreach ($users as $u) {
           $u->tasks = count( DB::table('tasks')
                ->where('user_id',$u->id)
                ->get());      
          }

         
        $allUsers = [];
        $all =DB::table('users')                 
                    ->get();

         foreach ($all as $a) {
                 if(!in_array($a->id, array_column($users->toArray(), "id"))) 
                 array_push($allUsers, $a);     
         }


        $MyDocuments = DB::table('document_blocks')
        ->select(
            'document_blocks.*',
            'users.name'
        )
        ->join('users', 'users.id', '=', 'document_blocks.owner')
        ->where('entity_id',$request->id)
        ->where('entity',"project")->paginate(10);

        $documents = DB::table('document_blocks')
                                ->select(
                                    'document_blocks.*',
                                    'users.name'
                                )
                                ->join('users', 'users.id', '=', 'document_blocks.owner')
                                ->where('owner',$user->id)
                                ->where('entity',"group")->paginate(10);

        return view('project.edit', compact('project','element','media','tasks','notes','tags','types','projects','events',
       'users', 'allUsers', 'count','documents','MyDocuments','entity','Mytags', 'Mytypes'));
    }



    public function storeMedia(Request $request){
       
        try{
           // $media = $request->input('media');
           //$this->file->storeAs( "", $fileName, 'public');
            $path = $request->file('media')->store('mediaProject');
            //return $path;
            $filename= explode("/",$path)[1];


            DB::table('project_media')->insertGetId([
                'project_id' => $request->projectMediaId,
                'path' => $path,
                'created_at' =>date("Y-m-d H:i:s"),
                'media_name' =>$request->file('media')->getClientOriginalName()
            ]);

            return redirect('/edit-project/'.$request->projectMediaId)->with(['message' => 'Section Media edited successfully']);
            
        }
        catch(Exception $e) {
            return redirect('/edit-project/'.$request->projectMediaId)->with(['error' => 'Updating section Media failed!']);
        }
    }



    public function removeMedia(Request $request){
       

        $res = array();
        $validator = Validator::make($request->all(), [           
            'id' => 'required',
        ]);

        try{
            $caddr = DB::table('project_media')->where('id',$request->id)->delete();

            $res['code'] = true;
            $res['message'] = 'Media removed successfully!!';
            $res['data'] = null;
            echo json_encode($res);



        } catch(Exception $e) {
            return $e->getMessage();
        }

    }
    public function storeNote(Request $request){
       
        try{
            $obj = [
                'note' => $request->note,
            ];
            $project = Project::where('id', '=', $request->projectId)->update($obj);
                       
            return redirect('/edit-project/'.$request->projectId)->with(['message' => 'Notes edited successfully']);
        }
        catch(Exception $e) {
            return redirect('/edit-project/'.$request->projectId)->with(['error' => 'Updating Notes failed!']);
        }
    }


    public function invite(Request $request){

        $idProj = $request->id;
        $list = explode(",", $request->list);

        $res = array();
        try{

            foreach ($list as $u) {
                DB::table('project_users')->insertGetId([
                    'project_id' => $idProj,
                    'user_id' => intval($u)
                ]);   
            }



            $res['code'] = true;
            $res['message'] = 'Invites created successfully!!';
            $res['data'] = null;
            echo json_encode($res);



        } catch(Exception $e) {
            return $e->getMessage();
        }



        


    }




}
