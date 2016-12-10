<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'type_id', 'category_id', 'summary', 'description', 'company', 'city_id', 'url',
    ];
}
