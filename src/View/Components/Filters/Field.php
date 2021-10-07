<?php

namespace Luilliarcec\LaravelTable\View\Components\Filters;

use Luilliarcec\LaravelTable\Support\Filter;
use Luilliarcec\LaravelTable\View\Components\Component;

abstract class Field extends Component
{
    /**
     * Filter object.
     *
     * @var Filter
     */
    public $filter;

    /**
     * Field constructor.
     *
     * @param Filter $filter
     */
    public function __construct(Filter $filter)
    {
        parent::__construct();

        $this->filter = $filter;
    }

    /**
     * Field name.
     *
     * @return string
     */
    public function name(): string
    {
        return sprintf('filter[%s]', $this->filter->key);
    }

    /**
     * Field value.
     *
     * @return mixed
     */
    public function value()
    {
        return request()->get('filter')[$this->filter->key] ?? null;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public abstract function render();
}
