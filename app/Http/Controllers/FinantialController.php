<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Finantial;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class FinantialController extends Controller
{
    public function store(Request $request) {

        $res = array();

        try{
                $user = Auth()->user();
                $id = $request->input('id');
                $project_id = $request->input('project_id');
                $event_id = $request->input('event_id');
                $title = $request->input('title');  
                $descrizione = $request->input('descrizione');
                $type = $request->input('type');
                $status = $request->input('status');
                $modePayment = $request->input('modePayment');
                $value = $request->input('value');
                $currency = $request->input('currency');
                $expensedate = $request->input('expensedate');
                $duedate = $request->input('duedate');
                $user = $request->input('user');
                $created_by = $request->input('created_by');

                $tags = $request->input('tags');

                $filename="";
            if($request->file('document') != ""){

                $path = $request->file('document')->store('Finantial');
                //return $path;
                $filename= explode("/",$path)[1];

                $obj = [
                        'path' => $filename,
                        'title'=>$title,
                        'descrizione' => $descrizione,
                        'status' => $status,
                        'type' => $type,
                        'modePayment' => $modePayment,
                        'value' => $value,
                        'currency' => $currency,
                        'expensedate' => $expensedate,
                        'duedate' => $duedate,
                        'user' => $user,
                        'project_id' => $project_id,
                        'event_id' => $event_id,
                        'created_by' => $created_by
                    ];

                
            }
            else{

                if(isset($id) && $id != null){
                    $obj = [
                            'id' => $id,
                            'path' => $filename,
                            'title'=>$title,
                            'descrizione' => $descrizione,
                            'status' => $status,
                            'type' => $type,
                            'modePayment' => $modePayment,
                            'value' => $value,
                            'currency' => $currency,
                            'expensedate' => $expensedate,
                            'duedate' => $duedate,
                            'user' => $user,
                            'project_id' => $project_id,
                            'event_id' => $event_id,
                            'created_by' => $created_by
                    ];
                }
                else{
                    $obj = [
                        'path' => $filename,
                        'title'=>$title,
                        'descrizione' => $descrizione,
                        'status' => $status,
                        'type' => $type,
                        'modePayment' => $modePayment,
                        'value' => $value,
                        'currency' => $currency,
                        'expensedate' => $expensedate,
                        'duedate' => $duedate,
                        'user' => $user,
                        'project_id' => $project_id,
                        'event_id' => $event_id,
                        'created_by' => $created_by
                    ];
                }
            }


            


            if(isset($id) && $id != null){
                $group = Finantial::where('id', '=', $id)->update($obj);
                    $res['code'] = true;
                    $res['message'] = 'Finantial update successfully!!';
                    $res['data'] = null;
                    echo json_encode($res);
                    return;

            }
            else{
                $group = Finantial::create( $obj );
                

                if(isset($tags) ){
                    foreach($tags as $tag)
                    {
                        $object = [ 'meta_tags_id'=>$tag, 'entity_id' => $group->id,'entity' =>'finantial'];
                        DB::table('entity_tags')->insertGetId($object);
                    }
                }


                $res['code'] = true;
                $res['message'] = 'Finantial added successfully!!';
                $res['data'] = null;
                echo json_encode($res);
                return;
            }


        }

        catch(Exception $e) {
            return $e->getMessage();
        }

    }


    public function deleteFinantial(Request $request)
    {
        $res = array();
        $validator = Validator::make($request->all(), [           
            'id' => 'required',
        ]);

        try{
            DB::table('finantial_report')->where('id',$request->id)->delete();

            $res['code'] = true;
            $res['message'] = 'Finantial Data removed successfully!!';
            $res['data'] = null;
            echo json_encode($res);



        } catch(Exception $e) {
            return $e->getMessage();
        }
    }
}
