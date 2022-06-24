@php
    $tableName = $getName();

    /**
     * @var \Illuminate\Support\Collection|\Illuminate\Contracts\Pagination\Paginator $records
     */
    $records = $getRecords();

    $hasPagination = $isPaginationEnabled();

    $hasFilters = $isFilterable();
    $hasInputSearch = $isSearchable();

    $header = $getHeader();
    $heading = $getHeading();
    $headerActions = $getHeaderActions();
    $isHeaderVisible = ($header || $heading || $headerActions || $hasFilters);
@endphp

<x-tables::table.container :table-name="$tableName">
    @if($isHeaderVisible)
        <div>
            @if ($header)
                {{ $header }}
            @elseif ($heading || $headerActions)
                <div class="px-2 pt-2 space-y-2">
                    <x-tables::header :actions="$headerActions">
                        <x-slot name="heading">
                            {{ $heading }}
                        </x-slot>

                        <x-slot name="description">
                            {{ $getDescription() }}
                        </x-slot>
                    </x-tables::header>
                </div>
            @endif

            @if($hasInputSearch || $hasFilters)
                <div class="flex items-center justify-between p-2 h-14">
                    <div></div>

                    @if ($hasInputSearch || $hasFilters)
                        <div class="w-full flex items-center justify-end gap-2 md:max-w-md">
                            @if ($hasInputSearch)
                                <div class="flex-1">
                                    <x-tables::search-input
                                        :table-name="$tableName"
                                    />
                                </div>
                            @endif

                            @if ($hasFilters)
                                <x-tables::filters
                                    :filters="$getFilters()"
                                    :width="$getFiltersFormWidth()"
                                    class="shrink-0"
                                />
                            @endif
                        </div>
                    @endif
                </div>
            @endif
        </div>
    @endif

    <div
        @class([
            'overflow-y-auto relative',
            'dark:border-gray-700' => config('tables.dark_mode'),
            'rounded-b-xl' => ! $hasPagination,
        ])
    >
        @if ($records->count())
            <x-tables::table>
                <x-slot:header>
                    WIP
                </x-slot:header>
            </x-tables::table>
        @else
            <x-tables::table.empty :icon="$getEmptyStateIcon()" :actions="$getEmptyStateActions()">
                <x-slot:heading>
                    {{ $getEmptyStateHeading() }}
                </x-slot:heading>

                <x-slot:description>
                    {{ $getEmptyStateDescription() }}
                </x-slot:description>
            </x-tables::table.empty>
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
