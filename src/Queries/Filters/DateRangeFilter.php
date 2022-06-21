<?php

namespace Luilliarcec\LaravelTable\Queries\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Spatie\QueryBuilder\Filters\Filter;

class DateRangeFilter implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {
        $value = is_array($value)
            ? collect($value)
            : Str::of($value)->explode(__('to'))->map(fn($item) => trim($item));

        if (!$this->isAValidDate($value)) {
            return;
        }

        $column = $query->qualifyColumn($property);

        $query->whereBetween($column, [
            $value->first(),
            $value->last()
        ]);
    }

    protected function isAValidDate(Collection $value): bool
    {
        if ($value->isEmpty() || $value->count() !== 2) {
            return false;
        }

        return Carbon::hasFormat($value->first(), 'Y-m-d') &&
            Carbon::hasFormat($value->last(), 'Y-m-d');
    }
}
