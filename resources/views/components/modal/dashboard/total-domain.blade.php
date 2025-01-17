<!-- Main modal -->
<div id="showTotalDomain" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full bg-none backdrop-blur-md">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-start justify-between px-6 py-3 border-b rounded-t dark:border-gray-600 cp-3">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white self-center  ">
                    Nama Domain
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="showTotalDomain">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-5 bg-white rounded-lg">
                <input type="text" class="text-sm rounded-lg mb-2 w-full" onkeyup="searchReportActivity(this.value)"
                    placeholder="Search .....">
                <div class="rounded-lg h-[24rem] overflow-y-auto scrollbar-hide">
                    <table class="w-full text-left text-gray-500 dark:text-gray-400 rounded-lg"
                        id="reportActivityTable">
                        <thead
                            class="text-xs sticky top-0 z-10 text-gray-700 uppercase cp-1 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-10 py-3 text-left">Nama Domain</th>
                                <th scope="col" class="px-6 py-3 text-right">Category</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($domain as $items)
                                <tr class="border-b bg-white text-black">
                                    <th class="px-10 py-2 text-left">{{ $items->nama_domain }}</th>
                                    <th class="text-right px-3 py-2 text-sm">
                                        {{ $items->kategori->nama_kategori }}
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Modal footer -->
            {{-- <div
                class="flex items-center px-6 py-3 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600 cp-4">
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                <button data-modal-hide="showTotalDomain" type="button"
                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Close</button>
            </div> --}}
        </div>
    </div>
    {{-- </form> --}}
</div>
