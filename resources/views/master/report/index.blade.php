<x-app-layout>
    <div class="md:p-5 p-3">
        <x-header header="Report SEO"></x-header>
        <div class="md:p-5 p-3 bg-white rounded-lg">
            @foreach ($domain as $item)
                <button data-modal-toggle="show-list-report-{{ $item->id }}" data-domain-id="{{ $item->id }}"
                    class="hidden buttonEdit" data-modal-target="show-list-report-{{ $item->id }}">
                    Edit
                </button>
                <x-modal.show.show-list-report :domain="$item">
                </x-modal.show.show-list-report>
            @endforeach
            <div class="p-3 space-y-3">
                <div class="relative overflow-x-autop-3">
                    <div class="rounded-lg overflow-hidden py-2">
                        <table class="!w-full text-sm text-left text-gray-500 dark:text-gray-400 py-2" id="tableReport">
                            <thead class="text-xs text-gray-700 uppercase cp-1 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        No
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Nama Domain
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Last Report
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Kategori
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Nama User
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        Report
                                    </th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
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
        var table = $('#tableReport').DataTable({
            info: true,
            lengthChange: false,
            paging: false,
            ajax: '/reports/get',
            responsive: {
                details: {
                    renderer: function(api, rowIdx, columns) {
                        let data = columns.map((col, i) => {
                            return col.hidden ?
                                '<tr class="text-start p-0" data-dt-row="' + col
                                .rowIndex +
                                '" data-dt-column="' + col.columnIndex + '">' +
                                '<td class="text-start flex justify-between gap-1 !p-0"><div class="flex gap-1"><p class="w-[100px]">' +
                                col.title + '</p><p>:</p><p class="font-bold">' + col.data +
                                '</p></div></td> ' +
                                '</tr>' :
                                '';
                        }).join('');

                        let table = document.createElement('table');
                        table.innerHTML = data;

                        return data ? table : false;
                    }
                }
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'nama_domain',
                    name: 'nama_domain',
                    render: function(data, type, full) {
                        return '<p>' + data + '<span class="text-xs font-bold"> (' + full
                            .reports.length +
                            ')</span></p>'
                    }
                },
                {
                    data: 'id'
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
                        if (data) {
                            return '<a href="/reports/user/' + data.id + '">' + data.name +
                                '</a>';
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

        $(document).on('click', '.editButton', function() {
            var id = $(this).data('domain-id');
            $('.buttonEdit[data-domain-id="' + id + '"]').click();
        });

    });
</script>
