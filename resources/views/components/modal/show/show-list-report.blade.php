@props(['domain' => '[]'])
<!-- Main modal -->
<div id="show-list-report-{{ $domain->id }}" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">

    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between px-6 py-3 border-b rounded-t dark:border-gray-600 cp-3">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Daftar Report
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="show-list-report-{{ $domain->id }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="px-6 py-3 cp-4 text-black space-y-3">
                @if (count($domain->reports) > 0)
                    @php
                        $groupedData = $domain->reports->sortBy('tanggal_report')->groupBy(function ($item) {
                            return date('Y-m-d', strtotime($item->tanggal_report));
                        });
                    @endphp
                    @foreach ($groupedData as $date => $items)
                        <div>
                            <p>{{ date('j F Y', strtotime($date)) }}</p>
                            <div class="space-y-1">
                                @foreach ($items as $item)
                                    <div class="flex gap-1">
                                        <div class="w-full">
                                            <a href="{{ route('report.edit', $item->id) }}" target="_blank">
                                                <div class="border rounded-lg w-full text-start p-3 bg-white">
                                                    <p>{{ $item->judul }}</p>
                                                </div>
                                            </a>
                                        </div>
                                        <div>
                                            <form action="{{ route('report.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button>
                                                    <div
                                                        class="w-10 flex h-full justify-center items-center fill-red-500 hover:fill-white hover:bg-red-500 transition duration-300 bg-white rounded-lg p-1 border ">
                                                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                stroke-linejoin="round"></g>
                                                            <g id="SVGRepo_iconCarrier">
                                                                <path
                                                                    d="M5.755,20.283,4,8H20L18.245,20.283A2,2,0,0,1,16.265,22H7.735A2,2,0,0,1,5.755,20.283ZM21,4H16V3a1,1,0,0,0-1-1H9A1,1,0,0,0,8,3V4H3A1,1,0,0,0,3,6H21a1,1,0,0,0,0-2Z">
                                                                </path>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="border p-3 rounded-lg text-center bg-white">Tidak Ada Report</div>
                @endif

            </div>

            <!-- Modal footer -->
            @if (Auth::user()->isSupport == true)
                <div class=" rounded-b-lg py-3">
                    <div class="grid grid-cols-1 px-3">
                        <a href="{{ route('report', $domain->id) }}" target="_blank"
                            class="cp-1 px-3 py-2 text-black font-extrabold rounded-lg text-center">Buat Report</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
