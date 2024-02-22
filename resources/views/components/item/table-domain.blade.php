<tr id="tableDomain-{{ $items->id }}"
    class="
    @if ($items->status_nerd == 'Done' && $items->status_keterangan == 'Done' && $items->status_sitemap == 'Done') bg-green-500 
    @elseif($items->status_nerd == 'UnDone' && $items->status_keterangan == 'Running' && $items->status_sitemap == 'Undone') bg-white @else bg-green-300 @endif
        border-b dark:bg-gray-800 dark:border-gray-700 !text-xs">
    <td class="px-3 py-4 text-black">
        {{ $items->nama_domain }}
    </td>
    <td class="px-3 py-4 text-black whitespace-nowrap">
        @if ($items->user)
            {{ $items->user->name }}
        @endif
    </td>
    <td class="px-3
    py-4 text-black whitespace-nowrap">

        <div class=" flex items-center justify-center">
            <input type="checkbox" class="status_keterangan rounded-lg"
                {{ $items->status_keterangan == 'Done' ? 'checked' : '' }} data-domain-id="{{ $items->id }}">
        </div>
    </td>
    <td class="px-3 py-4 text-black whitespace-nowrap">

        <div class=" flex items-center justify-center">
            <input type="checkbox" class="status_nerd rounded-lg" {{ $items->status_nerd == 'Done' ? 'checked' : '' }}
                data-domain-id="{{ $items->id }}">
        </div>
    </td>
    <td class="px-3 py-4 text-black whitespace-nowrap">

        <div class=" flex items-center justify-center">
            <input type="checkbox" class="status_sitemap rounded-lg"
                {{ $items->status_sitemap == 'Done' ? 'checked' : '' }} data-domain-id="{{ $items->id }}">
        </div>
    </td>
    <td class="px-3 py-4 text-black">
        @foreach ($apiDomain as $apiDomainItem)
            @php
                $expiredDate = \Carbon\Carbon::parse($apiDomainItem['tanggal_expired']);
                $isExpired = $expiredDate->isPast();
            @endphp
            @if (strtolower($items->nama_domain) == strtolower($apiDomainItem['nama_domain']))
                <span>
                    @if ($isExpired)
                        <script>
                            document.getElementById('tableDomain-{{ $items->id }}').classList.add('!bg-red-300');
                        </script>
                    @endif
                    {{ $apiDomainItem['tanggal_expired'] }}
                </span>
            @endif
        @endforeach
    </td>
    <td class="px-3 py-4 text-black ">
        <div class="font-medium text-blue-600 dark:text-blue-500 flex items-center justify-center gap-3">
            <button class="fa-solid fa-pen" data-modal-target="editDomain-{{ $items->id }}"
                data-modal-toggle="editDomain-{{ $items->id }}">
            </button>
            <x-modal.edit.edit-domain :domain="$items" :kategori="$kategori" :user="$user"></x-modal.edit.edit-domain>
            <form action="{{ route('domain.destroy', $items->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="text-red-600 fa-solid fa-trash">
                </button>
            </form>
        </div>
    </td>
</tr>
