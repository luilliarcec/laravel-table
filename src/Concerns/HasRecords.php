<?php

namespace Luilliarcec\LaravelTable\Concerns;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Collection;

trait HasRecords
{
    protected Paginator|Collection $records;

    public function records(Paginator|Collection $records): static
    {
        $this->records = $records;

        return $this;
    }

    public function getRecords(): Paginator|Collection
    {
        return $this->records ?? new Collection();
    }
}
