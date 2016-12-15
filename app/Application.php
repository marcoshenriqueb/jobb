<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'ip', 'message', 'cv', 'job_id',
    ];

    public function job()
    {
        return $this->belongsTo('App\Job');
    }
}
