<?php

namespace Luilliarcec\LaravelTable\Tests\Units\Views\Fields;

use Luilliarcec\LaravelTable\Support\Filter;
use Luilliarcec\LaravelTable\Tests\TestCase;

class DateRangeTest extends TestCase
{
    /** @test */
    public function render_with_tailwind_theme()
    {
        $this->app['config']->set('table.theme', 'tailwind');

        $view = $this
            ->template('<x-table::filters.date-range :filter="$filter"/>')
            ->withData('filter', Filter::build('name', 'Name', Filter::DATE_RANGE));

        $view
            ->assertSee('filter-date-range')
            ->assertRender('
                <input
                    type="text"
                    class="border-gray-300 focus:ring-1 focus:ring-blue-900 focus:border-blue-900 block w-full text-sm rounded-md filter-date-range"
                    name="filter[name]"
                    value="">
            ');
    }

    /** @test */
    public function render_with_bootstrap4_theme()
    {
        $this->app['config']->set('table.theme', 'bootstrap4');

        $view = $this
            ->template('<x-table::filters.date-range :filter="$filter"/>')
            ->withData('filter', Filter::build('name', 'Name', Filter::DATE_RANGE));

        $view
            ->assertSee('filter-date-range')
            ->assertRender('
                <input
                    type="text"
                    class="form-control filter-date-range"
                    name="filter[name]"
                    value="">
            ');
    }

    /** @test */
    public function render_with_bootstrap5_theme()
    {
        $this->app['config']->set('table.theme', 'bootstrap5');

        $view = $this
            ->template('<x-table::filters.date-range :filter="$filter"/>')
            ->withData('filter', Filter::build('name', 'Name', Filter::DATE_RANGE));

        $view
            ->assertSee('filter-date-range')
            ->assertRender('
                <input
                    type="text"
                    class="form-control filter-date-range"
                    name="filter[name]"
                    value="">
            ');
    }
}
