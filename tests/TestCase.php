<?php

namespace Luilliarcec\LaravelTable\Tests;

use Luilliarcec\LaravelTable\LaravelTableServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;
use Styde\Whetstone\InteractsWithBlade;
use Styde\Whetstone\WhetstoneServiceProvider;

class TestCase extends Orchestra
{
    use InteractsWithBlade;

    /**
     * Get package providers.
     *
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app): array
    {
        return [
            LaravelTableServiceProvider::class,
            WhetstoneServiceProvider::class
        ];
    }

    /**
     * Define environment setup.
     *
     * @param \Illuminate\Foundation\Application $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        /** Database */
        $app['config']->set('table.theme', 'tailwind');
    }
}
