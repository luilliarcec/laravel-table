<tr>
    <td class="py-10" colspan="100%">
        <div class="text-center">
            <svg class="mx-auto h-12 w-12 text-gray-400"
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

            <p class="mt-3 text-sm text-gray-500">
                {{ $emptyText ?: __('No results match the given criteria.') }}
            </p>

            @if($link)
                <div class="mt-6">
                    <a href="{{ $link }}"
                       class="inline-flex items-center px-4 py-2 border border-gray-800 rounded-md shadow-sm text-gray-800 bg-transparent hover:text-white hover:bg-gray-800 focus:outline-none focus:ring focus:ring-gray-300 focus:border-gray-900 disabled:opacity-50 active:bg-gray-900 transition text-sm font-medium">

                        <!-- Heroicon name: solid/plus -->
                        <svg class="-ml-1 mr-2 h-5 w-5"
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
            @endif
        </div>
    </td>
</tr>
