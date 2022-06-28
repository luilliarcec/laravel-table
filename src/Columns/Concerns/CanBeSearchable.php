<?php

namespace Luilliarcec\LaravelTable\Columns\Concerns;

use Closure;

trait CanBeSearchable
{
    protected bool $isSearchable = false;

    public function searchable(bool|Closure $condition = true): static
    {
        $this->isSearchable = $condition;

        return $this;
    }

    public function isSearchable(): ?string
    {
        return $this->evaluate($this->isSearchable);
    }
}
