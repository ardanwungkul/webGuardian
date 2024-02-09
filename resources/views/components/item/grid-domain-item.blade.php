<div class="space-y-2">
    <div
        class="border rounded-lg h-20  @if ($items->status_keterangan == 'Running') running @elseif($items->status_keterangan == 'Done') done @endif relative">
        <button data-modal-target="editDomain2-{{ $items->id }}" data-modal-toggle="editDomain2-{{ $items->id }}"
            class=" w-full text-center h-full p-3   ">
            <p class="truncate font-extrabold text-lg text-start leading-1">
                {{ $items->nama_domain }}
            </p>
            @if ($items->user)
                <p class="truncate font-extrabold text-start text-sm leading-none text-gray-200">
                    {{ $items->user->name }}
                </p>
            @endif
        </button>
        <x-modal.edit.edit-domain2 :domain="$items" :kategori="$kategori" :user="$user"></x-modal.edit.edit-domain2>
    </div>
    <div class="border rounded-xl cp-1 text-sm flex items-center justify-center">
        <a href="{{ $items->report }}" target="_blank" data-tooltip-target="tooltip-default-{{ $items->id }}"
            class="p-2 w-full text-center font-extrabold">
            Lihat Report
        </a>
    </div>

    <div id="tooltip-default-{{ $items->id }}" role="tooltip"
        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
        {{ $items->report }}
        <div class="tooltip-arrow" data-popper-arrow></div>
    </div>

</div>
