<?php

namespace Luilliarcec\LaravelTable\Columns;

class BadgeColumn extends TextColumn
{
    use Concerns\HasColors;
    use Concerns\HasIcons;

    protected string $view = 'tables::columns.badge';
}
