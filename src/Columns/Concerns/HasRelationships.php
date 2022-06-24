<?php

namespace Luilliarcec\LaravelTable\Columns\Concerns;

use Illuminate\Support\Str;

trait HasRelationships
{
    public function queriesRelationships(): bool
    {
        return Str::of($this->getName())->contains('.');
    }

    protected function getRelationshipTitleColumnName(): string
    {
        return (string) Str::of($this->getName())->afterLast('.');
    }

    protected function getRelationshipName(): string
    {
        return (string) Str::of($this->getName())->beforeLast('.');
    }
}
