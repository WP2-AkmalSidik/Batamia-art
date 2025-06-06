<div id="detailModal"
    class="modal fixed inset-0 z-50 flex items-center justify-center hidden bg-white/80 dark:bg-black/60">
    <div class="modal-content w-full max-w-3xl mx-4 p-6">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-2xl font-bold">Detail Produk</h3>
            <button onclick="closeModal('detailModal')" class="text-gray-500 hover:text-gray-700 text-2xl">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Gambar Produk -->
            <div>
                <div class="aspect-square rounded-lg overflow-hidden border border-gray-200 dark:border-gray-700">
                    <img id="image-detail"
                        src="https://images.unsplash.com/photo-1602143407151-7111542de6e8?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60"
                        alt="Product" class="w-full h-full object-cover">
                </div>
            </div>

            <!-- Info Produk -->
            <div class="space-y-4">
                <div>
                    <h4 class="text-lg font-semibold mb-2"></h4>
                    <div class="flex items-center space-x-2 mb-2">
                        <span id="kategori_id-detail" class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm">Dekorasi Rumah</span>
                        <span id="statusDetail" class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm"></span>
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-4">
                    <div>
                        <p class="text-gray-500 text-sm">Harga</p>
                        <p id="harga-detail" class="text-xl font-bold text-green-600"></p>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Stok</p>
                        <p id="stok-detail" class="text-xl font-semibold"></p>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Berat</p>
                        <p id="berat-detail" class="text-xl font-semibold"></p>
                    </div>
                </div>

                <div>
                    <p class="text-gray-500 text-sm mb-2">Deskripsi</p>
                    <p class="text-gray-700 dark:text-gray-300" id="deskripsi-detail">
                        Vas bambu dengan desain minimalis yang cocok untuk dekorasi rumah modern.
                        Dibuat dari bambu berkualitas tinggi dengan finishing yang halus dan tahan lama.
                    </p>
                </div>

                <div class="grid grid-cols-2 gap-4 text-sm">
                    <div>
                        <p class="text-gray-500">Tanggal Dibuat</p>
                        <p id="created_at-detail">15 Januari 2024</p>
                    </div>
                    <div>
                        <p class="text-gray-500">Terakhir Update</p>
                        <p id="updated_at-detail">20 Januari 2024</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-end mt-6">
            <button onclick="closeModal('detailModal')" class="btn-secondary">Tutup</button>
        </div>
    </div>
</div>
