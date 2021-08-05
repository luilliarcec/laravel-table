<div>
    <form action="">
        <div class="flex flex-wrap space-x-4 justify-end md:justify-between mb-5">
            @if($hasFilters())
                @isset($filters)
                    {{ $filters }}
                @else
                    <x-table::filters
                        class="mt-2"
                        :filters="$table->getFilters()->all()"
                    />
                @endisset
            @endif

            @if($table->hasGlobalSearch())
                @isset($globalSearch)
                    {{ $globalSearch }}
                @else
                    <div class="flex-grow">
                        <x-table::global-search class="mt-2"/>
                    </div>
                @endisset
            @endif

            @if($hasColumns())
                @isset($columns)
                    {{ $columns }}
                @else
                    <x-table::columns
                        class="mt-2"
                        :columns="$table->getColumns()->all()"
                    />
                @endisset
            @endif

            @if ($table->hasActionButton())
                @isset($actionButton)
                    {{ $actionButton }}
                @else
                    <button type="submit"
                            class="inline-flex items-center mt-2 py-2 px-4 border border-gray-300 shadow-sm hover:shadow font-semibold rounded-md text-sm text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring focus:ring-gray-100 disabled:opacity-50 active:bg-white leading-5 transition">
                        <x-table::icons.trigger class="text-gray-400"/>
                    </button>
                @endisset
            @endif
        </div>

        @isset($actions)
            <div class="flex flex-wrap space-x-4 justify-end md:justify-between mb-5">
                {{ $actions }}
            </div>
        @endisset
    </form>

    <x-table::table-wrapper>
        <table class="min-w-full divide-y divide-gray-200 bg-white">
            <thead class="bg-gray-100">
            {{ $head }}
            </thead>

            <tbody class="bg-white divide-y divide-gray-200">
            {{ $body }}
            </tbody>
        </table>

        @if (method_exists($meta, 'links'))
            <div class="m-4">
                {{ $meta->links() }}
            </div>
        @endif
    </x-table::table-wrapper>
</div>
