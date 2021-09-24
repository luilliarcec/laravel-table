<x-table::tailwind.dropdown align="left" {{ $attributes }}>
    <x-slot name="trigger">
        <x-table::icons.filters class="text-gray-400"/>
    </x-slot>

    <x-slot name="content">
        <ul>
            @foreach($filters as $filter)
                <li>
                    <h3 class="text-xs uppercase tracking-wide bg-gray-100 p-3">
                        {{ $filter->label }}
                    </h3>

                    <div class="p-2">
                        @if($filter->type === \Luilliarcec\LaravelTable\Support\Filter::SELECT)
                            <x-table-filters.select :filter="$filter"/>
                        @elseif($filter->type === \Luilliarcec\LaravelTable\Support\Filter::TEXT)
                            <x-table-filters.text :filter="$filter"/>
                        @elseif($filter->type === \Luilliarcec\LaravelTable\Support\Filter::DATE)
                            <x-table-filters.date :filter="$filter"/>
                        @elseif($filter->type === \Luilliarcec\LaravelTable\Support\Filter::DATE_RANGE)
                            <x-table-filters.date-range :filter="$filter"/>
                        @elseif($filter->type === \Luilliarcec\LaravelTable\Support\Filter::CHECKBOX)
                            <x-table-filters.checkbox :filter="$filter"/>
                        @elseif($filter->type === \Luilliarcec\LaravelTable\Support\Filter::SELECT_MULTIPLE)
                            <x-table-filters.select-multiple :filter="$filter"/>
                        @endif
                    </div>
                </li>
            @endforeach

            <li>
                <h3 class="text-xs uppercase tracking-wide bg-gray-100 p-3">
                    {{ __('Filters') }}
                </h3>

                <div class="p-2">
                    <a class="text-gray-400 decoration-none px-2"
                       href="{{ request()->url() }}">
                        {{ __('Clear filters') }}
                    </a>
                </div>
            </li>
        </ul>
    </x-slot>
</x-table::tailwind.dropdown>
