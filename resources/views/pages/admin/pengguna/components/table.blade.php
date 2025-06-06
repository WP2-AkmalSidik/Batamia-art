<div class="overflow-x-auto rounded-lg">
    <table class="w-full text-sm text-left whitespace-nowrap">
        <thead>
            <tr class="border-b border-gray-200 dark:border-gray-700">
                <th class="text-left py-3 px-4 font-medium text-gray-600 dark:text-gray-400">#</th>
                <th class="text-left py-3 px-4 font-medium text-gray-600 dark:text-gray-400">Avatar</th>
                <th class="text-left py-3 px-4 font-medium text-gray-600 dark:text-gray-400">Nama</th>
                <th class="text-left py-3 px-4 font-medium text-gray-600 dark:text-gray-400">Email</th>
                <th class="text-left py-3 px-4 font-medium text-gray-600 dark:text-gray-400">Role</th>
                <th class="text-left py-3 px-4 font-medium text-gray-600 dark:text-gray-400">Bergabung</th>
                <th class="text-left py-3 px-4 font-medium text-gray-600 dark:text-gray-400">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
            @forelse ($users as $user)
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors duration-200">
                    <td class="py-3 px-4 font-medium text-gray-900 dark:text-gray-200">
                        {{ $users->firstItem() + $loop->index }}</td>
                    <td class="py-3 px-4">
                        <div
                            class="w-10 bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center">
                           <img src="{{ getUiAvatar($user->nama) }}" class="rounded-full" alt="">
                        </div>
                    </td>
                    <td class="py-3 px-4 text-gray-700 dark:text-gray-300 font-medium">{{ $user->nama }}</td>
                    <td class="py-3 px-4 text-gray-600 dark:text-gray-400">{{ $user->email }}</td>
                    <td class="py-3 px-4">
                        <span
                            class="px-2 py-1 text-xs font-medium rounded-full bg-{{ $user->role == 'admin' ? 'green' : 'blue' }}-100 text-{{ $user->role == 'admin' ? 'green' : 'blue' }}-800 dark:bg-{{ $user->role == 'admin' ? 'green' : 'blue' }}-900/30 dark:text-{{ $user->role == 'admin' ? 'green' : 'blue' }}-400">
                            {{ $user->role }}
                        </span>
                    </td>
                    <td class="py-3 px-4 text-gray-600 dark:text-gray-400">{{ format_tanggal($user->created_at) }}</td>
                    <td class="py-3 px-4 text-center">
                        <div class="inline-flex space-x-2">
                            <button onclick="openEditModal({{ $user->id }})"
                                class="btn-outline text-yellow-500 hover:bg-yellow-50 dark:hover:bg-yellow-900/30">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button onclick="openDeleteModal({{ $user->id }})"
                                class="btn-outline text-red-600 hover:bg-red-50 dark:hover:bg-red-900/30">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>
</div>
<div id="paginationLinks">
    {!! $users->withQueryString()->links() !!}
</div>
