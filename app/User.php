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
        'username', 'email', 'password', 'admin'
    ];

    public static $columns = [
       'username'=>'text', 'email'=>'email', 'password'=>'password', 'admin'=>'checkbox'
    ];

    public static $validator = [
      "username"=>"required|string|max:255",
      "password"=>"required|string|max:255",
      "email"=>"required|email|max:255",
      "admin"=>"boolean"
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function isAdmin(){
      return $this->admin;
    }
}
