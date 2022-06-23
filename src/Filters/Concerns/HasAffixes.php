<?php

namespace Luilliarcec\LaravelTable\Filters\Concerns;

use Closure;

trait HasAffixes
{
    protected string|Closure|null $suffixLabel = null;
    protected string|Closure|null $prefixLabel = null;

    public function prefix(string|Closure|null $label): static
    {
        $this->prefixLabel = $label;

        return $this;
    }

    public function suffix(string|Closure|null $label): static
    {
        $this->suffixLabel = $label;

        return $this;
    }

    public function getPrefixLabel()
    {
        return $this->evaluate($this->prefixLabel);
    }

    public function getSuffixLabel()
    {
        return $this->evaluate($this->suffixLabel);
    }
}
