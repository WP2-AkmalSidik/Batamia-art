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
        @include('pages.admin.pengguna.components.table-pengguna')
    </div>
    @include('pages.admin.pengguna.components.pagination')
</div>

<!-- Tambah Pengguna -->
@include('pages.admin.pengguna.components.modal-tambah')

<!-- Edit Pengguna -->
@include('pages.admin.pengguna.components.modal-edit')

<!-- Hapus Pengguna -->
@include('pages.admin.pengguna.components.modal-hapus')

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