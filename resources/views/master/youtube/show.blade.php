<x-app-layout>
    <div class="space-y-2 p-3">
        <div class="flex gap-4">
            <div class="w-2/3 flex-none">
                <div class="h-[379px]">
                    <iframe class="w-full h-full rounded-lg" src="{{ $youtube->link_youtube }}"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer;  clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
                <div>
                    <p class="text-xl text-black font-extrabold my-2">{{ $youtube->judul }}</p>
                    <div class="w-full cp-1 rounded-lg p-3 text-gray-800">
                        {!! nl2br(e($youtube->keterangan)) !!}
                    </div>
                </div>
            </div>
            <div>
                <ul class="space-y-2">
                    @foreach ($youtubeAll as $item)
                        @if ($item->id !== $youtube->id)
                            <li>
                                <a href="{{ route('youtube.show', $item->id) }}">
                                    <div class="flex gap-2">
                                        <div class="flex-none">
                                            <iframe class="w-[168px] h-[94px] rounded-lg"
                                                src="{{ $item->link_youtube }}" title="YouTube video player"
                                                frameborder="0"
                                                allow="accelerometer;  clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                allowfullscreen></iframe>
                                        </div>
                                        <div>
                                            <p class="text-gray-800 text-sm line-clamp-2 mt-2">{{ $item->judul }}</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
