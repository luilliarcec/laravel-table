<?php

namespace Luilliarcec\LaravelTable\Tests\Units\Views\Fields;

use Luilliarcec\LaravelTable\Support\Filter;
use Luilliarcec\LaravelTable\Tests\TestCase;

class CheckboxTest extends TestCase
{
    /** @test */
    public function render_with_tailwind_theme()
    {
        $this->app['config']->set('table.theme', 'tailwind');

        $view = $this
            ->template('<x-table::filters.checkbox :filter="$filter"/>')
            ->withData(
                'filter',
                Filter::build('languages', 'Languages', Filter::CHECKBOX, [
                    'php' => 'PHP',
                    'python' => 'Python',
                    'js' => 'Javascript',
                ])
            );

        $view
            ->assertSee('filter-checkbox')
            ->assertRender('
                <div class="form-check">
                    <input class="focus:ring-0 focus:ring-offset-0 h-4 w-4 text-blue-900 border-gray-300 rounded filter-checkbox" type="checkbox" name="filter[languages][]" value="php" id="check_option_php" >
                    <label class="form-check-label" for="check_option_php"> PHP </label>
                </div>
                <div class="form-check">
                    <input class="focus:ring-0 focus:ring-offset-0 h-4 w-4 text-blue-900 border-gray-300 rounded filter-checkbox" type="checkbox" name="filter[languages][]" value="python" id="check_option_python" >
                    <label class="form-check-label" for="check_option_python"> Python </label>
                </div>
                <div class="form-check">
                    <input class="focus:ring-0 focus:ring-offset-0 h-4 w-4 text-blue-900 border-gray-300 rounded filter-checkbox" type="checkbox" name="filter[languages][]" value="js" id="check_option_js" >
                    <label class="form-check-label" for="check_option_js"> Javascript </label>
                </div>
            ');
    }

    /** @test */
    public function render_with_bootstrap4_theme()
    {
        $this->app['config']->set('table.theme', 'bootstrap4');

        $view = $this
            ->template('<x-table::filters.checkbox :filter="$filter"/>')
            ->withData(
                'filter',
                Filter::build('languages', 'Languages', Filter::CHECKBOX, [
                    'php' => 'PHP',
                    'python' => 'Python',
                    'js' => 'Javascript',
                ])
            );

        $view
            ->assertSee('filter-checkbox')
            ->assertRender('
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input filter-checkbox" type="checkbox" name="filter[languages][]" value="php" id="check_option_php" >
                    <label class="custom-control-label" for="check_option_php"> PHP </label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input filter-checkbox" type="checkbox" name="filter[languages][]" value="python" id="check_option_python" >
                    <label class="custom-control-label" for="check_option_python"> Python </label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input filter-checkbox" type="checkbox" name="filter[languages][]" value="js" id="check_option_js" >
                    <label class="custom-control-label" for="check_option_js"> Javascript </label>
                </div>
            ');
    }

    /** @test */
    public function render_with_bootstrap5_theme()
    {
        $this->app['config']->set('table.theme', 'bootstrap5');

        $view = $this
            ->template('<x-table::filters.checkbox :filter="$filter"/>')
            ->withData(
                'filter',
                Filter::build('languages', 'Languages', Filter::CHECKBOX, [
                    'php' => 'PHP',
                    'python' => 'Python',
                    'js' => 'Javascript',
                ])
            );

        $view
            ->assertSee('filter-checkbox')
            ->assertRender('
                <div class="form-check">
                    <input class="form-check-input filter-checkbox" type="checkbox" name="filter[languages][]" value="php" id="check_option_php" >
                    <label class="form-check-label" for="check_option_php"> PHP </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input filter-checkbox" type="checkbox" name="filter[languages][]" value="python" id="check_option_python" >
                    <label class="form-check-label" for="check_option_python"> Python </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input filter-checkbox" type="checkbox" name="filter[languages][]" value="js" id="check_option_js" >
                    <label class="form-check-label" for="check_option_js"> Javascript </label>
                </div>
            ');
    }
}
