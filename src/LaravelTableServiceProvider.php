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
        $this->loadViewsFrom(__DIR__ . '/../resources/views/', 'table');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('table.php'),
            ], 'config');

            $this->publishes([
                __DIR__ . '/../resources/views' => resource_path('views/vendor/luilliarcec/table'),
            ], 'views');
        }

        $this->app['blade.compiler']->components($this->components());
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

    /**
     * Array of blade components
     */
    private function components(): array
    {
        return [

        ];
    }
}
