<?php

namespace Luilliarcec\LaravelTable\Columns\Concerns;

use BackedEnum;
use Closure;
use Illuminate\Support\Arr;

trait HasState
{
    protected mixed $defaultState = null;
    protected ?Closure $getStateUsing = null;

    public function getStateUsing(?Closure $callback): static
    {
        $this->getStateUsing = $callback;

        return $this;
    }

    public function default($state): static
    {
        $this->defaultState = $state;

        return $this;
    }

    public function getDefaultState()
    {
        return $this->evaluate($this->defaultState);
    }

    public function getState()
    {
        $state = $this->getStateUsing ?
            $this->evaluate($this->getStateUsing) :
            $this->getStateFromRecord();

        if (
            interface_exists(BackedEnum::class) &&
            ($state instanceof BackedEnum) &&
            property_exists($state, 'value')
        ) {
            $state = $state->value;
        }

        if ($state === null) {
            $state = value($this->getDefaultState());
        }

        if (is_array($state)) {
            $state = $this->mutateArrayState($state);
        }

        return $state;
    }

    protected function getStateFromRecord()
    {
        $record = $this->getRecord();

        $state = Arr::get($record, $this->getName());

        if ($state !== null) {
            return $state;
        }

        if (!$this->queriesRelationships()) {
            return null;
        }

        $relationshipName = $this->getRelationshipName();

        if (!method_exists($record, $relationshipName)) {
            return null;
        }

        $relationship = $record->{$relationshipName}();

        if (!$this->isAValidRelationship($relationship)) {
            return null;
        }

        $state = $record->getRelationValue($relationshipName)->pluck($this->getRelationshipTitleColumnName());

        if (!count($state)) {
            return null;
        }

        return $state->toArray();
    }

    protected function mutateArrayState(array $state): array|string
    {
        return $state;
    }
}
