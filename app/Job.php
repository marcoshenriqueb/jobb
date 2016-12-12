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
        'title', 'type_id', 'category_id', 'summary', 'description', 'company', 'city_id', 'url', 'email',
    ];

    public function type()
    {
        return $this->belongsTo('App\Types', 'type_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function city()
    {
        return $this->belongsTo('App\City');
    }
}
