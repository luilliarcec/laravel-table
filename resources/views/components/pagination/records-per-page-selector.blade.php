@props([
    'selected',
    'options',
    'tableName',
])

<div class="flex items-center space-x-2 rtl:space-x-reverse">
    <select
        x-data="{}"
        id="tableRecordsPerPageSelect"
        name="per_page"
        x-on:change="handleFormFilterSubmit($event, {{ $tableName }})"
        @class([
            'h-8 text-sm pr-8 leading-none transition duration-75 border-gray-200 rounded-lg shadow-sm focus:border-primary-600 focus:ring-1 focus:ring-inset focus:ring-primary-600',
            'dark:text-white dark:bg-gray-700 dark:border-gray-600' => config('tables.dark_mode'),
        ])
    >
        @foreach ($options as $option)
            <option
                value="{{ $option }}"
                @if($selected == $option) selected @endif
            >
                {{ $option }}
            </option>
        @endforeach
    </select>

    <label for="tableRecordsPerPageSelect" @class([
        'text-sm font-medium',
        'dark:text-white' => config('tables.dark_mode'),
    ])>
        {{ __('tables::table.pagination.fields.records_per_page.label') }}
    </label>
</div>
