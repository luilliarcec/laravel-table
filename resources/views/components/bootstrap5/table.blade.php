<div>
    <form action="">
        <div class="row justify-content-end justify-content-md-between mb-3">
            @if($hasFilters())
                @isset($filters)
                    {{ $filters }}
                @else
                    <x-table::filters
                        :filters="$table->getFilters()->all()"
                    />
                @endisset
            @endif

            @if($table->hasGlobalSearch())
                @isset($globalSearch)
                    {{ $globalSearch }}
                @else
                    <x-table::global-search/>
                @endisset
            @endif

            @if($hasColumns())
                @isset($columns)
                    {{ $columns }}
                @else
                    <x-table::columns
                        :columns="$table->getColumns()->all()"
                    />
                @endisset
            @endif

            @if ($table->hasActionButton())
                @isset($actionButton)
                    {{ $actionButton }}
                @else
                    <div class="col-4 col-md-2 mt-2">
                        <button type="submit" class="btn btn-dark w-100">
                            <x-table::icons.trigger/>
                        </button>
                    </div>
                @endisset
            @endif
        </div>

        @isset($actions)
            <div class="row justify-content-end justify-content-md-between mb-3">
                {{ $actions }}
            </div>
        @endisset
    </form>

    <x-table::table-wrapper>
        <table class="table table-hover">
            <thead>
            {{ $head }}
            </thead>
            <tbody>
            {{ $body }}
            </tbody>
        </table>

        @if (method_exists($meta, 'links'))
            {{ $meta->links() }}
        @endif
    </x-table::table-wrapper>
</div>
