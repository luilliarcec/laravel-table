<?php

namespace Luilliarcec\LaravelTable\Filters;

use Closure;
use Luilliarcec\LaravelTable\Filters\Plugins\Flatpickr;

class DateTimePickerFilter extends Filter
{
    protected string $view = 'tables::filters.datetime-picker';

    protected string|null $type = 'date';
    protected ?Closure $configureFlatpickrUsing = null;

    public function getType(): string
    {
        return $this->type;
    }

    public function date(): static
    {
        $this->type = 'date';

        return $this;
    }

    public function time(): static
    {
        $this->type = 'time';

        return $this;
    }

    public function datetime(): static
    {
        $this->type = 'datetime-local';

        return $this;
    }

    public function month(): static
    {
        $this->type = 'month';

        return $this;
    }

    public function week(): static
    {
        $this->type = 'week';

        return $this;
    }

    public function flatpickr(?Closure $configuration): static
    {
        $this->configureFlatpickrUsing = $configuration;

        return $this;
    }

    public function getFlatpickr(): ?Flatpickr
    {
        if (!$this->hasFlatpickrConfiguration()) {
            return null;
        }

        return $this->evaluate($this->configureFlatpickrUsing, [
            'flatpickr' => app(Flatpickr::class),
        ]);
    }

    public function getJsonFlatpickrConfiguration(): ?string
    {
        return $this->getFlatpickr()?->toJson();
    }

    public function hasFlatpickrConfiguration(): bool
    {
        return $this->configureFlatpickrUsing !== null;
    }
}
