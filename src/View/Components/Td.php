<?php

namespace Luilliarcec\LaravelTable\View\Components;

class Td extends Component
{
    /**
     * Column Key.
     *
     * @var string|null
     */
    public $columnKey;

    /**
     * Td constructor.
     *
     * @param string|null $columnKey
     */
    public function __construct(?string $columnKey = null)
    {
        parent::__construct();

        $this->columnKey = $columnKey;
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

        return is_null($this->columnKey)
            || in_array($this->columnKey, request('columns', []));
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
