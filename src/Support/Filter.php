<?php

namespace Luilliarcec\LaravelTable\Support;

use Illuminate\Support\Arr;

class Filter
{
    public const TEXT = 'text';
    public const SELECT = 'select';
    public const SELECT_MULTIPLE = 'select-multiple';
    public const DATE = 'date';
    public const DATE_RANGE = 'date-range';
    public const CHECKBOX = 'checkbox';

    public $key;
    public $label;
    public $type;
    public $options;
    public $value;

    /**
     * Filters constructor.
     *
     * @param string $key
     * @param string $label
     * @param string $type
     * @param array $options
     */
    public function __construct(string $key, string $label, string $type, array $options = [])
    {
        $this->key = $key;
        $this->label = $label;
        $this->type = $type;
        $this->options = $options;
        $this->value = request()->get('filter')[$key] ?? null;

        if (in_array($type, [self::TEXT, self::DATE, self::DATE_RANGE])) {
            $this->options = [];
        }

        if ($type === self::SELECT) {
            $this->options = Arr::prepend($options, '-', '');
        }
    }

    /**
     * Build filter.
     *
     * @param string $key
     * @param string $label
     * @param string $type
     * @param array $options
     * @return Filter
     */
    public static function build(string $key, string $label, string $type, array $options = []): Filter
    {
        return new self($key, $label, $type, $options);
    }
}
