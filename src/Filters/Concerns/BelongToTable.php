<?php

namespace Luilliarcec\LaravelTable\Filters\Concerns;

use Luilliarcec\LaravelTable\Table;

trait BelongToTable
{
    protected Table $table;

    public function table(Table $table): static
    {
        $this->table = $table;

        return $this;
    }

    public function getTable(): Table
    {
        return $this->table;
    }
}
