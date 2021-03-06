<?php

return [
    'dark_mode' => false,

    'default_filesystem_disk' => env('TABLES_FILESYSTEM_DRIVER', 'public'),

    'layout' => [
        'action_alignment' => 'right',
        'default_pagination_view' => 'tables::components.pagination.index'
    ],

    'formats' => [
        'date' => 'M j, Y',
        'datetime' => 'M j, Y H:i:s',
        'time' => 'H:i:s',
    ],
];
