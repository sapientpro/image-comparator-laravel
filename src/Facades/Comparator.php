<?php

namespace SapientPro\ImageComparatorLaravel\Facades;

use GdImage;
use Illuminate\Support\Facades\Facade;
use SapientPro\ImageComparator\Enum\ImageRotationAngle;
use SapientPro\ImageComparator\ImageComparator;
use SapientPro\ImageComparator\Strategy\HashStrategy;

/**
 * @method static void setHashStrategy(HashStrategy $hashStrategy)
 * @method static float compare(GdImage|string $sourceImage, GdImage|string $comparedImage, ImageRotationAngle $rotation = ImageRotationAngle::D0, int $precision = 1)
 * @method static array compareArray(GdImage|string $sourceImage, array $images, SapientPro\ImageComparator\Enum\ImageRotationAngle $rotation = SapientPro\ImageComparator\Enum\ImageRotationAngle::D0, int $precision = 1)
 * @method static float compareHashStrings(string $hash1, string $hash2, int $precision = 1)
 * @method static float detect(GdImage|string $sourceImage, GdImage|string $comparedImage, int $precision = 1)
 * @method static array detectArray(GdImage|string $sourceImage, array $images, int $precision = 1)
 * @method static array hashImage(GdImage|string $image, ImageRotationAngle $rotation = ImageRotationAngle::D0, int $size = 8)
 * @method static GdImage|false squareImage(string $image)
 * @method static string convertHashToBinaryString(array $hash)
 */
class Comparator extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return ImageComparator::class;
    }
}
