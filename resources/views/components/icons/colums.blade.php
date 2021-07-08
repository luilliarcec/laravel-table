@props(['height' => '1.25rem', 'width' => '1.25rem'])

<svg xmlns="http://www.w3.org/2000/svg"
     {{ $attributes->merge(['class' => 'text-white']) }}
     style="height: {{ $height }}; width: {{ $width }}"
     viewBox="0 0 20 20"
     fill="currentColor">
    <path
        d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"
    />
</svg>
