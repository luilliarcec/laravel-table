<?php

namespace Luilliarcec\LaravelTable\Tests\Units\Views;

use Luilliarcec\LaravelTable\Support\Filter;
use Luilliarcec\LaravelTable\Tests\Overrides;
use Luilliarcec\LaravelTable\Tests\TestCase;

class OverrideComponentClassTest extends TestCase
{
    /**
     * Define environment setup.
     *
     * @param \Illuminate\Foundation\Application $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        parent::getEnvironmentSetUp($app);

        $app['config']->set('table.components', [
            Overrides\Filters\Text::class => 'filters.text',
        ]);
    }

    function test_override_component()
    {
        $this->app['config']->set('table.theme', 'tailwind');

        $view = $this
            ->template('<x-table-filters.text :filter="$filter"/>')
            ->withData('filter', Filter::build('name', 'Name', Filter::TEXT));

        $view->assertRender('
            <div>Override</div>
        ');
    }
}
