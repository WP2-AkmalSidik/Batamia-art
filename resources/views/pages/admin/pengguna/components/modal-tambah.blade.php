<div id="addModal" class="modal fixed inset-0 z-50 flex items-center justify-center hidden bg-white/80 dark:bg-black/60">
    <div class="modal-content w-full max-w-lg mx-4 py-4 px-5">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-xl font-semibold">Tambah Pengguna</h3>
            <button onclick="closeModal('addModal')" class="text-gray-500 hover:text-gray-700 text-xl">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <form id="addUserForm">
            <div class="mb-4">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="nama" class="form-input w-full" placeholder="Masukkan nama lengkap" required>
            </div>

            <div class="mb-4">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-input w-full" placeholder="Masukkan alamat email" required>
            </div>

            <div class="mb-4">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-input w-full" placeholder="Masukkan password" required>
            </div>

            <div class="mb-4">
                <label class="form-label">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="form-input w-full" placeholder="Konfirmasi password" required>
            </div>

            <div class="mb-4">
                <label class="form-label">Role</label>
                <select name="role" class="form-input w-full" required>
                    <option value="">Pilih Role</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
            </div>

            <div class="flex justify-end space-x-2">
                <button type="button" onclick="closeModal('addModal')" class="btn-secondary text-sm px-3 py-1.5">Batal</button>
                <button type="submit" class="btn-accent text-sm px-4 py-1.5">
                    <i class="fas fa-save mr-1"></i>Simpan
                </button>
            </div>
        </form>
    </div>
</div>