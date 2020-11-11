<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name'
    ];

    public $timestamps = false;

    public function emails()
    {
        return $this->hasMany('App\Email');
    }

    public function departments()
    {
        return $this->belongsToMany('App\Department');
    }
}
