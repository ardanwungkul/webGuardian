<x-app-layout>
    <div class="space-y-3 pt-3">
        <div class="px-3 flex gap-3">
            <div>
                <button class="cp-1 text-sm rounded-lg p-3 font-bold" data-modal-target="addKategoriModal"
                    data-modal-toggle="addKategoriModal">Tambah Kategori</button>
            </div>
            @include('components.modal.add.add-kategori')
            <div>
                <button class="cp-1 text-sm rounded-lg p-3 font-bold" data-modal-target="addDomainModal"
                    data-modal-toggle="addDomainModal">Tambah Domain</button>
            </div>
            @include('components.modal.add.add-domain')
        </div>
        <div class="px-3">
            <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab"
                    data-tabs-toggle="#myTabContent" role="tablist">
                    <li class="mr-2" role="presentation">
                        <button class="inline-block p-4 border-b-2 rounded-t-lg" id="list-kategori-tab"
                            data-tabs-target="#tabs-list-kategori" type="button" role="tab"
                            aria-controls="list-kategori" aria-selected="false">
                            Daftar Kategori</button>
                    </li>
                    @foreach ($kategori as $item)
                        <li class="mr-2" role="presentation">
                            <button class="inline-block p-4 border-b-2 rounded-t-lg" id="{{ $item->id }}-tab"
                                data-tabs-target="#tabs-{{ $item->id }}" type="button" role="tab"
                                aria-controls="{{ $item->id }}" aria-selected="false">
                                {{ $item->nama_kategori }}</button>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div id="myTabContent">
                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800 space-y-2" id="tabs-list-kategori"
                    role="tabpanel" aria-labelledby="list-kategori-tab">
                    <div id="accordion-kategori">
                        <div id="accordion-open" data-accordion="open" class="space-y-2">
                            @foreach ($kategori as $item)
                                <h2 id="accordion-open-heading-{{ $item->id }}">
                                    <button type="button"
                                        class="flex items-center justify-between w-full p-3 rounded-lg font-medium rtl:text-right text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                                        data-accordion-target="#accordion-open-body-{{ $item->id }}"
                                        aria-expanded="false" aria-controls="accordion-open-body-{{ $item->id }}">
                                        <span class="flex items-center gap-2 w-full">
                                            <p>
                                                {{ $loop->index + 1 }}.
                                            </p>
                                            <input type="text"
                                                class="w-full leading-none p-0 border-none bg-transparent nama_kategori focus:ring-0 select-none"
                                                value="{{ $item->nama_kategori }}"
                                                data-kategori-id="{{ $item->id }}" readonly="true"
                                                ondblclick="this.readOnly='';">
                                        </span>
                                    </button>
                                </h2>
                                <div id="accordion-open-body-{{ $item->id }}" class="hidden"
                                    aria-labelledby="accordion-open-heading-{{ $item->id }}">
                                    <div class="p-3 border rounded-lg mt-2 border-gray-200 dark:border-gray-700">
                                        <div class="rounded-lg overflow-hidden">
                                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                <thead
                                                    class="text-xs text-gray-700 uppercase cp-1 dark:bg-gray-700 dark:text-gray-400">
                                                    <tr>
                                                        <th scope="col" class="px-6 py-3">
                                                            No
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            Nama Domain
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            User
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            Status Generate
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            Status Sitemap
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-center">
                                                            Action
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($item->domain as $items)
                                                        <tr
                                                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                            <th scope="row"
                                                                class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                                                {{ $loop->index + 1 }}
                                                            </th>
                                                            <td class="px-6 py-4">
                                                                {{ $items->nama_domain }}
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-nowrap">
                                                                @if ($items->user)
                                                                    {{ $items->user->name }}
                                                                @endif
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-nowrap">
                                                                <select
                                                                    class="border-none focus:ring-0 bg-transparent text-sm status_keterangan"
                                                                    data-domain-id="{{ $items->id }}">
                                                                    <option value="Running"
                                                                        @if ($items->status_keterangan == 'Running') selected @endif>
                                                                        Running</option>
                                                                    <option value="Done"
                                                                        @if ($items->status_keterangan == 'Done') selected @endif>
                                                                        Done</option>
                                                                </select>
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-nowrap">
                                                                <select
                                                                    class="border-none focus:ring-0 bg-transparent text-sm status_sitemap"
                                                                    data-domain-id="{{ $items->id }}">
                                                                    <option value="Undone"
                                                                        @if ($items->status_sitemap == 'Undone') selected @endif>
                                                                        Undone</option>
                                                                    <option value="Done"
                                                                        @if ($items->status_sitemap == 'Done') selected @endif>
                                                                        Done</option>
                                                                </select>
                                                            </td>
                                                            <td class="px-6 py-4 ">
                                                                <div
                                                                    class="font-medium text-blue-600 dark:text-blue-500 flex items-center justify-center gap-3">
                                                                    <button class=""
                                                                        data-modal-target="editDomain-{{ $items->id }}"
                                                                        data-modal-toggle="editDomain-{{ $items->id }}">
                                                                        Edit
                                                                    </button>
                                                                    <x-modal.edit.edit-domain :domain="$items"
                                                                        :kategori="$kategori"
                                                                        :user="$user"></x-modal.edit.edit-domain>
                                                                    <form
                                                                        action="{{ route('domain.destroy', $items->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button class="text-red-600">
                                                                            Delete
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @foreach ($kategori as $item)
                    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="tabs-{{ $item->id }}"
                        role="tabpanel" aria-labelledby="{{ $item->id }}-tab">
                        <div class="flex gap-2 justify-between pb-2">
                            <div class="flex items-center gap-2 justify-center w-full">
                                <div class="w-3 h-3 bg-blue-600"></div>
                                <p>Running</p>
                            </div>
                            <div class="flex items-center gap-2 justify-center w-full">
                                <div class="w-3 h-3 bg-green-600"></div>
                                <p>Done</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-5 gap-3">
                            @foreach ($domain as $items)
                                @if ($items->kategori_id == $item->id)
                                    <div
                                        class="border h-20 rounded-lg  @if ($items->status_keterangan == 'Running') running @elseif($items->status_keterangan == 'Done') done @endif relative">
                                        <button data-modal-target="editDomain2-{{ $items->id }}"
                                            data-modal-toggle="editDomain2-{{ $items->id }}"
                                            class=" w-full text-center h-full p-3   ">
                                            <p class="truncate font-extrabold text-xl text-start leading-1">
                                                {{ $items->nama_domain }}
                                            </p>
                                            @if ($items->user)
                                                <p
                                                    class="truncate font-extrabold text-start text-sm leading-none text-gray-200">
                                                    {{ $items->user->name }}
                                                </p>
                                            @endif
                                        </button>
                                        <x-modal.edit.edit-domain2 :domain="$items" :kategori="$kategori"
                                            :user="$user"></x-modal.edit.edit-domain2>
                                        <div class="absolute top-2 right-2 rounded flex gap-1">
                                            @if ($items->report)
                                                <a href="//{{ $items->report }}" target="_blank" title="Link Report"
                                                    class="hover:bg-white hover:bg-opacity-25 rounded-lg">
                                                    <svg width="20" height="20" viewBox="0 0 21 21"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g id="Interface / External_Link">
                                                            <path id="Vector"
                                                                d="M10.0002 5H8.2002C7.08009 5 6.51962 5 6.0918 5.21799C5.71547 5.40973 5.40973 5.71547 5.21799 6.0918C5 6.51962 5 7.08009 5 8.2002V15.8002C5 16.9203 5 17.4801 5.21799 17.9079C5.40973 18.2842 5.71547 18.5905 6.0918 18.7822C6.5192 19 7.07899 19 8.19691 19H15.8031C16.921 19 17.48 19 17.9074 18.7822C18.2837 18.5905 18.5905 18.2839 18.7822 17.9076C19 17.4802 19 16.921 19 15.8031V14M20 9V4M20 4H15M20 4L13 11"
                                                                stroke="#ffffff" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </g>
                                                    </svg>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    $(document).ready(function() {
        $('.nama_kategori').on('input', function() {
            var namaKategori = $(this).val();
            var kategoriId = $(this).data('kategori-id');
            loading.style.display = 'block';
            const tab = document.getElementById(kategoriId + '-tab');
            tab.textContent = namaKategori;
            $.ajax({
                url: '/kategoris/nama-kategori',
                method: 'PUT',
                data: {
                    _token: '{{ csrf_token() }}',
                    kategori: kategoriId,
                    nama_kategori: namaKategori
                },
                success: function(response) {
                    console.log(response);
                    loading.style.display = 'none';
                },
                error: function(error) {}
            });
        });
        $('.status_keterangan').on('change', function() {
            var status = $(this).val();
            var domainId = $(this).data('domain-id');
            loading.style.display = 'block';
            $.ajax({
                url: '/domains/status-keterangan',
                method: 'PUT',
                data: {
                    _token: '{{ csrf_token() }}',
                    domain: domainId,
                    status_keterangan: status
                },
                success: function(response) {
                    console.log(response);
                    loading.style.display = 'none';
                },
                error: function(error) {}
            });
        });
        $('.status_sitemap').on('change', function() {
            var status = $(this).val();
            var domainId = $(this).data('domain-id');
            loading.style.display = 'block';
            $.ajax({
                url: '/domains/status-sitemap',
                method: 'PUT',
                data: {
                    _token: '{{ csrf_token() }}',
                    domain: domainId,
                    status_sitemap: status
                },
                success: function(response) {
                    console.log(response);
                    loading.style.display = 'none';
                },
                error: function(error) {}
            });
        });
    });
</script>
