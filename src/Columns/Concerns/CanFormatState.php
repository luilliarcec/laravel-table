<?php

namespace Luilliarcec\LaravelTable\Columns\Concerns;

use Closure;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Carbon;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;
use Luilliarcec\LaravelTable\Columns\Column;

trait CanFormatState
{
    protected ?Closure $formatStateUsing = null;

    public function date(?string $format = null, ?string $timezone = null): static
    {
        $format ??= config('tables.formats.date');

        $timezone ??= config('app.timezone');

        $this->formatStateUsing(
            fn($state): ?string => $state ? Carbon::parse($state)->setTimezone($timezone)->translatedFormat(
                $format
            ) : null
        );

        return $this;
    }

    public function dateTime(?string $format = null, ?string $timezone = null): static
    {
        $format ??= config('tables.formats.datetime');

        $this->date($format, $timezone);

        return $this;
    }

    public function enum(array|Arrayable $options, $default = null): static
    {
        $this->formatStateUsing(fn($state): ?string => $options[$state] ?? ($default ?? $state));

        return $this;
    }

    public function limit(int $length = 100, string $end = '...'): static
    {
        $this->formatStateUsing(function ($state) use ($length, $end): ?string {
            if (blank($state)) {
                return null;
            }

            return Str::limit($state, $length, $end);
        });

        return $this;
    }

    public function html(): static
    {
        return $this->formatStateUsing(fn($state): HtmlString => new HtmlString($state));
    }

    public function formatStateUsing(?Closure $callback): static
    {
        $this->formatStateUsing = $callback;

        return $this;
    }

    public function money(string|Closure $currency = 'usd', bool $shouldConvert = false): static
    {
        $this->formatStateUsing(function (Column $column, $state) use ($currency, $shouldConvert): ?string {
            if (blank($state)) {
                return null;
            }

            return (new Money\Money(
                $state,
                (new Money\Currency(strtoupper($column->evaluate($currency)))),
                $shouldConvert,
            ))->format();
        });

        return $this;
    }

    public function time(?string $format = null, ?string $timezone = null): static
    {
        $format ??= config('tables.formats.time');

        $this->date($format, $timezone);

        return $this;
    }

    public function getFormattedState()
    {
        $state = $this->getState();

        if ($this->formatStateUsing) {
            $state = $this->evaluate($this->formatStateUsing, [
                'state' => $state,
            ]);
        }

        return $state;
    }
}
