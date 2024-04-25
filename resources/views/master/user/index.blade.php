<x-app-layout>
    <div class="md:p-5 p-3">
        <x-header header="User"></x-header>
        <div class="p-3 md:p-5 space-y-3 bg-white rounded-lg">
            <div>
                <button class="cp-1 text-sm rounded-lg p-3 font-bold" data-modal-target="addUserModal"
                    data-modal-toggle="addUserModal">Tambah User</button>
            </div>
            @include('components.modal.add.add-user')
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase cp-1 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Username
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama Lengkap
                            </th>
                            <th scope="col" class="px-6 py-3">
                                E-mail
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($user) > 0)
                            @foreach ($user as $item)
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $loop->index + 1 }}
                                    </th>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('user.show', $item->id) }}"
                                            class="text-blue-500 hover:underline">
                                            {{ $item->username }}
                                        </a>
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->email }}
                                    </td>
                                    <td class="px-6 py-4 ">
                                        <div class="flex items-center justify-center gap-3">
                                            <div>
                                                <button data-modal-target="editUser-{{ $item->id }}"
                                                    data-modal-toggle="editUser-{{ $item->id }}"
                                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</button>
                                                <x-modal.edit.edit-user :user="$item">
                                                </x-modal.edit.edit-user>
                                            </div>
                                            <div>
                                                <form method="POST" action="{{ route('user.destroy', $item->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="text-red-600"> Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4"
                                    class="px-6 py-4 font-medium text-gray-900 dark:text-white text-center bg-white">
                                    Tidak ada data tersedia.
                                </td>
                            </tr>
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-app-layout>
