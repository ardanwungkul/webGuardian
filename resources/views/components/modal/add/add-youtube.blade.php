<!-- Main modal -->
<div id="addYoutube" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full ">
    <div class="relative w-full max-w-2xl max-h-full rounded-lg ">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between px-6 py-3 border-b rounded-t dark:border-gray-600 cp-3">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Tambah Youtube
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="addYoutube">
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
                <form action="{{ route('youtube.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="grid grid-cols-2 gap-3">
                        <div class="col-span-2">
                            <div class="flex justify-center">
                                <div class="relative">
                                    <img id="fotoProfil" class="object-cover w-40 h-40"
                                        src="{{ asset('storage/images/youtube') }}/youtube.png" alt="">
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
                                                thumbnail.value = '';
                                            }
                                        }
                                    </script>
                                </div>
                            </div>
                            <input type="text" id="thumbnail" name="thumbnail" class="hidden">
                            <div class="flex justify-between">
                                <label for="link_youtube"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Link
                                    Youtube*</label>
                                <button type="button" class="text-sm hidden" id="autofill"> Auto Fill</button>
                            </div>
                            <input type="text" id="link_youtube" name="link_youtube"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukkan Link Youtube" required>
                            <script>
                                const linkYoutubeInput = document.getElementById('link_youtube');
                                const autofillButton = document.getElementById('autofill');

                                linkYoutubeInput.addEventListener('input', function() {
                                    if (linkYoutubeInput.value.trim() !== '') {
                                        autofillButton.classList.remove('hidden');
                                    } else {
                                        autofillButton.classList.add('hidden');
                                    }
                                });
                            </script>
                        </div>
                        <div class="col-span-2">
                            <label for="judul"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul</label>
                            <input type="text" id="judul" name="judul"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukkan Judul">
                        </div>
                        <div class="col-span-2">
                            <label for="keterangan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                            <textarea type="text" id="keterangan" name="keterangan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukkan Keterangan"></textarea>
                        </div>
                        <div class="col-span-2">
                            <div class="flex items-center gap-4 justify-between">
                                <label for="user_id"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">User</label>
                                <button onclick="selectAll()" type="button">
                                    <svg viewBox="0 0 24 24" class="w-5 text-gray-500 fill-gray-500" version="1.1"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <path
                                            d="M20.4961766,5.62668182 C21.3720675,5.93447702 22,6.76890777 22,7.75 L22,17.75 C22,20.0972102 20.0972102,22 17.75,22 L7.75,22 C6.76890777,22 5.93447702,21.3720675 5.62668182,20.4961766 L7.72396188,20.4995565 L17.75,20.5 C19.2687831,20.5 20.5,19.2687831 20.5,17.75 L20.5,7.75 L20.4960194,7.69901943 L20.4961766,5.62668182 Z M17.246813,2 C18.4894537,2 19.496813,3.00735931 19.496813,4.25 L19.496813,17.246813 C19.496813,18.4894537 18.4894537,19.496813 17.246813,19.496813 L4.25,19.496813 C3.00735931,19.496813 2,18.4894537 2,17.246813 L2,4.25 C2,3.00735931 3.00735931,2 4.25,2 L17.246813,2 Z M13.4696699,7.46966991 L9.58114564,11.3581942 L8.6,10.05 C8.35147186,9.71862915 7.88137085,9.65147186 7.55,9.9 C7.21862915,10.1485281 7.15147186,10.6186292 7.4,10.95 L8.9,12.95 C9.17384721,13.3151296 9.70759806,13.3530621 10.0303301,13.0303301 L14.5303301,8.53033009 C14.8232233,8.23743687 14.8232233,7.76256313 14.5303301,7.46966991 C14.2374369,7.1767767 13.7625631,7.1767767 13.4696699,7.46966991 Z"
                                            id="🎨-Color"> </path>
                                    </svg>
                                </button>
                            </div>
                            <script>
                                function selectAll() {
                                    $("#user_id > option").prop("selected", true);
                                    $("#user_id").trigger("change");
                                }
                            </script>
                            <select name="user_id[]" id="user_id" multiple="multiple"
                                class="js-example-basic-multiple js-states bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                style="width: 100%" required>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
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
<script>
    const button = document.getElementById('autofill');
    const inputLink = document.getElementById('link_youtube');
    const judul = document.getElementById('judul');
    const keterangan = document.getElementById('keterangan');
    const thumbnailsImage = document.getElementById('fotoProfil');
    const inputImage = document.getElementById('thumbnail');
    button.addEventListener('click', function() {
        $.ajax({
            url: '/api/youtube',
            method: 'POSt',
            data: {
                _token: '{{ csrf_token() }}',
                link_youtube: inputLink.value
            },
            success: function(response) {

                const arrayThumbnails = response.items[0].snippet.thumbnails;
                const keys = Object.keys(arrayThumbnails);
                const lastKey = keys[keys.length - 1];
                const thumbnails = arrayThumbnails[lastKey].url;
                const title = response.items[0].snippet.localized.title;
                const description = response.items[0].snippet.localized.description;

                judul.value = title;
                keterangan.value = description;
                thumbnailsImage.src = thumbnails;
                inputImage.value = thumbnails;
            },
            error: function(error) {}
        });
    });
</script>
