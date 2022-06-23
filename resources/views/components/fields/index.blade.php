@props([
    'id',
    'label' => null,
    'labelPrefix' => null,
    'labelSuffix' => null,
    'helperText' => null,
    'hint' => null,
    'hintIcon' => null,
])

<div>
    <div class="space-y-2">
        @if($label || $labelPrefix || $labelSuffix || $hint)
            <div class="flex items-center justify-between space-x-2 rtl:space-x-reverse">
                @if ($label)
                    <x-tables::fields.label
                        :for="$id"
                        :prefix="$labelPrefix"
                        :suffix="$labelSuffix"
                    >
                        {{ $label }}
                    </x-tables::fields.label>
                @elseif ($labelPrefix)
                    {{ $labelPrefix }}
                @elseif ($labelSuffix)
                    {{ $labelSuffix }}
                @endif

                @if ($hint || $hintIcon)
                    <x-tables::fields.hint :icon="$hintIcon">
                        {!! filled($hint) ? \Illuminate\Support\Str::markdown($hint) : null !!}
                    </x-tables::fields.hint>
                @endif
            </div>
        @endif

        {{ $slot }}

        @if ($helperText)
            <x-tables::fields.helper>
                {!! \Illuminate\Support\Str::markdown($helperText) !!}
            </x-tables::fields.helper>
        @endif
    </div>
</div>
