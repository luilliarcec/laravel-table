@php
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
                id="{{ $getId() }}"
                name="{{ $getFilterName() }}"
                value="{{ $getValue() }}"
                @if($hasFlatpickrConfiguration())
                    type="text"
                    x-data="{}"
                    x-ref="flatpickr"
                    x-init="flatpickr($refs.flatpickr, {{ $getJsonFlatpickrConfiguration() }})"
                @else
                    type="{{ $getType() }}"
                @endif

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
</x-tables::fields>
