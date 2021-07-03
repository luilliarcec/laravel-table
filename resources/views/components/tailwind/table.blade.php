<div>
    <form action="" class="mb-6">
        <div class="flex flex-wrap space-x-4 justify-end md:justify-between">
            @if($hasFilters())
                <x-table::filters
                    class="mt-2"
                    :filters="$table->filters"
                />
            @endif

            @if($hasGlobalSearch())
                <div class="flex-grow">
                    <x-table::global-search class="mt-2"/>
                </div>
            @endif

            @if($hasColumns())
                <x-table::columns
                    class="mt-2"
                    :columns="$table->columns"
                />
            @endif

            <button type="submit"
                    class="inline-flex mt-2 justify-center py-2 px-4 border focus:outline-none disabled:opacity-50 disabled:cursor-default font-semibold leading-6 rounded shadow-sm hover:shadow focus:ring focus:ring-opacity-25 active:shadow-none border-gray-300 bg-white text-gray-800 hover:text-gray-800 hover:border-gray-300 focus:ring-gray-300 active:bg-white active:border-white">
                <x-table::icons.trigger class="text-gray-400"/>
            </button>
        </div>
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

        <div class="m-4">
            {{ $meta->links() }}
        </div>
    </x-table::table-wrapper>
</div>
