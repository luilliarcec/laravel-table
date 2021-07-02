<div>
    <form action="">
        <div class="row justify-content-end justify-content-md-between mb-3">
            @if($hasFilters())
                <x-filters
                    :filters="$table->filters"
                />
            @endif

            @if($hasGlobalSearch())
                <x-global-search/>
            @endif

            @if($hasColumns())
                <x-columns
                    :columns="$table->columns"
                />
            @endif

            <div class="col-4 col-md-2 mt-2">
                <button type="submit" class="btn btn-dark w-100">
                    <x-icons.trigger/>
                </button>
            </div>
        </div>
    </form>

    <x-table-wrapper>
        <table class="table table-hover">
            <thead>
            {{ $head }}
            </thead>
            <tbody>
            {{ $body }}
            </tbody>
        </table>

        {{ $meta->links() }}
    </x-table-wrapper>
</div>
