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
        <!-- Sample Row 1 -->
        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors duration-200">
            <td class="py-3 px-4 font-medium text-gray-900 dark:text-gray-200">1</td>
            <td class="py-3 px-4">
                <div class="w-10 h-10 rounded-full bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center">
                    <i class="fas fa-home text-blue-600 dark:text-blue-400"></i>
                </div>
            </td>
            <td class="py-3 px-4 text-gray-700 dark:text-gray-300 font-medium">Dekorasi Rumah</td>
            <td class="py-3 px-4 text-gray-600 dark:text-gray-400">Produk dekorasi untuk rumah dan interior</td>
            <td class="py-3 px-4 text-gray-700 dark:text-gray-300">24</td>
            <td class="py-3 px-4 text-center">
                <div class="inline-flex space-x-2">
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
        <!-- Sample Row 2 -->
        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors duration-200">
            <td class="py-3 px-4 font-medium text-gray-900 dark:text-gray-200">2</td>
            <td class="py-3 px-4">
                <div
                    class="w-10 h-10 rounded-full bg-purple-100 dark:bg-purple-900/30 flex items-center justify-center">
                    <i class="fas fa-tshirt text-purple-600 dark:text-purple-400"></i>
                </div>
            </td>
            <td class="py-3 px-4 text-gray-700 dark:text-gray-300 font-medium">Fashion & Aksesoris</td>
            <td class="py-3 px-4 text-gray-600 dark:text-gray-400">Pakaian, tas, dan aksesoris fashion</td>
            <td class="py-3 px-4 text-gray-700 dark:text-gray-300">18</td>
            <td class="py-3 px-4 text-center">
                <div class="inline-flex space-x-2">
                    <button onclick="openEditModal(2)"
                        class="btn-outline text-yellow-500 hover:bg-yellow-50 dark:hover:bg-yellow-900/30">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button onclick="openDeleteModal(2)"
                        class="btn-outline text-red-600 hover:bg-red-50 dark:hover:bg-red-900/30">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </td>
        </tr>
        <!-- Sample Row 3 -->
        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors duration-200">
            <td class="py-3 px-4 font-medium text-gray-900 dark:text-gray-200">3</td>
            <td class="py-3 px-4">
                <div class="w-10 h-10 rounded-full bg-green-100 dark:bg-green-900/30 flex items-center justify-center">
                    <i class="fas fa-tools text-green-600 dark:text-green-400"></i>
                </div>
            </td>
            <td class="py-3 px-4 text-gray-700 dark:text-gray-300 font-medium">Peralatan</td>
            <td class="py-3 px-4 text-gray-600 dark:text-gray-400">Peralatan kerja dan rumah tangga</td>
            <td class="py-3 px-4 text-gray-700 dark:text-gray-300">12</td>
            <td class="py-3 px-4 text-center">
                <div class="inline-flex space-x-2">
                    <button onclick="openEditModal(3)"
                        class="btn-outline text-yellow-500 hover:bg-yellow-50 dark:hover:bg-yellow-900/30">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button onclick="openDeleteModal(3)"
                        class="btn-outline text-red-600 hover:bg-red-50 dark:hover:bg-red-900/30">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </td>
        </tr>
    </tbody>
</table>
