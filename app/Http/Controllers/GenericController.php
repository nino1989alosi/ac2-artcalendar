<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GenericController extends Controller
{
    public function getTagsSel2($workspace_id)
    {       
        $tags = DB::table('tag')
                        ->where(['workspace_id' => workspace_id ])
                        ->get();
        return $tags;
    }


    public function getTypeSel2()
    {       
        $user = Auth()->user();
        $types = DB::table('type')
                        ->where(['user_id' => $user->id ])
                        ->get();
        return $types;
    }



    public function getGroupSel2()
    {       
        $user = Auth()->user();
        $groups = DB::table('group')
                        ->where(['user_id' => $user->id ])
                        ->get();
        return $groups;
    }





    public function getGroup(Request $request)
    {       
        $user = Auth()->user();
        $groups = DB::table('group')
                        ->where(['user_id' => $user->id ])
                        ->paginate(10);
        
         return view('group.index', compact('groups'));
    }





    public function createTag(Request $request){
       
        try{
            $res = array();
           
            $tag_added_id = DB::table('tag')->insertGetId([
                'workspace_id' => $request->workspace_id,
                'name' => $request->name
            ]);
                    
            $res['code'] = true;
            $res['message'] = 'Tag created successfully!!';
            $res['data'] = $tag_added_id;
            echo json_encode($res);
           
            
        }
        catch(Exception $e) {
            return $e->getMessage();
        }
    }



    public function createType(Request $request){
       
        try{
            $res = array();
           
            $type_added_id = DB::table('type')->insertGetId([
                'user_id' => Auth()->user()->id,
                'name' => $request->name
            ]);
                    
            $res['code'] = true;
            $res['message'] = 'Type created successfully!!';
            $res['data'] = $type_added_id;
            echo json_encode($res);
           
            
        }
        catch(Exception $e) {
            return $e->getMessage();
        }
    }





    public function createGroup(Request $request){
       
        try{
            $res = array();
           
            $group_added_id = DB::table('group')->insertGetId([
                'user_id' => Auth()->user()->id,
                'name' => $request->name,
                'created_at' => date("Y-m-d H:i:s")
            ]);
                    
            $res['code'] = true;
            $res['message'] = 'Group created successfully!!';
            $res['data'] = $group_added_id;
            echo json_encode($res);
           
            
        }
        catch(Exception $e) {
            return $e->getMessage();
        }
    }



    public function updateGroup(Request $request,$grp_id) {
        $name = $request->input('name');
        $upd = [ 'name' => $name,   'updated_at' => date("Y-m-d H:i:s") ];

        try{
            DB::table('group')::where('id', $grp_id)->update($upd);

            return redirect()->route('pacchetti')->with(['success' => 'Group updated successfully']);
        }
        catch(Exception $e) {
            return redirect()->route('pacchetti')->with(['error' => 'Operation not completed!']);
        }
    }





    public function createTypeCosto(Request $request){
       
        try{
            $res = array();
           
            $type_added_id = DB::table('tipo_costi')->insertGetId([
                'user_id' => Auth()->user()->id,
                'name' => $request->name
            ]);
                    
            $res['code'] = true;
            $res['message'] = 'Type created successfully!!';
            $res['data'] = $type_added_id;
            echo json_encode($res);
           
            
        }
        catch(Exception $e) {
            return $e->getMessage();
        }
    }

}
