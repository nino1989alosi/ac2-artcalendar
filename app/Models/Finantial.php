<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finantial extends Model
{
    use HasFactory;

    protected $table = "finantial_report";
    public $timestamps = true;
    protected $fillable = ['id','title','descrizione','type','status',
                            'modePayment','value','currency','expensedate','duedate','user','path','project_id','event_id','created_by'];
}
