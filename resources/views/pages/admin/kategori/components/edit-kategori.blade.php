<div id="editModal"
    class="modal fixed inset-0 z-50 flex items-center justify-center bg-white/80 dark:bg-black/60 overflow-y-auto py-6 hidden">
    <div class="modal-content bg-white dark:bg-gray-800 shadow-lg rounded-lg w-full max-w-lg p-4">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-xl font-semibold">Edit Kategori</h3>
            <button onclick="closeModal('editModal')" class="text-gray-500 hover:text-gray-700 text-xl">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <form id="edit-kategori" class="space-y-4">
            <div>
                <label class="form-label">Nama Kategori</label>
                <input type="text" name="nama" class="form-input w-full" required>
            </div>

            <div>
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
                <input type="hidden" id="editSelectedIcon" name="icon">
            </div>

            <div>
                <label class="form-label">Deskripsi</label>
                <textarea class="form-input w-full h-20 resize-none" name="deskripsi" required></textarea>
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
