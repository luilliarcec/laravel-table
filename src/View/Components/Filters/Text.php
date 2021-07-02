<?php

namespace Luilliarcec\LaravelTable\View\Components\Filters;

class Text extends Field
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return "table::components.$this->theme.filters.text";
    }
}
