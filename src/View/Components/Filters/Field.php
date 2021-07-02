<?php

namespace Luilliarcec\LaravelTable\View\Components\Filters;

use Luilliarcec\LaravelTable\View\Components\Component;

abstract class Field extends Component
{
    /**
     * Filter object.
     *
     * @var object
     */
    public $filter;

    /**
     * Field constructor.
     *
     * @param object $filter
     */
    public function __construct(object $filter)
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
     * @return ?string
     */
    public function value(): ?string
    {
        return request('filter.' . $this->filter->key);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public abstract function render();
}
