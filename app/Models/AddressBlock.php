<?php

namespace App\Models;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AddressBlock extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    // private $statusArray = [
    //     'N/A',
    //     'office',
    //     'private',
    //     'vacation',
    // ];

    // protected $appends = [
    //     "statust"
    // ];
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
        $return = [];
        foreach($data as $row){            
            $row = array_filter($row);            
            $validator = Validator::make($row, [
                "type" => 'required',
                "street" => 'required',
                "city" => 'string',
                "postal_code" => 'string',
                "state" => 'string',
                "country" => 'string',
                "description" => 'string',
            ]);

            if ($validator->fails()) {
                return ["error" => $validator->errors()->toArray()];
            }
            $re = $validator->valid();
            $re['entity'] = $entity;
            $return[] = $re;
        }
        return $return;
    }
}    