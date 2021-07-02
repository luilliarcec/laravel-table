<?php

namespace Luilliarcec\LaravelTable\Support;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

class BladeTable
{
    private $request;
    private $columns;
    private $filters;
    private $globalSearch = true;

    public function __construct()
    {
        $this->request = request();

        $this->columns = new Collection;
        $this->filters = new Collection;
    }

    /**
     * Disable the global search.
     *
     * @return self
     */
    public function disableGlobalSearch(): self
    {
        $this->globalSearch = false;

        return $this;
    }

    /**
     * Build table with return all properties and sets the default
     * values from the request query.
     *
     * @return object
     */
    public function build(): object
    {
        return (object)[
            'sort' => $this->request->query('sort'),
            'page' => Paginator::resolveCurrentPage(),
            'globalSearch' => $this->globalSearch,
            'columns' => $this->columns->all(),
            'filters' => $this->filters->all(),
        ];
    }

    /**
     * Add a column to the query builder.
     *
     * @param string $key
     * @param string $label
     * @return self
     */
    public function addColumn(string $key, string $label): self
    {
        $columns = $this->request->query('columns');
        $enable = true;

        if (!empty($columns)) {
            $enable = in_array($key, $columns);
        }

        $this->columns->put($key, (object)[
            'key' => $key,
            'label' => $label,
            'enabled' => $enable,
        ]);

        return $this;
    }

    /**
     * Add multiple columns to the query builder.
     *
     * @param array $columns
     * @return $this
     */
    public function addColumns(array $columns = []): self
    {
        foreach ($columns as $key => $value) {
            $this->addColumn($key, $value);
        }

        return $this;
    }

    /**
     * Add a filter to the query builder.
     *
     * @param string $key
     * @param string $label
     * @param string $type
     * @param array $options
     * @return self
     */
    public function addFilter(string $key, string $label, string $type, array $options = []): self
    {
        return $this->addFilterToCollection(
            Filter::build($key, $label, $type, $options)
        );
    }

    /**
     * Attach filters.
     *
     * @param Filter $filter
     * @return $this
     */
    private function addFilterToCollection(Filter $filter): self
    {
        $this->filters->put($filter->key, $filter);

        return $this;
    }
}
