@props([
    'tableName'
])

<div {{ $attributes->class([
    'border border-gray-300 shadow-sm bg-white rounded-xl',
    'dark:bg-gray-800 dark:border-gray-700' => config('tables.dark_mode'),
]) }}>
    <form id="{{ $tableName }}">
        {{ $slot }}
    </form>
</div>
