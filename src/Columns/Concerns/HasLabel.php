<?php

namespace Luilliarcec\LaravelTable\Columns\Concerns;

use Closure;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;

trait HasLabel
{
    protected string|HtmlString|Closure|null $label = null;

    public function label(string|HtmlString|Closure|null $label): static
    {
        $this->label = $label;

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
}
