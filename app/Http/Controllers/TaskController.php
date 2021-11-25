<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function index(Request $request)
    {       
        $user = Auth()->user();
        $tasks =DB::table('tasks')
        ->select(
            'tasks.id',
            'tasks.titolo',
            'tasks.descrizione',
            'tasks.stato',
            'tasks.priority',
            'tasks.created',
            'tasks.scadenza',
            'users.name as owner'
        )
        ->join('users', 'users.id', '=', 'tasks.owner')
        ->where('tasks.owner', '=', Auth()->user()->id)
        ->get();

        foreach ($tasks as $t) {
            if($t->stato == 0){
                $t->color = '#B5B5C3';
                $t->stato = 'PENDING';
            }
            if($t->stato == 1){
                $t->color = '#009ef7';
                $t->stato = 'IN PROGRESS';
            }
            if($t->stato == 2){
                $t->color = '#ff3300';
                $t->stato = 'SUSPENDED';
            }
            if($t->stato == 3){
                $t->color = '#dc3545';
                $t->stato = 'CANCELLED';
            }

            if($t->stato == 4){
                $t->color = '#00cc66';
                $t->stato = 'DONE';
            }
           
          }
          if(count($tasks) > 0)
            $tasks = $this->paginate($tasks, count($tasks));
          else 
            $tasks = [];

        return view('task.index', compact('tasks'));
    }



    public function paginate($items, $perPage = 10, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator(
            $items->forPage($page, $perPage), 
            $items->count(), 
            $perPage, 
            $page, 
            $options);
    }






    public function edit(Request $request){

        $user = Auth()->user();

        $MyDocuments = DB::table('document_blocks')
        ->select(
            'document_blocks.*',
            'users.name'
        )
        ->join('users', 'users.id', '=', 'document_blocks.owner')
        ->where('entity_id',$request->id)
        ->where('entity',"task")->paginate(10);


        $documents = DB::table('document_blocks')
                                ->select(
                                    'document_blocks.*',
                                    'users.name'
                                )
                                ->join('users', 'users.id', '=', 'document_blocks.owner')
                                ->where('owner',$user->id)
                                ->where('entity',"task")->paginate(10);


    

        $element = DB::table('tasks')->where('id',$request->id)->first();
        $task = $element;

        return view('task.edit', compact('documents','MyDocuments','task', 'element'));
    }




    public function getTasks(Request $request)
    {       
        $user = Auth()->user();
        $tasks =DB::table('tasks')
        ->select(
            'tasks.id',
            'tasks.titolo',
            'tasks.descrizione',
            'tasks.stato',
            'tasks.priority',
            'tasks.created',
            'tasks.scadenza',
            'users.name as owner'
        )
        ->join('users', 'users.id', '=', 'tasks.owner')
        ->where('tasks.owner', '=', Auth()->user()->id)
        ->get();

        foreach ($tasks as $t) {
            if($t->stato == 0){
                $t->color = '#B5B5C3';
                $t->stato = 'PENDING';
            }
            if($t->stato == 1){
                $t->color = '#009ef7';
                $t->stato = 'IN PROGRESS';
            }
            if($t->stato == 2){
                $t->color = '#ff3300';
                $t->stato = 'SUSPENDED';
            }
            if($t->stato == 3){
                $t->color = '#dc3545';
                $t->stato = 'CANCELLED';
            }

            if($t->stato == 4){
                $t->color = '#00cc66';
                $t->stato = 'DONE';
            }
           
          }

          $tasks = collect($tasks);

          $groups = DB::table('group')->where('user_id',$user->id)->get();
          //dd($documenti);
          if(count($tasks) > 0)
            $tasks = $this->paginate($tasks, count($tasks));
          else 
            $tasks = [];


          $users = DB::table('users')->where('id','!=', $user->id)->get();


        return view('task.list', compact('tasks', 'groups', 'users'));
    }




    public function create(Request $request){
       
        try{
            $res = array();
            $user = Auth()->user();
               
                
                if(isset($user)){
                    $task_added_id = DB::table('tasks')->insertGetId([
                        'titolo' => $request->titolo,
                        'descrizione' => $request->descrizione,
                        'user_id' => $request->entity_id,
                        'priority' => $request->priority,
                        'note' => $request->note,
                        'scadenza' => $request->scadenza,
                        'group_id' => $request->groups,

                        'owner' => $user->id
                    ]);
                    

                    $res['code'] = true;
                    $res['message'] = 'Task created successfully!!';
                    $res['data'] = $task_added_id;
                    echo json_encode($res);


                }
                else
                {
                    $res['code'] = false;
                    $res['message'] = 'Unable to create Task, user account not found!!';
                    $res['data'] = null;
                    echo json_encode($res);
                   
                }
            
        }
        catch(Exception $e) {
            return $e->getMessage();
        }
    }




    public function taksStatus(Request $request) {
        $res = array();

        try{

        DB::table('tasks')
        ->where('id', $request->input('id'))
        ->update(['stato' => intval($request->input('stato'))]);

        $res['code'] = true;
        $res['message'] = 'Status updated successfully!!';
        $res['data'] = null;
        echo json_encode($res);

        } catch(Exception $e) {
            $res['code'] = false;
            $res['message'] = 'Error!!';
            $res['data'] = null;
            echo json_encode($res);
        }

    }



    public function update(Request $request) {

        try{

            $t = DB::table('tasks')
            ->where('id', $request->input('task'))
            ->first();


            $newData = date('Y-m-d', strtotime($t->scadenza. ' + '. intval($request->input('post')).' days'));

            DB::table('tasks')
            ->where('id', $request->input('task'))
            ->update(['note' => $request->input('note'),
                        'scadenza' => $newData]);
    

        return redirect('/allTasks')->with(['message' => 'Task updated successfully']);
        }

        catch(Exception $e) {
            return redirect('/allTasks')->with(['error' => 'Updating Task failed!']);
        }



    }






    public function updateMyTask(Request $request) {


        $res = array();

        try{

            $t = DB::table('tasks')
            ->where('id', $request->input('id'))
            ->first();

            $newData = date('Y-m-d', strtotime($t->scadenza. ' + '. intval($request->input('scadenza')).' days'));

            DB::table('tasks')
            ->where('id', $request->input('id'))
            ->update(['note' => $request->input('note'),
                        'scadenza' => $newData,'stato' =>  $request->input('stato')]);

        $res['code'] = true;
        $res['message'] = 'Task updated successfully!!';
        $res['data'] = null;
        echo json_encode($res);

        } catch(Exception $e) {
            $res['code'] = false;
            $res['message'] = 'Error!!';
            $res['data'] = null;
            echo json_encode($res);
        }
    }




    public function editMyTas(Request $request){

        $res = array();

        try{

            $t = DB::table('tasks')
            ->where('id', $request->input('id'))
            ->first();

            $res['code'] = true;
            $res['message'] = 'Task retrieved successfully!!';
            $res['data'] = $t;
            echo json_encode($res);

            } catch(Exception $e) {
                $res['code'] = false;
                $res['message'] = 'Error!!';
                $res['data'] = null;
                echo json_encode($res);
            }
    }


}
