<?php

use Luilliarcec\LaravelTable\View\Components;

return [
    /** tailwind  / bootstrap4 / bootstrap5 */
    'theme' => 'tailwind',

    'components' => [
        // Filters
        Components\Filters\Text::class => 'filters.text',
        Components\Filters\Date::class => 'filters.date',
        Components\Filters\DateRange::class => 'filters.date-range',
        Components\Filters\Checkbox::class => 'filters.checkbox',
        Components\Filters\Select::class => 'filters.select',
        Components\Filters\SelectMultiple::class => 'filters.select-multiple',

        // Tables
        Components\Table::class => 'table',
        Components\EmptyTable::class => 'empty-table',
        Components\TableWrapper::class => 'table-wrapper',
        Components\Td::class => 'td',
        Components\Th::class => 'th',
        Components\GlobalSearch::class => 'global-search',
        Components\Filters::class => 'filters',
        Components\Columns::class => 'columns',
        Components\ActionButton::class => 'action-button',

        // Assets
        Components\Scripts::class => 'scripts',
        Components\Styles::class => 'styles',
    ]
];
