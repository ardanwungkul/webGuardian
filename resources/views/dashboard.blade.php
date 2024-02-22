<x-app-layout>
    <div class="space-y-3 pt-3">
        @if (Auth::user()->isAdmin == true)
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
        @endif
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
                                        aria-controls="accordion-open-body-{{ $item->id }}"
                                        {{ $loop->first ? 'aria-expanded=true' : 'aria-expanded="false"' }}>
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
                                        <input type="text" class="text-sm rounded-lg mb-2 w-full"
                                            onkeyup="searchFunction(this.value,{{ $item->id }})"
                                            placeholder="Search .....">
                                        <div class="rounded-lg overflow-hidden">
                                            <table class="w-full text-left text-gray-500 dark:text-gray-400"
                                                id="tablesDomain-{{ $item->id }}">
                                                <thead
                                                    class="text-xs text-gray-700 uppercase cp-1 dark:bg-gray-700 dark:text-gray-400">
                                                    <tr>
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
                                                            Status Nerd
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            Status Sitemap
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            Tanggal Expired
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-center">
                                                            Action
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($item->domain as $items)
                                                        @if (Auth::user()->isAdmin == true)
                                                            @include('components.item.table-domain')
                                                        @else
                                                            @if ($items->user_id == Auth::user()->id)
                                                                @include('components.item.table-domain')
                                                            @endif
                                                        @endif
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
                                <p>UnComplete</p>
                            </div>
                            <div class="flex items-center gap-2 justify-center w-full">
                                <div class="w-3 h-3 bg-green-500"></div>
                                <p>On Proccess</p>
                            </div>
                            <div class="flex items-center gap-2 justify-center w-full">
                                <div class="w-3 h-3 bg-green-700"></div>
                                <p>Complete</p>
                            </div>
                            <div class="flex items-center gap-2 justify-center w-full">
                                <div class="w-3 h-3 bg-red-500"></div>
                                <p>Expired</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-5 gap-3">
                            @foreach ($domain as $items)
                                @if ($items->kategori_id == $item->id)
                                    @if (Auth::user()->isAdmin == true)
                                        @include('components.item.grid-domain-item')
                                    @else
                                        @if ($items->user_id == Auth::user()->id)
                                            @include('components.item.grid-domain-item')
                                        @endif
                                    @endif
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
            var domainId = $(this).data('domain-id');
            loading.style.display = 'block';
            if (this.checked) {
                var status = 'Done';
            } else {
                var status = 'Running'
            }
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
                    updateRowColor(domainId);
                },
                error: function(error) {}
            });
        });
        $('.status_sitemap').on('change', function() {
            var domainId = $(this).data('domain-id');
            loading.style.display = 'block';
            if (this.checked) {
                var status = 'Done';
            } else {
                var status = 'Undone'
            }
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
                    updateRowColor(domainId);
                },
                error: function(error) {}
            });
        });
        $('.status_nerd').on('change', function() {
            var domainId = $(this).data('domain-id');
            loading.style.display = 'block';
            if (this.checked) {
                var status = 'Done';
            } else {
                var status = 'Undone'
            }
            $.ajax({
                url: '/domains/status-nerd',
                method: 'PUT',
                data: {
                    _token: '{{ csrf_token() }}',
                    domain: domainId,
                    status_nerd: status
                },
                success: function(response) {
                    loading.style.display = 'none';
                    updateRowColor(domainId);
                },
                error: function(error) {}
            });
        });


        function updateRowColor(domainId) {
            const trTable = document.getElementById('tableDomain-' + domainId);
            const nerd = $('.status_nerd[data-domain-id="' + domainId + '"]')[0].checked;
            const keterangan = $('.status_keterangan[data-domain-id="' + domainId + '"]')[0].checked;
            const sitemap = $('.status_sitemap[data-domain-id="' + domainId + '"]')[0].checked;

            if (nerd == false && keterangan == false && sitemap == false) {
                trTable.style.backgroundColor = 'white';
            } else if (nerd == true && keterangan == true && sitemap == true) {
                trTable.style.backgroundColor = '#22c55e';
            } else {
                trTable.style.backgroundColor = '#86efac';
            }
        }
    });
</script>
<script>
    window.onload = function() {
        const checkboxes = document.querySelectorAll('.internalReport');
        const textInputs = document.querySelectorAll('.linkReport');
        const appUrl = "{{ env('APP_URL') }}";

        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                var id = this.getAttribute('data-id');
                var relatedTextInput = document.querySelector('.linkReport[data-id="' + id + '"]');
                var relatedTextInputs = document.querySelector('.linkReports[data-id="' + id +
                    '"]');
                var valueInput = relatedTextInput.getAttribute('data-value');
                var namaDomain = relatedTextInput.getAttribute('data-domain');
                var slug = relatedTextInput.getAttribute('data-slug');
                if (this.checked) {
                    relatedTextInput.setAttribute('readonly', 'readonly');
                    relatedTextInputs.setAttribute('readonly', 'readonly');
                    relatedTextInput.value = appUrl + '/reports/result/' + id + '/' + slug;
                    relatedTextInputs.value = appUrl + '/reports/result/' + id + '/' + slug;
                } else {
                    relatedTextInputs.value = valueInput;
                    relatedTextInput.value = valueInput;
                    relatedTextInput.removeAttribute('readonly');
                    relatedTextInputs.removeAttribute('readonly');
                }
            });
        });
    };
</script>
<script>
    function searchFunction(value, kategoriId) {
        var input, filter, table, tr, td1, td2, i, txtValue1, txtValue2;
        filter = value.toUpperCase();
        table = document.getElementById("tablesDomain-" + kategoriId);
        console.log(table);
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            td1 = tr[i].getElementsByTagName("td")[0];
            td2 = tr[i].getElementsByTagName("td")[1];
            if (td1 && td2) {
                txtValue1 = td1.textContent || td1.innerText;
                txtValue2 = td2.textContent || td2.innerText;

                var combinedText = txtValue1 + ' ' + txtValue2;
                if (combinedText.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
<script>
    var allNamaDomainApi = [];
    const data = JSON.parse('{!! json_encode($apiDomain) !!}');
    data.forEach(item => {
        allNamaDomainApi.push(item.nama_domain);
    });

    $("#nama_domain").autocomplete({
        source: allNamaDomainApi
    });
</script>
