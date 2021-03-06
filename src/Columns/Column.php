<?php

namespace Luilliarcec\LaravelTable\Columns;

use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Traits;
use Illuminate\View\Component;

class Column extends Component implements Htmlable
{
    use Traits\Conditionable;
    use Traits\Macroable;
    use Traits\Tappable;
    use Concerns\EvaluatesClosures;
    use Concerns\HasExtraAttributes;
    use Concerns\HasExtraHeaderAttributes;
    use Concerns\HasRelationships;
    use Concerns\CanBeSortable;
    use Concerns\CanBeSearchable;
    use Concerns\CanBeHidden;
    use Concerns\CanOpenUrl;
    use Concerns\HasView;
    use Concerns\HasName;
    use Concerns\HasLabel;
    use Concerns\HasAlignment;
    use Concerns\HasRecord;
    use Concerns\HasState;
    use Concerns\HasTooltip;

    final public function __construct(string $name)
    {
        $this->name($name);
    }

    public static function make(string $name): static
    {
        $static = app(static::class, compact('name'));
        $static->setUp();

        return $static;
    }

    protected function setUp(): void
    {
    }

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
