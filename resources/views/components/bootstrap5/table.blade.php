<div>
    <form action="">
        <div class="row justify-content-end justify-content-md-between mb-3">
            @if($hasFilters())
                <x-table::filters
                    :filters="$table->filters"
                />
            @endif

            @if($hasGlobalSearch())
                <x-table::global-search/>
            @endif

            @if($hasColumns())
                <x-table::columns
                    :columns="$table->columns"
                />
            @endif

            <div class="col-4 col-md-2 mt-2">
                <button type="submit" class="btn btn-dark w-100">
                    <x-table::icons.trigger/>
                </button>
            </div>
        </div>
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

        {{ $meta->links() }}
    </x-table::table-wrapper>
</div>
