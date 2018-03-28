<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['path'];

    public function path()
    {
        return config('image.path.relative') . $this->path;
    }
}
