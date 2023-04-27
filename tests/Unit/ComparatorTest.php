<?php

namespace SapientPro\ImageComparatorLaravel\Tests\Unit;

use Orchestra\Testbench\TestCase;
use SapientPro\ImageComparator\Enum\ImageRotationAngle;
use SapientPro\ImageComparatorLaravel\Facades\Comparator;

class ComparatorTest extends TestCase
{
    public function testCompareImages(): void
    {
        $similarity = Comparator::compareImages(
            'tests/images/ebay-image.png',
            'tests/images/amazon-image.png'
        );

        $this->assertSame(87.5, $similarity);

        $similarityArray = Comparator::compareImages(
            'tests/images/ebay-image.png',
            [
                'amazon1' => 'tests/images/amazon-image.png',
                'amazon2' => 'tests/images/amazon-image2.png'
            ]
        );

        $this->assertSame([
            'amazon1' => 87.5,
            'amazon2' => 53.1
        ], $similarityArray);
    }

    public function testDetectSimilarities(): void
    {
        $similarity = Comparator::detectImageSimilarity(
            'tests/images/ebay-image.png',
            'tests/images/amazon-image.png'
        );

        $this->assertSame(87.5, $similarity);

        $similarityArray = Comparator::detectImageSimilarity(
            'tests/images/ebay-image.png',
            [
                'amazon1' => 'tests/images/amazon-image.png',
                'amazon2' => 'tests/images/amazon-image2.png'
            ]
        );

        $this->assertSame([
            'amazon1' => 87.5,
            'amazon2' => 62.5
        ], $similarityArray);
    }

    public function testHash(): void
    {
        $hash = Comparator::hashImage(
            'tests/images/amazon-image.png',
            ImageRotationAngle::D90,
            4
        );
        $this->assertSame(16, count($hash));

        Comparator::setDifferenceHashStrategy();

        $this->assertSame(64, count(Comparator::hashImage('tests/images/amazon-image.png')));
    }

    public function testSquareImage(): void
    {
        $squareImage = Comparator::squareImage('tests/images/amazon-image.png');

        $width = imagesx($squareImage);
        $height = imagesy($squareImage);

        $this->assertSame($width, $height);
    }

    public function testCompareSquareImages(): void
    {
        $similarity = Comparator::compareSquareImages(
            'tests/images/ebay-image.png',
            'tests/images/amazon-image.png',
            precision: 2
        );

        $this->assertSame(100.00, $similarity);
    }
}
