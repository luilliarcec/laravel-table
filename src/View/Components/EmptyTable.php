<?php

namespace Luilliarcec\LaravelTable\View\Components;

class EmptyTable extends Component
{
    /** @var string */
    public $emptyText;

    /** @var string */
    public $buttonText;

    /** @var string */
    public $link;

    public function __construct(?string $emptyText = null, ?string $buttonText = null, ?string $link = null)
    {
        parent::__construct();
        $this->emptyText = $emptyText;
        $this->buttonText = $buttonText;
        $this->link = $link;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return "table::components.$this->theme.empty";
    }
}
