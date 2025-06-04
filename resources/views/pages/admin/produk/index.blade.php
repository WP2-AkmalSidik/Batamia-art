@extends('layouts.app')

@section('title', 'Produk')

@section('content')
    <!-- Product Management -->
    <div class="mt-8 card rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 bg-white dark:bg-gray-900">
        <div class="flex items-center justify-between mb-5">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-400">Daftar Produk</h3>
            <button onclick="openAddModal()" class="btn-accent px-4 py-2 text-sm font-medium rounded-md">
                <i class="fas fa-plus mr-2"></i>Tambah Produk
            </button>
        </div>
        <!-- Table Produk -->
        @include('pages.admin.produk.components.table-produk')
    </div>

    <!-- Tambah Produk -->
    @include('pages.admin.produk.components.modal-tambah')

    <!-- Detail Produk -->
    @include('pages.admin.produk.components.modal-detail')
    <!-- Modal Edit Produk -->
    @include('pages.admin.produk.components.modal-edit')

    <!-- Modal Hapus Produk -->
    @include('pages.admin.produk.components.modal-hapus')

    <script>
        function openAddModal() {
            openModal('addModal');
        }

        function openDetailModal(id) {
            // Di sini bisa fetch data produk berdasarkan ID
            openModal('detailModal');
        }

        function openEditModal(id) {
            // Di sini bisa fetch data produk berdasarkan ID untuk di-populate ke form
            openModal('editModal');
        }

        function openDeleteModal(id) {
            // Di sini bisa set product ID yang akan dihapus
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
            // Implementasi delete product
            alert('Produk berhasil dihapus!');
            closeModal('deleteModal');
        }

        // Form Submissions
        document.getElementById('addProductForm').addEventListener('submit', function(e) {
            e.preventDefault();
            // Implementasi add product
            alert('Produk berhasil ditambahkan!');
            closeModal('addModal');
        });

        document.getElementById('editProductForm').addEventListener('submit', function(e) {
            e.preventDefault();
            // Implementasi update product
            alert('Produk berhasil diupdate!');
            closeModal('editModal');
        });

        // Close modal when clicking outside
        document.querySelectorAll('.modal').forEach(modal => {
            modal.addEventListener('click', function(e) {
                if (e.target === this) {
                    closeModal(this.id);
                }
            });
        });

        // Close modal with Escape key
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
