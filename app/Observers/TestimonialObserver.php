<?php

namespace App\Observers;

use App\Models\Testimonial;
use App\Services\CacheService;

class TestimonialObserver
{
    /**
     * Handle the Testimonial "created" event.
     */
    public function created(Testimonial $testimonial): void
    {
        CacheService::clearTestimonialCache();
    }

    /**
     * Handle the Testimonial "updated" event.
     */
    public function updated(Testimonial $testimonial): void
    {
        CacheService::clearTestimonialCache();
    }

    /**
     * Handle the Testimonial "deleted" event.
     */
    public function deleted(Testimonial $testimonial): void
    {
        CacheService::clearTestimonialCache();
    }

    /**
     * Handle the Testimonial "restored" event.
     */
    public function restored(Testimonial $testimonial): void
    {
        CacheService::clearTestimonialCache();
    }

    /**
     * Handle the Testimonial "force deleted" event.
     */
    public function forceDeleted(Testimonial $testimonial): void
    {
        CacheService::clearTestimonialCache();
    }
}
