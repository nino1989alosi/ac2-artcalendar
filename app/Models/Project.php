<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = "project";
    public $timestamps = true;
    protected $fillable = ['id','image','name','code','status',
                            'startDT','endDT','progress','description','website','workspace_id','note'];
}
