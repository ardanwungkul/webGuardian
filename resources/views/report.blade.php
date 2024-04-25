<x-app-layout>
    <div id="report" class="min-h-screen bg-white">
        <div class=" rounded-lg md:p-10 p-3">

            <div class="md:-my-6">
                @if (isset($domain->reports) && count($domain->reports) > 0)
                    @php
                        $groupedData = $domain->reports->sortBy('tanggal_report')->groupBy(function ($item) {
                            return date('Y-m-d', strtotime($item->tanggal_report));
                        });
                    @endphp
                    <div class=" font-extrabold text-2xl mb-1 md:mb-0 md:ml-[6.5rem] text-center">
                        Report
                        {{ $domain->kategori->nama_kategori }} {{ $domain->nama_domain }}</div>
                    <div>
                        <label class="switch-name">
                            <input type="checkbox" class="checkbox" id="toggleItems">
                            <div class="back"></div>
                            <svg class="moon text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                    d="M9 8h10M9 12h10M9 16h10M5 8h0m0 4h0m0 4h0" />
                            </svg>
                            <svg class="sun" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M4.9 3C3.9 3 3 3.8 3 4.9V9c0 1 .8 1.9 1.9 1.9H9c1 0 1.9-.8 1.9-1.9V5c0-1-.8-1.9-1.9-1.9H5Zm10 0c-1 0-1.9.8-1.9 1.9V9c0 1 .8 1.9 1.9 1.9H19c1 0 1.9-.8 1.9-1.9V5c0-1-.8-1.9-1.9-1.9h-4Zm-10 10c-1 0-1.9.8-1.9 1.9V19c0 1 .8 1.9 1.9 1.9H9c1 0 1.9-.8 1.9-1.9v-4c0-1-.8-1.9-1.9-1.9H5Zm10 0c-1 0-1.9.8-1.9 1.9V19c0 1 .8 1.9 1.9 1.9H19c1 0 1.9-.8 1.9-1.9v-4c0-1-.8-1.9-1.9-1.9h-4Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </label>
                    </div>
                    @foreach ($groupedData as $date => $items)
                        <div class="relative md:pl-44 pb-6 group">
                            <div
                                class="flex md:flex-row items-start mb-1 group-last:before:hidden before:absolute md:before:left-0 before:h-full before:px-px before:bg-slate-300 md:before:ml-[9.5rem] before:self-start before:-translate-x-1/2 before:translate-y-3 after:absolute after:left-0 after:w-2 after:h-2 after:bg-indigo-600 after:border-4 after:box-content after:border-slate-50 after:rounded-full md:after:ml-[9.5rem] after:-translate-x-1/2 after:translate-y-1.5">
                                <time
                                    class="md:absolute left-0 translate-y-0.5 inline-flex items-center justify-center text-xs font-semibold uppercase w-min whitespace-nowrap h-6 mb-3 md:mb-0 ml-3 md:ml-3 text-emerald-600 bg-emerald-100 rounded-full px-3">{{ date('j F Y', strtotime($date)) }}</time>

                            </div>
                            <!-- Content -->
                            <div class="gridItems fade-in md:ml-0 ml-3">
                                <div class="text-slate-500 border p-3 rounded-lg grid-cols-2 gap-3 grid">
                                    @foreach ($items as $item)
                                        <div class="w-full flex flex-col justify-between cursor-pointer"
                                            data-modal-toggle="reportModal-{{ $item->id }}"
                                            data-modal-target="reportModal-{{ $item->id }}">
                                            <div class="shadow-md rounded-lg">
                                                <div class="gap-3">
                                                    @if ($item->image !== 'placeholder.png')
                                                        <div class="w-full">
                                                            <img src="{{ asset('storage/images/report') }}/{{ $item->image }}"
                                                                class="w-full object-contain rounded-l-lg h-28 md:h-40">
                                                        </div>
                                                    @elseif ($item->image == 'placeholder.png' && $item->link_youtube)
                                                        <div class="w-full">
                                                            <img src="{{ asset('storage/images/report') }}/{{ $item->image }}"
                                                                class="w-full object-contain rounded-l-lg h-28 md:h-40">
                                                        </div>
                                                    @elseif($item->image == 'placeholder.png' && $item->link_youtube == null)
                                                        <div class="w-full">
                                                            <img src="{{ asset('storage/images/report') }}/{{ $item->image }}"
                                                                class="w-full object-contain rounded-l-lg h-28 md:h-40">
                                                        </div>
                                                    @endif
                                                    <div
                                                        class="col-span-2 flex flex-col justify-between py-3 px-3 gap-1">
                                                        <p class="truncate text-black font-bold text-sm md:text-base">
                                                            {{ $item->judul }}
                                                        </p>
                                                        <div class="line-clamp-2 text-xs md:text-sm">
                                                            {!! preg_replace('/font-size:\s*\d+(?:\.\d+)?(?:px|pt);?/', 'font-size: 14px;', $item->report) !!}
                                                        </div>
                                                        <div class="flex justify-between">
                                                            <button
                                                                class="py-1 px-3 rounded-lg cp-1 text-xs hover:bg-teal-200">Lihat
                                                                Detail</button>
                                                            <p
                                                                class="text-xs cp-1 w-min whitespace-nowrap rounded-lg px-3 py-1">
                                                                {{ date('j F Y', strtotime($date)) }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="listItems fade-in-visible md:ml-0 ml-3">
                                <div class="text-slate-500 border p-3 rounded-lg space-y-3">
                                    @foreach ($items as $item)
                                        <div class="w-full flex flex-col justify-between cursor-pointer"
                                            data-modal-toggle="reportModal-{{ $item->id }}"
                                            data-modal-target="reportModal-{{ $item->id }}">
                                            <div class="shadow-md rounded-lg">
                                                <div class="grid grid-cols-3 gap-3">
                                                    @if ($item->image !== 'placeholder.png')
                                                        <div class="w-full">
                                                            <img src="{{ asset('storage/images/report') }}/{{ $item->image }}"
                                                                class="w-full object-contain rounded-l-lg h-28 md:h-40">
                                                        </div>
                                                    @elseif ($item->image == 'placeholder.png' && $item->link_youtube)
                                                        <div class="w-full">
                                                            <img src="{{ asset('storage/images/report') }}/{{ $item->image }}"
                                                                class="w-full object-contain rounded-l-lg h-28 md:h-40">
                                                        </div>
                                                    @elseif($item->image == 'placeholder.png' && $item->link_youtube == null)
                                                        <div class="w-full">
                                                            <img src="{{ asset('storage/images/report') }}/{{ $item->image }}"
                                                                class="w-full object-contain rounded-l-lg h-28 md:h-40">
                                                        </div>
                                                    @endif
                                                    <div
                                                        class="col-span-2 flex flex-col justify-between py-3 px-3 gap-1">
                                                        <p class="truncate text-black font-bold text-sm md:text-base">
                                                            {{ $item->judul }}
                                                        </p>
                                                        <div class="line-clamp-3 text-xs md:text-sm">
                                                            {!! preg_replace('/font-size:\s*\d+(?:\.\d+)?(?:px|pt);?/', 'font-size: 14px;', $item->report) !!}
                                                        </div>
                                                        <div class="flex justify-between">
                                                            <p
                                                                class="text-xs cp-1 w-min whitespace-nowrap rounded-lg px-3 py-1">
                                                                {{ date('j F Y', strtotime($date)) }}
                                                            </p>
                                                            <button
                                                                class="py-1 px-3 rounded-lg cp-1 text-xs hover:bg-teal-200">Lihat
                                                                Detail</button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            @foreach ($items as $item)
                                <x-modal.show.show-report :report="$item"></x-modal.show.show-report>
                            @endforeach
                        </div>
                    @endforeach
                @else
                    <div class=" font-extrabold text-2xl text-center">
                        Tidak Ada Laporan Tersedia</div>
                    <div>
                @endif
            </div>
        </div>

    </div>

</x-app-layout>
<script>
    var toggleItemsCheckbox = document.getElementById('toggleItems');
    var gridItemsList = document.querySelectorAll('.gridItems');
    var listItemsList = document.querySelectorAll('.listItems');

    toggleItemsCheckbox.addEventListener('change', function() {
        if (toggleItemsCheckbox.checked) {
            gridItemsList.forEach(function(item) {
                item.classList.remove('fade-in');
                item.classList.add('fade-in-visible');
            });
            listItemsList.forEach(function(item) {
                item.classList.remove('fade-in-visible');
                item.classList.add('fade-in');
            });
        } else {
            gridItemsList.forEach(function(item) {
                item.classList.remove('fade-in-visible');
                item.classList.add('fade-in');
            });
            listItemsList.forEach(function(item) {
                item.classList.add('fade-in-visible');
                item.classList.remove('fade-in');
            });
        }
    });
</script>
