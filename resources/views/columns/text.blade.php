<div
    {{ $attributes->merge($getExtraAttributes())->class([
        'px-4 py-3',
        'text-primary-600 transition hover:underline hover:text-primary-500 focus:underline focus:text-primary-500' => $getUrl(),
        'whitespace-normal' => $canWrap(),
    ]) }}
>
    {{ $getFormattedState() }}
</div>
