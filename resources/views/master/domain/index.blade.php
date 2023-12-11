<x-app-layout>

    <div class="p-3 space-y-3">
        <div>
            <button class="cp-1 text-sm rounded-lg p-3 font-bold" data-modal-target="addDomainModal"
                data-modal-toggle="addDomainModal">Tambah Domain</button>
        </div>
        @include('components.modal.add.add-domain')
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <div class="rounded-lg overflow-hidden py-2">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 py-2" id="domainTable">
                    <thead class="text-xs text-gray-700 uppercase cp-1 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama Domain
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Kategori
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
                            @if (Auth::user()->isAdmin == true)
                                <th scope="col" class="px-6 py-3 text-center">
                                    Action
                                </th>
                            @endif

                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

</x-app-layout>

<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var table = $('#domainTable').DataTable({
            info: false,
            lengthChange: false,
            ajax: '/domains/get',
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

                        return selectElement.prop('outerHTML');
                    }
                },
                @if ($isAdmin)
                    {
                        data: 'action',
                        name: 'action',
                        sortable: false
                    },
                @endif
            ]
        });

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
    });
</script>
