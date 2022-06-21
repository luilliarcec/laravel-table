<?php

namespace Luilliarcec\LaravelTable\Concerns;

trait HasEmptyState
{
    protected ?string $emptyStateHeading = null;
    protected ?string $emptyStateDescription = null;
    protected ?string $emptyStateIcon = null;
    protected array|null $emptyStateActions = [];

    public function emptyStateHeading(?string $heading): static
    {
        $this->emptyStateHeading = $heading;

        return $this;
    }

    public function emptyStateDescription(?string $description): static
    {
        $this->emptyStateDescription = $description;

        return $this;
    }

    public function emptyStateIcon(?string $icon): static
    {
        $this->emptyStateIcon = $icon;

        return $this;
    }

    public function emptyStateActions(array $actions): static
    {
        $this->emptyStateActions = $actions;

        return $this;
    }

    public function getEmptyStateDescription(): ?string
    {
        return $this->emptyStateDescription;
    }

    public function getEmptyStateHeading(): string
    {
        return $this->emptyStateHeading ?? __('tables::table.empty.heading');
    }

    public function getEmptyStateIcon(): ?string
    {
        return $this->emptyStateIcon;
    }

    public function getEmptyStateActions(): array
    {
        return $this->emptyStateActions;
    }
}
