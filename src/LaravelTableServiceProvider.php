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
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('table.php'),
            ], 'config');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app->singleton('Table', function () {
            return new BladeTable;
        });

        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'table');
    }
}
