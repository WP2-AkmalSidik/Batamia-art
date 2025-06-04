<div id="addModal" class="modal fixed inset-0 z-50 flex items-center justify-center hidden bg-white/80 dark:bg-black/60">
    <div class="modal-content w-full max-w-lg mx-4 py-4 px-5">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-xl font-semibold">Tambah Kategori</h3>
            <button onclick="closeModal('addModal')" class="text-gray-500 hover:text-gray-700 text-xl">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <form id="addCategoryForm">
            <div class="mb-4">
                <label class="form-label">Nama Kategori</label>
                <input type="text" class="form-input w-full" placeholder="Nama kategori" required>
            </div>

            <div class="mb-4">
                <label class="form-label">Icon Kategori</label>
                <div class="grid grid-cols-6 gap-2">
                    <button type="button"
                        class="icon-option w-10 h-10 rounded-lg border-2 border-gray-300 flex items-center justify-center hover:border-blue-500 hover:bg-blue-50"
                        data-icon="fas fa-home">
                        <i class="fas fa-home text-gray-600"></i>
                    </button>
                    <button type="button"
                        class="icon-option w-10 h-10 rounded-lg border-2 border-gray-300 flex items-center justify-center hover:border-blue-500 hover:bg-blue-50"
                        data-icon="fas fa-tshirt">
                        <i class="fas fa-tshirt text-gray-600"></i>
                    </button>
                    <button type="button"
                        class="icon-option w-10 h-10 rounded-lg border-2 border-gray-300 flex items-center justify-center hover:border-blue-500 hover:bg-blue-50"
                        data-icon="fas fa-tools">
                        <i class="fas fa-tools text-gray-600"></i>
                    </button>
                    <button type="button"
                        class="icon-option w-10 h-10 rounded-lg border-2 border-gray-300 flex items-center justify-center hover:border-blue-500 hover:bg-blue-50"
                        data-icon="fas fa-couch">
                        <i class="fas fa-couch text-gray-600"></i>
                    </button>
                    <button type="button"
                        class="icon-option w-10 h-10 rounded-lg border-2 border-gray-300 flex items-center justify-center hover:border-blue-500 hover:bg-blue-50"
                        data-icon="fas fa-utensils">
                        <i class="fas fa-utensils text-gray-600"></i>
                    </button>
                    <button type="button"
                        class="icon-option w-10 h-10 rounded-lg border-2 border-gray-300 flex items-center justify-center hover:border-blue-500 hover:bg-blue-50"
                        data-icon="fas fa-gamepad">
                        <i class="fas fa-gamepad text-gray-600"></i>
                    </button>
                </div>
                <input type="hidden" id="selectedIcon" name="icon" value="">
            </div>

            <div class="mb-4">
                <label class="form-label">Deskripsi</label>
                <textarea class="form-input w-full h-20 resize-none" placeholder="Deskripsi kategori"></textarea>
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
