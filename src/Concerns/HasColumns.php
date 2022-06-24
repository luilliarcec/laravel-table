<?php

namespace Luilliarcec\LaravelTable\Concerns;

trait HasColumns
{
    protected array $columns = [];

    public function columns(array $columns): static
    {
        $this->columns = $columns;

        return $this;
    }

    public function getColumns(): array
    {
        return $this->columns;
    }
}
