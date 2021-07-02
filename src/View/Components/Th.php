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
     * Show column
     *
     * @var bool
     */
    private $show;

    /**
     * @var bool
     */
    public $sortable;

    /**
     * @var string|null
     */
    public $order;

    /**
     * @var string|null
     */
    private $sort;

    /**
     * Td constructor.
     *
     * @param string $columnKey
     * @param bool $show
     * @param bool $sortable
     */
    public function __construct(string $columnKey, bool $show = false, bool $sortable = false)
    {
        parent::__construct();

        $this->columnKey = $columnKey;
        $this->show = $show;
        $this->sortable = $sortable;
        $this->order = $this->order($columnKey);
        $this->sort = $this->sort($this->order);
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

        if ($columnKey === $sort) {
            return 'asc';
        } elseif ("-$columnKey" === $sort) {
            return 'desc';
        } else {
            return null;
        }
    }

    /**
     * Sort direction column.
     *
     * @param ?string $order
     * @return string|null
     */
    private function sort(?string $order): ?string
    {
        if ($order === 'asc') {
            return "-$this->columnKey";
        } elseif ($order === 'desc') {
            return null;
        } else {
            return $this->columnKey;
        }
    }

    /**
     * Build URL.
     *
     * @return string
     */
    public function url(): string
    {
        $query = request()->query();

        return sprintf('%s?%s',
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

        return $this->show ?: in_array($this->columnKey, request('columns', []));
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
