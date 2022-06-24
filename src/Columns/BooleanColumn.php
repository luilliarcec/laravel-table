<?php

namespace Luilliarcec\LaravelTable\Columns;

use Closure;

class BooleanColumn extends Column
{
    protected string $view = 'tables::columns.boolean';

    protected string $type = 'icon';
    protected string|Closure|null $falseColor = null;
    protected string|Closure|null $falseValue = null;
    protected string|Closure|null $trueColor = null;
    protected string|Closure|null $trueValue = null;

    public function text(): static
    {
        $this->type = 'text';

        return $this;
    }

    public function isTypeText(): bool
    {
        return $this->type === 'text';
    }

    public function false(string|Closure|null $value = null, string|Closure|null $color = null): static
    {
        $this->falseValue($value);
        $this->falseColor($color);

        return $this;
    }

    public function falseColor(string|Closure|null $color): static
    {
        $this->falseColor = $color;

        return $this;
    }

    public function falseValue(string|Closure|null $value): static
    {
        $this->falseValue = $value;

        return $this;
    }

    public function true(string|Closure|null $value = null, string|Closure|null $color = null): static
    {
        $this->trueValue($value);
        $this->trueColor($color);

        return $this;
    }

    public function trueColor(string|Closure|null $color): static
    {
        $this->trueColor = $color;

        return $this;
    }

    public function trueValue(string|Closure|null $value): static
    {
        $this->trueValue = $value;

        return $this;
    }

    public function getFalseColor(): ?string
    {
        return $this->evaluate($this->falseColor);
    }

    public function getFalseValue(): ?string
    {
        return $this->evaluate($this->falseValue);
    }

    public function getStateColor(): ?string
    {
        $state = $this->getState();

        if ($state === null) {
            return null;
        }

        return $state ? $this->getTrueColor() : $this->getFalseColor();
    }

    public function getStateValue(): ?string
    {
        $state = $this->getState();

        if ($state === null) {
            return null;
        }

        return $state ? $this->getTrueValue() : $this->getFalseValue();
    }

    public function getTrueColor(): ?string
    {
        return $this->evaluate($this->trueColor);
    }

    public function getTrueValue(): ?string
    {
        return $this->evaluate($this->trueValue);
    }
}
