<div id="showSpintax-{{ $spintax->id }}" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <div>
                    <h3 class="md:text-lg text-base font-semibold text-gray-900 dark:text-white">
                        {{ $spintax->title }}
                    </h3>
                </div>
                <div class="flex gap-2">
                    <div class="flex justify-end">
                        <button class="copyButton flex items-center gap-2 hover:border-b border-gray-500 py-2"
                            data-spintax-id="{{ $spintax->id }}" onclick="copySpintaxToClipboard(this)">
                            <i class="fa-solid fa-copy text-gray-500"></i>
                        </button>
                    </div>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                        data-modal-hide="showSpintax-{{ $spintax->id }}">

                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
            </div>
            <!-- Modal body -->
            <div class="p-4 space-y-4">
                <div class="copyText border border-gray-300 rounded-lg p-3" data-spintax-id="{{ $spintax->id }}">
                    {!! preg_replace('/font-size:\s*\d+(?:\.\d+)?(?:px|pt);?/', 'font-size: 12px;', $spintax->spintax) !!}
                </div>
            </div>
            <div class="p-4 space-y-4">
                <div class="flex flex-wrap gap-1">
                    @foreach ($spintax->domain as $domain)
                        <p class="text-xs cp-1 rounded-lg px-2 py-1 w-min whitespace-nowrap">
                            {{ $domain->nama_domain }}
                        </p>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</div>
