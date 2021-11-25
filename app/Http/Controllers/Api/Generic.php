<?php

namespace App\Http\Controllers\Api;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use stdClass;


class Generic extends BaseController
{

public function getTags(Request $request) {
        try {

            $obj = new stdClass();
             
            $obj->results = DB::table('tag')
            ->select('id', 'name as text')
            //->where('user_id',$user->id)
            ->get();
            return $obj;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
}



public function createTags(Request $request){
       
    try{
        $res = array();
       

        $type = DB::table('tag')->where('workspace_id',$request->workspace_id)
        ->where('name',$request->name)
        ->first();

        if($type != null){
            $res['code'] = true;
            $res['message'] = 'Type already present!!';
            $res['data'] = null;
            echo json_encode($res);
            return;
        }


        $tag_added_id = DB::table('tag')->insertGetId([
            'workspace_id' => $request->workspace_id,
            'name' => $request->name,
            'created_at' => date("Y-m-d H:i:s")
        ]);
                
        $obj = new stdClass();
             
        $obj->id = $tag_added_id;
        $obj->text = $request->name;


        $res['code'] = true;
        $res['message'] = 'Group created successfully!!';
        $res['data'] = $obj;
        echo json_encode($res);
       
        
    }
    catch(Exception $e) {
        $res['code'] = false;
        $res['message'] = '';
        $res['data'] = null;
        echo json_encode($res);
    }
}



public function createType(Request $request){
       
    try{
        $res = array();
       

        $type = DB::table('type')->where('user_id',$request->user_id)
        ->where('name',$request->name)
        ->first();

        if($type != null){
            $res['code'] = true;
            $res['message'] = 'Type already present!!';
            $res['data'] = null;
            echo json_encode($res);
            return;
        }


        $type_added_id = DB::table('type')->insertGetId([
            'user_id' => $request->user_id,
            'name' => $request->name,
            'created_at' => date("Y-m-d H:i:s")
        ]);
                
        $obj = new stdClass();
             
        $obj->id = $type_added_id;
        $obj->text = $request->name;


        $res['code'] = true;
        $res['message'] = 'Type created successfully!!';
        $res['data'] = $obj;
        echo json_encode($res);
       
        
    }
    catch(Exception $e) {
        $res['code'] = false;
        $res['message'] = '';
        $res['data'] = null;
        echo json_encode($res);
    }
}



public function createGroup(Request $request){
       
    try{
        $res = array();
        $group = DB::table('group')->where('user_id',$request->user_id)
                                    ->where('name',$request->name)
                                    ->first();

        if($group != null){
            $res['code'] = true;
            $res['message'] = 'Group already present!!';
            $res['data'] = null;
            echo json_encode($res);
            return;
        }
       
       
        $group_added_id = DB::table('group')->insertGetId([
            'user_id' => $request->user_id,
            'name' => $request->name,
            'created_at' => date("Y-m-d H:i:s")
        ]);
                
        $obj = new stdClass();
             
        $obj->id = $group_added_id;
        $obj->text = $request->name;


        $res['code'] = true;
        $res['message'] = 'Group created successfully!!';
        $res['data'] = $obj;
        echo json_encode($res);
       
        
    }
    catch(Exception $e) {
        $res['code'] = false;
        $res['message'] = '';
        $res['data'] = null;
        echo json_encode($res);
    }
}


public function getGroups(Request $request) {
    try {
        $groups = DB::table('group')
        ->select('id', 'name as text')
        //->where('user_id',$user->id)
        ->get();
        return $groups;
    } catch (\Exception $e) {
        return $e->getMessage();
    }
}


}
