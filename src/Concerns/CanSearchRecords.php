<?php

namespace Luilliarcec\LaravelTable\Concerns;

use Luilliarcec\LaravelTable\Columns\Column;

trait CanSearchRecords
{
    protected array $cachedColumnsSearchable;

    public function isTableSearchable(): bool
    {
        return count($this->getColumnsSearchable()) > 0;
    }

    public function getColumnsSearchable(): array
    {
        return $this->cachedColumnsSearchable ?: collect($this->getCachedTableColumns())
            ->filter(fn(Column $column) => $column->isSearchable())
            ->map(fn(Column $column) => $column->getName())
            ->toArray();
    }
}
