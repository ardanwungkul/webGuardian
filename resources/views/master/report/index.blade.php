<x-app-layout>
    <div class="p-3 space-y-3">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase cp-1 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Domain
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Report
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($domain as $item)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                {{ $loop->index + 1 }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $item->nama_domain }}
                            </td>
                            <td class="px-6 py-4 flex justify-center gap-3">
                                <a href="{{ route('reports.create', $item->id) }}">
                                    Buat Report
                                </a>
                                <a href="{{ route('reports.result', $item->id) }}" target="_blank">
                                    Hasil Report
                                </a>
                                <button data-modal-toggle="show-list-report-{{ $item->id }}"
                                    data-modal-target="show-list-report-{{ $item->id }}">
                                    Edit
                                </button>
                                <x-modal.show.show-list-report :domain="$item">
                                </x-modal.show.show-list-report>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
