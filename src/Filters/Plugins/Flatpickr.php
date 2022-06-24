<?php

namespace Luilliarcec\LaravelTable\Filters\Plugins;

use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Support\Carbon;

class Flatpickr implements Jsonable
{
    protected bool $enableTime = false;
    protected bool $noCalendar = false;
    protected bool $altInput = false;
    protected bool $time24hr = false;
    protected bool $inline = false;
    protected bool $weekNumbers = false;
    protected ?string $dateFormat = null;
    protected ?string $altFormat = null;
    protected ?string $minDate = null;
    protected ?string $maxDate = null;
    protected ?string $minTime = null;
    protected ?string $maxTime = null;
    protected ?string $locale = null;
    protected array $disable = [];
    protected array $enable = [];
    protected ?string $mode = null;
    protected string|array|null $defaultDate = null;
    protected ?string $conjunction = null;
    protected ?string $jsonOptions = null;

    final public function __construct()
    {
        $this->locale = config('app.locale');
    }

    public function enableTime(bool $condition = true): static
    {
        $this->enableTime = $condition;

        return $this;
    }

    public function noCalendar(bool $condition = true): static
    {
        $this->noCalendar = $condition;

        return $this;
    }

    public function dateFormat(string $dateFormat): static
    {
        $this->dateFormat = $dateFormat;

        return $this;
    }

    public function altInput(bool $condition = true): static
    {
        $this->altInput = $condition;

        return $this;
    }

    public function time24hr(bool $condition = true): static
    {
        $this->time24hr = $condition;

        return $this;
    }

    public function inline(bool $condition = true): static
    {
        $this->inline = $condition;

        return $this;
    }

    public function weekNumbers(bool $condition = true): static
    {
        $this->weekNumbers = $condition;

        return $this;
    }

    public function altFormat(string $altFormat): static
    {
        $this->altFormat = $altFormat;

        return $this;
    }

    public function minDate(string|Carbon $minDate, string $format = 'Y-m-d'): static
    {
        if ($minDate instanceof Carbon) {
            $this->minDate = $minDate->format($format);
        } else {
            $this->minDate = $minDate;
        }

        return $this;
    }

    public function maxDate(string|Carbon $maxDate, string $format = 'Y-m-d'): static
    {
        if ($maxDate instanceof Carbon) {
            $this->maxDate = $maxDate->format($format);
        } else {
            $this->maxDate = $maxDate;
        }

        return $this;
    }

    public function minTime(string|Carbon $minTime, string $format = 'H:i:s'): static
    {
        if ($minTime instanceof Carbon) {
            $this->minTime = $minTime->format($format);
        } else {
            $this->minTime = $minTime;
        }

        return $this;
    }

    public function maxTime(string|Carbon $maxTime, string $format = 'H:i:s'): static
    {
        if ($maxTime instanceof Carbon) {
            $this->maxTime = $maxTime->format($format);
        } else {
            $this->maxTime = $maxTime;
        }

        return $this;
    }

    public function locale(string $locale): static
    {
        $this->locale = $locale;

        return $this;
    }

    public function disable(array $disable): static
    {
        $this->disable = $disable;

        return $this;
    }

    public function enable(array $disable): static
    {
        $this->disable = $disable;

        return $this;
    }

    public function mode(string $mode): static
    {
        $this->mode = $mode;

        return $this;
    }

    public function defaultDate(string|array $defaultDate): static
    {
        $this->defaultDate = $defaultDate;

        return $this;
    }

    public function conjunction(string $conjunction): static
    {
        $this->conjunction = $conjunction;

        return $this;
    }

    public function jsonOptions(?string $json = null): static
    {
        $this->jsonOptions = $json;

        return $this;
    }

    public function multiple(): static
    {
        $this->mode = 'multiple';

        return $this;
    }

    public function range(): static
    {
        $this->mode = 'range';

        return $this;
    }

    protected function getArrayableConfiguration(): array
    {
        $configuration = [];

        if ($this->enableTime) {
            $configuration['enableTime'] = true;
        }

        if ($this->noCalendar) {
            $configuration['noCalendar'] = true;
        }

        if ($this->altInput) {
            $configuration['altInput'] = true;
        }

        if ($this->time24hr) {
            $configuration['time_24hr'] = true;
        }

        if ($this->inline) {
            $configuration['inline'] = true;
        }

        if ($this->weekNumbers) {
            $configuration['weekNumbers'] = true;
        }

        if ($this->dateFormat !== null) {
            $configuration['dateFormat'] = $this->dateFormat;
        }

        if ($this->altFormat !== null) {
            $configuration['dateFormat'] = $this->altFormat;
        }

        if ($this->minDate !== null) {
            $configuration['minDate'] = $this->minDate;
        }

        if ($this->maxDate !== null) {
            $configuration['maxDate'] = $this->maxDate;
        }

        if ($this->minTime !== null) {
            $configuration['minTime'] = $this->minTime;
        }

        if ($this->maxTime !== null) {
            $configuration['maxTime'] = $this->maxTime;
        }

        if ($this->locale !== null) {
            $configuration['locale'] = $this->locale;
        }

        if ($this->disable !== []) {
            $configuration['disable'] = $this->disable;
        }

        if ($this->enable !== []) {
            $configuration['disable'] = $this->disable;
        }

        if ($this->mode !== null) {
            $configuration['mode'] = $this->mode;
        }

        if ($this->defaultDate !== null) {
            $configuration['defaultDate'] = $this->defaultDate;
        }

        if ($this->conjunction !== null) {
            $configuration['conjunction'] = $this->conjunction;
        }

        return $configuration;
    }

    public function toJson($options = 0): string
    {
        if (filled($this->jsonOptions)) {
            return $this->jsonOptions;
        }

        $json = json_encode($this->getArrayableConfiguration(), JSON_UNESCAPED_SLASHES | $options);

        return str_replace(
            [
                '"{{ ',
                ' }}"',
            ],
            '',
            $json,
        );
    }
}
