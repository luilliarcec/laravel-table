<?php

namespace Luilliarcec\LaravelTable\Tests\Units\Views;

use Luilliarcec\LaravelTable\Tests\TestCase;

class ThTest extends TestCase
{
    /** @test */
    public function render_with_tailwind_theme()
    {
        $this->app['config']->set('table.theme', 'tailwind');

        $view = $this
            ->template('<x-table::th :column-key="$key">Name</x-table::th>')
            ->withData('key', 'name');

        $view
            ->assertRender('
                <th
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    <span class="flex flex-row items-center font-bold"> Name </span>
                </th>
            ');
    }

    /** @test */
    public function render_with_bootstrap4_theme()
    {
        $this->app['config']->set('table.theme', 'bootstrap4');

        $view = $this
            ->template('<x-table::th :column-key="$key">Name</x-table::th>')
            ->withData('key', 'name');

        $view
            ->assertRender('<th > Name </th>');
    }

    /** @test */
    public function render_with_bootstrap5_theme()
    {
        $this->app['config']->set('table.theme', 'bootstrap5');

        $view = $this
            ->template('<x-table::th :column-key="$key">Name</x-table::th>')
            ->withData('key', 'name');

        $view
            ->assertRender('<th > Name </th>');
    }

    /** @test */
    public function render_sortable_component()
    {
        $view = $this
            ->template('<x-table::th :column-key="$key" :sortable="true">Name</x-table::th>')
            ->withData('key', 'name');

        $view
            ->assertSee('href')
            ->assertSee('http://localhost?sort=name')
            ->assertSee('M41 288h238c21.4 0 32.1 25.9 17 41L177 448c-9.4 9.4-24.6 9.4-33.9 0L24 329c-15.1-15.1-4.4-41 17-41zm255-105L177 64c-9.4-9.4-24.6-9.4-33.9 0L24 183c-15.1 15.1-4.4 41 17 41h238c21.4 0 32.1-25.9 17-41z');
    }

    /** @test */
    public function render_sortable_up_component()
    {
        $this->app['config']->set('table.theme', 'tailwind');

        $this->get('/?sort=name');

        $view = $this
            ->template('<x-table::th :column-key="$key" :sortable="true">Name</x-table::th>')
            ->withData('key', 'name');

        $view
            ->assertSee('href')
            ->assertSee('http://localhost?sort=-name')
            ->assertSee('M279 224H41c-21.4 0-32.1-25.9-17-41L143 64c9.4-9.4 24.6-9.4 33.9 0l119 119c15.2 15.1 4.5 41-16.9 41z');
    }

    /** @test */
    public function render_sortable_down_component()
    {
        $this->app['config']->set('table.theme', 'tailwind');

        $this->get('/?sort=-name');

        $view = $this
            ->template('<x-table::th :column-key="$key" :sortable="true">Name</x-table::th>')
            ->withData('key', 'name');

        $view
            ->assertSee('href')
            ->assertSee('http://localhost?')
            ->assertSee('M41 288h238c21.4 0 32.1 25.9 17 41L177 448c-9.4 9.4-24.6 9.4-33.9 0L24 329c-15.1-15.1-4.4-41 17-41z');
    }

    /** @test */
    public function render_displayable_component()
    {
        $this->app['config']->set('table.theme', 'tailwind');

        $this->get('/?columns[]=name');

        $view = $this
            ->template('<x-table::th :column-key="$key" :sortable="true">Name</x-table::th>')
            ->withData('key', 'name');

        $view->assertRender('
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                <a href="http://localhost?columns%5B0%5D=name&amp;sort=name" class="flex flex-row items-center font-bold" style="text-decoration: none; color: currentColor" >
                    Name
                    <svg aria-hidden="true" class="w-3 h-3 ml-2" style="height: 0.75rem; width: 0.75rem" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" >
                        <path fill="currentColor" d="M41 288h238c21.4 0 32.1 25.9 17 41L177 448c-9.4 9.4-24.6 9.4-33.9 0L24 329c-15.1-15.1-4.4-41 17-41zm255-105L177 64c-9.4-9.4-24.6-9.4-33.9 0L24 183c-15.1 15.1-4.4 41 17 41h238c21.4 0 32.1-25.9 17-41z" />
                    </svg>
                </a>
            </th>
        ');
    }

    /** @test */
    public function render_displayable_component_not_displayed()
    {
        $this->app['config']->set('table.theme', 'tailwind');

        $this->get('/?columns[]=email');

        $view = $this
            ->template('<x-table::th :column-key="$key" :sortable="true">Name</x-table::th>')
            ->withData('key', 'name');

        $view->assertRender('');
    }
}
