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

    public static function searchJobs($needle=null, $category=null){
        $query = self::where(function ($query) use ($needle) {
                        $query->where('title', 'LIKE', '%'. $needle . '%')
                              ->orWhere('summary', 'LIKE', '%'. $needle . '%')
                              ->orWhere('description', 'LIKE', '%'. $needle . '%');
                    });
        if ($category) {
          $query = $query->where('category_id', '=', $category);
        }
        return $query->orderBy('created_at', 'desc')->get();
    }
}
