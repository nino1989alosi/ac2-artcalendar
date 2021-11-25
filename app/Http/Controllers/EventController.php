<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use App\Models\Event;

class EventController extends Controller
{
    public function index(Request $request)
    {       
        $user = Auth()->user();
        
        $events = Event::paginate(10);


        return view('event.index', compact('events'));
    }




    public function new(Request $request){
        
        $user = Auth()->user();
        $tags = DB::table('tag')->get();
        $types = DB::table('type')->where('user_id',$user->id)->get();
        $projects = DB::table('project')->get();
        return view('event.create', compact('tags','types','projects'));
    }





    public function store(Request $request) {

        try{
                $user = Auth()->user();
                $id = $request->input('id');
                $title = $request->input('title');  
                $descrizione = $request->input('descrizione');
                $date = $request->input('date');
                $startH = $request->input('startH');
                $endH = $request->input('endH');
                $stato = $request->input('stato');
                $eventType = $request->input('eventType');
                $platform = $request->input('platform');
                $locationVirtual = $request->input('locationVirtual');
                $project_id = $request->input('project');


                $types = $request->input('types');
                $tags = $request->input('tags');


           
                if(isset($id) && $id != null){
                    $obj = [
                            'id' => $id,
                            'author_id' =>$user->id,
                            'title' => $title,
                            'descrizione'=>$descrizione,
                            'date' => $date,
                            'startH' => $startH,
                            'endH' => $endH,
                            'stato' => $stato,
                            'eventType' => $eventType,
                            'platform' => $platform,
                            'locationVirtual' => $locationVirtual
                    ];
                }
                else{
                    $obj = [
                        'author_id' =>$user->id,
                        'title' => $title,
                        'descrizione'=>$descrizione,
                        'date' => $date,
                        'startH' => $startH,
                        'endH' => $endH,
                        'stato' => $stato,
                        'eventType' => $eventType,
                        'platform' => $platform,
                        'locationVirtual' => $locationVirtual
                    ];
                }
            


            


            if(isset($id) && $id != null){
                $ev = Event::where('id', '=', $id)->update($obj);
                return redirect('/edit-event/'.$ev->id)->with(['message' => 'Event created successfully']);
            }
            else{
                $ev = Event::create( $obj );             

                if(isset($types)){
                    foreach($types as $type)
                    {
                        $object = [ 'meta_types_id'=>$type, 'entity_id' => $ev->id,'entity' =>'event'];
                        DB::table('entity_types')->insertGetId($object);
                    }
                }
            
            
                if(isset($tags) ){
                    foreach($tags as $tag)
                    {
                        $object = [ 'meta_tags_id'=>$tag, 'entity_id' => $ev->id,'entity' =>'event'];
                        DB::table('entity_tags')->insertGetId($object);
                    }
                }


                return redirect('/edit-event/'.$ev->id)->with(['message' => 'Event updated successfully']);       
            }


        }

        catch(Exception $e) {
            return redirect('/events')->with(['error' => 'Operation failed!']);
        }



    }






    public function edit(Request $request){
        $user = Auth()->user();
        $event = Event::where('id', '=', $request->id)->first();

        $element = $event;
        $media = DB::table('resource_media')->where('resource_id',$request->id)->paginate(10);

        $resource = DB::table('resource')->get();
        $resourcesConnected = DB::table('event_resource')
                                ->where('event_id',$request->id)
                                ->get();

        $tasks = DB::table('tasks')->where('event_id',$request->id)->paginate(10);


        $tags = DB::table('tag')->get();

        $users = DB::table('users')->get();
        $uConnected = DB::table('operators')
                                ->select('entity_id')
                                ->where('event_id',$request->id)
                                ->where('type', 'user')
                                ->get();

        $usersConnected = "";
        foreach ($uConnected as $tt) {

            $usersConnected = $usersConnected != "" ? $usersConnected.','.$tt->entity_id : $tt->entity_id;
        }

        $groups = DB::table('group')
                        ->where('user_id',$user->id)
                        ->get();
                        
        $gConnected =  DB::table('operators')
                                ->select('entity_id')
                                ->where('event_id',$request->id)
                                ->where('type', 'group')
                                ->get();

        $groupsConnected = "";
        foreach ($gConnected as $tt) {

            $groupsConnected = $groupsConnected != "" ? $groupsConnected.','.$tt->entity_id : $tt->entity_id;
        }

        $projects = DB::table('project')->get();

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


        $list = DB::table('operators')->where('event_id',$request->id)->get();

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
        ->where('entity',"event")->paginate(10);

        $documents = DB::table('document_blocks')
                                ->select(
                                    'document_blocks.*',
                                    'users.name'
                                )
                                ->join('users', 'users.id', '=', 'document_blocks.owner')
                                ->where('owner',$user->id)
                                ->where('entity',"event")->paginate(10);

        $finantials = DB::table('finantial_report')->where('event_id',$request->id)->paginate(10);


        $partecipants = DB::table('partecipanti')->where('event_id',$request->id)->paginate(10);


        $notes = DB::table('event_notes')
                        ->join('users', 'users.id', '=', 'event_notes.user_id')
                        ->where('event_id',$request->id)
                        ->paginate(10);

        return view('event.edit', compact('event','resource', 'element', 'MyDocuments','documents', 'projects','tags','types','media','Mytags', 'list',
        'Mytypes','tasks','element','users','groups','finantials','usersConnected','groupsConnected', 'partecipants','resourcesConnected','notes'));
    }



