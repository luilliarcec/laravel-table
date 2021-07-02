<?php

namespace Luilliarcec\LaravelTable\Facades;

use Illuminate\Support\Facades\Facade;
use Luilliarcec\LaravelTable\Support\BladeTable;

/**
 * @method static BladeTable disableGlobalSearch()
 * @method static BladeTable addColumn(string $key, string $label)
 * @method static BladeTable addColumns(array $columns = [])
 * @method static BladeTable addFilter(string $key, string $label, string $type, array $options = [])
 * @method static BladeTable build()
 *
 * @see UsernameGenerator
 */
class Table extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return BladeTable::class;
    }
}
