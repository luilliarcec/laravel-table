@props([
    'actions' => null,
    'description' => null,
    'icon' => null,
    'heading',
])

<div {{ $attributes->class([
    'flex flex-1 flex-col items-center justify-center p-6 mx-auto space-y-6 text-center bg-white',
    'dark:bg-gray-800' => config('tables.dark_mode'),
]) }}>
    <div @class([
        'flex items-center justify-center w-16 h-16 text-primary-500 rounded-full bg-primary-50',
        'dark:bg-gray-700' => config('tables.dark_mode'),
    ])>
        @if ($icon)
            <x-dynamic-component :component="$icon" class="w-6 h-6"/>
        @else
            <svg
                class="mx-auto h-12 w-12 text-gray-400"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                aria-hidden="true"
            >
                <path vector-effect="non-scaling-stroke"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"
                />
            </svg>
        @endif
    </div>

    <div class="max-w-xs space-y-1">
        <h2 @class([
            'text-xl font-bold tracking-tight',
            'dark:text-white' => config('tables.dark_mode'),
        ])>
            {{ $heading }}
        </h2>

        @if ($description)
            <p @class([
                'text-sm font-medium text-gray-500',
                'dark:text-gray-400' => config('tables.dark_mode'),
            ])>
                {{ $description }}
            </p>
        @endif
    </div>

{{--    @if ($actions)--}}
{{--        <x-tables::actions :actions="$actions" class="justify-center"/>--}}
{{--    @endif--}}
</div>
