<?php

namespace Luilliarcec\LaravelTable\Concerns;

trait HasPagination
{
    protected array $recordsPerPageSelectOptions = [5, 10, 15, 30, 50, 75, 100];

    protected ?string $paginationView;

    public function recordsPerPageSelectOptions(array $options): static
    {
        $this->recordsPerPageSelectOptions = $options;

        return $this;
    }

    public function getRecordsPerPageSelectOptions(): array
    {
        return $this->recordsPerPageSelectOptions;
    }

    public function paginationView(string $view): static
    {
        $this->paginationView = $view;

        return $this;
    }

    public function getPaginationView(): string
    {
        return $this->paginationView ?? config('tables.layout.default_pagination_view');
    }

    public function isPaginationEnabled(): bool
    {
        return method_exists($this->getRecords(), 'links') && $this->getRecords()->count();
    }
}
