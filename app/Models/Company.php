<?php

namespace App\Models;

use App\Models\Company;
use App\Models\Contact;
use App\Models\MetaTag;
use App\Models\Workspace;
use App\Models\EmailBlock;
use App\Models\AddressBlock;
use App\Models\BusinessBlock;
use App\Models\WorkNoteBlock;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;

    protected $appends = ['workspace','data','tags','tstatus'];
    public $timestamps = true;
    protected $fillable = [
        'name',
        'legal_name',
        'email',
        'description',
        'phone',
        'fax',
        'website',
        'fiscalcode',
        'vat_number',
        'logo',
        'status',         
        'registration',
        'annual_revenue',
        'employees',
        'owner'
    ];
    protected $guarded = [];
    protected $casts = [
        'type' => 'array',
        'group' => 'array',
        'tag' => 'array',
        'company' => 'array',
      ];
    protected $Tstatus = [
        'N/A',
        'closed',
        'active',        
        'transfered',
        'failed',
        'suspended',
        'canceled',
      ];

    static public function validate($data,$update = false)
    {
        $default = ['is_public','legitimate_interest','privacy_policy','consent_to_communicate','consent_to_process_data'];
        $validCheck = [
            'name' => 'string',
            'legal_name' => 'string',            
            'description' => 'string',            
            'status' => 'string',
            'logo' => 'image'
        ];

        if(!$update){
            $validCheck['name'] = 'required|string';
        }

        $validator = Validator::make($data,$validCheck );

        if ($validator->fails()) {
            return ["error" => $validator->errors()];
        }
        $data = $validator->valid();

        
        // $data = $this->contact->defualtValue($data); //set defualt value to 0 if key is not detected
        foreach($default as $row){
            if(empty($data[$row])){
                $data[$row] = 0;
            }
        }      
        return $data;        
    }
    public function getTstatusAttribute(){        
        return $this->Tstatus[$this->status];
    }
    public function getTagsAttribute(){
        $data = $this->metatag()->get();
        $return = [];
        foreach($data as $row){
            $return[$row['type']][] = $row['name'];
        }
        return $return;
    }
    public function getDataAttribute(){
        
        if(!empty($this->email)){
            $this->email();
        }
        // if(!empty($this->pd)){
        //     $this->pd();
        // }
        if(!empty($this->business)){
            $this->business();
        }
        if(!empty($this->address)){
            $this->address();
        }
        if(!empty($this->media)){
            $this->media();
        }
        if(!empty($this->note)){
            $this->note();
        }
        if(!empty($this->contact)){
            $this->contact();
        }
        
    }
    static public function addImage($file,$workspace_id)
    {
        return $file->store('images/workspaces/'.$workspace_id.'/entity/company', 'public'); 
    }
    public function getLogoAttribute($value){
        if(!empty($value)){
            return Storage::url($value);
        }
        return null;        
    } 
    public function getWorkspaceAttribute($value){
        return $this->workspace();
    }
    // public function getProperFields($array)
    // {
    //     return array_filter($array,array($this,'getProperFields'));
    // }
    static public function getProperFields($row)
    {
        if(is_array($row)){
            $row = array_filter($row);
            if($row != "{]"){
                return $row;
            }
        }elseif(!empty($row)){
            return $row;
        }
    }
    public function email(){
        return $this->hasMany(EmailBlock::class, 'entity_id')->where('entity','company');
    }
    // public function pd(){
    //     return $this->hasOne(PersonalDataBlock::class, 'entity_id')->where('entity','company');
    // }
    public function business()
    {
        return $this->hasOne(BusinessBlock::class, 'entity_id')->where('entity','company');
    }
    public function address()
    {
        return $this->hasMany(AddressBlock::class, 'entity_id')->where('entity','company');
    }
    public function metatag()
    {
        return $this->belongsToMany(MetaTag::class, 'entity_tags','entity_id','meta_tags_id')->where('entity_tags.entity','company');
    }
    public function workspace() 
    {
        return $this->belongsTo(Workspace::class,'workspace_id');
    }
    public function media()
    {
        return $this->hasMany(DocumentBlock::class, 'entity_id')->where('entity','company')->where('type','media');
    }
    public function note()
    {
        return $this->hasMany(WorkNoteBlock::class, 'entity_id')->where('entity','company') ;
    }
    public function contact()
    {
        return $this->belongsToMany(Contact::class);
    }    
 

    
    public function attachTags($alldata)
    {
        $check = ['type','group','tag'];
        $checkarray = [];
        foreach($check as $tag){
            if(!empty($alldata[$tag])){
                $type = json_decode($alldata[$tag], true);
                if(!empty($type)){
                    
                    foreach($type as $row){
                        $return = ['type' => $tag, 'name' => $row, 'entity' => 'company'];
                        $check = MetaTag::where($return);                            
                        if(!$check->count()){
                            $check = MetaTag::create($return);                            
                        }else{
                            $check = $check->first();
                        }                        
                        $checkarray[$check->id] = ['entity' => 'company'];
                    }
                    
                }
            }
        }
        // print_r($checkarray);
        $this->metatag()->sync($checkarray);
    }
    static public function canAccess($id,$workspace_id)
    {
        if (empty($id)) {
            return $this->sendError(['error'=>'No company found'], ['error'=>'No company found']);
        }
        $workspace = Auth()->user()->workspace()->find($workspace_id);
        if(empty($workspace->id)){
            return $this->sendError(['error' => $workspace], ['error'=> 'invalid Workspace']);
        }
        $company = $workspace->company()->find($id);
        if(empty($company)){            
            $company = Company::where('id',$id)->where('is_public',1)->first();            
        }
        return $company;
    }
}