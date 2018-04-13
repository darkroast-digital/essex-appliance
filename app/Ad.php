<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $fillable = [
        'name',
        'link',
        'image_id'
    ];

    public function image()
    {
        return $this->hasOne(Image::class, 'id', 'image_id');
    }

    public function imagePath()
    {
        if (!$this->image_id) {
            return null;
        }

        return secure_url($this->image->path());
    }
}
