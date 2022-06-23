<?php

namespace Luilliarcec\LaravelTable\Concerns;

trait HasInputSearch
{
    protected bool $isSearchable = false;

    public function searchable(bool $isSearchable = true): static
    {
        $this->isSearchable = $isSearchable;

        return $this;
    }

    public function isSearchable(): string
    {
        return $this->isSearchable;
    }
}
