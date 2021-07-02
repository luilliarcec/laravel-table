<?php

namespace Luilliarcec\LaravelTable\View\Components;

class Td extends Component
{
    /**
     * Column Key.
     *
     * @var string
     */
    public $columnKey;

    /**
     * Show column
     *
     * @var bool
     */
    private $show;

    /**
     * Td constructor.
     *
     * @param string $columnKey
     * @param bool $show
     */
    public function __construct(string $columnKey, bool $show = false)
    {
        parent::__construct();

        $this->columnKey = $columnKey;
        $this->show = $show;
    }

    /**
     * Check show column
     *
     * @return bool
     */
    public function show(): bool
    {
        if (empty(request('columns', []))) {
            return true;
        }

        return $this->show ?: in_array($this->columnKey, request('columns', []));
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return "table::components.$this->theme.td";
    }
}
