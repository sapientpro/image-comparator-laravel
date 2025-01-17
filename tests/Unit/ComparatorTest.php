<?php

namespace SapientPro\ImageComparatorLaravel\Tests\Unit;

use Orchestra\Testbench\TestCase;
use SapientPro\ImageComparator\Enum\ImageRotationAngle;
use SapientPro\ImageComparator\Strategy\DifferenceHashStrategy;
use SapientPro\ImageComparatorLaravel\Facades\Comparator;

class ComparatorTest extends TestCase
{
    public function testCompareImages(): void
    {
        $similarity = Comparator::compare(
            'tests/images/ebay-image.png',
            'tests/images/amazon-image.png'
        );

        $this->assertSame(86.994, $similarity);

        $similarityArray = Comparator::compareArray(
            'tests/images/ebay-image.png',
            [
                'amazon1' => 'tests/images/amazon-image.png',
                'amazon2' => 'tests/images/amazon-image2.png'
            ]
        );

        $this->assertSame([
            'amazon1' => 86.994,
            'amazon2' => 43.436
        ], $similarityArray);
    }

    public function testDetectSimilarities(): void
    {
        $similarity = Comparator::detect(
            'tests/images/ebay-image.png',
            'tests/images/amazon-image.png'
        );

        $this->assertSame(86.994, $similarity);

        $similarityArray = Comparator::detectArray(
            'tests/images/ebay-image.png',
            [
                'amazon1' => 'tests/images/amazon-image.png',
                'amazon2' => 'tests/images/amazon-image2.png'
            ]
        );

        $this->assertSame([
            'amazon1' => 86.994,
            'amazon2' => 48.59
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

        Comparator::setHashStrategy(new DifferenceHashStrategy());

        $this->assertSame(64, count(Comparator::hashImage('tests/images/amazon-image.png')));
    }

    public function testSquareImage(): void
    {
        $squareImage = Comparator::squareImage('tests/images/amazon-image.png');

        $width = imagesx($squareImage);
        $height = imagesy($squareImage);

        $this->assertSame($width, $height);
    }
}
