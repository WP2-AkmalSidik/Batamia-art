<div id="editModal"
    class="modal fixed inset-0 z-50 flex items-center justify-center bg-white/80 dark:bg-black/60 overflow-y-auto py-6 hidden">
    <div class="modal-content bg-white dark:bg-gray-800 shadow-lg rounded-lg w-full max-w-lg p-4">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-xl font-semibold">Edit Produk</h3>
            <button onclick="closeModal('editModal')" class="text-gray-500 hover:text-gray-700 text-xl">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <form id="editProductForm" class="space-y-3">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                <div>
                    <label class="form-label">Nama Produk</label>
                    <input type="text" class="form-input w-full" value="Vas Bambu Minimalis" required>
                </div>
                <div>
                    <label class="form-label">Kategori</label>
                    <select class="form-input w-full" required>
                        <option value="dekorasi" selected>Dekorasi Rumah</option>
                        <option value="fashion">Fashion & Aksesoris</option>
                        <option value="tools">Peralatan</option>
                        <option value="furniture">Furniture</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                <div>
                    <label class="form-label">Harga (Rp)</label>
                    <input type="number" class="form-input w-full" value="125000" required>
                </div>
                <div>
                    <label class="form-label">Stok</label>
                    <input type="number" class="form-input w-full" value="45" required>
                </div>
            </div>

            <div>
                <label class="form-label">Deskripsi</label>
                <textarea class="form-input w-full h-20 resize-none" required>Vas bambu dengan desain minimalis.</textarea>
            </div>

            <div>
                <label class="form-label">Gambar Produk</label>
                <div class="flex space-x-3">
                    <!-- Gambar saat ini -->
                    <div class="w-24 h-24 rounded-md overflow-hidden border">
                        <img src="https://images.unsplash.com/photo-1602143407151-7111542de6e8?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60"
                            alt="Current" class="w-full h-full object-cover">
                    </div>

                    <!-- Ganti gambar -->
                    <label
                        class="w-24 h-24 flex flex-col justify-center items-center border-2 border-dashed border-gray-300 rounded-md cursor-pointer overflow-hidden">
                        <i class="fas fa-cloud-upload-alt text-lg text-gray-400 mb-1"></i>
                        <p class="text-xs text-gray-500 text-center px-1">Ganti<br>gambar</p>
                        <input type="file" class="hidden" accept="image/*">
                    </label>
                </div>
            </div>

            <div class="flex justify-end space-x-2 pt-2">
                <button type="button" onclick="closeModal('editModal')"
                    class="btn-secondary px-4 py-2 text-sm">Batal</button>
                <button type="submit" class="btn-accent px-4 py-2 text-sm">
                    <i class="fas fa-save mr-1"></i>Update
                </button>
            </div>
        </form>
    </div>
</div>
