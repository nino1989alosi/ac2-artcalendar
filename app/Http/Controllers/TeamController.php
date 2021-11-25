<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Team;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class TeamController extends Controller
{
    public function index(Request $request)
    {       
        $user = Auth()->user();
        $teams = DB::table('teams')
                                ->distinct()
                                ->select(
                                    'teams.*',
                                    'users.name as ownername'
                                )
                                ->join('members_team', 'members_team.id_team', '=', 'teams.id')
                                ->join('users', 'users.id', '=', 'teams.owner')
                                ->orwhere('owner',$user->id)
                                ->orwhere('members_team.id_member',$user->id)
                                ->paginate(10);
                                

        return view('team.index', compact('teams'));
    }



    
    public function store(Request $request) {

        $user = Auth()->user();
        try{    
            $name = $request->input('team');  
        

            $obj = [
                    'owner' =>$user->id,
                    'nome'=>$name
                ];

            $team = Team::create( $obj );
            
            return redirect('/teams')->with(['message' => 'Task updated successfully']);
        }

        catch(Exception $e) {
            return redirect('/teams')->with(['error' => 'Updating Task failed!']);
        }
        
    }




    public function addMember(Request $request) {

        $user = Auth()->user();
        try{    
            $member = $request->input('member');  
            $team = $request->input('team'); 

            $obj = [
                    'id_member' =>$member,
                    'id_team'=>$team
                ];

            DB::table('members_team')->insertGetId( $obj);

                

            $teamCurr = Team::where('id', '=', $team)->first();

            $obj = [
                'count'=>intval($teamCurr->count) + 1
            ];

            Team::where('id', '=', $team)->update($obj);
            
            return redirect('/edit-team/'.$team)->with(['message' => 'Task updated successfully']);
        }

        catch(Exception $e) {
            return redirect('/edit-team/'.$team)->with(['error' => 'Updating Task failed!']);
        }
        
    }




    public function remove(Request $request){
       

        $res = array();
        $validator = Validator::make($request->all(), [           
            'id' => 'required',
        ]);

        try{
            DB::table('teams')->where('id',$request->id)->delete();

            DB::table('members_team')->where('id_team',$request->id)->delete();

            $res['code'] = true;
            $res['message'] = 'Team removed successfully!!';
            $res['data'] = null;
            echo json_encode($res);



        } catch(Exception $e) {
            return $e->getMessage();
        }
    }



    public function removeMember(Request $request){
       

        $res = array();
        $validator = Validator::make($request->all(), [           
            'id' => 'required',
        ]);

        try{

            $item = DB::table('members_team')->where('id',$request->id)->first();
            $idTeam = $item->id_team;

            DB::table('members_team')->where('id',$request->id)->delete();

            $teamCurr = Team::where('id', '=', $idTeam)->first();

            $obj = [
                'count'=>intval($teamCurr->count) - 1
            ];

            Team::where('id', '=', $idTeam)->update($obj);

            $res['code'] = true;
            $res['message'] = 'Member removed successfully!!';
            $res['data'] = null;
            echo json_encode($res);



        } catch(Exception $e) {
            return $e->getMessage();
        }
    }



    




    public function edit(Request $request){
        $user = Auth()->user();
        $members = DB::table('teams')
                                ->select(
                                    'members_team.id as memberId',
                                    'users.name'
                                )
                                ->join('members_team', 'members_team.id_team', '=', 'teams.id')
                                ->join('users', 'users.id', '=', 'members_team.id_member')
                                ->where('teams.id',$request->id)
                                ->paginate(10);


        $users = DB::table('users')
                            ->select(
                                'users.id',
                                'users.name'
                            )
                            ->leftjoin('members_team', 'members_team.id_member', '=', 'users.id')
                            ->whereNull('members_team.id_member')
                            ->get();



        $teamId = $request->id;



        return view('team.edit', compact('members', 'teamId', 'users'));
    }
}
