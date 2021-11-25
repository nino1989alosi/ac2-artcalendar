<?php

namespace App\Http\Controllers\Api;

use JWTAuth;
// use App\Http\Controllers\API\UserController as user_controller;
use App\Models\User;
use App\Models\Workspace;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

use App\Models\UserWorkspace;

use App\Rules\emailrolearray;

use App\Models\WorkspaceInvites;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\URL;
use App\Mail\WorkspaceInviteCreated;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Controllers\Api\BaseController as BaseController;

class WorkspaceController extends BaseController
{
    //
    // public function __construct(){
    //     Cache::clear();
    // }

    public function create(Request $request){
       
        try{
            if(empty($request->all())){   
                $error['error']='Invalid parameters!!';
                return $this->sendError($error, ['error'=>'No parameter found!!']);
            }
            else{

                $validator = Validator::make($request->all(), [
                    //'user_id' => 'required|int',
                    'name' => 'required|string|max:255',
                ]);

                if ($validator->fails()) {
                    $errors=$validator->errors();
                    return $this->sendError($errors, ['error'=>'One of the required parameter is missing!!']);
                }

                $user = Auth()->user();
                
                if(!is_null($user)){
                    $workspace_added = $user->workspace()->create([
                        'name' => $request->name,
                        'added_by' => $user->id
                    ]);
                    
                    if($workspace_added->id){

                        $success['workspace']=$workspace_added;
                        return $this->sendResponse($success, ['success'=>'Workspace created successfully!!']);

                    }
                    else{
                        $error['error']='Unable to create workspace please try again later!!';
                        return $this->sendError($error, ['error'=>'Unable to create workspace please try again later!!']);
                    }
                }
                else
                {
                    $error['error']='Unable to create workspace, user account not found!!';
                    return $this->sendError($error, ['error'=>'Unable to create workspace, user account not found']);
                }
            }
        }
        catch(Exception $e) {
            $error['error']=$e->getMessage();
            return $this->sendError($error, ['error'=>$e->getMessage()]);
        }
    }


