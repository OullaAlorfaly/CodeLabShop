<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;



class User extends Authenticatable
{

    public function getFullNameAttribute()
    {
        return $this->first_name ." ". $this->last_name;
    }

    public function getCountAttribute()
    {
        return $this->where('status', '=', '1')->count();
    }

    public function orders()
    {
        return $this->hasMany(Order::Class,'user_id', 'id');
    }

    public function items()
    {
        return $this->belongsToMany(Item::Class, 'users_items','user_id') ;
    }

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
}
