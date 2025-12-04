<?php

namespace App\Services;

use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Cache;

class CacheService
{
    /**
     * Cache duration in seconds (1 hour)
     */
    const CACHE_DURATION = 3600;

    /**
     * Get active services with caching
     */
    public static function getActiveServices(int $limit = null)
    {
        $cacheKey = $limit ? "services.active.limit.{$limit}" : 'services.active.all';

        return Cache::remember($cacheKey, self::CACHE_DURATION, function () use ($limit) {
            $query = Service::active()->orderBy('order');

            if ($limit) {
                $query->take($limit);
            }

            return $query->get();
        });
    }

    /**
     * Get featured services with caching
     */
    public static function getFeaturedServices(int $limit = 6)
    {
        return Cache::remember("services.featured.limit.{$limit}", self::CACHE_DURATION, function () use ($limit) {
            return Service::active()->featured()->orderBy('order')->take($limit)->get();
        });
    }

    /**
     * Get active testimonials with caching
     */
    public static function getActiveTestimonials(int $limit = null)
    {
        $cacheKey = $limit ? "testimonials.active.limit.{$limit}" : 'testimonials.active.all';

        return Cache::remember($cacheKey, self::CACHE_DURATION, function () use ($limit) {
            $query = Testimonial::active()->latest();

            if ($limit) {
                $query->take($limit);
            }

            return $query->get();
        });
    }

    /**
     * Get featured testimonials with caching
     */
    public static function getFeaturedTestimonials(int $limit = 6)
    {
        return Cache::remember("testimonials.featured.limit.{$limit}", self::CACHE_DURATION, function () use ($limit) {
            return Testimonial::active()->featured()->latest()->take($limit)->get();
        });
    }

    /**
     * Clear all service caches
     */
    public static function clearServiceCache()
    {
        Cache::forget('services.active.all');
        Cache::forget('services.featured.limit.6');

        // Clear specific limit caches
        foreach ([3, 6, 9, 12] as $limit) {
            Cache::forget("services.active.limit.{$limit}");
            Cache::forget("services.featured.limit.{$limit}");
        }
    }

    /**
     * Clear all testimonial caches
     */
    public static function clearTestimonialCache()
    {
        Cache::forget('testimonials.active.all');
        Cache::forget('testimonials.featured.limit.6');

        // Clear specific limit caches
        foreach ([3, 6, 9, 12] as $limit) {
            Cache::forget("testimonials.active.limit.{$limit}");
            Cache::forget("testimonials.featured.limit.{$limit}");
        }
    }

    /**
     * Clear all caches
     */
    public static function clearAllCache()
    {
        self::clearServiceCache();
        self::clearTestimonialCache();
    }
}
