    <div class="overflow-x-auto rounded-lg">
        <table class="w-full text-sm text-left whitespace-nowrap">
            <thead>
                <tr class="border-b border-gray-200 dark:border-gray-700">
                    <th class="text-left py-3 px-4 font-medium text-gray-600 dark:text-gray-400">#</th>
                    <th class="text-left py-3 px-4 font-medium text-gray-600 dark:text-gray-400">Gambar</th>
                    <th class="text-left py-3 px-4 font-medium text-gray-600 dark:text-gray-400">Nama Produk</th>
                    <th class="text-left py-3 px-4 font-medium text-gray-600 dark:text-gray-400">Kategori</th>
                    <th class="text-left py-3 px-4 font-medium text-gray-600 dark:text-gray-400">Harga</th>
                    <th class="text-left py-3 px-4 font-medium text-gray-600 dark:text-gray-400">Berat</th>
                    <th class="text-left py-3 px-4 font-medium text-gray-600 dark:text-gray-400">Status</th>
                    <th class="text-left py-3 px-4 font-medium text-gray-600 dark:text-gray-400">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                <!-- Row -->
                @forelse ($produks as $produk)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-400/80 transition-colors duration-200">
                        <td class="py-3 px-4 font-medium text-gray-900 dark:text-gray-200">
                            {{ $produks->firstItem() + $loop->index }}</td>
                        </td>
                        <td class="py-3 px-4">
                            <div
                                class="w-14 h-14 rounded-lg overflow-hidden border border-gray-200 dark:border-gray-700 shadow-sm">
                                <img src="{{ Str::startsWith($produk->image, 'https://ui-avatars.com') ? $produk->image : asset('storage/' . $produk->image) }}"
                                    alt="{{ $produk->nama }}" class="w-full h-full object-cover">
                            </div>
                        </td>
                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300">{{ $produk->nama }}</td>
                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300">{{ $produk->kategori->nama ?? '-' }}</td>
                        <td class="py-3 px-4 font-semibold text-gray-900 dark:text-gray-300">{{ format_rp($produk->harga) }}</td>
                        <td class="py-3 px-4 font-semibold text-gray-900 dark:text-gray-300">{{ format_berat($produk->berat) }}</td>
                        <td class="py-3 px-4 font-semibold text-gray-900 dark:text-gray-300">{!! $produk->status == true ? '<span id="status-detail" class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm">Aktif</span>' : '<span id="status-detail" class="px-3 py-1 bg-red-100 text-red-800 rounded-full text-sm">Nonaktif</span>' !!}</td>
                        <td class="py-3 px-4 text-center">
                            <div class="inline-flex space-x-2">
                                <button onclick="openDetailModal({{ $produk->id }})"
                                    class="btn-outline text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-900/30">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button onclick="openEditModal({{ $produk->id }})"
                                    class="btn-outline text-yellow-500 hover:bg-yellow-50 dark:hover:bg-yellow-900/30">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button onclick="openDeleteModal({{ $produk->id }})"
                                    class="btn-outline text-red-600 hover:bg-red-50 dark:hover:bg-red-900/30">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-400/80 transition-colors duration-200 text-center">
                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300" colspan="6">Tidak ada data.</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>
    <div id="paginationLinks">
        {!! $produks->withQueryString()->links() !!}
    </div>
