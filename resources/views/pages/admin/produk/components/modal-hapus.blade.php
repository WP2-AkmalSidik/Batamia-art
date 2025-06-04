<div id="deleteModal"
    class="modal fixed inset-0 z-50 flex items-center justify-center hidden bg-white/80 dark:bg-black/60">
    <div class="modal-content w-full max-w-md mx-4 p-6">
        <div class="text-center">
            <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-exclamation-triangle text-red-600 text-2xl"></i>
            </div>

            <h3 class="text-xl font-bold mb-2">Hapus Produk</h3>
            <p class="text-gray-600 dark:text-gray-400 mb-6">
                Apakah Anda yakin ingin menghapus produk <strong>"Vas Bambu Minimalis"</strong>?
                Tindakan ini tidak dapat dibatalkan.
            </p>

            <div class="flex justify-center space-x-3">
                <button onclick="closeModal('deleteModal')" class="btn-secondary">Batal</button>
                <button onclick="confirmDelete()" class="btn-danger">
                    <i class="fas fa-trash mr-2"></i>Hapus Produk
                </button>
            </div>
        </div>
    </div>
</div>
