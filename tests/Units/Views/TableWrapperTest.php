<?php

namespace Luilliarcec\LaravelTable\Tests\Units\Views;

use Luilliarcec\LaravelTable\Tests\TestCase;

class TableWrapperTest extends TestCase
{
    /** @test */
    public function render_with_tailwind_theme()
    {
        $this->app['config']->set('table.theme', 'tailwind');

        $view = $this
            ->template('<x-table-table-wrapper> ... </x-table-table-wrapper>');

        $view
            ->assertRender('
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 relative sm:rounded-lg">
                                ...
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
            ->template('<x-table-table-wrapper>...</x-table-table-wrapper>');

        $view
            ->assertRender('
                <div class="card card-body border-0 shadow table-responsive">...</div>');
    }

    /** @test */
    public function render_with_bootstrap5_theme()
    {
        $this->app['config']->set('table.theme', 'bootstrap5');

        $view = $this
            ->template('<x-table-table-wrapper>...</x-table-table-wrapper>');

        $view
            ->assertRender('
                <div class="card card-body border-0 shadow table-responsive">...</div>
            ');
    }
}
