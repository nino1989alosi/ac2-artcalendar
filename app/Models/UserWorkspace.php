<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserWorkspace extends Model
{
    use HasFactory;
    public $table = "workspace_user";
    protected $guarded = [];
    public $timestamps = true;
    
    static public function add($data)
    {   
        $WS = UserWorkspace::where($data);
        if($WS->exists()){
           return $WS->first(); 
        }
        return UserWorkspace::create($data);
    }
}