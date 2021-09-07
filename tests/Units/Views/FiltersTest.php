<?php

namespace Luilliarcec\LaravelTable\Tests\Units\Views;

use Luilliarcec\LaravelTable\Support\Filter;
use Luilliarcec\LaravelTable\Tests\TestCase;

class FiltersTest extends TestCase
{
    /** @test */
    public function render_with_tailwind_theme()
    {
        $this->app['config']->set('table.theme', 'tailwind');

        $view = $this
            ->template('<x-table::filters :filters="$filters"/>')
            ->withData('filters', [
                Filter::build('name', 'Name', Filter::TEXT),
                Filter::build('created_at', 'Created At', Filter::DATE),
            ]);

        $view
            ->assertRender('
                <div class="relative" x-data="{ open: false }" @click.away="open = false" @close.stop="open = false">
                    <button type="button" @click="open = !open" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm hover:shadow font-semibold rounded-md text-sm text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring focus:ring-gray-100 disabled:opacity-50 active:bg-white leading-5 transition" :aria-expanded="open" >
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-white text-gray-400" style="height: 1.25rem; width: 1.25rem" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute z-50 mt-2 w-64 rounded-md shadow-lg origin-top-left left-0" style="display: none;">
                        <div class="rounded-md ring-1 ring-black ring-opacity-5 bg-white">
                            <ul>
                                <li>
                                    <h3 class="text-xs uppercase tracking-wide bg-gray-100 p-3">
                                        Name
                                    </h3>
                                    <div class="p-2">
                                        <input type="text" class="border-gray-300 focus:ring-1 focus:ring-blue-900 focus:border-blue-900 block w-full text-sm rounded-md filter-text" name="filter[name]" value="">
                                    </div>
                                </li>
                                <li>
                                    <h3 class="text-xs uppercase tracking-wide bg-gray-100 p-3">
                                        Created At
                                    </h3>
                                    <div class="p-2">
                                        <input type="date" class="border-gray-300 focus:ring-1 focus:ring-blue-900 focus:border-blue-900 block w-full text-sm rounded-md filter-date" name="filter[created_at]" value="">
                                    </div>
                                </li>
                                <li>
                                    <h3 class="text-xs uppercase tracking-wide bg-gray-100 p-3">
                                        Filters
                                    </h3>
                                    <div class="p-2"> <a class="text-gray-400 decoration-none px-2" href="http://localhost"> Clear filters </a> </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            ');
    }

    /** @test */
    public function render_with_bootstrap4_theme()
    {
        $this->app['config']->set('table.theme', 'bootstrap4');

        $view = $this
            ->template('<x-table::filters :filters="$filters"/>')
            ->withData('filters', [
                Filter::build('name', 'Name', Filter::TEXT),
                Filter::build('created_at', 'Created At', Filter::DATE),
            ]);

        $view
            ->assertRender('
                <div class="col-3 col-md-1 mt-2">
                    <div class="dropdown">
                        <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="text-white"
                                style="height: 1.25rem; width: 1.25rem"
                                viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <ul class="dropdown-menu keep-open shadow py-0 mt-3" style="min-width: 280px">
                            <li>
                                <div class="rounded-top px-0 py-0">
                                    <p class="px-3 py-2 mb-0 fw-light text-uppercase bg-light rounded-top" style="font-size: 14px"> Name </p>
                                    <div class="p-2">
                                        <input type="text" class="form-control filter-text" name="filter[name]" value="">
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="rounded-top px-0 py-0">
                                    <p class="px-3 py-2 mb-0 fw-light text-uppercase bg-light rounded-top" style="font-size: 14px"> Created At </p>
                                    <div class="p-2">
                                        <input type="date" class="form-control filter-date" name="filter[created_at]" value="">
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="rounded-top px-0 py-0">
                                    <p class="px-3 py-2 mb-0 fw-light text-uppercase bg-light rounded-top" style="font-size: 14px"> Filters </p>
                                    <div class="p-2"> <a class="text-secondary px-2" href="http://localhost"> Clear filters </a> </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            ');
    }

    /** @test */
    public function render_with_bootstrap5_theme()
    {
        $this->app['config']->set('table.theme', 'bootstrap5');

        $view = $this
            ->template('<x-table::filters :filters="$filters"/>')
            ->withData('filters', [
                Filter::build('name', 'Name', Filter::TEXT),
                Filter::build('created_at', 'Created At', Filter::DATE),
            ]);

        $view
            ->assertRender('
                <div class="col-3 col-md-1 mt-2">
                    <div class="dropdown">
                        <button type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="text-white"
                                style="height: 1.25rem; width: 1.25rem"
                                viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <ul class="dropdown-menu shadow py-0 mt-3" style="min-width: 280px">
                            <li>
                                <div class="rounded-top px-0 py-0">
                                    <p class="px-3 py-2 mb-0 fw-light text-uppercase bg-light rounded-top" style="font-size: 14px"> Name </p>
                                    <div class="p-2">
                                        <input type="text" class="form-control filter-text" name="filter[name]" value="">
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="rounded-top px-0 py-0">
                                    <p class="px-3 py-2 mb-0 fw-light text-uppercase bg-light rounded-top" style="font-size: 14px"> Created At </p>
                                    <div class="p-2">
                                        <input type="date" class="form-control filter-date" name="filter[created_at]" value="">
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="rounded-top px-0 py-0">
                                    <p class="px-3 py-2 mb-0 fw-light text-uppercase bg-light rounded-top" style="font-size: 14px"> Filters </p>
                                    <div class="p-2"> <a class="text-secondary px-2" href="http://localhost"> Clear filters </a> </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            ');
    }
}
