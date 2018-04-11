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
}
