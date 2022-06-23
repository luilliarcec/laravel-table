<?php

namespace Luilliarcec\LaravelTable\Filters;

use Closure;
use Illuminate\Contracts\Support\Arrayable;

class TextFilter extends Filter
{
    protected string $view = 'tables::filters.text';

    protected array|Arrayable|Closure|null $datalistOptions = null;

    public function datalist(array|Arrayable|Closure|null $options): static
    {
        $this->datalistOptions = $options;

        return $this;
    }

    public function getDatalistOptions(): ?array
    {
        $options = $this->evaluate($this->datalistOptions);

        if ($options instanceof Arrayable) {
            $options = $options->toArray();
        }

        return $options;
    }
}
