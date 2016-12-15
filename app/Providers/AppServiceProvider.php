<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Job;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Job::creating(function($job){
          $job->hash_url = hash('md5', $job->id);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
