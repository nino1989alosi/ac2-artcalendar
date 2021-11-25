<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Team extends Model
{
    use HasFactory;
    protected $table = "teams";
    public $timestamps = true;
    protected $fillable = [
        'id',
        'nome',
        'owner',
        'count'
    ];
    protected $guarded = [];
  

}