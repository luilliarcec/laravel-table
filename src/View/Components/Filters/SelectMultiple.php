<?php

namespace Luilliarcec\LaravelTable\View\Components\Filters;

class SelectMultiple extends Field
{
    /**
     * Field name.
     *
     * @return string
     */
    public function name(): string
    {
        return sprintf('filter[%s][]', $this->filter->key);
    }

    /**
     * Check the selected option
     *
     * @param $key
     * @return bool
     */
    public function isSelected($key): bool
    {
        return in_array($key, request('filter.' . $this->filter->key, []));
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return "table::components.$this->theme.filters.select-multiple";
    }
}
