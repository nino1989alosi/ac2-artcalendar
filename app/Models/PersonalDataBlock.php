<?php

namespace App\Models;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PersonalDataBlock extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    public function contact()
    {
        return $this->belongsTo(Contact::class, 'entity_id');
    }
    static public function validate($data,$entity)
    {
        $validator = Validator::make($data, [
            "place_of_birth" => 'nullable|string',
            "birthday" => 'nullable|string', //TODO changes to date formate
            "driver_license" => 'nullable|string',
            "height" => 'nullable|string',
            "weight" => 'nullable|string',
            "bust_size" => 'nullable|string',
            "waist_size" => 'nullable|string',
            "shoes_size" => 'nullable|string',
            "id_card_type" => 'nullable|string',
            "id_card_number" => 'nullable|string',
            "id_card_released_by" => 'nullable|string',
            "id_card_released_on" => 'nullable|string',
            "facebook_profile" => 'nullable|url',
            "twitter_profile" => 'nullable|url',
            "instagram_profile" => 'nullable|url',
            "linkedin_profile" => 'nullable|url',
            "tiktok_profile" => 'nullable|url',
        ]);
        if ($validator->fails()) {
            return ["error" => $validator->errors()->toArray()];
        }            
                
        $data = $validator->valid();
        $data['entity'] = $entity;
        return $data;
    }
}