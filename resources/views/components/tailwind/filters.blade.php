<div>
    <div class="relative">
        <button
            type="button"
            onclick="dropdown(event, 'filters-dropdown')"
            {{ $attributes->merge(['class' => 'inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm hover:shadow font-semibold rounded-md text-sm text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring focus:ring-gray-100 disabled:opacity-50 active:bg-white leading-5 transition']) }}
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
