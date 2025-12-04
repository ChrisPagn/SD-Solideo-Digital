<?php

namespace App\Providers;

use App\Models\Service;
use App\Models\Testimonial;
use App\Observers\ServiceObserver;
use App\Observers\TestimonialObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register observers
        Service::observe(ServiceObserver::class);
        Testimonial::observe(TestimonialObserver::class);
    }
}
