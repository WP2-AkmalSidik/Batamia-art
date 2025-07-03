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

        <div id="kategori-table">
            {{-- data kategori --}}
        </div>

    </div>

    <!-- Tambah Kategori -->
    @include('pages.admin.kategori.components.tambah-kategori')

    <!-- Edit Kategori -->
    @include('pages.admin.kategori.components.edit-kategori')

    <!-- Modal Hapus Kategori -->
    @include('pages.admin.kategori.components.hapus-kategori')

    <script>
        function resetIconSelection() {
            $('.icon-option').removeClass('icon-selected');

            $('#selectedIcon').val('');
        }

        function openDeleteModal(id, produk = 1, kategori) {
            const totalProduk = produk + ' produk';
            $('#hapus-kategori').data('id', id);
            $('#total-produk-delete-modal').html(totalProduk);
            $('#nama-kategori').html(kategori);

            openModal('deleteModal');
        }

        function confirmDelete() {
            closeModal('deleteModal');
        }

        function performSearch(query) {
            // Implementasi pencarian
            console.log('Searching for:', query);
            // Di sini bisa tambahkan AJAX call untuk search
        }

        function openAddModal() {
            openModal('addModal');
        }

        function openEditModal(id) {
            $('.icon-option i')
                .removeClass('text-blue-600')
                .addClass('text-gray-600');

            initEditModal({
                modalId: 'editModal',
                formSelector: '#edit-kategori',
                endpoint: `kategori/${id}`,
                fields: ['nama', 'icon', 'deskripsi'],
                callback: (data) => {
                    // Set icon active class
                    const iconSelector = $(`.icon-option[data-icon="${data.icon}"] i`)
                    iconSelector.removeClass('text-gray-600');
                    iconSelector.addClass('text-blue-600');
                    $('#editSelectedIcon').val(data.icon);
                },
                onFetched: function(data) {
                    openModal('editModal');
                }
            });
        }

        $(document).ready(function() {
            console.log('ready')
            // Debounce untuk search input
            let debounceTimeout;
            const debounceDelay = 500;

            // State
            let currentPage = 1;
            let currentQuery = '';
            console.log(currentPage, currentQuery);

            // Fungsi Load Data
            function loadData(page = 1, query = '') {
                $.ajax({
                    url: `/kategori?page=${page}&search=${encodeURIComponent(query)}`,
                    type: 'GET',
                    success: function(res) {
                        $('#kategori-table').html(res.data.view);
                        $('#paginationLinks').html(res.data.pagination);
                        // update state
                        currentPage = page;
                        currentQuery = query;
                    },
                    error: function() {
                        alert('Gagal memuat data.');
                    }
                });
            }

            $('.icon-option').on('click', function(e) {
                e.preventDefault()

                const $modal = $(this).closest('.modal')

                // Hapus highlight dari semua icon dalam modal yang sama
                $modal.find('.icon-option')
                    .removeClass('border-blue-500 bg-blue-50')
                    .addClass('border-gray-300')

                // Tambahkan highlight ke icon yang diklik
                $(this)
                    .removeClass('border-gray-300')
                    .addClass('border-blue-500 bg-blue-50')

                // Update input tersembunyi
                const iconClass = $(this).data('icon')
                const $hiddenInput = $modal.find('input[name="icon"]')
                if ($hiddenInput.length > 0) {
                    $hiddenInput.val(iconClass)
                }
            })

            // Event: Search input (debounced)
            $('#searchInput').on('keyup', function() {
                clearTimeout(debounceTimeout);

                const query = $(this).val();
                currentQuery = query;

                debounceTimeout = setTimeout(() => {
                    loadData(1, currentQuery); // reset ke page 1 saat search
                }, debounceDelay);
            });

            // Event: Klik link pagination
            $(document).on('click', '.pagination a', function(e) {
                e.preventDefault();

                const href = $(this).attr('href');
                const urlParams = new URLSearchParams(href.split('?')[1]);
                const page = urlParams.get('page') || 1;
                console.log(href, urlParams, page);

                loadData(page, currentQuery);
            });

            $(document).on('click', '.icon-option', function() {
                // Hapus class selected dari semua button
                $('.icon-option').removeClass('icon-selected');

                // Tambahkan class selected ke button yang diklik
                $(this).addClass('icon-selected');

                // Ambil data-icon dan simpan ke hidden input
                var selectedIcon = $(this).data('icon');
                $('#selectedIcon').val(selectedIcon);
            });

            $(document).on('submit', '#tambah-kategori', function(e) {
                e.preventDefault();

                const url = '{{ route('kategori.store') }}';
                const method = 'POST'
                const formData = new FormData(this);

                const successCallback = function(response) {
                    handleSuccess(response);
                    closeModal("addModal");
                    loadData(currentPage, currentQuery);
                };

                const errorCallback = function(error) {
                    handleValidationErrors(error, "tambah-kategori", ["nama", "icon", "deskripsi"]);
                };

                ajaxCall(url, "POST", formData, successCallback, errorCallback);
            })

            $(document).on('submit', '#edit-kategori', function(e) {
                e.preventDefault();

                const id = $(this).data('id');

                const url = `/kategori/${id}`;
                const method = 'POST'
                const formData = new FormData(this);
                formData.append('_method', 'PUT')

                const successCallback = function(response) {
                    handleSuccess(response);
                    closeModal("editModal");
                    loadData(currentPage, currentQuery);
                };

                const errorCallback = function(error) {
                    handleValidationErrors(error, "tambah-kategori", ["nama", "icon", "deskripsi"]);
                };

                ajaxCall(url, "POST", formData, successCallback, errorCallback);
            })

            $(document).on('submit', '#hapus-kategori', function(e) {
                e.preventDefault();

                const id = $(this).data('id');

                const url = `/kategori/${id}`;
                const method = 'DELETE'

                const successCallback = function(response) {
                    handleSuccess(response);
                    closeModal("deleteModal");
                    loadData(currentPage, currentQuery);
                };

                const errorCallback = function(error) {
                    handleSimpleError(error)
                };

                ajaxCall(url, method, null, successCallback, errorCallback);
            })

            loadData(currentPage, currentQuery);
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
