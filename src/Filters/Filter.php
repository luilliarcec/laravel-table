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
    use Concerns\BelongToTable;
    use Concerns\EvaluatesClosures;
    use Concerns\HasView;
    use Concerns\HasId;
    use Concerns\HasName;
    use Concerns\HasLabel;

    protected string $filter;

    final public function __construct(string $name)
    {
        $this->name($name);

        $this->filter = config('query-builder.parameters.filter');
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

    public function getValue(): ?string
    {
        return request($this->filter.'.'.$this->getName());
    }

    public function getFilterName(): string
    {
        return sprintf('%s[%s]', $this->filter, $this->getName());
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
