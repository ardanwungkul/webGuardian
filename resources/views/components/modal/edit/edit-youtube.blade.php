@props(['youtube' => '[]'])
<!-- Main modal -->
<div id="edit-youtube-{{ $youtube->id }}" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between px-6 py-3 border-b rounded-t dark:border-gray-600 cp-3">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Edit Youtube
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="edit-youtube-{{ $youtube->id }}">
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
                <form action="{{ route('youtube.update', $youtube->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-2 gap-3">
                        <input type="text" id="thumbnail{{ $youtube->id }}" name="thumbnail" class="hidden"
                            value="{{ $youtube->thumbnail }}">
                        <div class="col-span-2">
                            <div class="flex justify-center">
                                <div class="relative">
                                    @if ($youtube->thumbnail !== null)
                                        <img id="fotoProfil-{{ $youtube->id }}" class="object-cover w-40 h-40"
                                            src="{{ $youtube->thumbnail }}" alt="">
                                    @elseif($youtube->image !== null)
                                        <img id="fotoProfil-{{ $youtube->id }}" class="object-cover w-40 h-40"
                                            src="{{ asset('storage/images/youtube') }}/{{ $youtube->image }}"
                                            alt="">
                                    @else
                                        <img id="fotoProfil-{{ $youtube->id }}" class="object-cover w-40 h-40"
                                            src="{{ asset('storage/images/youtube') }}/youtube.png" alt="">
                                    @endif
                                    <div class="absolute z-10 top-0  opacity-0 hover:opacity-100">
                                        <label for="fotoProfilInput-{{ $youtube->id }}">
                                            <div class="w-40 h-40 bg-black opacity-60 flex items-center">
                                                <p class="text-center w-full"><i class="fa-solid fa-pen"
                                                        style="color: #ffffff;"></i>
                                                </p>
                                            </div>
                                            <input accept="image/*" type="file" name="image" class="hidden"
                                                id="fotoProfilInput-{{ $youtube->id }}" />

                                        </label>
                                    </div>
                                    <script>
                                        const fotoProfilInput{{ $youtube->id }} = document.getElementById('fotoProfilInput-{{ $youtube->id }}');
                                        const fotoProfil{{ $youtube->id }} = document.getElementById('fotoProfil-{{ $youtube->id }}');
                                        const thumbnail{{ $youtube->id }} = document.getElementById('thumbnail{{ $youtube->id }}');

                                        fotoProfilInput{{ $youtube->id }}.onchange = evt => {
                                            const [file] = fotoProfilInput{{ $youtube->id }}.files;
                                            if (file) {
                                                fotoProfil{{ $youtube->id }}.src = URL.createObjectURL(file);
                                                thumbnail{{ $youtube->id }}.value = '';
                                            }
                                        };
                                    </script>
                                </div>
                            </div>

                            <label for="link_youtube"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Link
                                Youtube*</label>
                            <input type="text" id="link_youtube" name="link_youtube"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukkan Link Youtube" value="{{ $youtube->link_youtube }}" required>
                        </div>
                        <div class="col-span-2">
                            <label for="judul"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul</label>
                            <input type="text" id="judul" name="judul"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukkan Judul" value="{{ $youtube->judul }}">
                        </div>
                        <div class="col-span-2">
                            <label for="keterangan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                            <textarea type="text" id="keterangan" name="keterangan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukkan Keterangan">{{ $youtube->keterangan }}</textarea>
                        </div>
                        <div class="col-span-2">
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Simpan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
