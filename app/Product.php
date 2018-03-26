<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Parttimenobody\Tags\Taggable;

class Product extends Model
{
    use Taggable;

    protected $fillable = [
        'name',
        'available',
        'sku',
        'upc',
        'description',
        'features',
        'specifications',
        'price'
    ];
}
