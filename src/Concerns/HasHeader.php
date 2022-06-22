<?php

namespace Luilliarcec\LaravelTable\Concerns;

use Closure;
use Illuminate\Contracts\View\View;

trait HasHeader
{
    protected ?View $header = null;
    protected array $headerActions = [];
    protected string|Closure|null $heading = null;
    protected ?string $description = null;

    public function header(?View $view): static
    {
        $this->header = $view;

        return $this;
    }

    public function getHeader(): ?View
    {
        return $this->header;
    }

    public function headerActions(array $actions): static
    {
        $this->headerActions = $actions;

        return $this;
    }

    public function getHeaderActions(): array
    {
        return $this->headerActions;
    }

    public function heading(string|Closure|null $heading): static
    {
        $this->heading = $heading;

        return $this;
    }

    public function getHeading(): ?string
    {
        return value($this->heading);
    }

    public function description(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }
}
