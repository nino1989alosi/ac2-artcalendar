<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use File;
use Response;

class DocumentsController extends Controller
{
    public function index(Request $request)
    {       
        $user = Auth()->user();
        $documents = DB::table('document_blocks')
                                ->select(
                                    'document_blocks.*',
                                    'users.name as ownername'
                                )
                                ->join('users', 'users.id', '=', 'document_blocks.owner')
                                ->where('owner',$user->id)
                                ->paginate(10);
                                                
        return view('document.index', compact('documents'));
    }



    public function edit(Request $request){
        //

        return view('company.edit', compact('company','contact_email','settings','address','notes','tags','types','media'));
    }



    public function storeInTask(Request $request){
       
        try{

            // $media = $request->input('media');
            $path = $request->file('media')->store('Documents');
            //return $path;
            $filename= explode("/",$path)[1];

            $obj = [
                'entity_id' => $request->taskId,
                'entity' => "task",
                'path' => $filename,
                'owner' =>Auth()->user()->id,
                'filename' => $request->file('media')->getClientOriginalName()
            ];


            DB::table('document_blocks')->insertGetId( $obj );
        
            return redirect('/edit-task/'.$request->taskId)->with(['message' => 'Document added successfully']);
        }
        catch(Exception $e) {
            return redirect('/edit-taskt/'.$request->taskId)->with(['error' => 'Creating document failed!']);
        }
    }




    public function storeInGroup(Request $request){
       
        try{
            $res = array();
            // $media = $request->input('media');

            $filename ="";

            if($request->file('media') != null){
                $path = $request->file('media')->store('Documents');
            //return $path;
                $filename= explode("/",$path)[1];
            }

            $documents = explode(",",$request->documents);
 

            
            if(isset($documents)) {
                foreach ($documents as $item) {
                    if($item != ""){
                    $document = DB::table('document_blocks')
                                    ->where('id',$item)
                                    ->first();     
                                    
                                    
                    $obj = [
                        'entity_id' => $request->group,
                        'entity' => "group",
                        'path' => $document->path,
                        'owner' =>Auth()->user()->id,
                        'filename' => $request->file('media')->getClientOriginalName()
                    ];


                    DB::table('document_blocks')->insertGetId( $obj );
                }
                }
            }


            if($filename != ""){
            $obj = [
                'entity_id' => $request->group,
                'entity' => "group",
                'path' => $filename,
                'owner' =>Auth()->user()->id,
                'filename' => $request->file('media')->getClientOriginalName()
            ];


            DB::table('document_blocks')->insertGetId( $obj );
        }


            return redirect('/edit-group/'.$request->group)->with(['message' => 'Document added successfully']);
        }
        catch(Exception $e) {
            return redirect('/edit-group/'.$request->group)->with(['error' => 'Creating document failed!']);
        }
    }


    public function storeInCompany(Request $request){
       
        try{
            $res = array();
            // $media = $request->input('media');

            $filename ="";

            if($request->file('media') != null){
                $path = $request->file('media')->store('Documents');
            //return $path;
                $filename= explode("/",$path)[1];
            }

            $documents = explode(",",$request->documents);
 


            if(isset($documents)) {
                foreach ($documents as $item) {
                    if($item != ""){
                        $document = DB::table('document_blocks')
                                        ->where('id',$item)
                                        ->first();     
                                        
                                        
                        $obj = [
                            'entity_id' => $request->company,
                            'entity' => "company",
                            'path' => $document->path,
                            'owner' =>Auth()->user()->id
                        ];


                        DB::table('document_blocks')->insertGetId( $obj );
                }
                }
            }


            if($filename != ""){
            $obj = [
                'entity_id' => $request->company,
                'entity' => "company",
                'path' => $filename,
                'owner' =>Auth()->user()->id,
                'filename' => $request->file('media')->getClientOriginalName()
            ];


            DB::table('document_blocks')->insertGetId( $obj );
        }


            return redirect('/edit-company/'.$request->company)->with(['message' => 'Document added successfully']);
        }
        catch(Exception $e) {
            return redirect('/edit-company/'.$request->company)->with(['error' => 'Creating document failed!']);
        }
    }



