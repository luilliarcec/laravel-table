<?php

namespace Luilliarcec\LaravelTable\Concerns;

use Luilliarcec\LaravelTable\Columns\Column;

trait HasColumns
{
    protected array $columns = [];
    protected ?array $cachedTableColumns = null;

    public function columns(array $columns): static
    {
        $this->columns = $columns;

        return $this;
    }

    public function getColumns(): array
    {
        return $this->columns;
    }

    public function getCachedTableColumns(): array
    {
        if (!$this->cachedTableColumns) {
            $this->cachedTableColumns = collect($this->getColumns())
                ->filter(fn(Column $column): bool => !$column->isHidden())
                ->toArray();
        }

        return $this->cachedTableColumns;
    }
}
