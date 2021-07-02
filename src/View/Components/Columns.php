<?php

namespace Luilliarcec\LaravelTable\View\Components;

class Columns extends Component
{
    /**
     * Filters
     *
     * @var array
     */
    public $columns;

    /**
     * Columns constructor.
     *
     * @param array $columns
     */
    public function __construct(array $columns)
    {
        parent::__construct();

        $this->columns = $columns;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return "components.$this->theme.columns";
    }
}
