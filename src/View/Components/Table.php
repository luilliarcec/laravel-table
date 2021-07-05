<?php

namespace Luilliarcec\LaravelTable\View\Components;

use Luilliarcec\LaravelTable\Support\BladeTable;

class Table extends Component
{
    /**
     * Paginated data or Eloquent Collection
     *
     * @var \Illuminate\Contracts\Pagination\Paginator|\Illuminate\Database\Eloquent\Collection
     */
    public $meta;

    /**
     * Object Table
     *
     * @var BladeTable
     */
    public $table;

    /**
     * Table constructor.
     *
     * @param \Illuminate\Contracts\Pagination\Paginator|\Illuminate\Database\Eloquent\Collection $meta
     * @param BladeTable $table
     */
    public function __construct($meta, BladeTable $table)
    {
        parent::__construct();

        $this->meta = $meta;
        $this->table = $table;
    }

    /**
     * Check if there are filters in the table
     *
     * @return bool
     */
    public function hasFilters(): bool
    {
        return $this->table->getFilters()->isNotEmpty();
    }

    /**
     * Check if there are columns in the table
     *
     * @return bool
     */
    public function hasColumns(): bool
    {
        return $this->table->getColumns()->isNotEmpty();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return "table::components.$this->theme.table";
    }
}
