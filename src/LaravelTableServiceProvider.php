<?php

namespace Luilliarcec\LaravelTable;

use Illuminate\Support\Facades\Blade;
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
                __DIR__ . '/../resources/views' => resource_path('views/vendor/table'),
            ], 'views');
        }

        Blade::componentNamespace(
            'Luilliarcec\\LaravelTable\\View\\Components',
            'table'
        );
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'table');

        $this->app->singleton('Table', function () {
            return new BladeTable;
        });
    }
}
