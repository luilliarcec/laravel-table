@props([
    'tableName',
    'paginator',
    'previousArrowIcon',
    'nextArrowIcon',
    'recordsPerPageSelectOptions'
])

<div class="flex justify-between items-center flex-1 lg:hidden">
    <div class="w-10">
        @if (!$paginator->onFirstPage())
            <x-components::icon-button
                tag="a"
                :href="$paginator->previousPageUrl()"
                rel="prev"
                :icon="$previousArrowIcon"
                :label="__('tables::table.pagination.buttons.previous.label')"
                :dark-mode="config('tables.dark_mode')"
            />
        @endif
    </div>

    <x-tables::pagination.records-per-page-selector
        :table-name="$tableName"
        :selected="$paginator->perPage()"
        :options="$recordsPerPageSelectOptions"
    />

    <div class="w-10">
        @if ($paginator->hasMorePages())
            <x-components::icon-button
                tag="a"
                :href="$paginator->nextPageUrl()"
                rel="next"
                :icon="$nextArrowIcon"
                :label="__('tables::table.pagination.buttons.next.label')"
                :dark-mode="config('tables.dark_mode')"
            />
        @endif
    </div>
</div>
