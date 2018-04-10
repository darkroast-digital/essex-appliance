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

    public function brand()
    {
        if (!$this->isBranded()) {
            return null;
        }

        return $this->tags()->where('tag_type', 'brand')->first()->name;
    }

    public function category()
    {
        if (!$this->isCategoried()) {
            return null;
        }

        return $this->tags()->where('tag_type', 'category')->first()->name;
    }

    public function colors()
    {
        if (!$this->hasColors()) {
            return null;
        }

        $tags = $this->tags()->where('tag_type', 'color')->get();
        $colors = [];

        foreach ($tags as $color) {
            array_push($colors, $color->name);
        }

        return $colors;
    }

    public function scopeIsBranded()
    {
        if (!$this->tags()->where('tag_type', 'brand')->count() > 0) {
            return false;
        }

        return true;
    }

    public function scopeIsCategoried()
    {
        if (!$this->tags()->where('tag_type', 'category')->count() > 0) {
            return false;
        }

        return true;
    }

    public function scopeHasColors()
    {
        if (!$this->tags()->where('tag_type', 'color')->count() > 0) {
            return false;
        }

        return true;
    }
}
