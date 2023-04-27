<?php

namespace SapientPro\ImageComparatorLaravel\Facades;

use GdImage;
use Illuminate\Support\Facades\Facade;
use SapientPro\ImageComparator\Enum\ImageRotationAngle;
use SapientPro\ImageComparatorLaravel\ComparatorService;

/**
 * @method static float|array detectImageSimilarity(string|GdImage $sourceImage, string|array $comparedImage, int $precision = 1)
 * @method static float|array compareImages(string|GdImage $sourceImage, string|array $comparedImage, ImageRotationAngle $rotationAngle = ImageRotationAngle::D0, int $precision = 1)
 * @method static void setAverageHashStrategy()
 * @method static void setDifferenceHashStrategy()
 * @method static GdImage|false squareImage(string $image)
 * @method static float|array compareSquareImages(string $sourceImage, string|array $images, ImageRotationAngle $rotationAngle = ImageRotationAngle::D0, int $precision = 1)
 * @method static array hashImage(string|GdImage $image, ImageRotationAngle $rotationAngle = ImageRotationAngle::D0, int $size = 8)
 * @method static string convertHashToBinaryString(array $hash)
 * @method static float compareHashStrings(string $hash1, string $hash2)
 *
 * @see ComparatorService
 */
class Comparator extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return ComparatorService::class;
    }
}
