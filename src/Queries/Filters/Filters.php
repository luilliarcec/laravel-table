<?php

namespace Luilliarcec\LaravelTable\Queries\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Spatie\QueryBuilder\Filters\FiltersExact;

abstract class Filters extends FiltersExact
{
    protected function sql(Builder $query, mixed $field, bool $lower = true): string
    {
        $fieldWrapped = $this->wrap($query, $field);

        if ($lower) {
            return "LOWER({$fieldWrapped}) LIKE ?";
        }

        return "{$fieldWrapped} LIKE ?";
    }

    protected function wrap(Builder $query, mixed $value): string
    {
        $grammar = $query->getQuery()->getGrammar();

        if ($grammar->isExpression($value)) {
            return $grammar->wrap($value);
        }

        return $grammar->wrap($query->qualifyColumn($value));
    }

    protected function withRelationConstraint(Builder $query, $value, string $property, string $boolean = 'and')
    {
        [$relation, $property] = collect(explode('.', $property))
            ->pipe(function (Collection $parts) {
                return [
                    $parts->except([count($parts) - 1])->map([Str::class, 'camel'])->implode('.'),
                    $parts->last(),
                ];
            });

        $query->whereHas($relation, function (Builder $query) use ($value, $property, $boolean) {
            $this->relationConstraints[] = $query->qualifyColumn($property);

            if ($boolean === 'and') {
                $query->whereRaw($this->sql($query, $property), ["%{$value}%"]);

                return;
            }

            $query->orWhereRaw($this->sql($query, $property), ["%{$value}%"]);
        });
    }
}
