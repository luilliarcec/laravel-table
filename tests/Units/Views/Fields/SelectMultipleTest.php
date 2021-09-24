<?php

namespace Luilliarcec\LaravelTable\Tests\Units\Views\Fields;

use Luilliarcec\LaravelTable\Support\Filter;
use Luilliarcec\LaravelTable\Tests\TestCase;

class SelectMultipleTest extends TestCase
{
    /** @test */
    public function render_with_tailwind_theme()
    {
        $this->app['config']->set('table.theme', 'tailwind');

        $view = $this
            ->template('<x-table-filters.select-multiple :filter="$filter"/>')
            ->withData(
                'filter',
                Filter::build('languages', 'Languages', Filter::SELECT_MULTIPLE, [
                    'php' => 'PHP',
                    'python' => 'Python',
                    'js' => 'Javascript',
                ])
            );

        $view
            ->assertSee('filter-select-multiple')
            ->assertRender('
                <select class="border-gray-300 focus:ring-1 focus:ring-blue-900 focus:border-blue-900 block w-full text-sm rounded-md filter-select-multiple" name="filter[languages][]" multiple>
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
            ->template('<x-table-filters.select-multiple :filter="$filter"/>')
            ->withData(
                'filter',
                Filter::build('languages', 'Languages', Filter::SELECT_MULTIPLE, [
                    'php' => 'PHP',
                    'python' => 'Python',
                    'js' => 'Javascript',
                ])
            );

        $view
            ->assertSee('filter-select-multiple')
            ->assertRender('
                <select class="form-control filter-select-multiple" name="filter[languages][]" multiple>
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
            ->template('<x-table-filters.select-multiple :filter="$filter"/>')
            ->withData(
                'filter',
                Filter::build('languages', 'Languages', Filter::SELECT_MULTIPLE, [
                    'php' => 'PHP',
                    'python' => 'Python',
                    'js' => 'Javascript',
                ])
            );

        $view
            ->assertSee('filter-select-multiple')
            ->assertRender('
                <select class="form-control filter-select-multiple" name="filter[languages][]" multiple>
                    <option value="php" > PHP </option>
                    <option value="python" > Python </option>
                    <option value="js" > Javascript </option>
                </select>
            ');
    }
}
