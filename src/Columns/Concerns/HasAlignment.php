<?php

namespace Luilliarcec\LaravelTable\Columns\Concerns;

use Closure;

trait HasAlignment
{
    protected string|Closure|null $alignment = null;

    public function alignment(string|Closure|null $alignment): static
    {
        $this->alignment = $alignment;

        return $this;
    }

    public function alignLeft(bool|Closure $condition = true): static
    {
        return $this->alignment(fn(): ?string => $condition ? 'left' : null);
    }

    public function alignCenter(bool|Closure $condition = true): static
    {
        return $this->alignment(fn(): ?string => $condition ? 'center' : null);
    }

    public function alignRight(bool|Closure $condition = true): static
    {
        return $this->alignment(fn(): ?string => $condition ? 'right' : null);
    }

    public function getAlignment(): ?string
    {
        return $this->evaluate($this->alignment);
    }
}
