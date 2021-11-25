<?php

namespace App\Models;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;

class BusinessBlock extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    // protected static function booted()
    // {
    //     static::addGlobalScope('ancient', function (Builder $builder) {            
    //         $builder->hidden = ['payment_terms'];
    //         $builder->where('entity_id', '<', now()->subYears(2000));
    //     });
    // } 
    public function contact()
    {
        return $this->belongsTo(Contact::class, 'entity_id');
    }
    static public function validate($data,$entity)
    {
        $return = [];                 
        $row = array_filter($data);            
        $validator = Validator::make($row, [
            "website" => 'string|url',
            "fiscal_code" => 'string',
            "vat_number" => 'string',
            "business_registration" => 'string',
            "business_phone" => 'string',
            "business_fax" => 'string',
            "annual_revenue" => 'string',
            "employees_count" => 'string',
            "payment_terms" => 'string'
        ]);

        if ($validator->fails()) {
            return ["error" => $validator->errors()->toArray()];
        }
        $data = $validator->valid();
        $data['entity'] = $entity;
        return $data;
        
    }    
    public function makeHidden($attributes)
    {
        $this->hidden = array_merge($this->hidden, (array) $attributes);

        return $this;
    }
}