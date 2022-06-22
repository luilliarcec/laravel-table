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
    use Concerns\EvaluatesClosures;
    use Concerns\CanOpenUrl;
    use Concerns\CanBeDisabled;
    use Concerns\CanBeOutlined;
    use Concerns\HasView;
    use Concerns\HasName;
    use Concerns\HasLabel;
    use Concerns\HasColor;
    use Concerns\HasIcon;
    use Concerns\HasSize;
    use Concerns\HasTooltip;

    protected string $view = 'tables::actions.link';

    public function button(): static
    {
        $this->view('tables::actions.button');

        return $this;
    }

    public function link(): static
    {
        $this->view('tables::actions.link');

        return $this;
    }

    final public function __construct(string $name)
    {
        $this->name($name);
    }

    public static function make(string $name): static
    {
        $static = app(static::class, ['name' => $name]);
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
            'action' => $this,
        ]);

        return view($this->getView(), $data);
    }
}
