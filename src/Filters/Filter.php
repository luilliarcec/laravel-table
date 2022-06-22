<?php

namespace Luilliarcec\LaravelTable\Filters;

use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Traits;
use Illuminate\View\Component;

class Filter extends Component implements Htmlable
{
    use Traits\Conditionable;
    use Traits\Macroable;
    use Traits\Tappable;
    use Concerns\EvaluatesClosures;
    use Concerns\HasView;
    use Concerns\HasName;
    use Concerns\HasLabel;

    public function toHtml(): string
    {
        return $this->render()->render();
    }

    public function render(): View
    {
        $data = array_merge($this->data(), [
            'column' => $this,
        ]);

        return view($this->getView(), $data);
    }
}
