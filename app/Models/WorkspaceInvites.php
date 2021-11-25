<?php

namespace App\Models;

use App\Models\Workspace;
use Illuminate\Database\Eloquent\Model;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WorkspaceInvites extends Model implements JWTSubject
{
    use HasFactory;

    protected $guarded = [];
    protected $appends = ['Tstatus'];
    
    protected $table = 'workspace_invites';

    public $timestamps = true;
    protected $fillable = ['id','workspace_id','invited_by','invite_to','invite_url',
                            'status','invite_key','role'];

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

    public function getTstatusAttribute(){
        
        switch ($this->status) {
            case 0:
                return "pending invitation";
                break;

            case 1:
                return "Active invitation";
                break;
        }
    }    



}