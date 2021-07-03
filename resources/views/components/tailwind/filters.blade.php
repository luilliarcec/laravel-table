<div>
    <div class="relative">
        <button
            type="button"
            onclick="dropdown(event, 'filters-dropdown')"
            {{ $attributes->merge(['class' => 'w-full inline-flex justify-center py-2 px-4 border focus:outline-none disabled:opacity-50 disabled:cursor-default font-semibold leading-6 rounded shadow-sm hover:shadow focus:ring focus:ring-opacity-25 active:shadow-none border-gray-300 bg-white text-gray-800 hover:text-gray-800 hover:border-gray-300 focus:ring-gray-300 active:bg-white active:border-white ease-linear transition-all duration-150']) }}
            aria-expanded="false"
        >
            <x-table::icons.filters class="text-gray-400"/>
        </button>

        <div class="absolute z-10">
            <div id="filters-dropdown"
                 class="hidden mt-2 w-64 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                @foreach($filters as $filter)
                    <div>
                        <h3 class="text-xs uppercase tracking-wide bg-gray-100 p-3">
                            {{ $filter->label }}
                        </h3>

                        <div class="p-2">
                            @if($filter->type === \Luilliarcec\LaravelTable\Support\Filter::SELECT)
                                <x-table::filters.select :filter="$filter"/>
                            @elseif($filter->type === \Luilliarcec\LaravelTable\Support\Filter::TEXT)
                                <x-table::filters.text :filter="$filter"/>
                            @elseif($filter->type === \Luilliarcec\LaravelTable\Support\Filter::DATE)
                                <x-table::filters.date :filter="$filter"/>
                            @elseif($filter->type === \Luilliarcec\LaravelTable\Support\Filter::DATE_RANGE)
                                <x-table::filters.date-range :filter="$filter"/>
                            @elseif($filter->type === \Luilliarcec\LaravelTable\Support\Filter::CHECKBOX)
                                <x-table::filters.checkbox :filter="$filter"/>
                            @elseif($filter->type === \Luilliarcec\LaravelTable\Support\Filter::SELECT_MULTIPLE)
                                <x-table::filters.select-multiple :filter="$filter"/>
                            @endif
                        </div>
                    </div>
                @endforeach

                <div>
                    <h3 class="text-xs uppercase tracking-wide bg-gray-100 p-3">
                        {{ __('Filters') }}
                    </h3>

                    <div class="p-2">
                        <a class="text-gray-400 decoration-none px-2"
                           href="{{ request()->url() }}">
                            {{ __('Clear filters') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
