@php
    $tag = $getUrl() ? 'a' : 'button';
    $type = 'button';
    $href = $isEnabled() ? $getUrl() : null;
    $target = $shouldOpenUrlInNewTab() ? '_blank' : null;
    $color = $getColor() ?: 'primary';
    $size = $getSize() ?: 'sm';
    $icon = $getIcon();
    $iconPosition = $getIconPosition() ?: 'before';
    $tooltip = $getTooltip();
    $disabled = $isDisabled();
    $outlined = $isOutlined();
    $darkMode = config('tables.dark_mode');

    $buttonClasses = array_merge([
        'inline-flex items-center justify-center gap-1 font-medium rounded-lg border transition-colors focus:outline-none focus:ring-offset-2 focus:ring-2 focus:ring-inset filament-button',
        'dark:focus:ring-offset-0' => $darkMode,
        'opacity-70 cursor-not-allowed pointer-events-none' => $disabled,
        'h-9 px-4 text-sm' => $size === 'md',
        'h-8 px-3 text-sm' => $size === 'sm',
        'h-11 px-6 text-lg' => $size === 'lg',
    ], $outlined ? [
        'shadow focus:ring-white' => $color !== 'secondary',
        'text-primary-600 border-primary-600 hover:bg-primary-600/20 focus:bg-primary-700/20 focus:ring-offset-primary-700' => $color === 'primary',
        'text-success-600 border-success-600 hover:bg-success-600/20 focus:bg-success-700/20 focus:ring-offset-success-700' => $color === 'success',
        'text-danger-600 border-danger-600 hover:bg-danger-600/20 focus:bg-danger-700/20 focus:ring-offset-danger-700' => $color === 'danger',
        'text-warning-600 border-warning-600 hover:bg-warning-600/20 focus:bg-warning-700/20 focus:ring-offset-warning-700' => $color === 'warning',
        'text-gray-600 border-gray-600 hover:bg-gray-600/20 focus:bg-gray-700/20 focus:ring-offset-gray-700' => $color === 'gray',
        'text-gray-800 border-gray-300 hover:bg-gray-50 focus:ring-primary-600 focus:text-primary-600 focus:bg-primary-50 focus:border-primary-600' => $color === 'secondary',
        'dark:text-primary-500 dark:border-primary-500 dark:hover:bg-primary-500/20 dark:focus:bg-primary-600/20 dark:focus:ring-offset-primary-600' => $color === 'primary' && $darkMode,
        'dark:text-success-500 dark:border-success-500 dark:hover:bg-success-500/20 dark:focus:bg-success-600/20 dark:focus:ring-offset-success-600' => $color === 'success' && $darkMode,
        'dark:text-danger-500 dark:border-danger-500 dark:hover:bg-danger-500/20 dark:focus:bg-danger-600/20 dark:focus:ring-offset-danger-600' => $color === 'danger' && $darkMode,
        'dark:text-warning-500 dark:border-warning-500 dark:hover:bg-warning-500/20 dark:focus:bg-warning-600/20 dark:focus:ring-offset-warning-600' => $color === 'warning' && $darkMode,
        'dark:text-gray-400 dark:border-gray-400 dark:hover:bg-gray-400/20 dark:focus:bg-gray-600/20 dark:focus:ring-offset-gray-600' => $color === 'gray' && $darkMode,
        'dark:border-gray-600 dark:hover:border-gray-500 dark:hover:hover:bg-gray-500/20 dark:text-gray-200 dark:focus:text-primary-400 dark:focus:border-primary-400 dark:focus:bg-gray-800/20' => $color === 'secondary' && $darkMode,
    ] : [
        'text-white shadow focus:ring-white border-transparent' => $color !== 'secondary',
        'bg-primary-600 hover:bg-primary-500 focus:bg-primary-700 focus:ring-offset-primary-700' => $color === 'primary',
        'bg-success-600 hover:bg-success-500 focus:bg-success-700 focus:ring-offset-success-700' => $color === 'success',
        'bg-danger-600 hover:bg-danger-500 focus:bg-danger-700 focus:ring-offset-danger-700' => $color === 'danger',
        'bg-warning-600 hover:bg-warning-500 focus:bg-warning-700 focus:ring-offset-warning-700' => $color === 'warning',
        'bg-gray-600 hover:bg-gray-500 focus:bg-gray-700 focus:ring-offset-gray-700' => $color === 'gray',
        'text-gray-800 bg-white border-gray-300 hover:bg-gray-50 focus:ring-primary-600 focus:text-primary-600 focus:bg-primary-50 focus:border-primary-600' => $color === 'secondary',
        'dark:bg-gray-800 dark:border-gray-600 dark:hover:border-gray-500 dark:text-gray-200 dark:focus:text-primary-400 dark:focus:border-primary-400 dark:focus:bg-gray-800' => $color === 'secondary' && $darkMode,
    ]);

    $iconClasses = \Illuminate\Support\Arr::toCssClasses([
        'w-3 h-3' => $size === 'sm',
        'w-4 h-4' => $size === 'md',
        'w-5 h-5' => $size === 'lg',
        'mr-1 -ml-2 rtl:ml-1 rtl:-mr-2' => ($iconPosition === 'before') && ($size === 'md'),
        'mr-2 -ml-3 rtl:ml-2 rtl:-mr-3' => ($iconPosition === 'before') && ($size === 'lg'),
        'mr-1 -ml-1.5 rtl:ml-1 rtl:-mr-1.5' => ($iconPosition === 'before') && ($size === 'sm'),
        'ml-1 -mr-2 rtl:mr-1 rtl:-ml-2' => ($iconPosition === 'after') && ($size === 'md'),
        'ml-2 -mr-3 rtl:mr-2 rtl:-ml-3' => ($iconPosition === 'after') && ($size === 'lg'),
        'ml-1 -mr-1.5 rtl:mr-1 rtl:-ml-1.5' => ($iconPosition === 'after') && ($size === 'sm'),
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

        @if($target)
            target="{{ $target }}"
        @endif
        {{ $attributes->class($buttonClasses) }}
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
        {{ $attributes->class($buttonClasses) }}
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
