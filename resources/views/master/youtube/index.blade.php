<x-app-layout>
    <div class="p-3 space-y-3">
        <div>
            <button class="cp-1 text-sm rounded-lg p-3 font-bold" data-modal-target="addYoutube"
                data-modal-toggle="addYoutube">Tambah
                Youtube</button>
            @include('components.modal.add.add-youtube')
        </div>

        <div class="">
            <div class="grid grid-cols-4 gap-3">
                @foreach ($youtube as $item)
                    <div class="cp-1 rounded-lg">
                        @if (Auth::user()->isAdmin == true)
                            <div class="flex justify-between items-center p-1 gap-1">
                                <a href="{{ route('youtube.show', $item->id) }}"
                                    class="font-semibold p-2 w-full truncate text-sm ">
                                    {{ $item->judul }}
                                </a>
                                <div class="flex flex-none w-[50px]">
                                    <div>
                                        <button data-modal-target="edit-youtube-{{ $item->id }}"
                                            data-modal-toggle="edit-youtube-{{ $item->id }}"
                                            class="fill-gray-400 bg-transparent hover:bg-gray-200 hover:fill-gray-900 rounded-lg fill-sm w-6 h-6 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:fill-white">
                                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="m3.99 16.854-1.314 3.504a.75.75 0 0 0 .966.965l3.503-1.314a3 3 0 0 0 1.068-.687L18.36 9.175s-.354-1.061-1.414-2.122c-1.06-1.06-2.122-1.414-2.122-1.414L4.677 15.786a3 3 0 0 0-.687 1.068zm12.249-12.63 1.383-1.383c.248-.248.579-.406.925-.348.487.08 1.232.322 1.934 1.025.703.703.945 1.447 1.025 1.934.058.346-.1.677-.348.925L19.774 7.76s-.353-1.06-1.414-2.12c-1.06-1.062-2.121-1.415-2.121-1.415z">
                                                </path>
                                            </svg>
                                        </button>
                                        <x-modal.edit.edit-youtube :youtube="$item">
                                        </x-modal.edit.edit-youtube>
                                    </div>
                                    <form action="{{ route('youtube.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-6 h-6 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="addYoutube">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endif

                        <div class="rounded-lg">
                            <div class="">
                                <iframe class="w-full h-full rounded-lg" src="{{ $item->link_youtube }}"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer;  clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{-- <div class="grid grid-cols-4 gap-2">
            @foreach ($youtube as $item)
                <div class="group">
                    <div class="outlinePage">
                        <div class="rounded-lg group-hover:rounded-b-none overflow-hidden">
                            <iframe class="w-full" src="{{ $item->link_youtube }}" title="YouTube video player"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="detailPage relative w-full">
                        <div
                            class="hidden group-hover:block cp-1 break-words text-sm p-3 absolute w-full rounded-lg rounded-t-none">
                            <div class="flex justify-end items-center">
                                <div>
                                    <button data-modal-target="edit-youtube-{{ $item->id }}"
                                        data-modal-toggle="edit-youtube-{{ $item->id }}"
                                        class="fill-gray-400 bg-transparent hover:bg-gray-200 hover:fill-gray-900 rounded-lg fill-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:fill-white">
                                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="m3.99 16.854-1.314 3.504a.75.75 0 0 0 .966.965l3.503-1.314a3 3 0 0 0 1.068-.687L18.36 9.175s-.354-1.061-1.414-2.122c-1.06-1.06-2.122-1.414-2.122-1.414L4.677 15.786a3 3 0 0 0-.687 1.068zm12.249-12.63 1.383-1.383c.248-.248.579-.406.925-.348.487.08 1.232.322 1.934 1.025.703.703.945 1.447 1.025 1.934.058.346-.1.677-.348.925L19.774 7.76s-.353-1.06-1.414-2.12c-1.06-1.062-2.121-1.415-2.121-1.415z">
                                            </path>
                                        </svg>
                                    </button>
                                    <x-modal.edit.edit-youtube :youtube="$item">
                                    </x-modal.edit.edit-youtube>
                                </div>
                                <form action="{{ route('youtube.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-hide="addYoutube">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </form>
                            </div>
                            {{ $item->keterangan }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div> --}}
    </div>
</x-app-layout>
