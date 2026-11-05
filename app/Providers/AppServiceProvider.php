<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Observers\ActivityObserver;

use App\Models\User;
use App\Models\Student;
use App\Models\Lecturer;
use App\Models\Course;
use App\Models\Registration;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap application services.
     */
    public function boot(): void
    {
        User::observe(ActivityObserver::class);
        Student::observe(ActivityObserver::class);
        Lecturer::observe(ActivityObserver::class);
        Course::observe(ActivityObserver::class);
        Registration::observe(ActivityObserver::class);
    }
}
