<?php

namespace Luilliarcec\LaravelTable\Filters\Concerns;

use Closure;
use Illuminate\Support\Str;

trait HasId
{
    protected string|Closure|null $id = null;

    public function id(string|Closure|null $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getId(): ?string
    {
        return $this->evaluate($this->id) ?? sprintf('%s-%s-%s',
                $this->getTable()->getName(),
                $this->getName(),
                Str::lower(Str::random(4))
            );
    }
}
