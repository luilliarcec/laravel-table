<?php

namespace Luilliarcec\LaravelTable\View\Components;

class Scripts extends Component
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return "components.$this->theme.scripts";
    }
}
