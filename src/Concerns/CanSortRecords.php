<?php

namespace Luilliarcec\LaravelTable\Concerns;

use Luilliarcec\LaravelTable\Columns\Column;

trait CanSortRecords
{
    protected ?array $cachedSortableColumns = null;

    public function isTableSortable(): bool
    {
        return count($this->getSortableColumns()) > 0;
    }

    public function getSortableColumns(): array
    {
        if (!$this->cachedSortableColumns) {
            $this->cachedSortableColumns = collect($this->getCachedTableColumns())
                ->filter(fn(Column $column) => $column->isSortable())
                ->map(fn(Column $column) => $column->getName())
                ->toArray();
        }

        return $this->cachedSortableColumns;
    }
}
