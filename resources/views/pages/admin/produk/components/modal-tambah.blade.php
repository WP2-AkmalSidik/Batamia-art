<div id="addModal" class="modal fixed inset-0 z-50 flex items-center justify-center hidden bg-white/80 dark:bg-black/60">
    <div class="modal-content w-full max-w-xl mx-4 py-4 px-5">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-xl font-semibold">Tambah Produk</h3>
            <button onclick="closeModal('addModal')" class="text-gray-500 hover:text-gray-700 text-xl">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <form id="addProductForm">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-3">
                <div>
                    <label class="form-label">Nama Produk</label>
                    <input type="text" class="form-input w-full" placeholder="Nama produk" required>
                </div>
                <div>
                    <label class="form-label">Kategori</label>
                    <select class="form-input w-full" required>
                        <option value="">Pilih Kategori</option>
                        <option value="dekorasi">Dekorasi Rumah</option>
                        <option value="fashion">Fashion & Aksesoris</option>
                        <option value="tools">Peralatan</option>
                        <option value="furniture">Furniture</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-3">
                <div>
                    <label class="form-label">Harga (Rp)</label>
                    <input type="text" class="form-input w-full" placeholder="0" required>
                </div>
                <div>
                    <label class="form-label">Stok</label>
                    <input type="text" class="form-input w-full" placeholder="0" required>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea class="form-input w-full h-20 resize-none" placeholder="Deskripsi produk"></textarea>
            </div>

            <div class="mb-4">
                <label class="form-label">Gambar Produk</label>
                <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center">
                    <i class="fas fa-cloud-upload-alt text-2xl text-gray-400 mb-1"></i>
                    <p class="text-gray-500 text-sm">Drag & drop atau <span
                            class="text-blue-500 cursor-pointer">browse</span></p>
                    <input type="file" class="hidden" accept="image/*">
                </div>
            </div>

            <div class="flex justify-end space-x-2">
                <button type="button" onclick="closeModal('addModal')"
                    class="btn-secondary text-sm px-3 py-1.5">Batal</button>
                <button type="submit" class="btn-accent text-sm px-4 py-1.5">
                    <i class="fas fa-save mr-1"></i>Simpan
                </button>
            </div>
        </form>
    </div>
</div>