    public function sendInvite(Request $request){
       
        try{
            if(empty($request->all())){   
                $error['error']='Invalid parameters!!';
                return $this->sendError($error, ['error'=>'No parameter found!!']);
            }
            else{
                $validator = Validator::make($request->all(), [
                    'workspace_id' => 'required|int',
                    'invite_to' => ["required",new emailrolearray],
                ]);

                if ($validator->fails()) {
                    $errors=$validator->errors();
                    return $this->sendError($errors, ['error'=>'One of the required parameter is missing / invalid!!']);
                }

                //self-check
                // print_r($request->invite_to);
                // $emails = array_walk_recursive( $request->invite_to , function(&$item,$key){ return $row['email']; } );
                // print_r($emails);

                $emails = array();
                foreach($request->invite_to as $key) {
                    array_push($emails,$key['email']);
                }
                
                if(in_array(Auth()->user()->email, $emails)){
                    $error['error'] = 'Cannot Invite Yourself to Your Own Workspace !';                    
                    return $this->sendError($error, ['error'=>'Unable to send workspace invite, please try again later!!']);  
                }

                $workspace_exists=Workspace::where('id',$request->workspace_id)->exists();

                if($workspace_exists){

                    $invited_by = Auth()->user()->id;
                    
                    //$invite_to = json_decode($request->invite_to,true);
                    $invite_to = $request->invite_to;
                    $errors = [];
                    foreach ($invite_to as $row1){

                        $row = $row1['email'];                        
                        $workspace_invites = WorkspaceInvites::where('workspace_id',$request->workspace_id)->where('invited_by',$invited_by)->where('invite_to',$row)->where('status','=',0)->first();
                        
                        if(!is_null($workspace_invites)){

                            if($workspace_invites->status == 1){
                                $error['error']='This user has already accepted your invitaion for this workspace!!';
                                $errors[$row] = ["error" => $error, "message" => $error];
                            }
                            else{
                                
                                $invite_url=URL::to('/').'/api/workspace/join/'.$workspace_invites->invite_url;
                                $this->inviteEmail($row,$invite_url);
                                $success[$row]['invite_url']=$invite_url;
                                $success[$row]['invite_key']=$workspace_invites->invite_key;

                                //$errors[$row] = $this->sendResponse($success, ['success' => 'Workspace invitation already sent!!']);
                            }

                        }else{

                            $invite_key=Str::random(30);
                            $unique_hash=$invite_key;
                            $invite_detail=[
                                'workspace_id' => $request->workspace_id,
                                'invited_by' => $invited_by,
                                'invite_to' => $row,
                                'invite_key' => $invite_key,
                                'status' => 0,
                                'invite_url' => $unique_hash,
                                'role' => $row1['role']
                            ];                            
                            $invite=WorkspaceInvites::create($invite_detail);
                            if($invite->id){
                                $invite_url=URL::to('/').'/api/workspace/join/'.$unique_hash;
                                
                                $this->inviteEmail($row,$invite_url);
                                $success[$row]['invite_url']=$invite_url;
                                $success[$row]['invite_key']=$unique_hash;

                                //$errors[$row] = $this->sendResponse($success, ['success' => 'Workspace invite sent successfully!!' ]);
                            }else{
                                $error['error'] = 'Unable to send workspace invite, please try again later!!';
                                $errors[$row] = ["error" => $error, "message" => $error['error']];
                            }
                        }
                    }
                    if(!empty($errors)){                                                
                        return $this->sendError($error, ['error'=>'Unable to send workspace invite, please try again later!!']);
                    }
                    return $this->sendResponse($success, ['success' => 'Workspace invite sent successfully!!' ]);
                      
                }
                else{
                    $error['error']='The workspace record doesnot found!!';
                    return $this->sendError($error, ['error'=>'The workspace record doesnot found!!']);
                }
            }
        }
        catch(Exception $e) {
            $error['error']=$e->getMessage();
            return $this->sendError($error, ['error'=>$e->getMessage()]);
        }
    }

    public function joinWorkSpace(Request $request){
       
        try{
            $validator = Validator::make($request->all(), [
                'token' => 'required|string',
            ]);

            if ($validator->fails()) {
                $errors=$validator->errors();
                return $this->sendError($errors, ['error'=>'One of the required parameter is missing / invalid!!']);
            }

            $token = $request->get('token');
            $email = Auth()->user()->email;

            $workspace_invites = WorkspaceInvites::where('invite_key',$token)->where('invite_to',$email)->where('status',0)->first();
            //print_r($workspace_invites);
            if(!is_null($workspace_invites)){

                $invitedUserEmail=$workspace_invites->invite_to;

                $checkinvitedUser=User::where('email',$invitedUserEmail)->exists();

                if($checkinvitedUser){

                    $getinvitedUser=User::where('email',$invitedUserEmail)->select('id')->first();

                    $workspace_added=UserWorkspace::add([
                        'workspace_id' => $workspace_invites->workspace_id,
                        'user_id' => $getinvitedUser->id,
                        'role' => $workspace_invites->role
                    ]);

                    if($workspace_added->id)
                    {
                        $success['message']='Invitation Accepted.';

                        return $this->sendResponse($success, ['success' =>'Invitation Accepted!!']);
                    }
                    else{
                        $error['error']='Unable to accept workspace invite!!';
                        return $this->sendError('Unable to accept workspace invite!!', ['error'=>'Unable to accept workspace invite!!']);
                    }
                }
                else{
                    $error['error']='This user is not registered with us!!';
                    return $this->sendError($error, ['error'=>'This user is not registered with us!!']);
                }
            }
            else{
                $error['error']='Invalid invite token!!';
                return $this->sendError($error, ['error'=>'Invalid invite token!!']);
            }
            
        }
        catch(Exception $e) {
            $error['error']=$e->getMessage();
            return $this->sendError($error, ['error'=>$e->getMessage()]);
        }
    }

