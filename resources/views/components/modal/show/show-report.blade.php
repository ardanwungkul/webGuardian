<div id="reportModal-{{ $report->id }}" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <div>
                    <h3 class="md:text-lg text-base font-semibold text-gray-900 dark:text-white">
                        {{ $report->judul }}
                    </h3>
                    <p class="text-xs">{{ $report->tanggal_report }}</p>
                </div>
                <div class="flex gap-2">
                    @if ($report->link_youtube)
                        <button
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center">
                            <a href="{{ $report->link_youtube }}" class="fa-brands fa-youtube "></a>
                        </button>
                    @endif
                    @if (Auth::user() && Auth::user()->isAdmin == true)
                        <button
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center">
                            <a href="{{ route('report.edit', $report->id) }}" class="fa-solid fa-pen"></a>
                        </button>
                    @endif
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                        data-modal-hide="reportModal-{{ $report->id }}">

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
                <div>
                    <div>
                        @if ($report->image !== 'placeholder.png')
                            <div class="w-full">
                                <img src="{{ asset('storage/images/report') }}/{{ $report->image }}"
                                    class="w-full h-[40vh] object-contain">
                            </div>
                        @endif
                    </div>
                    <div class="bg-white rounded-lg custom-content custom-font-size md:text-base text-sm">
                        {!! html_entity_decode($report->report) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
