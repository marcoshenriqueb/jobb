<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Job;
use Illuminate\Support\Facades\Mail;
use App\Mail\JobPosted;

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
          $job->hash_url = hash('md5', $job->title);
        });
        Job::created(function($job){
          Mail::to($job->email)->send(new JobPosted($job));
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
