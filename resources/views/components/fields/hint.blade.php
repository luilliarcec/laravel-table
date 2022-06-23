@props([
    'icon' => null,
])

<div {{ $attributes->class([
    'flex space-x-2 rtl:space-x-reverse text-gray-500',
    'dark:text-gray-300' => config('tables.dark_mode'),
]) }}>
    @if ($slot->isNotEmpty())
        <span class="text-xs leading-tight">
            {{ $slot }}
        </span>
    @endif

    @if ($icon)
        <x-dynamic-component :component="$icon" class="h-4 w-4" />
    @endif
</div>
