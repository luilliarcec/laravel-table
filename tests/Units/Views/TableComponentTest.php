<?php

namespace Luilliarcec\LaravelTable\Tests\Units\Views;

use Illuminate\Support\Collection;
use Luilliarcec\LaravelTable\Tests\TestCase;
use Luilliarcec\LaravelTable\View\Components\Table;

class TableComponentTest extends TestCase
{
    /** @test */
    function check_that_it_throws_exception_when_an_invalid_table_argument_is_received()
    {
        $this->expectException(\TypeError::class);
        $this->expectExceptionMessage('Argument 2 passed to Luilliarcec\LaravelTable\View\Components\Table::__construct() must be an instance of Luilliarcec\LaravelTable\Support\BladeTable, null given');

        $this->component(Table::class, [
            'meta' => new Collection(),
            'table' => null
        ]);
    }
}
