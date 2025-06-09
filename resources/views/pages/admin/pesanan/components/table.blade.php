 <div class="overflow-x-auto rounded-lg">
     <table class="w-full text-sm text-left whitespace-nowrap">
         <thead>
             <tr class="border-b border-gray-200 dark:border-gray-700">
                 <th class="text-left py-3 px-4 font-medium text-gray-600 dark:text-gray-400">No Order</th>
                 <th class="text-left py-3 px-4 font-medium text-gray-600 dark:text-gray-400">Nama Produk</th>
                 <th class="text-left py-3 px-4 font-medium text-gray-600 dark:text-gray-400">Kuantitas</th>
                 <th class="text-left py-3 px-4 font-medium text-gray-600 dark:text-gray-400">Total Harga</th>
                 <th class="text-left py-3 px-4 font-medium text-gray-600 dark:text-gray-400">Status</th>
                 <th class="text-left py-3 px-4 font-medium text-gray-600 dark:text-gray-400">Aksi</th>
             </tr>
         </thead>
         <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
             @forelse ($pesanans as $pesanan)
                 <tr class="hover:bg-gray-50 dark:hover:bg-gray-400/80 transition-colors duration-200">
                     <td class="py-3 px-4 font-medium text-gray-900 dark:text-gray-200">ORD001</td>
                     <td class="py-3 px-4 text-gray-700 dark:text-gray-300 font-medium">
                         {{ $pesanan->pesananProduks->first() }}</td>
                     <td class="py-3 px-4 text-gray-700 dark:text-gray-300">100 pcs</td>
                     <td class="py-3 px-4 text-gray-700 dark:text-gray-300 font-semibold">Rp 1.450.000</td>
                     <td class="py-3 px-4">
                         <span class="px-3 py-1 rounded-full text-sm text-white status-ditolak">Ditolak</span>
                     </td>
                     <td class="py-3 px-4 text-center">
                         <div class="inline-flex space-x-2">
                             <button onclick="openDetailModal(1)"
                                 class="btn-outline text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-900/30">
                                 <i class="fas fa-eye"></i>
                             </button>
                             <button onclick="openStatusModal(1)"
                                 class="btn-outline text-green-600 hover:bg-green-50 dark:hover:bg-green-900/30">
                                 <i class="fas fa-edit"></i>
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
     {!! $pesanans->withQueryString()->links() !!}
 </div>
