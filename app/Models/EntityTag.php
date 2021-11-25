<?php

namespace App\Models;

use App\Models\MetaTag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EntityTag extends Pivot
{
    use HasFactory;
    protected $table = "entity_tags";
    public function tags()
    {
        return $this->hasOne(MetaTag::class, 'id','meta_tags_id');
    }
}