<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Parttimenobody\Tags\Models\Tag;

class Color extends Model
{
    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }

    public function colorName()
    {
        $tags = Tag::where('tag_type', 'color')->get();

        foreach ($tags as $tag) {
            if ($tag->id == $this->tag_id) {
                return $tag->name;
            }
        }
    }
}
