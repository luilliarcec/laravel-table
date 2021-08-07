<?php

namespace Luilliarcec\LaravelTable\View\Components;

use Illuminate\Support\Arr;

class Th extends Component
{
    /**
     * Column Key.
     *
     * @var string
     */
    public $columnKey;

    /**
     * @var bool
     */
    public $sortable;

    /**
     * @var bool
     */
    public $static;

    /**
     * @var string|null
     */
    public $order = null;

    /**
     * @var string|null
     */
    private $sort = null;

    /**
     * Td constructor.
     *
     * @param string|null $columnKey
     * @param bool $sortable
     * @param bool $static
     */
    public function __construct(?string $columnKey = null, bool $sortable = false, bool $static = false)
    {
        parent::__construct();

        $this->columnKey = $columnKey;
        $this->sortable = $sortable;
        $this->static = $static;

        if ($this->columnKey && $this->sortable) {
            $this->order = $this->order($columnKey);
            $this->sort = $this->sort($this->order);
        }
    }

    /**
     * Determine order sort.
     *
     * @param string $columnKey
     * @return string|null
     */
    private function order(string $columnKey): ?string
    {
        $sort = request('sort');

        if ($columnKey === $sort) return 'asc';
        if ("-$columnKey" === $sort) return 'desc';

        return null;
    }

    /**
     * Sort direction column.
     *
     * @param ?string $order
     * @return string|null
     */
    private function sort(?string $order): ?string
    {
        if ($order === 'asc') return "-$this->columnKey";
        if ($order === 'desc') return null;

        return $this->columnKey;
    }

    /**
     * Build URL.
     *
     * @return string
     */
    public function url(): string
    {
        $query = request()->query();

        return sprintf(
            '%s?%s',
            url()->current(),
            Arr::query(
                array_merge($query, ['sort' => $this->sort])
            )
        );
    }

    /**
     * Check show column
     *
     * @return bool
     */
    public function show(): bool
    {
        if (empty(request('columns', []))) {
            return true;
        }

        return $this->static
            || is_null($this->columnKey)
            || in_array($this->columnKey, request('columns', []));
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return "table::components.$this->theme.th";
    }
}
