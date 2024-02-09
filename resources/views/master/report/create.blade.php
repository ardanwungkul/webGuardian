<x-app-layout>
    <form action="{{ route('reports.store', $domain->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="p-3 grid grid-cols-5 gap-3 min-h-screen">
            <div class="col-span-4 space-y-3">
                <input type="text" id="judul" name="judul"
                    class="col-span-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Masukkan Judul Report" required>
                <textarea id="reports" class="h-full" name="report"></textarea>
            </div>
            <div class="col-span-1 space-y-3">
                <div class="bg-white rounded-lg border border-gray-300">
                    <div class="p-2 cp-1 rounded-t-lg">
                        <p class="text-sm font-extrabold">Upload</p>
                    </div>
                    <div class="p-3">
                        <label for="tanggal_report"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Domain</label>
                        <input type="text" id="tanggal_report" name="tanggal_report"
                            class="col-span-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Masukkan Nama Domain" value="{{ $domain->nama_domain }}" required disabled>
                    </div>
                    <div class="p-3">
                        <label for="tanggal_report"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                            Report</label>
                        <input type="date" id="tanggal_report" name="tanggal_report"
                            class="col-span-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Masukkan Nama Domain" value="{{ now()->format('Y-m-d') }}" required>
                    </div>
                </div>
                <div class="bg-white rounded-lg border border-r-gray-300">
                    <div class="p-2 cp-1 rounded-t-lg">
                        <p class="text-sm font-extrabold">Youtube</p>
                    </div>
                    <div class="p-3">
                        <label for="link_youtube"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Link </label>
                        <input type="text" id="link_youtube" name="link_youtube"
                            class="col-span-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Masukkan Link">
                    </div>
                </div>
                <div class="bg-white rounded-lg border border-r-gray-300">
                    <div class="p-2 cp-1 rounded-t-lg">
                        <p class="text-sm font-extrabold">Image</p>
                    </div>
                    <div class="p-3">
                        <div class="relative flex justify-center">
                            <img id="fotoProfil" class="object-cover w-40 h-40"
                                src="{{ asset('storage/images/report') }}/placeholder.png" alt="">
                            <div class="absolute z-10 top-0  opacity-0 hover:opacity-100">
                                <label for="fotoProfilInput">
                                    <div class="w-40 h-40 bg-black opacity-60 flex items-center">
                                        <p class="text-center w-full"><i class="fa-solid fa-pen"
                                                style="color: #ffffff;"></i>
                                        </p>
                                    </div>
                                    <input accept="image/*" type="file" name="image" class="hidden"
                                        id="fotoProfilInput" />
                                </label>
                            </div>
                            <script>
                                fotoProfilInput.onchange = evt => {
                                    const [file] = fotoProfilInput.files
                                    if (file) {
                                        fotoProfil.src = URL.createObjectURL(file)
                                    }
                                }
                            </script>
                        </div>
                    </div>
                </div>
                <button class="cp-1 p-2 w-full rounded-lg border border-gray-300">Submit</button>
            </div>
        </div>
    </form>
</x-app-layout>
