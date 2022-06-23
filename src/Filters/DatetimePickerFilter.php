<?php

namespace Luilliarcec\LaravelTable\Filters;

use Closure;
use Luilliarcec\LaravelTable\Filters\Plugins\Flatpickr;

class DatetimePickerFilter extends Filter
{
    protected string $view = 'tables::filters.datetime-picker';

    protected string|Closure|null $type = null;
    protected ?Closure $configureFlatpickrUsing = null;

    public function type(string|Closure|null $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getType(): string
    {
        return $this->evaluate($this->type) ?? 'text';
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
