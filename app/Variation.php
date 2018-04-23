<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Parttimenobody\Tags\Taggable;

class Variation extends Model
{
    use Taggable;

    protected $fillable = [
        'product_hash',
        'available',
        'featured',
        'sku'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function colors()
    {
        if (!$this->hasColors()) {
            return null;
        }

        $tags = $this->tags()->where('tag_type', 'color')->get();
        $colors = [];

        foreach ($tags as $color) {
            array_push($colors, $color->slug);
        }

        return $colors;
    }

    public function colorsObject()
    {
        if (!$this->hasColors()) {
            return null;
        }

        $colors = $this->tags()->where('tag_type', 'color')->get();

        return $colors;
    }

    public function colorHex()
    {
        $tags = $this->tags()->where('tag_type', 'color')->get();
        $colors = Color::all();

        foreach ($tags as $tag) {
            foreach ($colors as $color) {
                if ($tag->id == $color->tag_id) {
                    return $color->hex;
                }
            }
        }
    }

    public function images()
    {
        return $this->morphMany('App\ProductImage', 'imageable');
    }

    public function imagePaths()
    {
        if (empty($this->images)) {
            return false;
        }

        $images = [];

        foreach ($this->images as $image) {
            array_push($images, secure_url('/uploads' . $image->path));
        }

        return $images;
    }

    public function scopeHasColors()
    {
        if (!$this->tags()->where('tag_type', 'color')->count() > 0) {
            return false;
        }

        return true;
    }
}
