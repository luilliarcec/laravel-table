<?php

namespace Luilliarcec\LaravelTable\Tests;

use Luilliarcec\LaravelTable\LaravelTableServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;
use Styde\Whetstone\InteractsWithBlade;
use Styde\Whetstone\WhetstoneServiceProvider;
use Luilliarcec\LaravelTable\View\Components;

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
        $app['config']->set('table.theme', 'tailwind');
        $app['config']->set('table.components', [
            // Filters
            Components\Filters\Text::class => 'filters.text',
            Components\Filters\Date::class => 'filters.date',
            Components\Filters\DateRange::class => 'filters.date-range',
            Components\Filters\Checkbox::class => 'filters.checkbox',
            Components\Filters\Select::class => 'filters.select',
            Components\Filters\SelectMultiple::class => 'filters.select-multiple',

            // Tables
            Components\Table::class => 'table',
            Components\EmptyTable::class => 'empty-table',
            Components\TableWrapper::class => 'table-wrapper',
            Components\Td::class => 'td',
            Components\Th::class => 'th',
            Components\GlobalSearch::class => 'global-search',
            Components\Filters::class => 'filters',
            Components\Columns::class => 'columns',
            Components\ActionButton::class => 'action-button',

            // Assets
            Components\Scripts::class => 'scripts',
            Components\Styles::class => 'styles',
        ]);
    }
}
