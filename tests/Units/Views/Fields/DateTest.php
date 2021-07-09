<?php

namespace Luilliarcec\LaravelTable\Tests\Units\Views\Fields;

use Luilliarcec\LaravelTable\Support\Filter;
use Luilliarcec\LaravelTable\Tests\TestCase;

class DateTest extends TestCase
{
    /** @test */
    public function render_with_tailwind_theme()
    {
        $this->app['config']->set('table.theme', 'tailwind');

        $view = $this
            ->template('<x-table::filters.date :filter="$filter"/>')
            ->withData('filter', Filter::build('name', 'Name', Filter::DATE));

        $view
            ->assertSee('filter-date')
            ->assertRender('
                <input
                    type="date"
                    class="border-gray-300 focus:ring-1 focus:ring-blue-900 focus:border-blue-700 block w-full pr-10 text-sm rounded-md filter-date"
                    name="filter[name]"
                    value="">
            ');
    }

    /** @test */
    public function render_with_bootstrap4_theme()
    {
        $this->app['config']->set('table.theme', 'bootstrap4');

        $view = $this
            ->template('<x-table::filters.date :filter="$filter"/>')
            ->withData('filter', Filter::build('name', 'Name', Filter::DATE));

        $view
            ->assertSee('filter-date')
            ->assertRender('
                <input
                    type="date"
                    class="form-control filter-date"
                    name="filter[name]"
                    value="">
            ');
    }

    /** @test */
    public function render_with_bootstrap5_theme()
    {
        $this->app['config']->set('table.theme', 'bootstrap5');

        $view = $this
            ->template('<x-table::filters.date :filter="$filter"/>')
            ->withData('filter', Filter::build('name', 'Name', Filter::DATE));

        $view
            ->assertSee('filter-date')
            ->assertRender('
                <input
                    type="date"
                    class="form-control filter-date"
                    name="filter[name]"
                    value="">
            ');
    }
}
