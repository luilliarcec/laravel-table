<div>
    <div class="relative">
        <button
            type="button"
            onclick="dropdown(event, 'columns-dropdown', 'bottom-end')"
            {{ $attributes->merge(['class' => 'inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm hover:shadow font-semibold rounded-md text-sm text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring focus:ring-gray-100 disabled:opacity-50 active:bg-white leading-5 transition']) }}
            aria-expanded="false"
        >
            <x-table::icons.colums class="text-gray-400"/>
        </button>

        <div class="absolute z-10">
            <div id="columns-dropdown"
                 class="hidden mt-2 w-64 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                <!-- Local -->
                <div class="px-4 py-3">
                    <ul class="divide-y divide-gray-200">
                        @foreach($columns as $key => $column)
                            <li class="py-2 flex items-center justify-between">
                                <label
                                    for="column_{{ $key }}"
                                    class="text-sm font-semibold tracking-wide text-gray-900">
                                    {{ $column->label }}
                                </label>

                                <div
                                    class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
                                    <input
                                        type="checkbox"
                                        name="columns[]"
                                        id="column_{{ $key }}"
                                        value="{{ $key }}"
                                        class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-2 border-gray-200 hover:border-gray-200 appearance-none cursor-pointer"
                                        {{ $column->enabled ? 'checked' : '' }}
                                    />

                                    <label
                                        for="column_{{ $key }}"
                                        class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-200 cursor-pointer">
                                    </label>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
