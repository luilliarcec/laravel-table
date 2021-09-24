<?php

namespace Luilliarcec\LaravelTable\Tests\Units\Views;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Luilliarcec\LaravelTable\Facades\Table as Facade;
use Luilliarcec\LaravelTable\Support\BladeTable;
use Luilliarcec\LaravelTable\Support\Filter;
use Luilliarcec\LaravelTable\Tests\TestCase;
use Luilliarcec\LaravelTable\View\Components\Table;

class TableTest extends TestCase
{
    /** @test */
    function check_that_it_throws_exception_when_an_invalid_table_argument_is_received()
    {
        $this->markTestIncomplete();

        $this->expectException(\TypeError::class);
        $this->expectExceptionMessage('Argument 2 passed to Luilliarcec\LaravelTable\View\Components\Table::__construct() must be an instance of Luilliarcec\LaravelTable\Support\BladeTable, null given');

        $this->component(Table::class, [
            'meta' => new Collection(),
            'table' => null
        ]);
    }

    /** @test */
    function check_that_it_throws_exception_when_an_invalid_meta_argument_is_received()
    {
        $this->markTestIncomplete();

        $this->expectException(\TypeError::class);
        $this->expectExceptionMessage('Argument 2 passed to Luilliarcec\LaravelTable\View\Components\Table::__construct() must be an instance of Luilliarcec\LaravelTable\Support\BladeTable, null given');

        $this->component(Table::class, [
            'meta' => null,
            'table' => new BladeTable()
        ]);
    }

