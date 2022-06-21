@php
    $tableName = $getName();

    /**
     * @var \Illuminate\Support\Collection|\Illuminate\Contracts\Pagination\Paginator $records
     */
    $records = $getRecords();

    $hasPagination = $isPaginationEnabled();
@endphp

<x-tables::table.container :table-name="$tableName">
    <div
        @class([
            'overflow-y-auto relative',
            'dark:border-gray-700' => config('tables.dark_mode'),
            'rounded-b-xl' => ! $hasPagination,
        ])
    >
        @if ($records->count())
            Table
        @else
            Table empty
        @endif
    </div>

    @if($hasPagination)
        <div @class([
            'p-2 border-t',
            'dark:border-gray-700' => config('tables.dark_mode'),
        ])>
            {{
                $records->links($getPaginationView(), [
                    'recordsPerPageSelectOptions' => $getRecordsPerPageSelectOptions(),
                    'tableName' => $tableName,
                ])
            }}
        </div>
    @endif
</x-tables::table.container>
