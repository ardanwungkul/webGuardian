<x-app-layout>
    <div class="md:p-5 p-3">
        <x-header header="Kategori"></x-header>
        <div class="md:p-5 p-3 space-y-3 bg-white rounded-lg">
            <div>
                <button class="cp-1 text-sm rounded-lg p-3 font-bold" data-modal-target="addKategoriModal"
                    data-modal-toggle="addKategoriModal">Tambah Kategori</button>
            </div>
            @include('components.modal.add.add-kategori')
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase cp-1 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama Kategori
                            </th>
                            @if (Auth::user()->isAdmin == true)
                                <th scope="col" class="px-6 py-3 text-center">
                                    Action
                                </th>
                            @endif

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kategori as $item)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $loop->index + 1 }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $item->nama_kategori }}
                                </td>
                                @if (Auth::user()->isAdmin == true)
                                    <td class="px-6 py-4 flex items-center justify-center">
                                        <form action="{{ route('kategori.destroy', $item->id) }}" method="POST"
                                            class="m-0">
                                            @csrf
                                            @method('DELETE')
                                            <div class="flex items-center justify-center self-center">
                                                <button class="text-red-600 self-center">Delete</button>
                                            </div>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-app-layout>