    public function storeInResource(Request $request){
       
        try{
            $res = array();
            // $media = $request->input('media');

            $filename ="";

            if($request->file('media') != null){
                $path = $request->file('media')->store('Documents');
            //return $path;
                $filename= explode("/",$path)[1];
            }

            $documents = explode(",",$request->documents);
 


            if(isset($documents)) {
                foreach ($documents as $item) {
                    if($item != ""){
                        $document = DB::table('document_blocks')
                                        ->where('id',$item)
                                        ->first();     
                                        
                                        
                        $obj = [
                            'entity_id' => $request->resource,
                            'entity' => "resource",
                            'path' => $document->path,
                            'owner' =>Auth()->user()->id,
                            'filename' => $request->file('media')->getClientOriginalName()
                        ];


                        DB::table('document_blocks')->insertGetId( $obj );
                }
                }
            }


            if($filename != ""){
            $obj = [
                'entity_id' => $request->resource,
                'entity' => "resource",
                'path' => $filename,
                'owner' =>Auth()->user()->id,
                'filename' => $request->file('media')->getClientOriginalName()
            ];


            DB::table('document_blocks')->insertGetId( $obj );
        }


            return redirect('/edit-resource/'.$request->resource)->with(['message' => 'Document added successfully']);
        }
        catch(Exception $e) {
            return redirect('/edit-resource/'.$request->resource)->with(['error' => 'Creating document failed!']);
        }
    }




    public function storeInProject(Request $request){
       
        try{
            $res = array();
            // $media = $request->input('media');

            $filename ="";

            if($request->file('media') != null){
                $path = $request->file('media')->store('Documents');
            //return $path;
                $filename= explode("/",$path)[1];
            }

            $documents = explode(",",$request->documents);
 

            
            if(isset($documents)) {
                foreach ($documents as $item) {
                    if($item != ""){
                    $document = DB::table('document_blocks')
                                    ->where('id',$item)
                                    ->first();     
                                    
                                    
                    $obj = [
                        'entity_id' => $request->project,
                        'entity' => "project",
                        'path' => $document->path,
                        'owner' =>Auth()->user()->id,
                        'filename' => $request->file('media')->getClientOriginalName()
                    ];


                    DB::table('document_blocks')->insertGetId( $obj );
                }
                }
            }


            if($filename != ""){
            $obj = [
                'entity_id' => $request->project,
                'entity' => "project",
                'path' => $filename,
                'owner' =>Auth()->user()->id,
                'filename' => $request->file('media')->getClientOriginalName()
            ];


            DB::table('document_blocks')->insertGetId( $obj );
        }


            return redirect('/edit-project/'.$request->project)->with(['message' => 'Document added successfully']);
        }
        catch(Exception $e) {
            return redirect('/edit-project/'.$request->project)->with(['error' => 'Creating document failed!']);
        }
    }




    public function remove(Request $request){
       

        $res = array();
        $validator = Validator::make($request->all(), [           
            'id' => 'required',
        ]);

        try{
            $caddr = DB::table('document_blocks')->where('id',$request->id)->delete();

            $res['code'] = true;
            $res['message'] = 'Document removed successfully!!';
            $res['data'] = null;
            echo json_encode($res);



        } catch(Exception $e) {
            return $e->getMessage();
        }
    }



    public function download($file){
        $res = array();
    
        try{

            return response()->download(storage_path('/app/Documents/'. $file));

        } catch(Exception $e) {
            return $e->getMessage();
        }
    }




    public function store(Request $request){
       
        try{

            // $media = $request->input('media');
            $path = $request->file('media')->store('Documents');
            //return $path;
            $filename= explode("/",$path)[1];

            $obj = [
                'path' => $filename,
                'owner' =>Auth()->user()->id,
                'filename' => $request->file('media')->getClientOriginalName()
            ];


            DB::table('document_blocks')->insertGetId( $obj );
        
            return redirect('/documents')->with(['message' => 'Document added successfully']);
        }
        catch(Exception $e) {
            return redirect('/documents')->with(['error' => 'Creating document failed!']);
        }
    }

}