    public function getPartecipants(Request $request)
    {       
        $user = Auth()->user();
        
       $partecipants =  DB::table('partecipanti')->paginate(10);


        return view('partecipante.component', compact('partecipants'));
    }



    public function getPartecipante(Request $request)
    {       
        $res = array();
        try{

            $partecipante =  DB::table('partecipanti')->where("id", $request->id)->first();

            $res['code'] = true;
            $res['message'] = 'Partecipant created successfully!!';
            $res['data'] = $partecipante;
            echo json_encode($res);



        } catch(Exception $e) {
            return $e->getMessage();
        }

    }



    public function storePartecipant(Request $request){
        $res = array();
        try{
            DB::table('partecipanti')->insertGetId([
                'email' => $request->email,
                'fullname' => $request->fullname,
                'sesso' => $request->sesso,
                'telefono' => $request->telefono,
                'event_id' => $request->eventPartecipantId
            ]);   

            $res['code'] = true;
            $res['message'] = 'Partecipant created successfully!!';
            $res['data'] = null;
            echo json_encode($res);

        } catch(Exception $e) {
            return $e->getMessage();
        }

    }




    public function storeOperator(Request $request){
        $res = array();

        $users = $request->users;
        $groups = $request->groups;
        $id = $request->eventId;


        try{


            foreach ($groups as $t) {

                DB::table('operators')->insertGetId([
                    'type' => 'group',
                    'event_id' => $id,
                    'entity_id' => $t
                ]);   
            }

            foreach ($users as $tt) {

                DB::table('operators')->insertGetId([
                    'type' => 'user',
                    'event_id' => $id,
                    'entity_id' => $tt
                ]);   
            }


            
            return redirect('/edit-event/'.$request->eventId)->with(['message' => 'Section Operators edited successfully']);

        } catch(Exception $e) {
            return redirect('/edit-event/'.$request->eventId)->with(['error' => 'Updating section Media failed!']);
        }

    }




    public function updatePartecipant(Request $request){
       

        $res = array();
        try{

            DB::table('partecipanti')->where('id', $request->id)->update([
                'email' => $request->email,
                'fullname' => $request->fullname,
                'sesso' => $request->sesso,
                'telefono' => $request->telefono
            ]);   




            $res['code'] = true;
            $res['message'] = 'Partecipant created successfully!!';
            $res['data'] = null;
            echo json_encode($res);



        } catch(Exception $e) {
            return $e->getMessage();
        }

    }





    public function storeInEvent(Request $request){
       
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
                            'entity_id' => $request->eventDocument_id,
                            'entity' => "event",
                            'path' => $document->path,
                            'owner' =>Auth()->user()->id
                        ];


                        DB::table('document_blocks')->insertGetId( $obj );
                    }
                }
            }


            if($filename != ""){
            $obj = [
                'entity_id' => $request->eventDocument_id,
                'entity' => "event",
                'path' => $filename,
                'owner' =>Auth()->user()->id,
                'filename' => $request->file('media')->getClientOriginalName()
            ];


            DB::table('document_blocks')->insertGetId( $obj );
        }


            return redirect('/edit-event/'.$request->eventDocument_id)->with(['message' => 'Document added successfully']);
        }
        catch(Exception $e) {
            return redirect('/edit-event/'.$request->eventDocument_id)->with(['error' => 'Creating document failed!']);
        }
    }






    public function storeNote(Request $request){

        $text = $request->text;
        $id = $request->eventIdNote;

        try{
                DB::table('event_notes')->insertGetId([
                    'user_id' => Auth()->user()->id,
                    'event_id' => $id,
                    'testo' => $text
                ]);   
            


            
            return redirect('/edit-event/'.$request->eventIdNote)->with(['message' => 'Section Notes edited successfully']);

        } catch(Exception $e) {
            return redirect('/edit-event/'.$request->eventIdNote)->with(['error' => 'Updating section Notes failed!']);
        }

    }
}
