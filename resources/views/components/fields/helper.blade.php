<div {{ $attributes->class([
    'text-sm text-gray-600',
    'dark:text-gray-300' => config('tables.dark_mode'),
]) }}>
    {{ $slot }}
</div>
