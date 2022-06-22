@props([
    'actions' => [],
    'description' => null,
    'title',
])

<div {{ $attributes->class(['px-4 py-2 filament-tables-header']) }}>
    <div class="flex flex-col gap-4 md:justify-between md:items-start md:flex-row md:-mr-2">
        <div>
            @if ($title)
                <x-tables::header.title>
                    {{ $title }}
                </x-tables::header.title>
            @endif

            @if ($description)
                <x-tables::header.description>
                    {{ $description }}
                </x-tables::header.description>
            @endif
        </div>

        <x-tables::actions :actions="$actions" class="shrink-0"/>
    </div>
</div>
