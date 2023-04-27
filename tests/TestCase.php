<?php

namespace SapientPro\ImageComparatorLaravel\Tests;

use Orchestra\Testbench\TestCase as OrchestraTestCase;

class TestCase extends OrchestraTestCase
{
    protected function getPackageProviders($app)
    {
        return [
            'SapientPro\ImageComparatorLaravel\Providers\ComparatorServiceProvider'
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            "Comparator" => "SapientPro\\ImageComparatorLaravel\\Comparator\\Facades\\Comparator"
        ];
    }
}
