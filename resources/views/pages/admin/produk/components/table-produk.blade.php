<div class="overflow-x-auto rounded-lg">
    <table class="w-full text-sm text-left whitespace-nowrap">
        <thead>
            <tr class="border-b border-gray-200 dark:border-gray-700">
                <th class="text-left py-3 px-4 font-medium text-gray-600 dark:text-gray-400">#</th>
                <th class="text-left py-3 px-4 font-medium text-gray-600 dark:text-gray-400">Gambar</th>
                <th class="text-left py-3 px-4 font-medium text-gray-600 dark:text-gray-400">Nama Produk</th>
                <th class="text-left py-3 px-4 font-medium text-gray-600 dark:text-gray-400">Kategori</th>
                <th class="text-left py-3 px-4 font-medium text-gray-600 dark:text-gray-400">Harga</th>
                <th class="text-left py-3 px-4 font-medium text-gray-600 dark:text-gray-400">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
            <!-- Sample Row -->
            <tr class="hover:bg-gray-50 dark:hover:bg-gray-400/80 transition-colors duration-200">
                <td class="py-3 px-4 font-medium text-gray-900 dark:text-gray-200">1</td>
                <td class="py-3 px-4">
                    <div
                        class="w-14 h-14 rounded-lg overflow-hidden border border-gray-200 dark:border-gray-700 shadow-sm">
                        <img src="https://images.unsplash.com/photo-1602143407151-7111542de6e8?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60"
                            alt="Vas Bambu" class="w-full h-full object-cover">
                    </div>
                </td>
                <td class="py-3 px-4 text-gray-700 dark:text-gray-300">Vas Bambu Minimalis</td>
                <td class="py-3 px-4 text-gray-700 dark:text-gray-300">Dekorasi Rumah</td>
                <td class="py-3 px-4 font-semibold text-gray-900 dark:text-gray-300">Rp 125.000</td>
                <td class="py-3 px-4 text-center">
                    <div class="inline-flex space-x-2">
                        <button onclick="openDetailModal(1)"
                            class="btn-outline text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-900/30">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button onclick="openEditModal(1)"
                            class="btn-outline text-yellow-500 hover:bg-yellow-50 dark:hover:bg-yellow-900/30">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button onclick="openDeleteModal(1)"
                            class="btn-outline text-red-600 hover:bg-red-50 dark:hover:bg-red-900/30">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
