@extends('layouts.app')

@section('title', 'Pengguna')

@section('content')
<!-- User Management -->
<div class="mt-8 card rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 bg-white dark:bg-gray-900">
    <div class="flex items-center justify-between mb-5">
        <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-400">Daftar Pengguna</h3>
        <button onclick="openAddModal()" class="btn-accent px-4 py-2 text-sm font-medium rounded-md">
            <i class="fas fa-plus mr-2"></i>Tambah Pengguna
        </button>
    </div>

    <div class="overflow-x-auto rounded-lg">
        <table class="w-full text-sm text-left whitespace-nowrap">
            <thead>
                <tr class="border-b border-gray-200 dark:border-gray-700">
                    <th class="text-left py-3 px-4 font-medium text-gray-600 dark:text-gray-400">#</th>
                    <th class="text-left py-3 px-4 font-medium text-gray-600 dark:text-gray-400">Avatar</th>
                    <th class="text-left py-3 px-4 font-medium text-gray-600 dark:text-gray-400">Nama</th>
                    <th class="text-left py-3 px-4 font-medium text-gray-600 dark:text-gray-400">Email</th>
                    <th class="text-left py-3 px-4 font-medium text-gray-600 dark:text-gray-400">Role</th>
                    <th class="text-left py-3 px-4 font-medium text-gray-600 dark:text-gray-400">Bergabung</th>
                    <th class="text-left py-3 px-4 font-medium text-gray-600 dark:text-gray-400">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors duration-200">
                    <td class="py-3 px-4 font-medium text-gray-900 dark:text-gray-200">1</td>
                    <td class="py-3 px-4">
                        <div class="w-10 h-10 rounded-full bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center">
                            <i class="fas fa-user text-blue-600 dark:text-blue-400"></i>
                        </div>
                    </td>
                    <td class="py-3 px-4 text-gray-700 dark:text-gray-300 font-medium">Ahmad Pratama</td>
                    <td class="py-3 px-4 text-gray-600 dark:text-gray-400">ahmad.pratama@email.com</td>
                    <td class="py-3 px-4">
                        <span class="px-2 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400">
                            Admin
                        </span>
                    </td>
                    <td class="py-3 px-4 text-gray-600 dark:text-gray-400">2024-01-15</td>
                    <td class="py-3 px-4 text-center">
                        <div class="inline-flex space-x-2">
                            <button onclick="openEditModal(1)" class="btn-outline text-yellow-500 hover:bg-yellow-50 dark:hover:bg-yellow-900/30">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button onclick="openDeleteModal(1)" class="btn-outline text-red-600 hover:bg-red-50 dark:hover:bg-red-900/30">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors duration-200">
                    <td class="py-3 px-4 font-medium text-gray-900 dark:text-gray-200">2</td>
                    <td class="py-3 px-4">
                        <div class="w-10 h-10 rounded-full bg-purple-100 dark:bg-purple-900/30 flex items-center justify-center">
                            <i class="fas fa-user text-purple-600 dark:text-purple-400"></i>
                        </div>
                    </td>
                    <td class="py-3 px-4 text-gray-700 dark:text-gray-300 font-medium">Siti Nurhaliza</td>
                    <td class="py-3 px-4 text-gray-600 dark:text-gray-400">siti.nurhaliza@email.com</td>
                    <td class="py-3 px-4">
                        <span class="px-2 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-400">
                            User
                        </span>
                    </td>
                    <td class="py-3 px-4 text-gray-600 dark:text-gray-400">2024-02-20</td>
                    <td class="py-3 px-4 text-center">
                        <div class="inline-flex space-x-2">
                            <button onclick="openEditModal(2)" class="btn-outline text-yellow-500 hover:bg-yellow-50 dark:hover:bg-yellow-900/30">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button onclick="openDeleteModal(2)" class="btn-outline text-red-600 hover:bg-red-50 dark:hover:bg-red-900/30">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors duration-200">
                    <td class="py-3 px-4 font-medium text-gray-900 dark:text-gray-200">3</td>
                    <td class="py-3 px-4">
                        <div class="w-10 h-10 rounded-full bg-green-100 dark:bg-green-900/30 flex items-center justify-center">
                            <i class="fas fa-user text-green-600 dark:text-green-400"></i>
                        </div>
                    </td>
                    <td class="py-3 px-4 text-gray-700 dark:text-gray-300 font-medium">Budi Santoso</td>
                    <td class="py-3 px-4 text-gray-600 dark:text-gray-400">budi.santoso@email.com</td>
                    <td class="py-3 px-4">
                        <span class="px-2 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-400">
                            User
                        </span>
                    </td>
                    <td class="py-3 px-4 text-gray-600 dark:text-gray-400">2024-03-10</td>
                    <td class="py-3 px-4 text-center">
                        <div class="inline-flex space-x-2">
                            <button onclick="openEditModal(3)" class="btn-outline text-yellow-500 hover:bg-yellow-50 dark:hover:bg-yellow-900/30">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button onclick="openDeleteModal(3)" class="btn-outline text-red-600 hover:bg-red-50 dark:hover:bg-red-900/30">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Tambah Pengguna -->
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

