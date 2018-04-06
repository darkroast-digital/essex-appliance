<?php

namespace App\Publishable;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

trait Publishable
{
    public function scopePublished(Builder $builder)
    {
        return $builder->where('published_at', '<=', Carbon::now())->whereNotNull('published_at');
    }

    public function scopeUnpublished(Builder $builder)
    {
        return $builder->where('published_at', '>', Carbon::now())->orWhereNull('published_at');
    }

    public function isPublished()
    {
        if ($this->published_at === null) {
            return false;
        }

        if ($this->published_at <= Carbon::now()) {
            return true;
        }

        return false;
    }

    public function isUnpublished()
    {
        if ($this->published_at === null) {
            return true;
        }

        if ($this->published_at >= Carbon::now()) {
            return true;
        }

        return false;
    }

    public function publish()
    {
        return $this->update([
            'published_at' => Carbon::now()->toDateString(),
        ]);
    }

    public function unpublish()
    {
        return $this->update([
            'published_at' => null,
        ]);
    }
}
