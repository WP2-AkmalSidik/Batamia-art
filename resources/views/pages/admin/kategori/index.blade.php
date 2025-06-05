@extends('layouts.app')

@section('title', 'Kategori')

@section('content')
    <div class="mt-8 card rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 bg-white dark:bg-gray-900">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-6 gap-4">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-400">Daftar Kategori</h3>

            <div class="flex flex-col sm:flex-row gap-3 lg:items-center">
                <!-- Search Box -->
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400 dark:text-gray-500"></i>
                    </div>
                    <input type="text" id="searchInput" placeholder="Cari kategori..."
                        class="form-input pl-10 pr-4 py-2 w-full sm:w-64 text-sm rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all duration-200">
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                        <button id="clearSearch" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 hidden">
                            <i class="fas fa-times text-sm"></i>
                        </button>
                    </div>
                </div>

                <button onclick="openAddModal()"
                    class="btn-accent px-4 py-2 text-sm font-medium rounded-lg whitespace-nowrap">
                    <i class="fas fa-plus mr-2"></i>Tambah Kategori
                </button>
            </div>
        </div>

        <div class="overflow-x-auto rounded-lg border border-gray-200 dark:border-gray-700">
            <!-- Table -->
            @include('pages.admin.kategori.components.table')
        </div>

        <!-- Pagination -->
        @include('pages.admin.kategori.components.pagination')
    </div>

    <!-- Tambah Kategori -->
    @include('pages.admin.kategori.components.tambah-kategori')

    <!-- Edit Kategori -->
    @include('pages.admin.kategori.components.edit-kategori')

    <!-- Modal Hapus Kategori -->
    @include('pages.admin.kategori.components.hapus-kategori')

    <script>
        // Search functionality
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const clearSearch = document.getElementById('clearSearch');

            searchInput.addEventListener('input', function() {
                if (this.value.length > 0) {
                    clearSearch.classList.remove('hidden');
                } else {
                    clearSearch.classList.add('hidden');
                }

                // Implementasi search logic di sini
                performSearch(this.value);
            });

            clearSearch.addEventListener('click', function() {
                searchInput.value = '';
                this.classList.add('hidden');
                performSearch('');
            });

            // Search dengan Enter key
            searchInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    performSearch(this.value);
                }
            });
        });

        function performSearch(query) {
            // Implementasi pencarian
            console.log('Searching for:', query);
            // Di sini bisa tambahkan AJAX call untuk search
        }

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
        document.addEventListener('DOMContentLoaded', function() {
            const addForm = document.getElementById('addCategoryForm');
            const editForm = document.getElementById('editCategoryForm');

            if (addForm) {
                addForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    // Implementasi add category
                    alert('Kategori berhasil ditambahkan!');
                    closeModal('addModal');
                });
            }

            if (editForm) {
                editForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    // Implementasi update category
                    alert('Kategori berhasil diupdate!');
                    closeModal('editModal');
                });
            }
        });

        // Bisa tutup modal dgn klik diluar
        document.querySelectorAll('.modal').forEach(modal => {
            modal.addEventListener('click', function(e) {
                if (e.target === this) {
                    closeModal(this.id);
                }
            });
        });

        // Tutup modal menggunakan ESC 
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                const openModal = document.querySelector('.modal.show');
                if (openModal) {
                    closeModal(openModal.id);
                }
            }
        });
    </script>

    <style>
        /* Custom line clamp for description */
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Enhanced search box styling */
        #searchInput:focus {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(212, 165, 116, 0.15);
        }

        /* Pagination hover effects */
        nav button:hover:not(:disabled) {
            transform: translateY(-1px);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        /* Table row animation */
        .table-row {
            position: relative;
            overflow: hidden;
        }

        .table-row::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(212, 165, 116, 0.1), transparent);
            transition: left 0.5s;
        }

        .table-row:hover::before {
            left: 100%;
        }
    </style>
@endsection
