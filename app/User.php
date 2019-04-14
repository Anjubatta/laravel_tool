<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function roles()
    {
        return $this->belongsTo('App\Models\Roles');
    }
	
	/**
    * @return \Illuminate\Database\Eloquent\Relations\hasOne
    */
    public function companies()
    {
        return $this->hasOne('App\Models\Company', 'users_id');
    }

    public function teachers()
    {
        return $this->hasOne('App\Models\Teachers', 'users_id');
    }
	
	public function parents()
    {
        return $this->hasOne('App\Models\Parents', 'users_id');
    }

}
