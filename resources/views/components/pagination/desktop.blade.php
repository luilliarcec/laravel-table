@props([
    'tableName',
    'paginator',
    'elements',
    'previousArrowIcon',
    'nextArrowIcon',
    'recordsPerPageSelectOptions'
])

<div class="hidden flex-1 items-center lg:grid grid-cols-3">
    <div class="flex items-center">
        <div @class([
            'pl-2 text-sm font-medium',
            'dark:text-white' => config('tables.dark_mode'),
        ])>
            @if ($paginator->total() > 1)
                {{ __('tables::table.pagination.overview', [
                    'first' => $paginator->firstItem(),
                    'last' => $paginator->lastItem(),
                    'total' => $paginator->total(),
                ]) }}
            @endif
        </div>
    </div>

    <div class="flex items-center justify-center">
        <x-tables::pagination.records-per-page-selector
            :table-name="$tableName"
            :selected="$paginator->perPage()"
            :options="$recordsPerPageSelectOptions"
        />
    </div>

    <div class="flex items-center justify-end">
        <div @class([
            'py-3 border rounded-lg',
            'dark:border-gray-600' => config('tables.dark_mode'),
        ])>
            <ol @class([
                'flex items-center text-sm text-gray-500 divide-x divide-gray-300',
                'dark:text-gray-400' => config('tables.dark_mode'),
            ])>
                @if (! $paginator->onFirstPage())
                    <x-tables::pagination.item
                        :href="$paginator->previousPageUrl()"
                        :icon="$previousArrowIcon"
                        aria-label="{{ __('tables::table.pagination.buttons.previous.label') }}"
                        rel="prev"
                    />
                @endif

                @foreach ($elements as $element)
                    @if (is_string($element))
                        <x-tables::pagination.item :label="$element" disabled/>
                    @endif

                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            <x-tables::pagination.item
                                :href="$url"
                                :label="$page"
                                :aria-label="__('tables::table.pagination.buttons.go_to_page.label', ['page' => $page])"
                                :active="$page === $paginator->currentPage()"
                            />
                        @endforeach
                    @endif
                @endforeach

                @if ($paginator->hasMorePages())
                    <x-tables::pagination.item
                        :href="$paginator->nextPageUrl()"
                        :icon="$nextArrowIcon"
                        aria-label="{{ __('tables::table.pagination.buttons.next.label') }}"
                        rel="next"
                    />
                @endif
            </ol>
        </div>
    </div>
</div>
