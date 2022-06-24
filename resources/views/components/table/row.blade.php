@props([
    'recordUrl' => null,
])

<tr
    {{
        $attributes->class([
            'hover:bg-primary-500/5 dark:hover:bg-primary-500/5' => $recordUrl,
            'blade-tables-row',
        ])
    }}
>
    {{ $slot }}
</tr>
