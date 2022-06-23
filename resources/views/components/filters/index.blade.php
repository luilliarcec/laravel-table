@props([
    'filters',
    'width' => 'sm',
])

<div
    x-data="{ isOpen: false }"
    {{ $attributes->class(['relative inline-block filament-tables-filters']) }}
>
    <x-components::icon-button
        icon="heroicon-o-filter"
        x-on:click="isOpen = ! isOpen"
        :label="__('tables::table.buttons.filter.label')"
        :dark-mode="config('tables.dark_mode')"
    />

    <div
        x-show="isOpen"
        x-cloak
        x-on:click.away="isOpen = false"
        x-transition:enter="ease duration-300"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="ease duration-300"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-2"
        @class([
            'absolute right-0 z-10 w-screen pl-12 mt-2 top-full transition rtl:right-auto rtl:left-0 rtl:pl-0 rtl:pr-12',
            match ($width) {
                'xs' => 'max-w-xs',
                'md' => 'max-w-md',
                'lg' => 'max-w-lg',
                'xl' => 'max-w-xl',
                '2xl' => 'max-w-2xl',
                '3xl' => 'max-w-3xl',
                '4xl' => 'max-w-4xl',
                '5xl' => 'max-w-5xl',
                '6xl' => 'max-w-6xl',
                '7xl' => 'max-w-7xl',
                default => 'max-w-sm',
            },
        ])
    >
        <div @class([
            'px-6 py-4 bg-white space-y-6 shadow-xl rounded-xl',
            'dark:bg-gray-700' => config('tables.dark_mode'),
        ])>
            <x-components::icon-button
                icon="heroicon-o-x"
                x-on:click="isOpen = ! isOpen"
                color="secondary"
                {{ $attributes->class(['absolute top-3 right-3 rtl:right-auto rtl:left-3']) }}
                :dark-mode="config('tables.dark_mode')"
            />

            @foreach($filters as $filter)
                {{ $filter }}

                @unless($loop->last)
                    <hr @class([
                        '-mx-6 border-t border-gray-300',
                        'dark:border-gray-800/[.50]' => config('tables.dark_mode'),
                    ])>
                @endunless
            @endforeach

            <div class="text-right">
                <x-components::link
                    :href="request()->url()"
                    color="danger"
                    class="text-sm font-medium"
                    :dark-mode="config('tables.dark_mode')"
                >
                    {{ __('tables::table.filters.buttons.reset.label') }}
                </x-components::link>
            </div>
        </div>
    </div>
</div>
