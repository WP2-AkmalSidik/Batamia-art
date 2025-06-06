<div class="overflow-x-auto rounded-lg border border-gray-200 dark:border-gray-700">
    <table class="w-full text-sm text-left whitespace-nowrap">
        <thead>
            <tr class="border-b border-gray-200 dark:border-gray-700">
                <th class="text-left py-3 px-4 font-medium text-gray-600 dark:text-gray-400">#</th>
                <th class="text-left py-3 px-4 font-medium text-gray-600 dark:text-gray-400">Icon</th>
                <th class="text-left py-3 px-4 font-medium text-gray-600 dark:text-gray-400">Nama Kategori</th>
                <th class="text-left py-3 px-4 font-medium text-gray-600 dark:text-gray-400">Deskripsi</th>
                <th class="text-left py-3 px-4 font-medium text-gray-600 dark:text-gray-400">Jumlah</th>
                <th class="text-left py-3 px-4 font-medium text-gray-600 dark:text-gray-400">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
            <!-- Row -->
            @forelse ($kategoris as $kategori)
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors duration-200">
                    <td class="py-3 px-4 font-medium text-gray-900 dark:text-gray-200">
                        {{ $kategoris->firstItem() + $loop->index }}</td>
                    <td class="py-3 px-4">
                        <div
                            class="w-10 h-10 rounded-full bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center">
                            <i class="{{ $kategori->icon }} text-blue-600 dark:text-blue-400"></i>
                        </div>
                    </td>
                    <td class="py-3 px-4 text-gray-700 dark:text-gray-300 font-medium">{{ $kategori->nama }}</td>
                    <td class="py-3 px-4 text-gray-600 dark:text-gray-400 text-wrap">{{ $kategori->deskripsi }}</td>
                    <td class="py-3 px-4 text-gray-700 dark:text-gray-300">{{ $kategori->produks->count() }}</td>
                    <td class="py-3 px-4 text-center">
                        <div class="inline-flex space-x-2">
                            <button onclick="openEditModal({{ $kategori->id }})"
                                class="btn-outline text-yellow-500 hover:bg-yellow-50 dark:hover:bg-yellow-900/30">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button onclick="openDeleteModal({{ $kategori->id }}, {{ $kategori->produks->count() }})"
                                class="btn-outline text-red-600 hover:bg-red-50 dark:hover:bg-red-900/30">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="py-3 px-4 font-medium text-gray-900 dark:text-gray-200 text-center">Tidak
                        ada data.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
<div id="paginationLinks">
    {!! $kategoris->withQueryString()->links() !!}
</div>
