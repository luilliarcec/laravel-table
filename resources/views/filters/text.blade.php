@php
    $datalistOptions = $getDatalistOptions();
    $tableName = $getTable()->getName();
    $sideLabelClasses = [
        'whitespace-nowrap group-focus-within:text-primary-500',
    ];
@endphp

<x-tables::fields
    :id="$getId()"
    :label="$getLabel()"
    :label-sr-only="$isLabelHidden()"
    :helper-text="$getHelperText()"
    :hint="$getHint()"
    :hint-icon="$getHintIcon()"
>
    <div {{ $attributes->merge($getExtraAttributes())->class(['flex items-center space-x-1 rtl:space-x-reverse group']) }}>
        @if ($prefix = $getPrefixLabel())
            <span @class($sideLabelClasses)>
                {{ $prefix }}
            </span>
        @endif

        <div class="flex-1">
            <input type="text"
            >
        </div>

        @if ($suffix = $getSuffixLabel())
            <span @class($sideLabelClasses)>
                {{ $suffix }}
            </span>
        @endif
    </div>

    @if ($datalistOptions)
        <datalist id="{{ $getId() }}-list">
            @foreach ($datalistOptions as $option)
                <option value="{{ $option }}"/>
            @endforeach
        </datalist>
    @endif
</x-tables::fields>
