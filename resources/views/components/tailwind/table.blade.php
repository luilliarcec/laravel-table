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
                    <x-table::action-button/>
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
