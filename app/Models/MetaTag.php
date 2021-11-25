<?php

namespace App\Models;

use App\Models\Company;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MetaTag extends Model
{
    use HasFactory;
    protected $guarded = [];  
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    // static public function proper($data,$type,$entity)
    // {
    //     $return = [];        
    //     foreach($data as $row){
    //         $return[] = ['type' => $type, 'name' => $row, 'entity' => $entity];
    //     }
    //     return $return;
    // }
    
    public function contact()
    {
        return $this->belongsToMany(Contact::class, 'entity_id')->withPivot('entity','contact');
        //return $this->belongsToMany(Contact::class, 'entity_tags','entity_id','meta_tags_id')->where('entity_tags.entity','contact');
    }
    public function company()
    {
        return $this->belongsToMany(Company::class, 'entity_id')->withPivot('entity','company');
        //return $this->belongsToMany(Contact::class, 'entity_tags','entity_id','meta_tags_id')->where('entity_tags.entity','contact');
    }
}