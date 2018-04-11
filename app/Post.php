<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Publishable\Publishable;
use Parttimenobody\Tags\Taggable;

class Post extends Model
{
    use Publishable, Taggable;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'image_id',
        'user_id',
        'published_at'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'published_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

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

    public function firstTag()
    {
        if (!$this->isTagged()) {
            return null;
        }

        return $this->tags()->first()->name;
    }

    public function author()
    {
        return $this->user->name;
    }

    public function scopeIsTagged()
    {
        if (!$this->tags()->count() > 0) {
            return false;
        }

        return true;
    }
}
