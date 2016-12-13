<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Types extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'var_name',
    ];

    public static $columns = [
       'name'=>'text', 'var_name'=>'text',
    ];

    public static $validator = [
      "name"=>"string|max:255|required",
      "var_name"=>"string|max:255|required"
    ];

    public function jobs()
    {
        return $this->hasMany('App\Job');
    }
}
