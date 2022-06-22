@php
    $tag = $getUrl() ? 'a' : 'button';
    $type = 'button';
    $href = $isEnabled() ? $getUrl() : null;
    $color = $getColor() ?: 'primary';
    $size = $getSize() ?: 'sm';
    $icon = $getIcon();
    $iconPosition = $getIconPosition() ?: 'before';
    $tooltip = $getTooltip();
    $disabled = $isDisabled();
    $outlined = $isOutlined();
    $darkMode = config('tables.dark_mode');

    $linkClasses = [
        'inline-flex items-center justify-center hover:underline focus:outline-none focus:underline',
        'opacity-70 cursor-not-allowed' => $disabled,
        'text-sm' => $size === 'sm',
        'text-lg' => $size === 'lg',
        'text-primary-600 hover:text-primary-500' => $color === 'primary',
        'text-danger-600 hover:text-danger-500' => $color === 'danger',
        'text-gray-600 hover:text-gray-500' => $color === 'secondary',
        'text-success-600 hover:text-success-500' => $color === 'success',
        'text-warning-600 hover:text-warning-500' => $color === 'warning',
        'dark:text-primary-500 dark:hover:text-primary-400' => $color === 'primary' && $darkMode,
        'dark:text-danger-500 dark:hover:text-danger-400' => $color === 'danger' && $darkMode,
        'dark:text-gray-500 dark:hover:text-gray-400' => $color === 'secondary' && $darkMode,
        'dark:text-success-500 dark:hover:text-success-400' => $color === 'success' && $darkMode,
        'dark:text-warning-500 dark:hover:text-warning-400' => $color === 'warning' && $darkMode,
    ];

    $iconClasses = \Illuminate\Support\Arr::toCssClasses([
        'w-3 h-3' => $size === 'sm',
        'w-4 h-4' => $size === 'md',
        'w-5 h-5' => $size === 'lg',
        'mr-1 -ml-2 rtl:ml-1 rtl:-mr-2' => $iconPosition === 'before',
        'ml-1 -mr-2 rtl:mr-1 rtl:-ml-2' => $iconPosition === 'after',
    ]);
@endphp

@if ($tag === 'a')
    <a
        @if ($tooltip)
            x-data="{}"
            x-tooltip.raw="{{ $tooltip }}"
        @endif

        @if($href)
            href="{{ $href }}"
        @endif
        {{ $attributes->class($linkClasses) }}
    >
        @if ($icon && $iconPosition === 'before')
            <x-dynamic-component :component="$icon" :class="$iconClasses"/>
        @endif

        {{ $getLabel() }}

        @if ($icon && $iconPosition === 'after')
            <x-dynamic-component :component="$icon" :class="$iconClasses"/>
        @endif
    </a>
@elseif ($tag === 'button')
    <button
        @if ($tooltip)
            x-data="{}"
            x-tooltip.raw="{{ $tooltip }}"
        @endif
        type="{{ $type }}"
        {!! $disabled ? 'disabled' : '' !!}
        {{ $attributes->class($linkClasses) }}
    >
        @if ($icon && $iconPosition === 'before')
            <x-dynamic-component :component="$icon" :class="$iconClasses"/>
        @endif

        {{ $getLabel() }}

        @if ($icon && $iconPosition === 'after')
            <x-dynamic-component :component="$icon" :class="$iconClasses"/>
        @endif
    </button>
@endif
