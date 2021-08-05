<x-table::tailwind.dropdown {{ $attributes }}>
    <x-slot name="trigger">
        <x-table::icons.colums class="text-gray-400"/>
    </x-slot>

    <x-slot name="content">
        <ul class="px-4 py-3 divide-y divide-gray-200">
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
    </x-slot>
</x-table::tailwind.dropdown>
