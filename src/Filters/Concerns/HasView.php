<?php

namespace Luilliarcec\LaravelTable\Filters\Concerns;

trait HasView
{
    protected string $view;

    public function view(string $view): static
    {
        $this->view = $view;

        return $this;
    }

    public function getView(): string
    {
        return $this->view;
    }
}
