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
            <input
                type="text"
                id="{{ $getId() }}"
                name="{{ $getFilterName() }}"
                value="{{ $getValue() }}"
                x-on:keyup.enter="handleFormFilterSubmit($event, {{ $tableName }})"

                {!! ($inputMode = $getInputMode()) ? "inputmode=\"{$inputMode}\"" : null !!}
                {!! $datalistOptions ? "list=\"{$getId()}-list\"" : null !!}

                {!! ($placeholder = $getPlaceholder()) ? "placeholder=\"{$placeholder}\"" : null !!}
                {{ $getExtraInputAttributeBag()->class([
                    'block w-full border-gray-300 transition duration-75 rounded-lg shadow-sm focus:border-primary-600 focus:ring-1 focus:ring-inset focus:ring-primary-600 disabled:opacity-70',
                    'dark:bg-gray-700 dark:text-white dark:border-gray-600' => config('tables.dark_mode'),
                ]) }}
            />
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
