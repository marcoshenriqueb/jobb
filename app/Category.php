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

    public function jobs()
    {
        return $this->hasMany('App\Job');
    }
}
