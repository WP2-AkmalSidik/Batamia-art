<div id="editModal" class="modal fixed inset-0 z-50 flex items-center justify-center bg-white/80 dark:bg-black/60 overflow-y-auto py-6 hidden">
    <div class="modal-content bg-white dark:bg-gray-800 shadow-lg rounded-lg w-full max-w-lg p-4">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-xl font-semibold">Edit Pengguna</h3>
            <button onclick="closeModal('editModal')" class="text-gray-500 hover:text-gray-700 text-xl">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <form id="editUserForm" class="space-y-4">
            <div>
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="nama" class="form-input w-full" value="Ahmad Pratama" required>
            </div>

            <div>
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-input w-full" value="ahmad.pratama@email.com" required>
            </div>

            <div>
                <label class="form-label">Password Baru</label>
                <input type="password" name="password" class="form-input w-full" placeholder="Kosongkan jika tidak ingin mengubah password">
                <small class="text-gray-500 text-xs">Kosongkan jika tidak ingin mengubah password</small>
            </div>

            <div>
                <label class="form-label">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="form-input w-full" placeholder="Konfirmasi password baru">
            </div>

            <div>
                <label class="form-label">Role</label>
                <select name="role" class="form-input w-full" required>
                    <option value="admin" selected>Admin</option>
                    <option value="user">User</option>
                </select>
            </div>

            <div class="flex justify-end space-x-2 pt-2">
                <button type="button" onclick="closeModal('editModal')" class="btn-secondary px-4 py-2 text-sm">Batal</button>
                <button type="submit" class="btn-accent px-4 py-2 text-sm">
                    <i class="fas fa-save mr-1"></i>Update
                </button>
            </div>
        </form>
    </div>
</div>