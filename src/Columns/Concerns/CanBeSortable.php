<?php

namespace Luilliarcec\LaravelTable\Columns\Concerns;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;

trait CanBeSortable
{
    protected bool $isSortable = false;
    protected string $sortName;
    protected ?string $sortDirection;
    protected array $sortRequest;
    protected string $parameter;

    public function sortable(bool|string $condition = true): static
    {
        if (is_string($condition)) {
            $this->isSortable = true;
            $this->sortName = $condition;
        } else {
            $this->isSortable = $condition;
            $this->sortName = $this->getDefaultSortName();
        }

        $this->parameter = config('query-builder.parameters.sort');
        $this->sortDirection = $this->evaluateSortDirection();

        return $this;
    }

    protected function getDefaultSortName(): string
    {
        return Str::of($this->getName())->afterLast('.');
    }

    public function evaluateSortDirection(): ?string
    {
        $this->sortRequest = $this->getSortRequest();

        if (is_numeric($key = array_search($this->sortName, $this->sortRequest))) {
            $this->sortRequest[$key] = '-'.$this->sortName;

            return 'asc';
        }

        if (is_numeric($key = array_search('-'.$this->sortName, $this->sortRequest))) {
            unset($this->sortRequest[$key]);

            return 'desc';
        }

        $this->sortRequest[] = $this->sortName;

        return null;
    }

    protected function getSortRequest(): array
    {
        return is_null(request($this->parameter))
            ? []
            : explode(',', request($this->parameter));
    }

    public function getSortName(): string
    {
        return $this->sortName;
    }

    public function isSortable(): bool
    {
        return $this->isSortable;
    }

    public function getSortUrl(): ?string
    {
        $query = request()->query();

        $query = Arr::query(
            array_merge($query, [$this->parameter => implode(',', $this->sortRequest)])
        );

        return sprintf('%s?%s', url()->current(), $query);
    }

    public function getSortDirection(): ?string
    {
        return $this->sortDirection;
    }
}
