<?php

namespace Luilliarcec\LaravelTable\Concerns;

trait HasActions
{
    protected array $actions = [];

    public function actions(array $actions): static
    {
        $this->actions = $actions;

        return $this;
    }

    public function prependActions(array $actions): static
    {
        $this->actions = array_merge($actions, $this->actions);

        return $this;
    }

    public function pushActions(array $actions): static
    {
        $this->actions = array_merge($this->actions, $actions);

        return $this;
    }

    public function getActions(): array
    {
        return $this->actions;
    }
}
