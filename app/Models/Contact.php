<?php

namespace App\Models;

use App\Models\MetaTag;
use App\Models\Workspace;
use App\Models\EmailBlock;
use App\Models\AddressBlock;
use App\Models\BusinessBlock;
use App\Models\WorkNoteBlock;
use App\Models\PersonalDataBlock;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $appends = ['workspace','data','tags','tstatus','companies'];
    protected $fillable = [
        'avatar',
        'status',
        'first_name',
        'is_public',
        'last_name',
        'nickname',
        'personal_phone',
        'email',
        'description',
        'legitimate_interest',
        'privacy_policy',
        'consent_to_communicate',
        'consent_to_process_data',
    ];
    protected $guarded = [];
    protected $casts = [
        'type' => 'array',
        'group' => 'array',
        'tag' => 'array',
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
            'avatar' => 'image',
            'status' => '',
            'first_name' => 'string',
            'last_name' => 'string',
            'is_public' => 'Integer',
            'nickname' => 'nullable|string',
            'personal_phone' => 'string',
            'description' => 'string',
            'legitimate_interest' => 'Integer',
            'privacy_policy' => 'Integer',
            'consent_to_communicate' => 'Integer',
            'consent_to_process_data' => 'Integer', 
        ];
        if(!$update){
            
            $validCheck['status'] = 'required';
            $validCheck['first_name'] = 'required|string';
            $validCheck['last_name'] = 'required|string';

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
    public function getCompaniesAttribute()
    {
        return $this->companies()->get()->pluck('id');
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
        if(!empty($this->pd)){
            $this->pd();
        }
        if(!empty($this->business)){
            $this->business->makeHidden(['payment_terms','annual_revenue','employees_count']);            
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
        if(!empty($this->companies)){
            $this->companies();
        }
        
    }
    static public function addImage($file,$workspace_id)
    {
        return $file->store('images/workspaces/'.$workspace_id.'/entity/contact', 'public'); 
    }
    public function getAvatarAttribute($value){
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
        return $this->hasMany(EmailBlock::class, 'entity_id')->where('entity','contact');
    }
    public function pd(){
        return $this->hasOne(PersonalDataBlock::class, 'entity_id')->where('entity','contact');
    }
    public function business(){
        return $this->hasOne(BusinessBlock::class, 'entity_id')->where('entity','contact');
    }
    public function address(){
        return $this->hasMany(AddressBlock::class, 'entity_id')->where('entity','contact');
    }
    public function metatag()
    {
        return $this->belongsToMany(MetaTag::class, 'entity_tags','entity_id','meta_tags_id')->where('entity_tags.entity','contact');
    }
    public function workspace() {
        return $this->belongsTo(Workspace::class,'workspace_id');
    }
    public function media()
    {
        return $this->hasMany(DocumentBlock::class, 'entity_id')->where('entity','contact')->where('type','media');
    }
    public function note()
    {
        return $this->hasMany(WorkNoteBlock::class, 'entity_id')->where('entity','contact') ;
    }
    public function companies()
    {
        return $this->belongsToMany(Company::class);
    }

    /**
     * attachCompanies
     *
     * @param  mixed $companyArray companies ids array
     * @param  mixed $workspace Workspace object
     * @return void
     */
    public function attachCompanies($companyArray,$workspace){

        $checkarray = [];
        if(isJson($companyArray)){
            $companyArray = json_decode($companyArray);
        }
        if(!empty($companyArray)){
            foreach($companyArray as $row){
                //$company = $workspace->company->canAccess($row['id']);
                $company = $workspace->company->find($row);
                if(!empty($company)){
                    array_push($checkarray,$row);
                }else{
                    return ['status' => false,"error" => 'Invalid Company'];
                }                
            }
        }
        $check = $this->companies()->sync($checkarray);
        return ["status" => $check];
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
                        $return = ['type' => $tag, 'name' => $row, 'entity' => 'contact'];
                        $check = MetaTag::where($return);                            
                        if(!$check->count()){
                            $check = MetaTag::create($return);                            
                        }else{
                            $check = $check->first();
                        }                        
                        $checkarray[$check->id] = ['entity' => 'contact'];
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
            return $this->sendError(['error'=>'No Conact found'], ['error'=>'No Conact found']);
        }
        $workspace = Auth()->user()->workspace()->find($workspace_id);
        if(empty($workspace->id)){
            return $this->sendError(['error' => $workspace], ['error'=> 'invalid Workspace']);
        }
        $contact = $workspace->contact()->find($id);
        if(empty($contact)){            
            $contact = Contact::where('id',$id)->where('is_public',1)->first();            
        }
        return $contact;
    }
    
}