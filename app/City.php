<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'ascii_name',
    ];

    public static $columns = [
       'name'=>'text', 'ascii_name'=>'text',
    ];

    public static $validator = [
      "name"=>"string|max:255|required",
      "ascii_name"=>"string|max:255"
    ];

    public function jobs()
    {
        return $this->hasMany('App\Job');
    }
}
