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
                <div>
                    <div class="relative">
                        <button type="button" onclick="dropdown(event, \'columns-dropdown\', \'bottom-end\')" class="w-full inline-flex justify-center py-2 px-4 border focus:outline-none disabled:opacity-50 disabled:cursor-default font-semibold leading-6 rounded shadow-sm hover:shadow focus:ring focus:ring-opacity-25 active:shadow-none border-gray-300 bg-white text-gray-800 hover:text-gray-800 hover:border-gray-300 focus:ring-gray-300 active:bg-white active:border-white ease-linear transition-all duration-150" aria-expanded="false" >
                            <svg xmlns="http://www.w3.org/2000/svg" class="text-white text-gray-400" style="height: 1.25rem; width: 1.25rem" viewBox="0 0 20 20" fill="currentColor" >
                                <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                            </svg>
                        </button>
                        <div class="absolute z-10">
                            <div id="columns-dropdown" class="hidden mt-2 w-64 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                                <!-- Local -->
                                <div class="px-4 py-3">
                                    <ul class="divide-y divide-gray-200">
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
                            <svg xmlns="http://www.w3.org/2000/svg" class="text-white" style="height: 1.25rem; width: 1.25rem" viewBox="0 0 20 20" fill="currentColor" >
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
                            <svg xmlns="http://www.w3.org/2000/svg" class="text-white" style="height: 1.25rem; width: 1.25rem" viewBox="0 0 20 20" fill="currentColor" >
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
}
