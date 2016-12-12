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

    public function jobs()
    {
        return $this->hasMany('App\Job');
    }
}
