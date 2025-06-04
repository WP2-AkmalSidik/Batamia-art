@extends('layouts.app')

@section('title', 'Kategori')

@section('content')
    <div class="mt-8 card rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 bg-white dark:bg-gray-900">
        <div class="flex items-center justify-between mb-5">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-400">Daftar Kategori</h3>
            <button onclick="openAddModal()" class="btn-accent px-4 py-2 text-sm font-medium rounded-md">
                <i class="fas fa-plus mr-2"></i>Tambah Kategori
            </button>
        </div>

        <div class="overflow-x-auto rounded-lg">
            <!-- Table na ddiye -->
            @include('pages.admin.kategori.components.table')
        </div>
    </div>

    <!-- Tambah Kategori -->
    @include('pages.admin.kategori.components.tambah-kategori')

    <!-- Edit Kategori -->
    @include('pages.admin.kategori.components.edit-kategori')

    <!-- Modal Hapus Kategori -->
    @include('pages.admin.kategori.components.hapus-kategori')

    <script>
        function openAddModal() {
            openModal('addModal');
        }

        function openEditModal(id) {
            // Di sini bisa fetch data kategori berdasarkan ID untuk di-populate ke form
            openModal('editModal');
        }

        function openDeleteModal(id) {
            // Di sini bisa set category ID yang akan dihapus
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
            // Implementasi delete category
            alert('Kategori berhasil dihapus!');
            closeModal('deleteModal');
        }

        document.addEventListener('DOMContentLoaded', function() {
            const iconOptions = document.querySelectorAll('.icon-option');

            iconOptions.forEach(option => {
                option.addEventListener('click', function(e) {
                    e.preventDefault();

                    // Remove selection from all icons in the same modal
                    const modal = this.closest('.modal');
                    const allIcons = modal.querySelectorAll('.icon-option');
                    allIcons.forEach(icon => {
                        icon.classList.remove('border-blue-500', 'bg-blue-50');
                        icon.classList.add('border-gray-300');
                    });

                    // Add selection to clicked icon
                    this.classList.remove('border-gray-300');
                    this.classList.add('border-blue-500', 'bg-blue-50');

                    // Update hidden input
                    const iconClass = this.dataset.icon;
                    const hiddenInput = modal.querySelector('input[name="icon"]');
                    if (hiddenInput) {
                        hiddenInput.value = iconClass;
                    }
                });
            });
        });

        // Form Submissions
        document.getElementById('addCategoryForm').addEventListener('submit', function(e) {
            e.preventDefault();
            // Implementasi add category
            alert('Kategori berhasil ditambahkan!');
            closeModal('addModal');
        });

        document.getElementById('editCategoryForm').addEventListener('submit', function(e) {
            e.preventDefault();
            // Implementasi update category
            alert('Kategori berhasil diupdate!');
            closeModal('editModal');
        });

        // Bisa tutup modal dgn klik diluar
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
