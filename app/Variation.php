<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variation extends Model
{
    protected $fillable = [
        'product_hash',
        'available',
        'featured',
        'sku'
    ];

    public function images()
    {
        return $this->morphMany('App\ProductImage', 'imageable');
    }
}
