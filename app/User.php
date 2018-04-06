<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'avatar_id',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function avatar()
    {
        return $this->hasOne(Image::class, 'id', 'avatar_id');
    }

    public function avatarPath()
    {
        if (!$this->avatar_id) {
            return 'https://www.gravatar.com/avatar/' . md5($this->email) . '/?d=retro';
        }

        return secure_url($this->avatar->path());
    }
}
