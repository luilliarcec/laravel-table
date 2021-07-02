<?php

namespace Luilliarcec\LaravelTable\View\Components;

class Filters extends Component
{
    /**
     * Filters
     *
     * @var array
     */
    public $filters;

    /**
     * Filters constructor.
     *
     * @param array $filters
     */
    public function __construct(array $filters)
    {
        parent::__construct();

        $this->filters = $filters;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return "table::components.$this->theme.filters";
    }
}