    public function unique_code($limit)
    {
      return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit);
    }

    public function inviteEmail($send_to,$invite_url)
    {
        $data['invite_url']=$invite_url;
        $data['send_to']=$send_to;
        $data['subject']="Invitation ".config('app_name');
        $view="emails.invite";            
        $from_address=env('MAIL_FROM_ADDRESS');
        Mail::send($view, $data, function($message) use($data) {
            $message->to($data['send_to']);
            $message->subject($data['subject']);
        });        
        //return $sent=Mail::to($send_to)->send(new WorkspaceInviteCreated($data['subject'],$view,$data,$from_address));
    }

    public function list(Request $request)
    {
        $workspace = Auth()->user()->workspace;
        return $this->sendResponse(["workspace" => $workspace], ['success' =>'Workspace List']);
    }
    public function delete(Request $request)
    {
        $validator = Validator::make($request->all(), [
            //'user_id' => 'required|int',
            'id' => 'required',
        ]);

        if ($validator->fails()) {
            $errors=$validator->errors();
            return $this->sendError($errors, ['error'=>'One of the required parameter is missing!!']);
        }
        try{
            $workspace = Auth()->user()->workspace()->find($request->get('id'));
            if(!empty($workspace)){
                if(Auth()->user()->workspace()->count() > 1) {
                    Auth()->user()->workspace()->detach($workspace->id);
                    $current_user_meta = Auth()->user()->usermeta()->where('meta_key', '=', 'defualtWS')->first();
                    $current_user_meta->meta_value = Auth()->user()->workspace()->first();
                    $current_user_meta->save();
                    if($workspace->delete()){
                        return $this->sendResponse([], ['success' =>'Workspace Deleted !!']);
                    }
                } else {
                    return $this->sendError(['error'=>'Cannot delete all workspaces.'], ['error'=>'Cannot delete all workspaces.']);
                }
            }else{
                return $this->sendError(['error'=>'Workspace not belong to this user.'], ['error'=>'workspace not belong to this user']);
            }
            

        } catch(Exception $e) {
            $error['error']=$e->getMessage();
            return $this->sendError($error, ['error'=>$e->getMessage()]);
        }
    }
    public function get($id)
    {        
        try{
            
            $workspace = Auth()->user()->workspace()->find($id);
            if(!empty($workspace)){
                $workspace = WorkspaceInvites::where('workspace_id',$id)->get();
                return $this->sendResponse($workspace, ['success' =>'Workspace fetched !!']);
                
            }else{
                return $this->sendError(['error'=> 'workspace not exists'], ['error'=>'workspace not exists']);
            }
            

        } catch(Exception $e) {
            $error['error']=$e->getMessage();
            return $this->sendError($error, ['error'=>$e->getMessage()]);
        }
    }
    public function inviteDelete(Request $request)
    {        
        $validator = Validator::make($request->all(), [
            //'user_id' => 'required|int',
            'id' => 'required',
            'workspace_id' => 'required',
        ]);

        if ($validator->fails()) {
            $errors=$validator->errors();
            return $this->sendError($errors, ['error'=>'One of the required parameter is missing!!']);
        }   

        try{
            
            $workspace = Auth()->user()->workspace()->find($request->get('workspace_id'));
            if(!empty($workspace)){
                $workspace = WorkspaceInvites::where('id',$request->get('id'))->delete();
                return $this->sendResponse([], ['success' =>'Workspace Deleted !!']);
                
            }else{
                return $this->sendError(['error'=> 'workspace not exists'], ['error'=>'workspace not exists']);
            }
            

        } catch(Exception $e) {
            $error['error']=$e->getMessage();
            return $this->sendError($error, ['error'=>$e->getMessage()]);
        }
    }

    public function getRoles()
    {
        $roles =  Role::all()->toArray();
        unset($roles[0]);
        if(!empty($roles)){
            return $this->sendResponse($roles, ['success' =>'Roles fetched !!']);
        }
        return $this->sendError(['error'=> 'Roles not exists'], ['error'=>'Roles not exists']);
    }
}