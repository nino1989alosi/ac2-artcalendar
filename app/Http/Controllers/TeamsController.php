<?php

namespace App\Http\Controllers;

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
use Illuminate\Support\Facades\Session;

class TeamsController extends Controller
{
    public function index(Request $request)
    {       

        $id = Session::get('workspace_id');


        // se sono il fondatore
        $workspace = UserWorkspace::
        select(
            'workspaces.id',
            'workspaces.name',
            'workspace_user.created_at as date'
        )
        ->join('workspaces', 'workspaces.id', '=', 'workspace_user.workspace_id')
        ->where('workspace_user.user_id', '=', Auth()->user()->id)
        ->first();


        //se sono un invitato
        if($workspace == null){
            $workspace = WorkspaceInvites::select(
                'workspace_id as id'
            )->where('invite_to', '=', Auth()->user()->email)
            ->first();

        }

        $workspace_id = isset($id) == false ? $workspace->id : $id;
        
        

        $teams = WorkspaceInvites::
        select(
            'workspace_invites.workspace_id',
            'workspace_invites.role',
            'users.name',
            'users.email',
        )
        ->join('users', 'users.email', '=', 'workspace_invites.invite_to')
        ->join('workspace_user', 'workspace_user.workspace_id', '=', 'workspace_invites.workspace_id')
        ->where('workspace_user.user_id', '=', Auth()->user()->id)
        ->paginate(10);


        foreach ($teams as $t) {
            switch (intval($t->role) ){
                case 2:
                    $t->role = 'Manager';
                  break;
                case 3:
                    $t->role = 'Promotor';
                  break;
                case 4:
                    $t->role = 'Collaborator';
                  break;
                  case 4:
                    $t->role = 'Operator';
                  break;
                default:
                $t->role = 'Admin';
              }

        }


         return view('workspace.teams', compact('teams'));
    }

}
