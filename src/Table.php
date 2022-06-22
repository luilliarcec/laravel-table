<?php

namespace Luilliarcec\LaravelTable;

use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Table extends Component implements Htmlable
{
    use Concerns\HasHeader;
    use Concerns\HasName;
    use Concerns\HasRecords;
    use Concerns\HasPagination;
    use Concerns\HasEmptyState;
    use Concerns\HasFilters;

    final public function __construct(string $name)
    {
        $this->name($name);
    }

    public static function make(string $name): static
    {
        return app(static::class, compact('name'));
    }

    public function toHtml(): string
    {
        return $this->render()->render();
    }

    public function render(): View
    {
        $data = array_merge($this->data(), [
            'table' => $this
        ]);

        return view('tables::index', $data);
    }
}
