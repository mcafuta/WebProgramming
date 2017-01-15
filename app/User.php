<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    public static function boot()
    {
        parent::boot();

        static::created(function(User $user) {
            if ( $user->email == "manja.cafuta@hotmail.com" ) {
                $user->admin = true;
                $user->save();
            }
        });
    }

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function statuses()
    {
        return $this->hasMany(Status::class);
    }

    public function statusesOrdered()
    {
        return $this->hasMany(Status::class)->byDate();
    }

    public function isAdmin()
    {
        return $this->admin == true;
    }
}
