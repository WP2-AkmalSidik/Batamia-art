@extends('layouts.app')

@section('title', 'Produk')

@section('content')
    <!-- Product Management -->
    <div class="mt-8 card rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 bg-white dark:bg-gray-900">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-6 gap-4">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-400">Daftar Produk</h3>

            <div class="flex flex-col sm:flex-row gap-3 lg:items-center">
                <!-- Search Box -->
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400 dark:text-gray-500"></i>
                    </div>
                    <input type="text" id="searchInput" placeholder="Cari Produk..."
                        class="form-input pl-10 pr-4 py-2 w-full sm:w-64 text-sm rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all duration-200">
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                        <button id="clearSearch" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 hidden">
                            <i class="fas fa-times text-sm"></i>
                        </button>
                    </div>
                </div>

                <button onclick="openAddModal()"
                    class="btn-accent px-4 py-2 text-sm font-medium rounded-lg whitespace-nowrap">
                    <i class="fas fa-plus mr-2"></i>Produk
                </button>
            </div>
        </div>
        <!-- Table Produk -->
        <div class="overflow-x-auto rounded-lg border border-gray-200 dark:border-gray-700">
            @include('pages.admin.produk.components.table-produk')
        </div>
        @include('pages.admin.produk.components.pagination')
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
