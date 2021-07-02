@if($show())
    <th {{ $attributes->merge(['class' => 'px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"']) }}>
        @if ($sortable)
            <a
                href="{{ $url() }}"
                class="flex flex-row items-center font-bold"
                style="text-decoration: none; color: currentColor"
            >
                {{ $slot }}

                <svg
                    aria-hidden="true"
                    class="w-3 h-3 ml-2"
                    style="height: 0.75rem; width: 0.75rem"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 320 512"
                >
                    @if ($order === 'asc')
                        <path
                            fill="currentColor"
                            d="M279 224H41c-21.4 0-32.1-25.9-17-41L143 64c9.4-9.4 24.6-9.4 33.9 0l119 119c15.2 15.1 4.5 41-16.9 41z"
                        />
                    @elseif ($order === 'desc')
                        <path
                            fill="currentColor"
                            d="M41 288h238c21.4 0 32.1 25.9 17 41L177 448c-9.4 9.4-24.6 9.4-33.9 0L24 329c-15.1-15.1-4.4-41 17-41z"
                        />
                    @else
                        <path
                            fill="currentColor"
                            d="M41 288h238c21.4 0 32.1 25.9 17 41L177 448c-9.4 9.4-24.6 9.4-33.9 0L24 329c-15.1-15.1-4.4-41 17-41zm255-105L177 64c-9.4-9.4-24.6-9.4-33.9 0L24 183c-15.1 15.1-4.4 41 17 41h238c21.4 0 32.1-25.9 17-41z"
                        />
                    @endif
                </svg>
            </a>
        @else
            {{ $slot }}
        @endif
    </th>
@endif
