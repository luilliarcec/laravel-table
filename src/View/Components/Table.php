<?php

namespace Luilliarcec\LaravelTable\View\Components;

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
     * @var object
     */
    public $table;

    /**
     * Table constructor.
     *
     * @param \Illuminate\Contracts\Pagination\Paginator|\Illuminate\Database\Eloquent\Collection $meta
     * @param object $table
     */
    public function __construct($meta, object $table)
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
        return (bool)$this->table->filters;
    }

    /**
     * Check if there are columns in the table
     *
     * @return bool
     */
    public function hasColumns(): bool
    {
        return (bool)$this->table->columns;
    }

    /**
     * Check if there are columns in the table
     *
     * @return bool
     */
    public function hasGlobalSearch(): bool
    {
        return $this->table->globalSearch;
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
