<?php

namespace Luilliarcec\LaravelTable\Actions;

use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Traits;
use Illuminate\View\Component;

class Action extends Component implements Htmlable
{
    use Traits\Conditionable;
    use Traits\Macroable;
    use Traits\Tappable;

    public function toHtml(): string
    {
        return $this->render()->render();
    }

    public function render(): View
    {
        $data = array_merge($this->data(), [
            'action' => $this,
        ]);

        return view($this->getView(), $data);
    }
}
