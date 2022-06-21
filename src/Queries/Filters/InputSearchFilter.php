<?php

namespace Luilliarcec\LaravelTable\Queries\Filters;

use Illuminate\Database\Eloquent\Builder;

class InputSearchFilter extends Filters
{
    public function __construct(private array $fields, bool $addRelationConstraint = true)
    {
        parent::__construct($addRelationConstraint);
    }

    public function __invoke(Builder $query, $value, string $property)
    {
        $value = mb_strtolower($value, 'UTF8');

        $query->where(fn($query) => $this->filter($query, $value));
    }

    protected function filter(Builder $query, $value)
    {
        foreach ($this->fields as $key => $field) {
            if ($key === array_key_first($this->fields)) {
                if ($this->addRelationConstraint && $this->isRelationProperty($query, $field)) {
                    $this->withRelationConstraint($query, $value, $field);

                    continue;
                }

                $query->whereRaw($this->sql($query, $field), ["%{$value}%"]);

                continue;
            }

            if ($this->addRelationConstraint && $this->isRelationProperty($query, $field)) {
                $this->withRelationConstraint($query, $value, $field, 'or');

                continue;
            }

            $query->orWhereRaw($this->sql($query, $field), ["%{$value}%"]);
        }
    }
}
