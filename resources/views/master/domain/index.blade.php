<x-app-layout>

    <div class="p-3 space-y-3">
        <div>
            <button class="cp-1 text-sm rounded-lg p-3 font-bold" data-modal-target="addDomainModal"
                data-modal-toggle="addDomainModal">Tambah Domain</button>
            @include('components.modal.add.add-domain')
        </div>
        <input type="text" class="text-sm rounded-lg" id="myInput" onkeyup="searchFunction()"
            placeholder="Search .....">
        <div class="relative overflow-x-auto shadow-md rounded-lg">
            <div class="rounded-lg overflow-hidden">
                <table class="w-full text-gray-500 py-2" id="domainTable">
                    <thead class="text-xs text-gray-700 uppercase cp-1">
                        <tr>
                            <th scope="col" class="px-6 py-2">
                                Nama Domain
                            </th>
                            <th scope="col" class="px-6 py-2">
                                Kategori
                            </th>
                            <th scope="col" class="px-6 py-2">
                                User
                            </th>
                            <th scope="col" class="px-6 py-2">
                                Status Generate
                            </th>
                            <th scope="col" class="px-6 py-2">
                                Status Nerd
                            </th>
                            <th scope="col" class="px-6 py-2">
                                Status Sitemap
                            </th>
                            <th scope="col" class="px-6 py-2">
                                Tanggal Expired
                            </th>
                            @if (Auth::user()->isAdmin == true)
                                <th scope="col" class="px-6 py-2 text-center">
                                    Action
                                </th>
                            @endif

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($domain as $items)
                            <tr id="tableDomain-{{ $items->id }}"
                                class="
                                @if ($items->status_nerd == 'Done' && $items->status_keterangan == 'Done' && $items->status_sitemap == 'Done') bg-green-500 
                                @elseif($items->status_nerd == 'UnDone' && $items->status_keterangan == 'Running' && $items->status_sitemap == 'Undone') bg-white @else bg-green-300 @endif
                                    border-b dark:bg-gray-800 dark:border-gray-700 !text-xs">
                                <td class="px-3 py-4 text-black">
                                    {{ $items->nama_domain }}
                                </td>
                                <td class="px-3 py-4 text-black">
                                    {{ $items->kategori->nama_kategori }}
                                </td>
                                <td class="px-3 py-4 text-black whitespace-nowrap">
                                    @if ($items->user)
                                        {{ $items->user->name }}
                                    @endif
                                </td>
                                <td class="px-3
                                py-4 text-black whitespace-nowrap">
                                    <div class=" flex items-center justify-center">
                                        <input type="checkbox" class="status_keterangan rounded-lg"
                                            {{ $items->status_keterangan == 'Done' ? 'checked' : '' }}
                                            data-domain-id="{{ $items->id }}">
                                    </div>
                                </td>
                                <td class="px-3 py-4 text-black whitespace-nowrap">
                                    <div class=" flex items-center justify-center">
                                        <input type="checkbox" class="status_nerd rounded-lg"
                                            {{ $items->status_nerd == 'Done' ? 'checked' : '' }}
                                            data-domain-id="{{ $items->id }}">
                                    </div>
                                </td>
                                <td class="px-3 py-4 text-black whitespace-nowrap">
                                    <div class=" flex items-center justify-center">
                                        <input type="checkbox" class="status_sitemap rounded-lg"
                                            {{ $items->status_sitemap == 'Done' ? 'checked' : '' }}
                                            data-domain-id="{{ $items->id }}">
                                    </div>
                                </td>
                                <td class="px-3 py-4 text-black">
                                    @foreach ($apiDomain as $apiDomainItem)
                                        @php
                                            $expiredDate = \Carbon\Carbon::parse($apiDomainItem['tanggal_expired']);
                                            $isExpired = $expiredDate->isPast();
                                        @endphp
                                        @if (strtolower($items->nama_domain) == strtolower($apiDomainItem['nama_domain']))
                                            <span>
                                                @if ($isExpired)
                                                    <script>
                                                        document.getElementById('tableDomain-{{ $items->id }}').classList.add('!bg-red-300');
                                                    </script>
                                                @endif
                                                {{ $apiDomainItem['tanggal_expired'] }}
                                            </span>
                                        @endif
                                    @endforeach
                                </td>
                                <td class="px-3 py-4 text-black ">
                                    <div
                                        class="font-medium text-blue-600 dark:text-blue-500 flex items-center justify-center gap-3">
                                        <button class="fa-solid fa-pen"
                                            data-modal-target="editDomain-{{ $items->id }}"
                                            data-modal-toggle="editDomain-{{ $items->id }}">
                                        </button>
                                        <x-modal.edit.edit-domain :domain="$items" :kategori="$kategori"
                                            :user="$user"></x-modal.edit.edit-domain>
                                        <form action="{{ route('domain.destroy', $items->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-red-600 fa-solid fa-trash">
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

</x-app-layout>

