<tr>
    <td class="py-10" colspan="100%">
        <div class="text-center">
            <svg style="width: 3rem; height: 3rem; margin-right: auto; margin-left: auto; color: #9CA3AF"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke="currentColor"
                 aria-hidden="true"
            >
                <path vector-effect="non-scaling-stroke"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"/>
            </svg>

            <p class="mt-3" style="color: #9CA3AF">
                {{ $emptyText ?: __('No results match the given criteria.') }}
            </p>

            @isset($link)
                <div class="mt-6">
                    <a href="{{ $link }}"
                       class="btn btn-outline-dark">

                        <!-- Heroicon name: solid/plus -->
                        <svg style="width: 1.25rem; height: 1.25rem; margin-right: 0.5rem"
                             xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 20 20"
                             fill="currentColor"
                             aria-hidden="true"
                        >

                            <path fill-rule="evenodd"
                                  d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                  clip-rule="evenodd"/>
                        </svg>

                        {{ $buttonText ?: __('Attach Resource') }}
                    </a>
                </div>
            @else
                {{ $button ?? '' }}
            @endisset
        </div>
    </td>
</tr>
