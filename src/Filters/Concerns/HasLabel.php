<?php

namespace Luilliarcec\LaravelTable\Filters\Concerns;

use Closure;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;

trait HasLabel
{
    protected string|HtmlString|Closure|null $label = null;
    protected bool|Closure $isLabelHidden = false;

    public function label(string|HtmlString|Closure|null $label): static
    {
        $this->label = $label;

        return $this;
    }

    public function disableLabel(bool|Closure $condition = true): static
    {
        $this->isLabelHidden = $condition;

        return $this;
    }

    public function getLabel(): string
    {
        return $this->evaluate($this->label) ?? (string) Str::of($this->getName())
                ->before('.')
                ->kebab()
                ->replace(['-', '_'], ' ')
                ->ucfirst();
    }

    public function isLabelHidden(): bool
    {
        return $this->evaluate($this->isLabelHidden);
    }
}
