<?php

namespace Luilliarcec\LaravelTable\View\Components;

class GlobalSearch extends Component
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return "components.$this->theme.global-search";
    }
}
