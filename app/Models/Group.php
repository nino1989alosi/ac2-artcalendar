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

class Group extends Model
{
    use HasFactory;
    protected $table = "group";
    public $timestamps = true;
    protected $fillable = [
        'user_id',
        'status',
        'name',
        'website',
        'logo',
        'description'
    ,
    ];
    protected $guarded = [];
  

}