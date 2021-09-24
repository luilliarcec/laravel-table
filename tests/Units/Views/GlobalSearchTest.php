<?php

namespace Luilliarcec\LaravelTable\Tests\Units\Views;

use Luilliarcec\LaravelTable\Tests\TestCase;

class GlobalSearchTest extends TestCase
{
    /** @test */
    public function render_with_tailwind_theme()
    {
        $this->app['config']->set('table.theme', 'tailwind');

        $view = $this
            ->template('<x-table-global-search/>');

        $view
            ->assertRender('
                <div class="relative">
                    <input
                        class="border-gray-300 focus:ring-1 focus:ring-blue-900 focus:border-blue-900 block w-full text-sm rounded-md"
                        name="filter[global]"
                        type="search"
                        placeholder="Search..."
                        aria-label="Global search"
                        value=""
                    >
                </div>
            ');
    }

    /** @test */
    public function render_with_bootstrap4_theme()
    {
        $this->app['config']->set('table.theme', 'bootstrap4');

        $view = $this
            ->template('<x-table-global-search/>');

        $view
            ->assertRender('
                <div class="col-9 col-md-8 mt-2">
                    <input
                        class="form-control"
                        name="filter[global]"
                        type="search"
                        placeholder="Search..."
                        aria-label="Global search"
                        value=""
                    >
                </div>
            ');
    }

    /** @test */
    public function render_with_bootstrap5_theme()
    {
        $this->app['config']->set('table.theme', 'bootstrap5');

        $view = $this
            ->template('<x-table-global-search/>');

        $view
            ->assertRender('
                <div class="col-9 col-md-8 mt-2">
                    <input
                        class="form-control"
                        name="filter[global]"
                        type="search"
                        placeholder="Search..."
                        aria-label="Global search"
                        value=""
                    >
                </div>
            ');
    }
}
