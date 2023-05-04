# Image Comparator Laravel: Compare images using Laravel

![https://packagist.org/packages/sapientpro/image-comparator-laravel](https://img.shields.io/packagist/dt/sapientpro/image-comparator-laravel)
![https://packagist.org/packages/sapientpro/image-comparator-laravel](https://img.shields.io/packagist/v/sapientpro/image-comparator-laravel)
![https://packagist.org/packages/sapientpro/image-comparator-laravel](https://img.shields.io/packagist/l/sapientpro/image-comparator-laravel)

This package is a wrapper of [Image Comparator package](https://github.com/sapientpro/image-comparator)
adapted to use with Laravel via Facade. All methods of Image Comparator are available in the Facade.
For the method reference visit the [wiki](https://github.com/sapientpro/image-comparator/wiki)

## Prerequisites
* php 8.1 or higher
* Laravel 8 or higher
* Gd extension enabled

## Installation

You can install the package using Composer:
`composer require sapientpro/image-comparator-laravel`

## Usage

You can start using the Image Comparator Facade by including it in your class:

```php
use SapientPro\ImageComparatorLaravel\Facades\Comparator;

$imageHash = Comparator::hashImage('path_to_image.jpg')
```

By default, the average hashing algorithm is user for hashing and comparing images.
If you want to use difference hashing algorithm, you set it with `setHashStrategy()` function:

```php
use SapientPro\ImageComparatorLaravel\Facades\Comparator;
use SapientPro\ImageComparator\Strategy\DifferenceHashStrategy;

Comparator::setHashStrategy(new DifferenceHashStrategy());

$similarity = Comparator::compare('path_to_image1.jpg', 'path_to_image2.jpg') // will use difference hash algorithm
```

