<div class="col-3 col-md-1 mt-2">
    <div class="dropdown">
        <button
            type="button"
            class="btn btn-dark dropdown-toggle"
            data-bs-toggle="dropdown"
            aria-expanded="false"
        >
            <x-icons.filters/>
        </button>

        <ul class="dropdown-menu shadow py-0 mt-3" style="min-width: 280px">
            @foreach($filters as $filter)
                <li>
                    <div class="rounded-top px-0 py-0">
                        <p class="px-3 py-2 mb-0 fw-light text-uppercase bg-light rounded-top" style="font-size: 14px">
                            {{ $filter->label }}
                        </p>

                        <div class="p-2">
                            @if($filter->type === \App\Support\Filter::SELECT)
                                <x-filters.select :filter="$filter"/>
                            @elseif($filter->type === \App\Support\Filter::TEXT)
                                <x-filters.text :filter="$filter"/>
                            @elseif($filter->type === \App\Support\Filter::DATE)
                                <x-filters.date :filter="$filter"/>
                            @elseif($filter->type === \App\Support\Filter::DATE_RANGE)
                                <x-filters.date-range :filter="$filter"/>
                            @elseif($filter->type === \App\Support\Filter::CHECKBOX)
                                <x-filters.checkbox :filter="$filter"/>
                            @elseif($filter->type === \App\Support\Filter::SELECT_MULTIPLE)
                                <x-filters.select-multiple :filter="$filter"/>
                            @endif
                        </div>
                    </div>
                </li>
            @endforeach

            <li>
                <div class="rounded-top px-0 py-0">
                    <p class="px-3 py-2 mb-0 fw-light text-uppercase bg-light rounded-top" style="font-size: 14px">
                        {{ __('Filters') }}
                    </p>

                    <div class="p-2">
                        <a class="text-secondary px-2"
                           href="{{ request()->url() }}">
                            {{ __('Clear filters') }}
                        </a>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
