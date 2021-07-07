<?php

namespace Luilliarcec\LaravelTable\Support;

class Column
{
    /**
     * @var string
     */
    public $key;

    /**
     * @var string
     */
    public $label;

    /**
     * @var bool
     */
    public $enabled;

    /**
     * Column constructor.
     *
     * @param string $key
     * @param string $label
     * @param bool $enabled
     */
    public function __construct(string $key, string $label, bool $enabled = true)
    {
        $this->key = $key;
        $this->label = $label;
        $this->enabled = $enabled;
    }
}
