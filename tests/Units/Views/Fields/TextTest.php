<?php

namespace Luilliarcec\LaravelTable\Tests\Units\Views\Fields;

use Luilliarcec\LaravelTable\Support\Filter;
use Luilliarcec\LaravelTable\Tests\TestCase;

class TextTest extends TestCase
{
    /** @test */
    public function render_with_tailwind_theme()
    {
        $this->app['config']->set('table.theme', 'tailwind');

        $view = $this
            ->template('<x-table::filters.text :filter="$filter"/>')
            ->withData('filter', Filter::build('name', 'Name', Filter::TEXT));

        $view
            ->assertSee('filter-text')
            ->assertRender('
                <input
                    type="text"
                    class="border-gray-300 focus:ring-1 focus:ring-blue-900 focus:border-blue-900 block w-full pr-10 text-sm rounded-md filter-text"
                    name="filter[name]"
                    value="">
            ');
    }

    /** @test */
    public function render_with_bootstrap4_theme()
    {
        $this->app['config']->set('table.theme', 'bootstrap4');

        $view = $this
            ->template('<x-table::filters.text :filter="$filter"/>')
            ->withData('filter', Filter::build('name', 'Name', Filter::TEXT));

        $view
            ->assertSee('filter-text')
            ->assertRender('
                <input
                    type="text"
                    class="form-control filter-text"
                    name="filter[name]"
                    value="">
            ');
    }

    /** @test */
    public function render_with_bootstrap5_theme()
    {
        $this->app['config']->set('table.theme', 'bootstrap5');

        $view = $this
            ->template('<x-table::filters.text :filter="$filter"/>')
            ->withData('filter', Filter::build('name', 'Name', Filter::TEXT));

        $view
            ->assertSee('filter-text')
            ->assertRender('
                <input
                    type="text"
                    class="form-control filter-text"
                    name="filter[name]"
                    value="">
            ');
    }
}
