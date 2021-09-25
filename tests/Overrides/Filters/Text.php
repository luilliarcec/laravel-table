<?php

namespace Luilliarcec\LaravelTable\Tests\Overrides\Filters;

class Text extends \Luilliarcec\LaravelTable\View\Components\Filters\Text
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return '<div>Override</div>';
    }
}
