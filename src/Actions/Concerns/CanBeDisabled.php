<?php

namespace Luilliarcec\LaravelTable\Actions\Concerns;

use Closure;

trait CanBeDisabled
{
    protected bool|Closure $isDisabled = false;

    public function disabled(bool|Closure $condition = true): static
    {
        $this->isDisabled = $condition;

        return $this;
    }

    public function isEnabled(): bool
    {
        return !$this->isDisabled();
    }

    public function isDisabled(): bool
    {
        return $this->evaluate($this->isDisabled);
    }
}
