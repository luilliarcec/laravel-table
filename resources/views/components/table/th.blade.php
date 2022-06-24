@props([
    'name',
    'sortDirection',
    'sortUrl',
    'extraAttributes' => [],
    'sortable' => false,
    'alignment' => null,
])

@php
    $headerClasses = [
        'flex items-center w-full px-4 py-2 whitespace-nowrap space-x-1 rtl:space-x-reverse font-bold text-sm text-gray-600',
        'dark:text-gray-300' => config('tables.dark_mode'),
        'cursor-default' => ! $sortable,
        match ($alignment) {
            'left' => 'justify-start',
            'center' => 'justify-center',
            'right' => 'justify-end',
            default => null,
        },
    ]
@endphp

<th {{ $attributes->merge($extraAttributes)->class(['p-0 blade-tables-header-cell']) }}>
    @if ($sortable)
        <a href="{{ $sortUrl }}" @class($headerClasses)>
            <span>
                {{ $slot }}
            </span>

            <span @class([
                'relative flex items-center',
                'dark:text-gray-300' => config('tables.dark_mode'),
            ])>
                {{--style="height: 0.75rem; width: 0.75rem"--}}
                @if ($sortDirection === 'asc')
                    <x-heroicon-s-chevron-up class="w-4 h-4 ml-2"/>
                @elseif ($sortDirection === 'desc')
                    <x-heroicon-s-chevron-down class="w-4 h-4 ml-2"/>
                @else
                    <x-heroicon-s-selector class="w-4 h-4 ml-2"/>
                @endif
            </span>
        </a>
    @else
        <span @class($headerClasses)>
            {{ $slot }}
        </span>
    @endif
</th>
