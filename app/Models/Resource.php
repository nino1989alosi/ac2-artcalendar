<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Resource extends Model
{
    use HasFactory;
    protected $table = "resource";
    public $timestamps = true;
    protected $fillable = [
        'nome',
        'decrizione',
        'location',
        'disponibilita',
        'costo_value',
        'costo_currency'
    ,
    ];
    protected $guarded = [];
  

}