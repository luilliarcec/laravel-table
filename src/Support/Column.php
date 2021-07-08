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
     * @var array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\Request|string|null
     */
    private $request;

    /**
     * Column constructor.
     *
     * @param string $key
     * @param string $label
     */
    public function __construct(string $key, string $label)
    {
        $this->request = request();
        $this->key = $key;
        $this->label = $label;
        $this->enabled = $this->isEnabled($key);
    }

    /**
     * Check if the column is enabled
     *
     * @param string $key
     * @return bool
     */
    private function isEnabled(string $key): bool
    {
        $columns = $this->request->query('columns');

        if (!empty($columns)) {
            return in_array($key, $columns);
        }

        return true;
    }
}
