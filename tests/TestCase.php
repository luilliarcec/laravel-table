<?php

namespace Luilliarcec\LaravelTable\Tests;

use Illuminate\Foundation\Testing\Concerns\InteractsWithViews;
use Luilliarcec\LaravelTable\LaravelTableServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    use InteractsWithViews;

    /**
     * Get package providers.
     *
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app): array
    {
        return [LaravelTableServiceProvider::class];
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
        $app['config']->set('theme', 'tailwind');
    }
}
