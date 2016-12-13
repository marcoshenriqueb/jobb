<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'var_name', 'order',
    ];

    public static $columns = [
       'name'=>'text', 'var_name'=>'text', 'order'=>'number'
    ];

    public static $validator = [
      "name"=>"string|max:255|required",
      "var_name"=>"string|max:255|required",
      "order"=>"numeric"
    ];

    public function jobs()
    {
        return $this->hasMany('App\Job');
    }
}