<!-- Edit Pengguna -->
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

<!-- Hapus Pengguna -->
<div id="deleteModal" class="modal fixed inset-0 z-50 flex items-center justify-center hidden bg-white/80 dark:bg-black/60">
    <div class="modal-content w-full max-w-md mx-4 p-6">
        <div class="text-center">
            <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-exclamation-triangle text-red-600 text-2xl"></i>
            </div>
            
            <h3 class="text-xl font-bold mb-2">Hapus Pengguna</h3>
            <p class="text-gray-600 dark:text-gray-400 mb-6">
                Apakah Anda yakin ingin menghapus pengguna <strong>"Ahmad Pratama"</strong>? 
                Tindakan ini tidak dapat dibatalkan dan akan menghapus semua data terkait pengguna.
            </p>
            
            <div class="flex justify-center space-x-3">
                <button onclick="closeModal('deleteModal')" class="btn-secondary">Batal</button>
                <button onclick="confirmDelete()" class="btn-danger">
                    <i class="fas fa-trash mr-2"></i>Hapus Pengguna
                </button>
            </div>
        </div>
    </div>
</div>

<script>
function openAddModal() {
    openModal('addModal');
}

function openEditModal(id) {
    // Di sini bisa fetch data pengguna berdasarkan ID untuk di-populate ke form
    openModal('editModal');
}

function openDeleteModal(id) {
    // Di sini bisa set user ID yang akan dihapus
    openModal('deleteModal');
}

function openModal(modalId) {
    const modal = document.getElementById(modalId);
    modal.classList.remove('hidden');
    setTimeout(() => {
        modal.classList.add('show');
    }, 10);
    document.body.style.overflow = 'hidden';
}

function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    modal.classList.remove('show');
    setTimeout(() => {
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto';
    }, 300);
}

function confirmDelete() {
    // Implementasi delete user
    alert('Pengguna berhasil dihapus!');
    closeModal('deleteModal');
}

document.getElementById('addUserForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Validasi password confirmation
    const password = this.querySelector('input[name="password"]').value;
    const passwordConfirmation = this.querySelector('input[name="password_confirmation"]').value;
    
    if (password !== passwordConfirmation) {
        alert('Password dan konfirmasi password tidak cocok!');
        return;
    }
    
    // Implementasi add user
    alert('Pengguna berhasil ditambahkan!');
    closeModal('addModal');
    
    // Reset form
    this.reset();
});

document.getElementById('editUserForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Validasi password confirmation jika password diisi
    const password = this.querySelector('input[name="password"]').value;
    const passwordConfirmation = this.querySelector('input[name="password_confirmation"]').value;
    
    if (password && password !== passwordConfirmation) {
        alert('Password dan konfirmasi password tidak cocok!');
        return;
    }
    
    // Implementasi update user
    alert('Pengguna berhasil diupdate!');
    closeModal('editModal');
});

// Tutup Modal klik diluar
document.querySelectorAll('.modal').forEach(modal => {
    modal.addEventListener('click', function(e) {
        if (e.target === this) {
            closeModal(this.id);
        }
    });
});

// Tutup modal mnggunakan ESC
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        const openModal = document.querySelector('.modal.show');
        if (openModal) {
            closeModal(openModal.id);
        }
    }
});
</script>

@endsection