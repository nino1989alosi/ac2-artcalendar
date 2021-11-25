<?php

namespace App\Http\Controllers;

use JWTAuth;
// use App\Http\Controllers\API\UserController as user_controller;
use App\Models\User;
use App\Models\UserProfile;
use App\Models\Workspace;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use App\Models\UserWorkspace;

use App\Rules\emailrolearray;

use App\Models\WorkspaceInvites;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Mail;
use Lang;


class WorkspaceController extends Controller
{
    public function index(Request $request)
    {       
        $workspaces = UserWorkspace::
        select(
            'workspaces.id',
            'users.name as uname',
            'users.email',
            'workspaces.name',
            'workspace_user.created_at as date'
        )
        ->join('workspaces', 'workspaces.id', '=', 'workspace_user.workspace_id')
        ->join('users', 'users.id', '=', 'workspace_user.user_id')
        ->where('workspace_user.user_id', '=', Auth()->user()->id)
        ->paginate(10);
        
         return view('workspace.index', compact('workspaces'));
    }



    public function create(Request $request){
       
        try{
            $res = array();
            $user = Auth()->user();
               
                
                if(isset($user)){
                    $workspace_added_id = DB::table('workspaces')->insertGetId([
                        'name' => $request->name,
                        'added_by' => $user->id
                    ]);
                    
                    if($workspace_added_id){


                        UserWorkspace::create([
                            'workspace_id' => $workspace_added_id,
                            'user_id' => $user->id
                        ]);


                        $res['code'] = true;
                        $res['message'] = 'Workspace created successfully!!';
                        $res['data'] = $workspace_added_id;
                        echo json_encode($res);

                    }
                    else{
                        $res['code'] = false;
                        $res['message'] = 'Unable to create workspace please try again later!!';
                        $res['data'] = null;
                        echo json_encode($res);

                      
                    }
                }
                else
                {
                    $res['code'] = false;
                    $res['message'] = 'Unable to create workspace, user account not found!!';
                    $res['data'] = null;
                    echo json_encode($res);
                   
                }
            
        }
        catch(Exception $e) {
            return $e->getMessage();
        }
    }




    public function delete(Request $request)
    {
        $res = array();
        $validator = Validator::make($request->all(), [           
            'id' => 'required',
        ]);


        if ($validator->fails()) {
            $res['code'] = false;
            $res['message'] = 'One of the required parameter is missing!!';
            $res['data'] = null;
            echo json_encode($res);
            
        }
        try{
            DB::table('workspace_user')->where('workspace_id',$request->id)->delete();
            DB::table('workspaces')->where('id',$request->id)->delete();

            $res['code'] = true;
            $res['message'] = 'Workspace removed successfully!!';
            $res['data'] = null;
            echo json_encode($res);



        } catch(Exception $e) {
            return $e->getMessage();
        }
    }



    public function update(Request $request) {
        $res = array();
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'id' => 'required',
        ]);


        if ($validator->fails()) {
            $res['code'] = false;
            $res['message'] = 'One of the required parameter is missing!!';
            $res['data'] = null;
            echo json_encode($res);
            
        }
        try{

        DB::table('workspaces')
        ->where('id', $request->input('id'))
        ->update(['name' => $request->input('name')]);

        $res['code'] = true;
        $res['message'] = 'Workspace updated successfully!!';
        $res['data'] = null;
        echo json_encode($res);

        } catch(Exception $e) {
            return $e->getMessage();
        }

    }


    public function edit($id)
    {
        $ws = DB::table('workspaces')
        ->where('id', $id)
        ->first();


        $ws->invites = DB::table('workspace_invites')
        ->where('workspace_id', $id)
        ->get();

        return view('workspace.edit', compact('ws'));
    }




    public function sendInvites(Request $request) {

        $invites = $request->input('invites');
        $workspace_id = $request->input('workspace_id');
        $res = array();

    try{
        foreach ($invites as $invite) {
          $wsInvite =  WorkspaceInvites::create([
                        'invited_by' => Auth()->user()->email,
                        'invite_to' => $invite['email'],
                        'invite_url' => url('/').'/acceptinvites/',
                        'status' => 0,
                        'role' => $invite['role'],
                        'workspace_id' => $workspace_id
                    ]);


                    $data_email = array('url'=>$wsInvite->invite_url.$wsInvite->id);

                    $this->sendEmail($data_email,$wsInvite->invite_to );
        }

        $res['code'] = true;
        $res['message'] = Lang::get('dictionary.sendInviteSuccess');
        $res['data'] = null;
        echo json_encode($res);

        } catch(Exception $e) {
            return $e->getMessage();
        }


    }




    public function deleteInvite(Request $request)
    {
        $res = array();
        $validator = Validator::make($request->all(), [           
            'id' => 'required',
        ]);


        if ($validator->fails()) {
            $res['code'] = false;
            $res['message'] = 'One of the required parameter is missing!!';
            $res['data'] = null;
            echo json_encode($res);
            
        }
        try{

            DB::table('workspace_invites')->where('id',$request->id)->delete();

            $res['code'] = true;
            $res['message'] = 'Invite Workspace removed successfully!!';
            $res['data'] = null;
            echo json_encode($res);



        } catch(Exception $e) {
            return $e->getMessage();
        }
    }


    private function sendEmail($data,$email_dest){
        $email_mittente = env('MAIL_USERNAME');
        $title = Lang::get('dictionary.acceptInvite');
        $text1 = Lang::get('dictionary.acceptInviteT1');
        $text2 = Lang::get('dictionary.acceptInviteT2');
        Mail::send('templates.mail',$data,function($message) use($data,$email_dest,$email_mittente,$title, $text1, $text2){
            $message->to($email_dest)->subject
            ($title);
            $message->from($email_mittente);
        });
    }



    public function acceptinvitesView($id)
    {
       
        $invite = DB::table('workspace_invites')
        ->where('id', $id)
        ->first();


        $ws = DB::table('workspaces')
        ->where('id', $invite->workspace_id)
        ->first();

        $invite->workspace = $ws->name;



        return view('workspace.acceptedInvite', compact('invite'));
    }


    public function acceptinvite(Request $request, $id)
    {
        $upd = [
            'status' => 1
        ];
        WorkspaceInvites::where('id', '=',$id)->update($upd);

        $user = User::create([
            'name'     => $request->fullname,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);



        UserProfile::create([
            'fullname' => $request->fullname,
            'user_id' => $user->id,
            'nickname' => $request->nickname
        ]);


        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }





}
