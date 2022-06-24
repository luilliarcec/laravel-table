<?php

namespace Luilliarcec\LaravelTable\Filters;

use Closure;

class SelectFilter extends Filter
{
    protected string $view = 'tables::filters.select';

    protected string|Closure|null $column = null;
    protected bool|Closure $isStatic = false;
    protected bool|Closure|null $isPlaceholderSelectionDisabled = false;

    protected function setUp(): void
    {
        parent::setUp();

        $this->placeholder(__('tables::table.filters.select.placeholder'));
    }

    public function column(string|Closure|null $name): static
    {
        $this->column = $name;

        return $this;
    }

    public function static(bool|Closure $condition = true): static
    {
        $this->isStatic = $condition;

        return $this;
    }

    public function getColumn(): string
    {
        return $this->evaluate($this->column) ?? $this->getName();
    }

    public function disablePlaceholderSelection(bool|Closure $condition = true): static
    {
        $this->isPlaceholderSelectionDisabled = $condition;

        return $this;
    }

    public function isPlaceholderSelectionDisabled(): bool
    {
        return (bool)$this->evaluate($this->isPlaceholderSelectionDisabled);
    }

    public function isSelected($value): bool
    {
        return $value == $this->getValue();
    }
}
