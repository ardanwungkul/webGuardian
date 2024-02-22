<div class="space-y-2">

    <div id="gridDomain-{{ $items->id }}"
        class="border rounded-lg h-20   @if ($items->status_nerd == 'Done' && $items->status_keterangan == 'Done' && $items->status_sitemap == 'Done') bg-green-700 
        @elseif($items->status_nerd == 'UnDone' && $items->status_keterangan == 'Running' && $items->status_sitemap == 'Undone') bg-blue-700 @else bg-green-500 @endif
        @foreach ($apiDomain as $apiDomainItem)
        @php
            $expiredDate = \Carbon\Carbon::parse($apiDomainItem['tanggal_expired']);
            $isExpired = $expiredDate->isPast();
        @endphp
        @if (strtolower($items->nama_domain) == strtolower($apiDomainItem['nama_domain']))
                @if ($isExpired)
               !bg-red-500
                @endif
        @endif @endforeach
        relative">
        <button data-modal-target="editDomain2-{{ $items->id }}" data-modal-toggle="editDomain2-{{ $items->id }}"
            class=" w-full text-center h-full p-3   ">
            <p class="truncate font-extrabold text-lg text-start leading-1 text-gray-200">
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
