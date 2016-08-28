<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
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
    
    public function owns($relation)
    {
        return $relation->user_id == $this->id;
    }

    public function tours()
    {
        return $this->hasMany(Tour::class);
    }

    public function publish(Tour $tour)
    {
        return $this->tours()->save($tour);
    }
}
