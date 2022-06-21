@php
    $tableName = $getName();

    /**
     * @var \Illuminate\Support\Collection|\Illuminate\Contracts\Pagination\Paginator $records
     */
    $records = $getRecords();
@endphp

<x-tables::table.container :table-name="$tableName">
    <div
        @class([
            'overflow-y-auto relative',
            'dark:border-gray-700' => config('tables.dark_mode'),
        ])
    >
        @if ($records->count())
            Table
        @else
            Table empty
        @endif
    </div>
</x-tables::table.container>
