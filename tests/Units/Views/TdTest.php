<?php

namespace Luilliarcec\LaravelTable\Tests\Units\Views;

use Luilliarcec\LaravelTable\Tests\TestCase;

class TdTest extends TestCase
{
    /** @test */
    public function render_with_tailwind_theme()
    {
        $this->app['config']->set('table.theme', 'tailwind');

        $view = $this
            ->template('<x-table::td :column-key="$key">Name</x-table::td>')
            ->withData('key', 'name');

        $view
            ->assertRender('
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"> Name </td>
            ');
    }

    /** @test */
    public function render_with_bootstrap5_theme()
    {
        $this->app['config']->set('table.theme', 'bootstrap5');

        $view = $this
            ->template('<x-table::td :column-key="$key">Name</x-table::td>')
            ->withData('key', 'name');

        $view
            ->assertRender('<td > Name </td>');
    }

    /** @test */
    public function render_with_bootstrap4_theme()
    {
        $this->app['config']->set('table.theme', 'bootstrap4');

        $view = $this
            ->template('<x-table::td :column-key="$key">Name</x-table::td>')
            ->withData('key', 'name');

        $view
            ->assertRender('<td > Name </td>');
    }

    /** @test */
    public function render_displayable_component()
    {
        $this->app['config']->set('table.theme', 'tailwind');

        $this->get('/?columns[]=name');

        $view = $this
            ->template('<x-table::td :column-key="$key">Name</x-table::td>')
            ->withData('key', 'name');

        $view->assertRender('
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"> Name </td>
        ');
    }

    /** @test */
    public function render_displayable_component_not_displayed()
    {
        $this->app['config']->set('table.theme', 'tailwind');

        $this->get('/?columns[]=email');

        $view = $this
            ->template('<x-table::td :column-key="$key">Name</x-table::td>')
            ->withData('key', 'name');

        $view->assertRender('');
    }
}
