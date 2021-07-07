<?php

namespace Luilliarcec\LaravelTable\View\Components;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Collection;
use Luilliarcec\LaravelTable\Support\BladeTable;

class Table extends Component
{
    /**
     * Paginated data or Eloquent Collection
     *
     * @var Paginator|Collection
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
     * @param Paginator|Collection $meta
     * @param BladeTable $table
     */
    public function __construct($meta, BladeTable $table)
    {
        $this->validateMetaArgument($meta);

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

    /**
     * Validate the data type of the argument meta given
     *
     * @param $meta
     */
    private function validateMetaArgument($meta)
    {
        if (!is_a($meta, Paginator::class) || !is_a($meta, Collection::class)) {
            $message = sprintf('Argument %s passed to %s must be an instance of %s, %s given',
                1,
                'Luilliarcec\LaravelTable\View\Components\Table::__construct()',
                'Illuminate\Contracts\Pagination\Paginator|Illuminate\Support\Collection',
                strtolower(gettype($meta))
            );

            throw new \TypeError($message);
        }
    }
}
