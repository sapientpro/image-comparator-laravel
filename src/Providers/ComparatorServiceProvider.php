<?php

namespace SapientPro\ImageComparatorLaravel\Providers;

use Illuminate\Support\ServiceProvider;
use SapientPro\ImageComparator\ImageComparator;

class ComparatorServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(ImageComparator::class, function () {
            return new ImageComparator();
        });
    }
}
