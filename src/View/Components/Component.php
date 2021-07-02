<?php

namespace Luilliarcec\LaravelTable\View\Components;

abstract class Component extends \Illuminate\View\Component
{
    protected $theme;

    /**
     * Component constructor.
     */
    public function __construct()
    {
        $this->theme = (string)config('table.theme');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public abstract function render();
}
