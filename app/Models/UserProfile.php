<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $table = "users_profile";
    public $timestamps = true;
    protected $fillable = ['id','user_id','fullname','nickname','phone',
                            'company','country','birth_date','birth_country','gender','language','format_date','timezone'];
}
