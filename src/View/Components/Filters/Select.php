<?php

namespace Luilliarcec\LaravelTable\View\Components\Filters;

class Select extends Field
{
    /**
     * Check the selected option
     *
     * @param $key
     * @return bool
     */
    public function isSelected($key): bool
    {
        return $key == request('filter.' . $this->filter->key);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return "components.$this->theme.filters.select";
    }
}
