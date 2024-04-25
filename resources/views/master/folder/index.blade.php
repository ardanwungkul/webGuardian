<x-app-layout>
    <div class="md:p-5 p-3">
        <x-header header="Folder Spintax"></x-header>
        <div class="md:p-5 p-3 bg-white rounded-lg min-h-[calc(100vh-120px)]">
            <div class="space-y-3">
                <div class="flex gap-3">
                    <a href="{{ route('folder.create') }}" target="_blank">
                        <button
                            class="cp-1 text-sm rounded-lg px-5 py-2 font-bold whitespace-nowrap border border-gray-500">
                            Tambah Folder
                        </button>
                    </a>
                    <div class="flex w-full">
                        <select name="" id="kategoriFilter"
                            class="flex-shrink-0 z-10 inline-flex items-center text-sm text-gray-900 bg-gray-100 border border-gray-500 rounded-s-lg hover:bg-gray-200 focus:ring-0 h-9">
                            <option value="" selected>Tampilkan Semua </option>
                            @foreach ($kategori as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                            @endforeach
                        </select>
                        <div class="relative w-full h-9">
                            <input type="search" id="search-dropdown"
                                class="block w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border border-gray-500 h-9"
                                placeholder="Search Folder Spintax" required />
                            <button type="submit"
                                class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                                <span class="sr-only">Search</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-3">
                    @foreach ($folder as $item)
                        @php
                            $kategoris = $item->domain->pluck('kategori')->unique();
                        @endphp
                        <div data-kategori="{{ $kategoris->pluck('id') }}"
                            class="folderItem p-2 border border-gray-200 shadow-lg rounded-lg hover:bg-gray-100 cursor-pointer flex flex-col gap-1 justify-between">
                            <div class="flex gap-1 overflow-y-scroll no-scrollbar">
                                @foreach ($kategoris as $kategori)
                                    <p
                                        class="text-xs cp-1 text-gray-700 font-bold tracking-tighter rounded-lg py-1 px-2 whitespace-nowrap">
                                        {{ $kategori->nama_kategori }}
                                    </p>
                                @endforeach
                            </div>
                            <p class="truncate text-sm font-bold">{{ $item->title }}</p>
                            <div class="line-clamp-3 text-xs">
                                {!! preg_replace('/font-size:\s*\d+(?:\.\d+)?(?:px|pt);?/', 'font-size: 12px;', $item->spintax) !!}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    $(document).ready(function() {
        $('#kategoriFilter').on('change', function() {
            var value = $(this).val();
            $('.folderItem').each(function() {
                var kategori = $(this).data('kategori');
                if (value == '') {
                    $(this).show();
                } else {
                    if (kategori.indexOf(parseInt(value)) !== -1) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                }
            });
        });
    });
</script>