<script>
    function searchFunction() {
        var input, filter, table, tr, td1, td2, td3, i, txtValue1, txtValue2;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("domainTable");
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            td1 = tr[i].getElementsByTagName("td")[0];
            td2 = tr[i].getElementsByTagName("td")[1];
            td3 = tr[i].getElementsByTagName("td")[2];
            if (td1 && td2 && td3) {
                txtValue1 = td1.textContent || td1.innerText;
                txtValue2 = td2.textContent || td2.innerText;
                txtValue3 = td3.textContent || td3.innerText;

                var combinedText = txtValue1 + ' ' + txtValue2 + '' + txtValue3;
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
    $(document).ready(function() {
        var allDomainApi = [];
        $.ajax({
            url: 'https://client.webz.biz/api/domain',
            method: 'GET',
            success: function(data) {
                data.forEach(item => {
                    allDomainApi.push(item.nama_domain);
                });
            },
            error: function(error) {
                console.error('Error:', error);
            }
        });

        $("#nama_domain").autocomplete({
            source: allDomainApi
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
{{-- 
<script>
    var allDomainWithExpired = [];
    var table;
    $(document).ready(function() {
        var allDomainApi = [];
        $.ajax({
            url: 'https://client.webz.biz/api/domain',
            method: 'GET',
            success: function(data) {
                data.forEach(item => {
                    allDomainApi.push(item.nama_domain);
                    allDomainWithExpired.push({
                        nama_domain: item.nama_domain,
                        tanggal_expired: item.tanggal_expired
                    });
                });
                initializeDataTable();
            },
            error: function(error) {
                console.error('Error:', error);
            }
        });

        $("#nama_domain").autocomplete({
            source: allDomainApi
        });




        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function initializeDataTable() {
            table = $('#domainTable').DataTable({
                info: false,
                lengthChange: false,
                paging: false,
                ajax: '/domains/get',
                createdRow: function(row, data, dataIndex) {
                    updateRowColor(data.nama_domain, data.status_nerd);
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'nama_domain',
                        name: 'nama_domain'
                    },
                    {
                        data: 'kategori',
                        name: 'kategori',
                        render: function(data) {
                            return data.nama_kategori;
                        }
                    },
                    {
                        data: 'user',
                        name: 'user',
                        render: function(data) {
                            if (data !== null) {
                                return data.name;
                            } else {
                                return '';
                            }
                        }
                    },
                    {
                        data: 'status_keterangan',
                        name: 'status_keterangan',
                        sortable: false,
                        render: function(data, type, full, meta) {
                            let isSelectedRunning = (data === 'Running') ? 'selected' : '';
                            let isSelectedDone = (data === 'Done') ? 'selected' : '';

                            let selectElement = $(`<select class="border-none focus:ring-0 bg-transparent text-sm status_keterangan" data-domain-id="${full.id}">
                                                        <option value="Running" ${isSelectedRunning}>Running</option>
                                                        <option value="Done" ${isSelectedDone}>Done</option>
                                                    </select>`);

                            return selectElement.prop('outerHTML');
                        }
                    },
                    {
                        data: 'status_nerd',
                        name: 'status_nerd',
                        sortable: false,
                        render: function(data, type, full, meta) {
                            let selectUndone = (data === 'UnDone') ? 'selected' : '';
                            let selectDone = (data === 'Done') ? 'selected' : '';

                            let selectElement = $(`<select class="border-none focus:ring-0 bg-transparent text-sm status_nerd" data-domain-id="${full.id}">
                                                        <option value="UnDone" ${selectUndone}>UnDone</option>
                                                        <option value="Done" ${selectDone}>Done</option>
                                                    </select>`);




                            return selectElement.prop('outerHTML');
                        }
                    },
                    {
                        data: 'status_sitemap',
                        name: 'status_sitemap',
                        sortable: false,
                        render: function(data, type, full, meta) {
                            let selectElement = $(`<select class="border-none focus:ring-0 bg-transparent text-sm status_sitemap" data-domain-id="${full.id}">
                                                        <option value="Undone" ${data === 'Undone' ? 'selected' : ''}>Undone</option>
                                                        <option value="Done" ${data === 'Done' ? 'selected' : ''}>Done</option>
                                                    </select>`);



                            return selectElement.prop('outerHTML');
                        }
                    },
                    {
                        data: 'nama_domain',
                        name: 'nama_domain',
                        render: function(data, type, row) {
                            var apiDomainItem = allDomainWithExpired.find(function(item) {
                                return item['nama_domain'].toLowerCase() === data
                                    .toLowerCase();
                            });
                            if (apiDomainItem) {
                                return apiDomainItem.tanggal_expired;
                            } else {
                                return '';
                            }
                        }
                    },
                    {
                        data: 'action',
                        name: 'action',
                        sortable: false
                    },
                ]
            });
        }

        $('body').on('click', '.deleteProduct', function() {
            var product_id = $(this).data("id");
            $.ajax({
                type: "DELETE",
                url: '/domains/' + product_id,
                data: {
                    "_token": $('meta[name="csrf-token"]').attr(
                        'content')
                },
                success: function(data) {
                    table.ajax.reload();
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });
        });
        $('body').on('change', '.status_nerd', function() {
            var status = $(this).val();
            var domainId = $(this).data('domain-id');
            loading.style.display = 'block';

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
                    updateRowColor(domainId, status);
                },
                error: function(error) {}
            });
        });

        function updateRowColor(domainId, newStatusNerd) {
            var rowIndex = table.rows().eq(0).filter(function(rowIdx) {
                return table.cell(rowIdx, 1).data().toLowerCase() === domainId.toLowerCase();
            });

            if (rowIndex.length > 0) {
                rowIndex = rowIndex[0];

                // Hapus kelas warna lama
                $(table.row(rowIndex).node()).removeClass('bg-green-200 bg-red-200 bg-transparent');

                if (newStatusNerd === 'Done') {
                    $(table.row(rowIndex).node()).addClass('bg-green-200');
                } else if (newStatusNerd === 'UnDone') {
                    $(table.row(rowIndex).node()).addClass('bg-red-200');
                } else {
                    $(table.row(rowIndex).node()).addClass('bg-transparent');
                }
            }
        }
        $('body').on('change', '.status_sitemap', function() {
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
        $('body').on('change', '.status_keterangan', function() {
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

    });
</script> --}}
