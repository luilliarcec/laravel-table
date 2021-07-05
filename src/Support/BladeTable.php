<?php

namespace Luilliarcec\LaravelTable\Support;

use Illuminate\Support\Collection;

class BladeTable
{
    private $request;
    private $columns;
    private $filters;
    private $sort;
    private $hasGlobalSearch = true;
    private $hasActionButton = true;

    public function __construct()
    {
        $this->request = request();

        $this->sort = $this->request->query('sort');
        $this->columns = new Collection;
        $this->filters = new Collection;
    }

    /**
     * @return Collection
     */
    public function getColumns(): Collection
    {
        return $this->columns;
    }

    /**
     * @return Collection
     */
    public function getFilters(): Collection
    {
        return $this->filters;
    }

    /**
     * @return array|string|null
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * @return bool
     */
    public function hasGlobalSearch(): bool
    {
        return $this->hasGlobalSearch;
    }

    /**
     * @return bool
     */
    public function hasActionButton(): bool
    {
        return $this->hasActionButton;
    }

    /**
     * Disable the global search.
     *
     * @return self
     */
    public function disableGlobalSearch(): self
    {
        $this->hasGlobalSearch = false;

        return $this;
    }

    /**
     * Disable the action button.
     *
     * @return self
     */
    public function disableActionButton(): self
    {
        $this->hasActionButton = false;

        return $this;
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
