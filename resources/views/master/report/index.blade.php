<x-app-layout>
    @foreach ($domain as $item)
        <button data-modal-toggle="show-list-report-{{ $item->id }}" data-domain-id="{{ $item->id }}"
            class="hidden buttonEdit" data-modal-target="show-list-report-{{ $item->id }}">
            Edit
        </button>
        <x-modal.show.show-list-report :domain="$item">
        </x-modal.show.show-list-report>
    @endforeach
    <div class="p-3 space-y-3">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <div class="rounded-lg overflow-hidden py-2">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 py-2" id="tableReport">
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
</x-app-layout>
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var table = $('#tableReport').DataTable({
            info: false,
            lengthChange: false,
            ajax: '/reports/get',
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
