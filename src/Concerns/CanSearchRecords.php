<?php

namespace Luilliarcec\LaravelTable\Concerns;

use Luilliarcec\LaravelTable\Columns\Column;

trait CanSearchRecords
{
    protected ?array $cachedSearchableColumns = null;

    public function isTableSearchable(): bool
    {
        return count($this->getSearchableColumns()) > 0;
    }

    public function getSearchableColumns(): array
    {
        if (!$this->cachedSearchableColumns) {
            $this->cachedSearchableColumns = collect($this->getCachedTableColumns())
                ->filter(fn(Column $column) => $column->isSearchable())
                ->map(fn(Column $column) => $column->getName())
                ->toArray();
        }

        return $this->cachedSearchableColumns;
    }
}
