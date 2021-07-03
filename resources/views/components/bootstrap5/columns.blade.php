<div class="col-3 col-md-1 mt-2">
    <div class="dropdown">
        <button
            type="button"
            {{ $attributes->merge(['class' => 'btn btn-dark dropdown-toggle']) }}
            data-bs-toggle="dropdown"
            aria-expanded="false"
        >
            <x-table::icons.colums/>
        </button>

        <ul class="dropdown-menu shadow py-0 mt-3" style="min-width: 220px">
            @foreach($columns as $key => $column)
                <li>
                    <div class="rounded-top px-3 py-2">
                        <div class="form-check form-switch">
                            <input
                                id="column_{{ $key }}"
                                type="checkbox"
                                class="form-check-input"
                                name="columns[]"
                                value="{{ $key }}"
                                {{ $column->enabled ? 'checked' : '' }}
                            >

                            <label
                                class="form-check-label fw-bolder"
                                for="column_{{ $key }}">
                                {{ $column->label }}
                            </label>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
