<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DocumentBlock extends Model
{
    use HasFactory;
    protected $guarded = [];
    // public function addImage($image,$type,$entity_obj,$entity)
    // {
    //     if(!is_array($image)){
    //         $image = [$image];
    //     }
    //     if($entity == 'contact'){
    //         foreach($image as $row){
    //             $entity_obj->
    //         }
    //     }
        
    // }
    public function getCreatedAtAttribute($value){
        return date("d-m-Y", strtotime($value));
    }
    public function getPathAttribute($value){
        if(!empty($value)){
            return Storage::url($value);
        }      
    } 
}