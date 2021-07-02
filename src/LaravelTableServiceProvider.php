<?php

namespace Luilliarcec\LaravelTable;

use Illuminate\Support\ServiceProvider;
use Luilliarcec\LaravelTable\Support\BladeTable;

class LaravelTableServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app->singleton('Table', function () {
            return new BladeTable;
        });
    }
}
