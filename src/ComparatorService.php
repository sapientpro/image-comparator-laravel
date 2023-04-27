<?php

namespace SapientPro\ImageComparatorLaravel;

use GdImage;
use SapientPro\ImageComparator\Enum\ImageRotationAngle;
use SapientPro\ImageComparator\ImageComparator;
use SapientPro\ImageComparator\Strategy\AverageHashStrategy;
use SapientPro\ImageComparator\Strategy\DifferenceHashStrategy;

class ComparatorService
{
    public function __construct(private ImageComparator $imageComparator)
    {
    }

    public function setAverageHashStrategy(): void
    {
        $this->imageComparator->setHashStrategy(new AverageHashStrategy());
    }

    public function setDifferenceHashStrategy(): void
    {
        $this->imageComparator->setHashStrategy(new DifferenceHashStrategy());
    }

    public function detectImageSimilarity(
        string|GdImage $sourceImage,
        string|array $images,
        int $precision = 1
    ): float|array {
        if (is_array($images)) {
            return $this->imageComparator->detectArray($sourceImage, $images, $precision);
        }

        return $this->imageComparator->detect($sourceImage, $images, $precision);
    }

    public function compareImages(
        string|GdImage $sourceImage,
        string|array $images,
        ImageRotationAngle $rotationAngle = ImageRotationAngle::D0,
        int $precision = 1
    ): float|array {
        if (is_array($images)) {
            return $this->imageComparator->compareArray($sourceImage, $images, $rotationAngle, $precision);
        }

        return $this->imageComparator->compare($sourceImage, $images, $rotationAngle, $precision);
    }

    public function squareImage(string $image): GdImage|false
    {
        return $this->imageComparator->squareImage($image);
    }

    public function compareSquareImages(
        string $sourceImage,
        string|array $images,
        ImageRotationAngle $rotationAngle = ImageRotationAngle::D0,
        int $precision = 1
    ): float|array {
        $sourceSquareImage = $this->imageComparator->squareImage($sourceImage);

        if (!is_array($images)) {
            $comparedSquareImage = $this->imageComparator->squareImage($images);

            return $this->imageComparator->compare(
                $sourceSquareImage,
                $comparedSquareImage,
                $rotationAngle,
                $precision
            );
        }

        $comparedSquareImages = [];

        foreach ($images as $image) {
            $comparedSquareImages[] = $this->imageComparator->squareImage($image);
        }

        return $this->imageComparator->compareArray($sourceSquareImage, $comparedSquareImages);
    }

    public function hashImage(
        string|GdImage $image,
        ImageRotationAngle $rotationAngle = ImageRotationAngle::D0,
        int $size = 8
    ): array {
        return $this->imageComparator->hashImage($image, $rotationAngle, $size);
    }

    public function convertHashToBinaryString(array $hash): string
    {
        return $this->imageComparator->convertHashToBinaryString($hash);
    }

    public function compareHashStrings(string $hash1, string $hash2): float
    {
        return $this->imageComparator->compareHashStrings($hash1, $hash2);
    }
}
