<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
    <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
        {{ $loop->index + 1 }}
    </th>
    <td class="px-6 py-4">
        {{ $items->nama_domain }}
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        @if ($items->user)
            {{ $items->user->name }}
        @endif
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <select class="border-none focus:ring-0 bg-transparent text-sm status_keterangan"
            data-domain-id="{{ $items->id }}">
            <option value="Running" @if ($items->status_keterangan == 'Running') selected @endif>
                Running</option>
            <option value="Done" @if ($items->status_keterangan == 'Done') selected @endif>
                Done</option>
        </select>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <select class="border-none focus:ring-0 bg-transparent text-sm status_nerd"
            data-domain-id="{{ $items->id }}">
            <option value="Undone" @if ($items->status_nerd == 'Undone') selected @endif>
                Undone</option>
            <option value="Done" @if ($items->status_nerd == 'Done') selected @endif>
                Done</option>
        </select>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <select class="border-none focus:ring-0 bg-transparent text-sm status_sitemap"
            data-domain-id="{{ $items->id }}">
            <option value="Undone" @if ($items->status_sitemap == 'Undone') selected @endif>
                Undone</option>
            <option value="Done" @if ($items->status_sitemap == 'Done') selected @endif>
                Done</option>
        </select>
    </td>
    <td class="px-6 py-4 ">
        <div class="font-medium text-blue-600 dark:text-blue-500 flex items-center justify-center gap-3">
            <button class="" data-modal-target="editDomain-{{ $items->id }}"
                data-modal-toggle="editDomain-{{ $items->id }}">
                Edit
            </button>
            <x-modal.edit.edit-domain :domain="$items" :kategori="$kategori" :user="$user"></x-modal.edit.edit-domain>
            @if (Auth::user()->isAdmin == true)
                <form action="{{ route('domain.destroy', $items->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-600">
                        Delete
                    </button>
                </form>
            @endif
        </div>
    </td>
</tr>
