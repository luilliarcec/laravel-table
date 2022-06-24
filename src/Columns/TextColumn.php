<?php

namespace Luilliarcec\LaravelTable\Columns;

use Closure;

class TextColumn extends Column
{
    protected string $view = 'tables::columns.text';
    protected bool|Closure $canWrap = false;

    public function wrap(bool|Closure $condition = true): static
    {
        $this->canWrap = $condition;

        return $this;
    }

    public function canWrap(): bool
    {
        return $this->evaluate($this->canWrap);
    }
}
