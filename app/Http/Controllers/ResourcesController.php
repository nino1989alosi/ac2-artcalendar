<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Resource;
use Illuminate\Support\Facades\Validator;

class ResourcesController extends Controller
{
    public function index(Request $request)
    {       
        $user = Auth()->user();
      
       $resource = Resource::paginate(10);
                            return view('resource.index', compact('resource'));
    }


    public function new(Request $request){
        
        $user = Auth()->user();
        $tags = DB::table('tag')
                        ->select(
                            'tag.*'
                        )
                        ->join('workspaces', 'workspaces.id', '=', 'tag.workspace_id')
                        ->where('workspaces.added_by',$user->id)->get();
        $typescosto = DB::table('tipo_costi')->get();
        $types = DB::table('type')->where('user_id',$user->id)->get();
        return view('resource.create', compact('tags','types','typescosto'));
    }



    public function storeMedia(Request $request){
       
        try{
            $media = $request->file('media')->getClientOriginalName();

           //$this->file->storeAs( "", $fileName, 'public');
            $path = $request->file('media')->store('mediaCompany');
            //return $path;
            $filename= explode("/",$path)[1];


            DB::table('resource_media')->insertGetId([
                'resource_id' => $request->resourceId,
                'path' => $path,
                'media_name' =>$media
            ]);

            return redirect('/edit-resource/'.$request->resourceId)->with(['message' => 'Section Media edited successfully']);
            
        }
        catch(Exception $e) {
            return redirect('/edit-resource/'.$request->resourceId)->with(['error' => 'Updating section Media failed!']);
        }
    }

    public function removeMedia(Request $request){
       

        $res = array();
        $validator = Validator::make($request->all(), [           
            'id' => 'required',
        ]);

        try{
            $caddr = DB::table('resource_media')->where('id',$request->id)->delete();

            $res['code'] = true;
            $res['message'] = 'Media removed successfully!!';
            $res['data'] = null;
            echo json_encode($res);



        } catch(Exception $e) {
            return $e->getMessage();
        }

    }
    public function store(Request $request) {

        try{
                $user = Auth()->user();
                $id = $request->input('id');
                $name = $request->input('name');  
                $location  = $request->input('location');
                $decrizione = $request->input('description');
                $disponibilita = $request->input('disponibilita');

                $costo_value = $request->input('costo_value');
                $costo_currency = $request->input('costo_currency');
                $typescosto = $request->input('typescosto');

                $types = $request->input('types');
                $tags = $request->input('tags');




                if(isset($id) && $id != null){
                    $obj = [
                            'id' => $id,
                            'nome' =>$name,
                            'decrizione' => $decrizione,
                            'location'=>$location,
                            'disponibilita' => $disponibilita,
                            'costo_value' => $costo_value,
                            'costo_currency' => $costo_currency
                    ];
                }
                else{
                    $obj = [
                        'nome' =>$name,
                            'decrizione' => $decrizione,
                            'location'=>$location,
                            'disponibilita' => $disponibilita,
                            'costo_value' => $costo_value,
                            'costo_currency' => $costo_currency,
                            
                    ];
                }
            


            


            if(isset($id) && $id != null){
                $resource = Resource::where('id', '=', $id)->update($obj);
                return redirect('/edit-resource/'.$id)->with(['message' => 'Resource created successfully']);
            }
            else{
                $resource = Resource::create( $obj );
            }
                

                if(isset($types)){
                    foreach($types as $type)
                    {
                        $object = [ 'meta_types_id'=>$type, 'entity_id' => $id,'entity' =>'resource'];
                        DB::table('entity_types')->insertGetId($object);
                    }
                }
            
        
                if(isset($tags) ){
                    foreach($tags as $tag)
                    {
                        if($tag != null){
                            $object = [ 'meta_tags_id'=>$tag, 'entity_id' => $id,'entity' =>'resource'];
                            DB::table('entity_tags')->insertGetId($object);
                        }
                    }
                }


               /* if(isset($typescosto) ){
                    foreach($typescosto as $t)
                    {
                        $object = [ 'type_id'=>$t, 'entity_id' => $resource->id,'entity' =>'resource'];
                        DB::table('meta_typecosto')->insertGetId($object);
                    }
                }*/



                return redirect('/edit-resource/'.$id)->with(['message' => 'Resource updated successfully']);       
            
        }

        catch(Exception $e) {
            return redirect('/resources')->with(['error' => 'Operation failed!']);
        }



    }










    public function edit(Request $request){
        $user = Auth()->user();
        $resource = Resource::where('id', '=', $request->id)->first();

        $element = $resource;
        $media = DB::table('resource_media')->where('resource_id',$request->id)->paginate(10);


        $tags = DB::table('tag')
                        ->select(
                            'tag.*'
                        )
                        ->join('workspaces', 'workspaces.id', '=', 'tag.workspace_id')
                        ->where('workspaces.added_by',$user->id)->get();

       

        $Mytg = DB::table('entity_tags')
                        ->select(
                            'entity_tags.meta_tags_id'
                        )
                    ->where('entity_id',$request->id)
                    ->where('entity','resource')
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
                        ->where('entity','resource')
                        ->get();


        $Mytypes = "";
        foreach ($Myty as $tt) {

            $Mytypes = $Mytypes != "" ? $Mytypes.','.$tt->meta_types_id : $tt->meta_types_id;
        }



        $events = [];
        $projects = [];
        $tasks = [];


        $MyDocuments = DB::table('document_blocks')
        ->select(
            'document_blocks.*',
            'users.name'
        )
        ->join('users', 'users.id', '=', 'document_blocks.owner')
        ->where('entity_id',$request->id)
        ->where('entity',"resource")->paginate(10);

        $documents = DB::table('document_blocks')
                                ->select(
                                    'document_blocks.*',
                                    'users.name'
                                )
                                ->join('users', 'users.id', '=', 'document_blocks.owner')
                                ->where('owner',$user->id)
                                ->where('entity',"resource")->paginate(10);

        $typescosto = DB::table('tipo_costi')->get();

        return view('resource.edit', compact('resource', 'element', 'MyDocuments','documents', 'tags','types','media','Mytags', 'Mytypes','typescosto'));
    }
}
