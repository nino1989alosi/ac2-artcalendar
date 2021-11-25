<?php

namespace App\Models;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmailBlock extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    
    // protected $emailBlock;
    // function __construct()
    // {
    //     $this->emailBlock = new Constact;
    // }  
    public function contact()
    {
        return $this->belongsTo(Contact::class, 'entity_id');
    }
    static public function validate($data,$entity)
    {
        $default = ['is_primary','opted_out'];
        $return = [];
        foreach($data as $row){            
            $validator = Validator::make($row, [
                'email' => 'required|email',
                'type' => 'required|integer',
                'is_primary' => 'integer',
                'opted_out' => 'integer'
            ]);

            if ($validator->fails()) {
                return ["error" => $validator->errors()->toArray()];
            }
                        
            $re = $validator->valid();
            $re['entity'] = $entity;

            //$re = $this->emailBlock->defualtValue($re); //set defualt value to 0 if key is not detected
            foreach($default as $row){
                if(empty($re[$row])){
                    $re[$row] = 0;
                }
            }
            $return[] = $re;
        }
        return $return;
    }
    
    // static function defualtValue($data)
    // {
    //     foreach($this->default as $row){
    //         if(empty($data[$row])){
    //             $data[$row] = 0;
    //         }
    //     }
    //     return $data;
    // }
}