<?php

namespace Luilliarcec\LaravelTable\Queries\Filters;

use Illuminate\Database\Eloquent\Builder;

class MorphFilter extends Filters
{
    public function __construct(private string|null $morphName = null, bool $addRelationConstraint = true)
    {
        parent::__construct($addRelationConstraint);
    }

    public function __invoke(Builder $query, $value, string $property)
    {
        $this->morphName = $this->morphName ?: $property;

        $value = str_replace('\\', '\\\\', mb_strtolower($value, 'UTF8'));

        if (str_contains($value, ':')) {
            $value = explode(':', $value);

            $this->filterType($query, $value[0]);

            if (is_numeric($value[1])) {
                $this->filterId($query, $value[1]);
            }

            return;
        }

        if (is_numeric($value)) {
            $this->filterId($query, $value);

            return;
        }

        $this->filterType($query, $value);
    }

    protected function filterType(Builder $query, mixed $value)
    {
        $query->whereRaw(
            $this->sql($query, "{$this->morphName}_type"),
            ["%{$value}%"]
        );
    }

    protected function filterId(Builder $query, mixed $value)
    {
        if (!is_numeric($value)) {
            return;
        }

        $query->where(
            $query->qualifyColumn("{$this->morphName}_id"),
            $value
        );
    }
}
