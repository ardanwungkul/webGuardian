<!-- Main modal -->
<div id="editDomain-{{ $domain->id }}" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <form class="relative w-full max-w-2xl max-h-full" action="{{ route('domain.update', $domain->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between px-6 py-3 border-b rounded-t dark:border-gray-600 cp-3">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Edit Domain
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="editDomain-{{ $domain->id }}">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="px-6 py-3 space-y-6 cp-4">

                    <div class="grid grid-cols-2 gap-3">
                        <div class="col-span-2">
                            <label for="kategori_id"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori*</label>
                            <select id="kategori_id" name="kategori_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                                <option disabled selected>Pilih Kategori</option>
                                @foreach ($kategori as $items)
                                    <option value="{{ $items->id }}"
                                        @if ($items->id == $domain->kategori_id) selected @endif>{{ $items->nama_kategori }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-2">
                            <label for="user_id"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">User</label>
                            <select id="user_id" name="user_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="" selected>Pilih User</option>
                                @foreach ($user as $items)
                                    <option value="{{ $items->id }}"
                                        @if ($items->id == $domain->user_id) selected @endif>{{ $items->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-2">
                            <label for="nama_domain"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                Domain*</label>
                            <input type="text" id="nama_domain" name="nama_domain"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukkan Nama Domain" value="{{ $domain->nama_domain }}" required>
                        </div>
                        <div class="col-span-2">
                            <label for="report"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Link
                                Report</label>
                            <input type="text" id="report" name="report"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukkan Link Report" value="{{ $domain->report }}">
                        </div>
                        <div class="col-span-2">
                            <label for="catatan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Catatan</label>
                            <input type="text" id="catatan" name="catatan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukkan Catatan" value="{{ $domain->catatan }}">
                        </div>
                    </div>


                </div>
                <!-- Modal footer -->
                <div
                    class="flex items-center px-6 py-3 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600 cp-4">
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                    <button data-modal-hide="editDomain-{{ $domain->id }}" type="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Close</button>
                </div>
            </div>
        </div>
    </form>
</div>
