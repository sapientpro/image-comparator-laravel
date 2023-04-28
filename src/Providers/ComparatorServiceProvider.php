<?php

namespace SapientPro\ImageComparatorLaravel\Providers;

use Illuminate\Support\ServiceProvider;
use SapientPro\ImageComparator\ImageComparator;
use SapientPro\ImageComparatorLaravel\ComparatorService;

class ComparatorServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(ComparatorService::class, function ($app) {
            return new ComparatorService($app->make(ImageComparator::class));
        });
    }
}
