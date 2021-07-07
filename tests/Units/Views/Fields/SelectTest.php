<?php

namespace Luilliarcec\LaravelTable\Tests\Units\Views\Fields;

use Luilliarcec\LaravelTable\Support\Filter;
use Luilliarcec\LaravelTable\Tests\TestCase;

class SelectTest extends TestCase
{
    /** @test */
    public function render_with_tailwind_theme()
    {
        $this->app['config']->set('table.theme', 'tailwind');

        $view = $this
            ->template('<x-table::filters.select :filter="$filter"/>')
            ->withData('filter',
                Filter::build('languages', 'Languages', Filter::SELECT, [
                    'php' => 'PHP',
                    'python' => 'Python',
                    'js' => 'Javascript',
                ])
            );

        $view
            ->assertSee('filter-select')
            ->assertRender('
                <select class="block focus:ring-1 focus:ring-blue-900 focus:border-blue-900 w-full shadow-sm text-sm border-gray-300 rounded-md filter-select" name="filter[languages]" >
                    <option value="" selected > - </option>
                    <option value="php" > PHP </option>
                    <option value="python" > Python </option>
                    <option value="js" > Javascript </option>
                </select>
            ');
    }

    /** @test */
    public function render_with_bootstrap4_theme()
    {
        $this->app['config']->set('table.theme', 'bootstrap4');

        $view = $this
            ->template('<x-table::filters.select :filter="$filter"/>')
            ->withData('filter',
                Filter::build('languages', 'Languages', Filter::SELECT, [
                    'php' => 'PHP',
                    'python' => 'Python',
                    'js' => 'Javascript',
                ])
            );

        $view
            ->assertSee('filter-select')
            ->assertRender('
                <select class="form-control filter-select" name="filter[languages]">
                    <option value="" selected > - </option>
                    <option value="php" > PHP </option>
                    <option value="python" > Python </option>
                    <option value="js" > Javascript </option>
                </select>
            ');
    }

    /** @test */
    public function render_with_bootstrap5_theme()
    {
        $this->app['config']->set('table.theme', 'bootstrap5');

        $view = $this
            ->template('<x-table::filters.select :filter="$filter"/>')
            ->withData('filter',
                Filter::build('languages', 'Languages', Filter::SELECT, [
                    'php' => 'PHP',
                    'python' => 'Python',
                    'js' => 'Javascript',
                ])
            );

        $view
            ->assertSee('filter-select')
            ->assertRender('
                <select class="form-control filter-select" name="filter[languages]">
                    <option value="" selected > - </option>
                    <option value="php" > PHP </option>
                    <option value="python" > Python </option>
                    <option value="js" > Javascript </option>
                </select>
            ');
    }
}
