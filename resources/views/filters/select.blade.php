@php
    $tableName = $getTable()->getName();
    $sideLabelClasses = [
        'whitespace-nowrap group-focus-within:text-primary-500 text-gray-400',
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
    <div {{ $attributes->merge($getExtraAttributes())->class(['flex items-center space-x-1 group']) }}>
        @if ($label = $getPrefixLabel())
            <span @class($sideLabelClasses)>
                {{ $label }}
            </span>
        @endif

        <div class="flex-1 min-w-0">
            <select
                id="{{ $getId() }}"
                name="{{ $getFilterName() }}"
                x-on:change="handleFormFilterSubmit($event, {{ $tableName }})"
                {!! $isAutofocused() ? 'autofocus' : null !!}
                {{ $attributes->merge($getExtraInputAttributes())->merge($getExtraAttributes())->class([
                    'text-gray-900 block w-full transition duration-75 rounded-lg shadow-sm focus:border-primary-600 focus:ring-1 focus:ring-inset focus:ring-primary-600 disabled:opacity-70 border-gray-300',
                    'dark:bg-gray-700 dark:text-white dark:border-gray-600' => config('tables.dark_mode'),
                ]) }}
            >
                @unless ($isPlaceholderSelectionDisabled())
                    <option value="">{{ $getPlaceholder() }}</option>
                @endif

                @foreach ($getOptions() as $value => $label)
                    <option
                        value="{{ $value }}"
                        {!! $isSelected($value) ? 'selected' : null !!}
                    >
                        {{ $label }}
                    </option>
                @endforeach
            </select>
        </div>

        @if ($label = $getPostfixLabel())
            <span @class($sideLabelClasses)>
                {{ $label }}
            </span>
        @endif
    </div>
</x-tables::fields>
