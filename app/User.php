<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $guarded =array('id');

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'sex', 'age'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function entries()
    {
      return $this->hasMany('App\Entry');
    }

    /**
     * Get 性別
     *
     * @param
     * @return string
    **/
    public function getSexAttribute()
    {
      return $this->attributes['sex'];
    }

    /**
     * Get 年齢
     *
     * @param
     * @return string
    **/
    public function getAgeAttribute()
    {
      return $this->attributes['age'];
    }
}