    /** @test */
    public function render_with_tailwind_theme()
    {
        $this->app['config']->set('table.theme', 'tailwind');

        $view = $this
            ->template('
                <x-table-table :meta="$meta" :table="$table">
                    <x-slot name="head">
                        ...
                    </x-slot>

                    <x-slot name="body">
                        ...
                    </x-slot>
                </x-table-table>
            ')
            ->withData([
                'meta' => new Collection(),
                'table' => Facade::disableActionButton()->disableGlobalSearch()
            ]);

        $view->assertRender('
            <div>
                <form action="">
                    <div class="flex flex-wrap space-x-4 justify-end md:justify-between mb-5"></div>
                </form>
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 relative sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200 bg-white">
                                    <thead class="bg-gray-100"> ... </thead>
                                    <tbody class="bg-white divide-y divide-gray-200"> ... </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        ');
    }

    /** @test */
    public function render_with_tailwind_bootstrap4()
    {
        $this->app['config']->set('table.theme', 'bootstrap4');

        $view = $this
            ->template('
                <x-table-table :meta="$meta" :table="$table">
                    <x-slot name="head">
                        ...
                    </x-slot>

                    <x-slot name="body">
                        ...
                    </x-slot>
                </x-table-table>
            ')
            ->withData([
                'meta' => new Collection(),
                'table' => Facade::disableActionButton()->disableGlobalSearch()
            ]);

        $view->assertRender('
            <div>
                <form action="">
                    <div class="row justify-content-end justify-content-md-between mb-3"></div>
                </form>
                <div class="card card-body border-0 shadow table-responsive">
                    <table class="table table-hover">
                        <thead> ... </thead>
                        <tbody> ... </tbody>
                    </table>
                </div>
            </div>
        ');
    }

    /** @test */
    public function render_with_tailwind_bootstrap5()
    {
        $this->app['config']->set('table.theme', 'bootstrap5');

        $view = $this
            ->template('
                <x-table-table :meta="$meta" :table="$table">
                    <x-slot name="head">
                        ...
                    </x-slot>

                    <x-slot name="body">
                        ...
                    </x-slot>
                </x-table-table>
            ')
            ->withData([
                'meta' => new Collection(),
                'table' => Facade::disableActionButton()->disableGlobalSearch()
            ]);

        $view->assertRender('
            <div>
                <form action="">
                    <div class="row justify-content-end justify-content-md-between mb-3"></div>
                </form>
                <div class="card card-body border-0 shadow table-responsive">
                    <table class="table table-hover">
                        <thead> ... </thead>
                        <tbody> ... </tbody>
                    </table>
                </div>
            </div>
        ');
    }

    /** @test */
    public function render_with_paginator_bootstrap4()
    {
        $this->app['config']->set('table.theme', 'bootstrap4');
        Paginator::useBootstrap();
        $data = collect([
            ['name' => 'Luis'],
            ['name' => 'Cris']
        ]);

        $view = $this
            ->template('
                <x-table-table :meta="$meta" :table="$table">
                    <x-slot name="head">
                        ...
                    </x-slot>

                    <x-slot name="body">
                        ...
                    </x-slot>
                </x-table-table>
            ')
            ->withData([
                'meta' => new Paginator($data, 1),
                'table' => Facade::disableActionButton()->disableGlobalSearch()
            ]);

        $view->assertRender('
            <div>
                <form action="">
                    <div class="row justify-content-end justify-content-md-between mb-3"></div>
                </form>
                <div class="card card-body border-0 shadow table-responsive">
                    <table class="table table-hover">
                        <thead> ... </thead>
                        <tbody> ... </tbody>
                    </table>
                    <nav>
                        <ul class="pagination">
                            <li class="page-item disabled" aria-disabled="true"> <span class="page-link">&laquo; Previous</span> </li>
                            <li class="page-item"> <a class="page-link" href="/?page=2" rel="next">Next &raquo;</a> </li>
                        </ul>
                    </nav>
                </div>
            </div>
        ');
    }

    /** @test */
    public function render_with_filter_and_column_bootstrap4()
    {
        $this->app['config']->set('table.theme', 'bootstrap4');
        Paginator::useBootstrap();

        $view = $this
            ->template('
                <x-table-table :meta="$meta" :table="$table">
                    <x-slot name="head">
                        ...
                    </x-slot>

                    <x-slot name="body">
                        ...
                    </x-slot>
                </x-table-table>
            ')
            ->withData([
                'meta' => new Collection(),
                'table' => Facade::disableActionButton()
                    ->disableGlobalSearch()
                    ->addFilter('name', 'Name', Filter::TEXT)
                    ->addColumn('name', 'Name')
            ]);

        $view->assertRender('
            <div>
                <form action="">
                    <div class="row justify-content-end justify-content-md-between mb-3">
                        <div class="col-3 col-md-1 mt-2">
                            <div class="dropdown">
                                <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false" >
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="text-white"
                                         style="height: 1.25rem; width: 1.25rem"
                                         viewBox="0 0 20 20"
                                         fill="currentColor">
                                        <path fill-rule="evenodd"
                                              d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z"
                                              clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <ul class="dropdown-menu keep-open shadow py-0 mt-3" style="min-width: 280px">
                                    <li>
                                        <div class="rounded-top px-0 py-0">
                                            <p class="px-3 py-2 mb-0 fw-light text-uppercase bg-light rounded-top"
                                               style="font-size: 14px"> Name </p>
                                            <div class="p-2">
                                                <input type="text" class="form-control filter-text" name="filter[name]" value="">
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="rounded-top px-0 py-0">
                                            <p class="px-3 py-2 mb-0 fw-light text-uppercase bg-light rounded-top"
                                               style="font-size: 14px"> Filters </p>
                                            <div class="p-2"> <a class="text-secondary px-2" href="http://localhost"> Clear
                                                    filters </a> </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-3 col-md-1 mt-2">
                            <div class="dropdown">
                                <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false" >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="text-white"
                                        style="height: 1.25rem; width: 1.25rem"
                                        viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path
                                            d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                    </svg>
                                </button>
                                <ul class="dropdown-menu keep-open shadow py-0 mt-3" style="min-width: 220px">
                                    <li>
                                        <div class="px-3 py-2">
                                            <div class="custom-control custom-switch">
                                                <input id="column_name" type="checkbox" class="custom-control-input"
                                                       name="columns[]" value="name" checked >
                                                <label class="custom-control-label font-weight-bolder" for="column_name">
                                                    Name </label>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="card card-body border-0 shadow table-responsive">
                    <table class="table table-hover">
                        <thead> ... </thead>
                        <tbody> ... </tbody>
                    </table>
                </div>
            </div>
        ');
    }
}
