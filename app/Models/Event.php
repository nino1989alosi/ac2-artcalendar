<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = "event";
    public $timestamps = true;
    protected $fillable = ['id','title','descrizione','date','startH',
                            'endH','stato','eventType','locationPhisical','platform','locationVirtual','author_id'];
}
