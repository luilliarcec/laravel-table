<?php

namespace Luilliarcec\LaravelTable\Tests\Units\Views;

use Luilliarcec\LaravelTable\Support\Column;
use Luilliarcec\LaravelTable\Tests\TestCase;

class ColumnsTest extends TestCase
{
    /** @test */
    public function render_with_tailwind_theme()
    {
        $this->app['config']->set('table.theme', 'tailwind');

        $view = $this
            ->template('<x-table::columns :columns="$columns"/>')
            ->withData('columns', [
                'name' => new Column('name', 'Name'),
                'email' => new Column('email', 'Email')
            ]);

        $view
            ->assertRender('
                <div class="relative" x-data="{ open: false }" @click.away="open = false" @close.stop="open = false">
                    <button type="button" @click="open = !open" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm hover:shadow font-semibold rounded-md text-sm text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring focus:ring-gray-100 disabled:opacity-50 active:bg-white leading-5 transition" :aria-expanded="open" >
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-white text-gray-400" style="height: 1.25rem; width: 1.25rem" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                        </svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute z-50 mt-2 w-64 rounded-md shadow-lg origin-top-right right-0" style="display: none;">
                        <div class="rounded-md ring-1 ring-black ring-opacity-5 py-1 bg-white">
                            <ul class="px-4 py-3 divide-y divide-gray-200">
                                <li class="py-2 flex items-center justify-between">
                                    <label for="column_name" class="text-sm font-semibold tracking-wide text-gray-900"> Name </label>
                                    <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
                                        <input type="checkbox" name="columns[]" id="column_name" value="name" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-2 border-gray-200 hover:border-gray-200 appearance-none cursor-pointer" checked />
                                        <label for="column_name" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-200 cursor-pointer"></label>
                                    </div>
                                </li>
                                <li class="py-2 flex items-center justify-between">
                                    <label for="column_email" class="text-sm font-semibold tracking-wide text-gray-900"> Email </label>
                                    <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
                                        <input type="checkbox" name="columns[]" id="column_email" value="email" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-2 border-gray-200 hover:border-gray-200 appearance-none cursor-pointer" checked />
                                        <label for="column_email" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-200 cursor-pointer"></label>
                                    </div>
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
            ->template('<x-table::columns :columns="$columns"/>')
            ->withData('columns', [
                'name' => new Column('name', 'Name'),
                'email' => new Column('email', 'Email')
            ]);

        $view
            ->assertRender('
                <div class="col-3 col-md-1 mt-2">
                    <div class="dropdown">
                        <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="text-white"
                                 style="height: 1.25rem; width: 1.25rem"
                                 viewBox="0 0 20 20"
                                 fill="currentColor">
                                <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                            </svg>
                        </button>
                        <ul class="dropdown-menu keep-open shadow py-0 mt-3" style="min-width: 220px">
                            <li>
                                <div class="px-3 py-2">
                                    <div class="custom-control custom-switch">
                                        <input id="column_name" type="checkbox" class="custom-control-input" name="columns[]" value="name" checked >
                                        <label class="custom-control-label font-weight-bolder" for="column_name"> Name </label>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="px-3 py-2">
                                    <div class="custom-control custom-switch">
                                        <input id="column_email" type="checkbox" class="custom-control-input" name="columns[]" value="email" checked >
                                        <label class="custom-control-label font-weight-bolder" for="column_email"> Email </label>
                                    </div>
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
            ->template('<x-table::columns :columns="$columns"/>')
            ->withData('columns', [
                'name' => new Column('name', 'Name'),
                'email' => new Column('email', 'Email')
            ]);

        $view
            ->assertRender('
                <div class="col-3 col-md-1 mt-2">
                    <div class="dropdown">
                        <button type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" >
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="text-white"
                                 style="height: 1.25rem; width: 1.25rem"
                                 viewBox="0 0 20 20"
                                 fill="currentColor">
                                <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                            </svg>
                        </button>
                        <ul class="dropdown-menu shadow py-0 mt-3" style="min-width: 220px">
                            <li>
                                <div class="rounded-top px-3 py-2">
                                    <div class="form-check form-switch">
                                        <input id="column_name" type="checkbox" class="form-check-input" name="columns[]" value="name" checked >
                                        <label class="form-check-label fw-bolder" for="column_name"> Name </label>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="rounded-top px-3 py-2">
                                    <div class="form-check form-switch">
                                        <input id="column_email" type="checkbox" class="form-check-input" name="columns[]" value="email" checked >
                                        <label class="form-check-label fw-bolder" for="column_email"> Email </label>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            ');
    }

    /** @test */
    public function render_checked_component()
    {
        $this->app['config']->set('table.theme', 'tailwind');

        $this->get('/?columns[]=name');

        $view = $this
            ->template('<x-table::columns :columns="$columns"/>')
            ->withData('columns', [
                'name' => new Column('name', 'Name'),
                'email' => new Column('email', 'Email')
            ]);

        $view->assertRender('
            <div class="relative" x-data="{ open: false }" @click.away="open = false" @close.stop="open = false">
                <button type="button" @click="open = !open" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm hover:shadow font-semibold rounded-md text-sm text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring focus:ring-gray-100 disabled:opacity-50 active:bg-white leading-5 transition" :aria-expanded="open" >
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-white text-gray-400" style="height: 1.25rem; width: 1.25rem" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                    </svg>
                </button>
                <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute z-50 mt-2 w-64 rounded-md shadow-lg origin-top-right right-0" style="display: none;">
                    <div class="rounded-md ring-1 ring-black ring-opacity-5 py-1 bg-white">
                        <ul class="px-4 py-3 divide-y divide-gray-200">
                            <li class="py-2 flex items-center justify-between">
                                <label for="column_name" class="text-sm font-semibold tracking-wide text-gray-900"> Name </label>
                                <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
                                    <input type="checkbox" name="columns[]" id="column_name" value="name" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-2 border-gray-200 hover:border-gray-200 appearance-none cursor-pointer" checked />
                                    <label for="column_name" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-200 cursor-pointer"></label>
                                </div>
                            </li>
                            <li class="py-2 flex items-center justify-between">
                                <label for="column_email" class="text-sm font-semibold tracking-wide text-gray-900"> Email </label>
                                <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
                                    <input type="checkbox" name="columns[]" id="column_email" value="email" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-2 border-gray-200 hover:border-gray-200 appearance-none cursor-pointer" />
                                    <label for="column_email" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-200 cursor-pointer"></label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        ');
    }
}
