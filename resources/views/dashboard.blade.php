<x-app-layout>
    <div class="space-y-3 pt-3 pb-5">
        <div class="px-3">
            {{-- <div class="mb-4 border-b border-gray-200 dark:border-gray-700 bg-white rounded-lg">
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
            </div> --}}
            {{-- <div id="myTabContent">
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
            </div> --}}
            @php
                $isExpired = now();

                $domains = collect($domain)
                    ->map(function ($d) use ($apiDomain, $isExpired) {
                        $foundDomain = collect($apiDomain)->firstWhere(function ($apiDomain) use ($d) {
                            return strtolower($apiDomain['nama_domain']) === strtolower($d['nama_domain']);
                        });

                        if ($foundDomain) {
                            $foundDomain['is_expired'] =
                                strtotime($foundDomain['tanggal_expired']) < $isExpired->timestamp;

                            $domainObj = new stdClass();
                            $domainObj->nama_domain = $foundDomain['nama_domain'];
                            $domainObj->is_expired = $foundDomain['is_expired'];
                            $domainObj->kategori = $d->kategori->nama_kategori ?? null;

                            return $domainObj;
                        }
                        return null;
                    })
                    ->filter();

                $expiredDomains = $domains->filter(fn($data) => $data->is_expired);
                $activeDomains = $domains->filter(fn($data) => !$data->is_expired);
            @endphp

        </div>
        <div class="px-3 space-y-4">
            <div class="grid lg:grid-cols-4 sm:grid-cols-2 gap-3">
                <div class="h-28 w-full cp-1 shadow-md rounded-lg flex items-center px-3 gap-3 justify-between"
                    data-modal-toggle="showTotalDomain" data-modal-target="showTotalDomain">
                    <div class="bg-gray-300 rounded-full p-3 w-14 h-14 flex-none flex items-center justify-center">
                        <i class="fa-solid fa-link"></i>
                    </div>
                    <button class="flex flex-col justify-center items-center w-full">
                        <p class="text-xl font-medium">{{ $isDomain }}</p>
                        <p class="text-sm text-center">Total Domain</p>
                    </button>
                    @include('components.modal.dashboard.total-domain')
                </div>
                <div class="h-28 w-full cp-1 shadow-md rounded-lg flex items-center px-3 gap-3 justify-between"
                    data-modal-toggle="showDomainExpired" data-modal-target="showDomainExpired">
                    <div class="bg-gray-300 rounded-full p-3 w-14 h-14 flex-none flex items-center justify-center">
                        <i class="fa-solid fa-triangle-exclamation text-2xl"></i>
                    </div>
                    <div class="flex flex-col justify-center items-center w-full">
                        <p class="text-xl font-medium" id="isExpired">{{ $expiredDomains->count() }}</p>
                        <p class="text-sm text-center">Total Domain Expire</p>
                    </div>
                    @include('components.modal.dashboard.domain-expired')
                </div>
                <div class="h-28 w-full cp-1 shadow-md rounded-lg flex items-center px-3 gap-3 justify-between">
                    <div class="bg-gray-300 rounded-full p-3 w-14 h-14 flex-none flex items-center justify-center">
                        <i class="fa-solid fa-thumbs-up text-2xl"></i>
                    </div>
                    <div class="flex flex-col justify-center items-center w-full">
                        <p class="text-xl font-medium" id="isActive">{{ $activeDomains->count() }}</p>
                        <p class="text-sm text-center">Total Domain Active</p>
                    </div>
                </div>
                <div class="h-28 w-full cp-1 shadow-md rounded-lg flex items-center px-3 gap-3 justify-between">
                    <div class="bg-gray-300 rounded-full p-3 w-14 h-14 flex-none flex items-center justify-center">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 18 18">
                            <path
                                d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                        </svg>
                    </div>
                    <div class="flex flex-col justify-center items-center w-full">
                        <p class="text-xl font-medium">{{ $kategori->count() }}</p>
                        <p class="text-sm text-center">Total Category</p>
                    </div>
                </div>
            </div>
            <div class="flex justify-between items-center gap-3">
                <div class="w-1/2 p-5 bg-white rounded-lg">
                    <div class="p-2 font-medium text-lg">Report Activity</div>
                    <input type="text" class="text-sm rounded-lg mb-2 w-full"
                        onkeyup="searchReportActivity(this.value)" placeholder="Search .....">
                    <div class="rounded-lg h-[30rem] overflow-y-auto scrollbar-hide">
                        <table class="w-full text-left text-gray-500 dark:text-gray-400 rounded-lg"
                            id="reportActivityTable">
                            <thead
                                class="text-xs sticky top-0 z-10 text-gray-700 uppercase cp-1 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-10 py-3 text-left">Nama Domain</th>
                                    <th scope="col" class="px-6 py-3 text-right">Last Update</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($domain as $items)
                                    <tr class="border-b bg-white text-black">
                                        <th class="px-10 py-2 text-left">{{ $items->nama_domain }}</th>
                                        <th class="text-right px-3 py-2 text-sm">
                                            @if ($items->reports->isNotEmpty() && $items->reports->last()->tanggal_report)
                                                {{ \Carbon\Carbon::parse($items->reports->last()->tanggal_report)->translatedFormat('d F Y') }}
                                            @else
                                                <span class="text-gray-400 italic">Tidak ada report</span>
                                            @endif
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="w-1/2 bg-white p-5 rounded-lg">
                    <div class="p-2 font-medium text-lg">Daftar User</div>
                    <input type="text" class="text-sm rounded-lg mb-2 w-full" onkeyup="searchDaftarUser(this.value)"
                        placeholder="Search .....">
                    <div class="rounded-lg h-[30rem] overflow-y-auto scrollbar-hide">
                        <table class="w-full text-left text-gray-500 dark:text-gray-400 rounded-lg"
                            id="daftarUserTable">
                            <thead
                                class="text-xs sticky top-0 z-10 text-gray-700 uppercase cp-1 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-10 py-3 text-left">User</th>
                                    <th scope="col" class="px-10 py-3 text-right">Domain</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $item)
                                    <tr class="border-b bg-white text-black">
                                        <th class="px-10 py-2 text-left">
                                            <a href="{{ route('user.show', $item->id) }}"
                                                class="text-blue-500 hover:underline">
                                                {{ $item->name }}
                                            </a>
                                        </th>
                                        <th class="text-right px-10 py-2">{{ $item->domain->count() }}
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div>
                @if (Auth::user()->isAdmin == true)
                    <div class="px-3 flex gap-4">
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
                        <select id="category-select" name="category_id" class="form-control"
                            onchange="fetchCategoryData(this.value)">
                            <option value="">Pilih Kategori</option>
                            @foreach ($kategori as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                @endif
            </div>
            <div class="bg-white shadow-lg rounded-lg">
                <div class="p-3 border rounded-lg mt-2 relative border-gray-200 dark:border-gray-700">
                    <input type="text" class="text-sm rounded-lg mb-2 w-full" onkeyup="searchDomain(this.value)"
                        placeholder="Search .....">
                    <div class="rounded-lg overflow-hidden">
                        <table class="w-full text-left text-gray-500 dark:text-gray-400" id="tablesDomain">
                            <thead class="text-xs text-gray-700 uppercase cp-1 dark:bg-gray-700 dark:text-gray-400">
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
                            </tbody>
                        </table>
                        <div class="lds-ellipsis" id="loadingIndicator" style="display: none">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white p-5 space-y-4 rounded-lg">
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
                <div id="tableReport" class="grid grid-cols-5 gap-4">
                    <div id="loadingIndicator" style="display: none;">Loading...</div>
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
        $(document).on('change', '.status_keterangan', function() {
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
        $(document).on('change', '.status_sitemap', function() {
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
        $(document).on('change', '.status_nerd', function() {
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
                    console.log(response);

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
    function searchReportActivity(query) {
        const table = document.getElementById("reportActivityTable");
        const rows = table.getElementsByTagName("tr");

        for (let i = 1; i < rows.length; i++) {
            const namaDomainCell = rows[i].getElementsByTagName("th")[0];
            const lastReportCell = rows[i].getElementsByTagName("th")[1];

            if (namaDomainCell && lastReportCell) {
                const namaDomainText = namaDomainCell.textContent || namaDomainCell.innerText;
                const lastReportText = lastReportCell.textContent || lastReportCell.innerText;

                if (namaDomainText.toLowerCase().includes(query.toLowerCase()) ||
                    lastReportText.toLowerCase().includes(query.toLowerCase())) {
                    rows[i].style.display = "";
                } else {
                    rows[i].style.display = "none";
                }
            }
        }
    }
</script>
<script>
    function searchDaftarUser(query) {
        const table = document.getElementById("daftarUserTable");
        const rows = table.getElementsByTagName("tr");

        for (let i = 1; i < rows.length; i++) {
            const namaUser = rows[i].getElementsByTagName("th")[0];
            const countDomain = rows[i].getElementsByTagName("th")[1];

            if (namaUser && countDomain) {
                const namaDomainText = namaUser.textContent || namaUser.innerText;
                const lastReportText = countDomain.textContent || countDomain.innerText;

                if (namaDomainText.toLowerCase().includes(query.toLowerCase()) ||
                    lastReportText.toLowerCase().includes(query.toLowerCase())) {
                    rows[i].style.display = "";
                } else {
                    rows[i].style.display = "none";
                }
            }
        }
    }
</script>
<script>
    function searchDomain(query) {
        const table = document.getElementById("tablesDomain");
        const rows = table.getElementsByTagName("tr");

        for (let i = 1; i < rows.length; i++) {
            const namaDomainCell = rows[i].getElementsByTagName("td")[0];
            const namaUser = rows[i].getElementsByTagName("td")[1];

            if (namaDomainCell && namaUser) {
                const namaDomainText = namaDomainCell.textContent || namaDomainCell.innerText;
                const lastReportText = namaUser.textContent || namaUser.innerText;

                if (namaDomainText.toLowerCase().includes(query.toLowerCase()) ||
                    lastReportText.toLowerCase().includes(query.toLowerCase())) {
                    rows[i].style.display = "";
                } else {
                    rows[i].style.display = "none";
                }
            }
        }
    }
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
<script>
    $(document).ready(function() {
        $('#category-select').select2({
            placeholder: "Pilih Kategori",
        });
    })
</script>
<script>
    function fetchCategoryData(categoryId) {
        if (!categoryId) return;

        document.getElementById('loadingIndicator').style.display = 'block';
        document.querySelector('#tablesDomain tbody').innerHTML = '';
        document.querySelector('#tableReport').innerHTML = '';

        fetch(`/get-category-data/${categoryId}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                // console.log(data);

                document.getElementById('loadingIndicator').style.display = 'none';

                const tableBody = document.querySelector('#tablesDomain tbody');
                tableBody.innerHTML = '';
                const tableReport = document.querySelector('#tableReport');
                tableReport.innerHTML = '';

                data.domains.forEach(domain => {
                    const apiDomainData = data.apiDomain.find(apiDomain => apiDomain
                        .nama_domain.toLowerCase() === domain
                        .nama_domain.toLowerCase());
                    const isDomains = apiDomainData ? apiDomainData.tanggal_expired : null
                    // const isExpired = isDomains.isPast()
                    const expiredDate = new Date(isDomains);
                    const isExpired = expiredDate < new Date()
                    console.log(data.apiDomain);



                    const row = document.createElement('tr');
                    row.classList.add(
                        'h-12',
                        'border-b',
                        'border-gray-400',
                        'text-black',
                        (domain.status_nerd === 'Done' && domain.status_keterangan === 'Done' && domain
                            .status_sitemap === 'Done') ? 'bg-green-500' :
                        (domain.status_nerd === 'UnDone' && domain.status_keterangan === 'Running' &&
                            domain.status_sitemap === 'Undone') ? 'bg-white' :
                        (isExpired === true) ? 'bg-red-300' :
                        'bg-green-300'
                    );


                    row.innerHTML = `
                        <td class="text-xs pl-2">${domain.nama_domain}</td>
                        <td class="text-xs">${domain.user.name}</td>
                           <td class="text-center">
                            <input type="checkbox" class="rounded-full status_keterangan text-xs" ${domain.status_keterangan == 'Done' ? 'checked' : ''} data-domain-id="${ domain.id }"> 
                        </td>
                           <td class="text-center">
                            <input type="checkbox" class="rounded-full status_nerd text-xs" ${domain.status_nerd == 'Done' ? 'checked' : ''} data-domain-id="${ domain.id }"> 
                        </td>
                           <td class="text-center">
                            <input type="checkbox" class="rounded-full status_sitemap text-xs" ${domain.status_sitemap == 'Done' ? 'checked' : ''} data-domain-id="${ domain.id }"> 
                        </td>
                         <td class="text-xs text-center"> ${ isDomains } </td>                       
                        <td class="text-center">
                            <div class="font-medium text-blue-600 dark:text-blue-500 flex items-center justify-center gap-3 text-xs">
                                 <button class="edit-button fa-solid fa-pen update" data-domain-id="${domain.id}"></button>
                                <button class="delete-button text-red-600 fa-solid fa-trash" data-domain-id="${domain.id}"></button>
                                </div>
                            </td>
                    `;
                    tableBody.appendChild(row);

                    const report = document.createElement('div');
                    report.innerHTML = `
                    <div class="border rounded-lg p-4 shadow-sm ${domain.status_nerd == 'Done' && domain.status_keterangan == 'Done' && domain.status_sitemap == 'Done' ? 'bg-green-700' : (domain.status_nerd == 'UnDone' && domain.status_keterangan == 'Running' && domain.status_sitemap == 'UnDone') ? 'bg-blue-700' : (isExpired == true) ? 'bg-red-500' : 'bg-green-500'}">
                    <div class="truncate font-extrabold text-lg leading-1 text-gray-200">${domain.nama_domain}</div>
                    <div class="truncate font-extrabold text-start leading-none text-gray-200">${domain.user.name}</div>
                    </div>
                    <div>
                     <div class="border mt-2 rounded-xl cp-1 text-sm flex items-center justify-center">
        <a href="${ domain.report }" target="_blank" data-tooltip-target="tooltip-default-{{ $items->id }}"
            class="p-2 w-full text-center font-extrabold">
            Lihat Report
        </a>
    </div>
    </div>
                    `;
                    tableReport.appendChild(report);
                });

                addEditButtonListeners();
            })
            .catch(error => console.error('Error fetching data:', error));
    }

    function addEditButtonListeners() {
        document.querySelectorAll('.update').forEach(button => {
            button.addEventListener('click', function() {
                const domainId = this.getAttribute('data-domain-id');
                console.log('Domain ID:', domainId);

                fetch(`/get-domain-details/${domainId}`)
                    .then(response => response.json())
                    .then(domain => {
                        console.log(domain);

                        document.querySelector('#editDomainModal .modal-body').innerHTML = `
                        <p>Nama Domain: ${domain.nama_domain}</p>
                        <p>User: ${domain.user.name}</p>
                        <!-- Tambahkan form atau data lainnya di sini -->
                    `;

                        $('#editDomainModal').modal('show');
                    })
                    .catch(error => console.error('Error fetching domain details:', error));
            });
        });
    }
</script>
{{-- <script>
    const domainss = @json($apiDomain);
    const domain = @json($domain);

    const matchingDomains = domain.reduce((acc, d) => {
        const foundDomains = domainss.filter(apiDomain =>
            apiDomain.nama_domain.toLowerCase() === d.nama_domain.toLowerCase());
        return acc.concat(foundDomains);
    }, []);
    const isExpired = new Date()
    const expiredDomains = matchingDomains.filter(data => new Date(data.tanggal_expired) < isExpired);
    const activeDomains = matchingDomains.filter(data => new Date(data.tanggal_expired) >= isExpired);
    document.getElementById('isExpired').innerHTML = expiredDomains.length
    document.getElementById('isActive').innerHTML = activeDomains.length

    // window.expiredDomains = expiredDomains;
</script> --}}
