<?php

namespace App\Observers;

use App\Models\Service;
use App\Services\CacheService;

class ServiceObserver
{
    /**
     * Handle the Service "created" event.
     */
    public function created(Service $service): void
    {
        CacheService::clearServiceCache();
    }

    /**
     * Handle the Service "updated" event.
     */
    public function updated(Service $service): void
    {
        CacheService::clearServiceCache();
    }

    /**
     * Handle the Service "deleted" event.
     */
    public function deleted(Service $service): void
    {
        CacheService::clearServiceCache();
    }

    /**
     * Handle the Service "restored" event.
     */
    public function restored(Service $service): void
    {
        CacheService::clearServiceCache();
    }

    /**
     * Handle the Service "force deleted" event.
     */
    public function forceDeleted(Service $service): void
    {
        CacheService::clearServiceCache();
    }
}
