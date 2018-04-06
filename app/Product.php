<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Parttimenobody\Tags\Taggable;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use Taggable, Searchable;

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
