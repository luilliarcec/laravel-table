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
            ->template('<x-table::global-search/>');

        $view
            ->assertRender('
                <div class="relative">
                    <input
                        class="border-gray-300 focus:ring-1 focus:ring-blue-900 focus:border-blue-900 block w-full pr-10 text-sm rounded-md"
                        name="filter[global]"
                        type="text"
                        placeholder="Search..."
                        aria-label="Global search"
                        value=""
                    >

                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-400" style="height: 1.25rem; width: 1.25rem" viewBox="0 0 20 20" fill="currentColor" >
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            ');
    }

    /** @test */
    public function render_with_bootstrap4_theme()
    {
        $this->app['config']->set('table.theme', 'bootstrap4');

        $view = $this
            ->template('<x-table::global-search/>');

        $view
            ->assertRender('
                <div class="col-9 col-md-8 mt-2">
                    <input
                        class="form-control"
                        name="filter[global]"
                        type="text"
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
            ->template('<x-table::global-search/>');

        $view
            ->assertRender('
                <div class="col-9 col-md-8 mt-2">
                    <input
                        class="form-control"
                        name="filter[global]"
                        type="text"
                        placeholder="Search..."
                        aria-label="Global search"
                        value=""
                    >
                </div>
            ');
    }
}
