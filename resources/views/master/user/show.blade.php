<x-app-layout>
    <div class="p-3">
        <div class="rounded-lg overflow-hidden">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
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
                        <th scope="col" class="px-6 py-3 text-center">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user->domain as $items)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                {{ $loop->index + 1 }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $items->nama_domain }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $items->kategori->nama_kategori }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if ($items->user)
                                    {{ $items->user->name }}
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <select class="border-none focus:ring-0 bg-transparent text-sm status_keterangan"
                                    data-domain-id="{{ $items->id }}">
                                    <option value="Running" @if ($items->status_keterangan == 'Running') selected @endif>
                                        Running</option>
                                    <option value="Done" @if ($items->status_keterangan == 'Done') selected @endif>
                                        Done</option>
                                </select>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <select class="border-none focus:ring-0 bg-transparent text-sm status_sitemap"
                                    data-domain-id="{{ $items->id }}">
                                    <option value="Undone" @if ($items->status_sitemap == 'Undone') selected @endif>
                                        Undone</option>
                                    <option value="Done" @if ($items->status_sitemap == 'Done') selected @endif>
                                        Done</option>
                                </select>
                            </td>
                            <td class="px-6 py-4 ">
                                <div
                                    class="font-medium text-blue-600 dark:text-blue-500 flex items-center justify-center gap-3">
                                    <button class="" data-modal-target="editDomain-{{ $items->id }}"
                                        data-modal-toggle="editDomain-{{ $items->id }}">
                                        Edit
                                    </button>
                                    <x-modal.edit.edit-domain :domain="$items" :kategori="$kategori"
                                        :user="$users"></x-modal.edit.edit-domain>
                                    <form action="{{ route('domain.destroy', $items->id) }}" method="POST">
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
