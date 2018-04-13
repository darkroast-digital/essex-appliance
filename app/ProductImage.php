<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable = [
        'sku',
        'id',
        'imageable_id',
        'imageable_type',
    ];

    public function path()
    {
        return config('image.path.relative') . $this->path;
    }

    public function imageable()
    {
        return $this->morphTo();
    }
}
