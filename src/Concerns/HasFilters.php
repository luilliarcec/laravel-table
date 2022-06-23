<?php

namespace Luilliarcec\LaravelTable\Concerns;

trait HasFilters
{
    protected array $filters = [];
    protected ?string $filtersFormWidth = null;

    public function filters(array $filters): static
    {
        $this->filters = $filters;

        return $this;
    }

    public function getFilters(): array
    {
        foreach ($this->filters as $filter) {
            $filter->table($this);
        }

        return $this->filters;
    }

    public function filtersFormWidth(?string $width): static
    {
        $this->filtersFormWidth = $width;

        return $this;
    }

    public function getFiltersFormWidth(): ?string
    {
        return $this->filtersFormWidth;
    }

    public function isFilterable(): bool
    {
        return filled($this->filters);
    }
}
