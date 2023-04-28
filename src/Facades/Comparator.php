<?php

namespace SapientPro\ImageComparatorLaravel\Facades;

use GdImage;
use Illuminate\Support\Facades\Facade;
use SapientPro\ImageComparator\Enum\ImageRotationAngle;
use SapientPro\ImageComparator\ImageComparator;

class Comparator extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return ImageComparator::class;
    }
}
