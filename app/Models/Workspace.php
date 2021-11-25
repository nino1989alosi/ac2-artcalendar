<?php

namespace App\Models;

use App\Models\User;

use App\Models\Company;
use App\Models\Contact;
use App\Models\EntityTag;
use App\Models\WorkspaceInvites;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Workspace extends Model implements JWTSubject
{
    use HasFactory;

    protected $guarded=[];
    protected $table= 'workspaces';
    protected $appends = ['users','role'];

    // public function getCreatedAtAttribute($value){
    //     return date("d-m-Y", strtotime($value));
    // }
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
    
    public function users()
    {
        return $this->belongsToMany(User::class,'workspace_user');
    }
    public function contact()
    {
        return $this->hasMany(Contact::class, 'workspace_id');
    }
    public function company()
    {
        return $this->hasMany(Company::class, 'workspace_id');
    }
    public function contactTags()
    {
        return $this->hasManyThrough(EntityTag::class,Contact::class,'workspace_id','entity_id')->where('entity_tags.entity','contact');
    }
    public function companyTags()
    {
        return $this->hasManyThrough(EntityTag::class,Company::class,'workspace_id','entity_id')->where('entity_tags.entity','company');
    }
    public function getAddedByAttribute($value){
        return User::where("id",$value)->first();
    }
    public function getRoleAttribute(){
        return  $this->pivot->role;
    }
    public function getUsersAttribute(){
        $users = $this->users();   
        if(!empty($users)){
            $users = $users->pluck('user_id');
            foreach($users as $row){
                $all[] = User::where("id",$row)->first();
            }
            return $all;
        }
        return null;
    }

}