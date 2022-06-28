@php
    $tableName = $getName();

    /** @var \Illuminate\Support\Collection|\Luilliarcec\LaravelTable\Columns\Column[] $columns */
    $columns = $getColumns();

    /**  @var \Illuminate\Support\Collection|\Illuminate\Contracts\Pagination\Paginator $records */
    $records = $getRecords();

    /** @var array|\Luilliarcec\Components\Actions\Action[] $actions */
    $actions = $getActions();

    $hasPagination = $isPaginationEnabled();

    $hasFilters = $isFilterable();
    $hasInputSearch = $isTableSearchable();

    $header = $getHeader();
    $heading = $getHeading();
    $headerActions = $getHeaderActions();
    $isHeaderVisible = ($header || $heading || $headerActions || $hasFilters);

    $getHiddenClasses = function (\Luilliarcec\LaravelTable\Columns\Column $column): ?string {
        if ($breakpoint = $column->getHiddenFrom()) {
            return match ($breakpoint) {
                'sm' => 'sm:hidden',
                'md' => 'md:hidden',
                'lg' => 'lg:hidden',
                'xl' => 'xl:hidden',
                '2xl' => '2xl:hidden',
            };
        }

        if ($breakpoint = $column->getVisibleFrom()) {
            return match ($breakpoint) {
                'sm' => 'hidden sm:table-cell',
                'md' => 'hidden md:table-cell',
                'lg' => 'hidden lg:table-cell',
                'xl' => 'hidden xl:table-cell',
                '2xl' => 'hidden 2xl:table-cell',
            };
        }

        return null;
    };
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

                            @unless($hasInputSearch)
                                <x-components::icon-button
                                    type="submit"
                                    icon="heroicon-o-search"
                                    :dark-mode="config('tables.dark_mode')"
                                />
                            @endunless

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
            'rounded-t-xl' => ! $isHeaderVisible,
            'rounded-b-xl' => ! $hasPagination,
            'border-t' => $isHeaderVisible,
        ])
    >
        @if ($records->count())
            <x-tables::table>
                <x-slot:header>
                    @foreach($columns as $column)
                        <x-tables::table.th
                            :name="$column->getName()"
                            :class="$getHiddenClasses($column)"
                            :extra-attributes="$column->getExtraHeaderAttributes()"
                            :sortable="$column->isSortable()"
                            :sort-direction="$column->isSortable() ? $column->getSortDirection() : null"
                            :sort-url="$column->isSortable() ? $column->getSortUrl() : null"
                            :alignment="$column->getAlignment()"
                        >
                            {{ $column->getLabel() }}
                        </x-tables::table.th>
                    @endforeach

                    @if (count($actions))
                        <th class="w-5"></th>
                    @endif
                </x-slot:header>

                @foreach($records as $record)
                    <x-tables::table.row>
                        @foreach ($columns as $column)
                            @php
                                $column->record($record);
                            @endphp

                            <x-tables::table.td
                                :name="$column->getName()"
                                :alignment="$column->getAlignment()"
                                :tooltip="$column->getTooltip()"
                                :should-open-url-in-new-tab="$column->shouldOpenUrlInNewTab()"
                                :url="$column->getUrl()"
                                :class="$getHiddenClasses($column)"
                            >
                                {{ $column }}
                            </x-tables::table.td>
                        @endforeach

                        @if (count($actions))
                            <x-tables::table.td.actions :actions="$actions" :record="$record"/>
                        @endif
                    </x-tables::table.row>
                @endforeach
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
