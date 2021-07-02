<div class="col-3 col-md-1 mt-2">
    <div class="dropdown">
        <button
            type="button"
            class="btn btn-dark dropdown-toggle"
            data-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
        >
            <x-table::icons.colums/>
        </button>

        <ul class="dropdown-menu keep-open shadow py-0 mt-3" style="min-width: 220px">
            @foreach($columns as $key => $column)
                <li>
                    <div class="px-3 py-2">
                        <div class="custom-control custom-switch">
                            <input
                                id="column_{{ $key }}"
                                type="checkbox"
                                class="custom-control-input"
                                name="columns[]"
                                value="{{ $key }}"
                                {{ $column->enabled ? 'checked' : '' }}
                            >

                            <label
                                class="custom-control-label font-weight-bolder"
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
