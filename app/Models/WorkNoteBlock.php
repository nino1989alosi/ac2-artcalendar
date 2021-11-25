<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkNoteBlock extends Model
{
    use HasFactory;
    protected $guarded = [];
    // public function getCreatedAtAttribute($value){
    //     return date("d-m-Y", strtotime($value));
    // }
}