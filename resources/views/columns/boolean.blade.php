@php
    $isText = $isTypeText();

    $state = $getState();
    $stateColor = $getStateColor() ?? ($state ? 'success' : 'danger');
    $stateColor = match ($stateColor) {
        'danger' => 'text-danger-500',
        'primary' => 'text-primary-500',
        'success' => 'text-success-500',
        'warning' => 'text-warning-500',
        default => 'text-gray-700',
    };
@endphp

<div {{ $attributes->merge($getExtraAttributes())->class(['px-4 py-3']) }}>
    @if ($state !== null)
        @if($isText)
            <span class="{{ $stateColor }}">
                {{ $getStateValue() ?? ($state ? __('Yes') : __('No')) }}
            </span>
        @else
            <x-dynamic-component
                :component="$getStateValue() ?? ($state ? 'heroicon-o-check-circle' : 'heroicon-o-x-circle')"
                :class="'w-6 h-6' . ' ' . $stateColor"
            />
        @endif
    @endif
</div>
