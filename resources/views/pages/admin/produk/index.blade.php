@extends('layouts.app')

@section('title', 'Produk')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js"></script>
@endpush

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
        <div id="produk-table">
        </div>
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
        let cropperAdd = null;
        let cropperEdit = null;
        let originalFileAdd = null;
        let originalFileEdit = null;
        let croppedBlobAdd = null;
        let croppedBlobEdit = null;

        function initCropperHandlers(context) {
            const $uploadArea = $(`#uploadArea-${context}`);
            const $fileInput = $(`#fileInput-${context}`);
            const $cropperSection = $(`#cropperSection-${context}`);
            const $cropperImage = $(`#cropperImage-${context}`);
            const $finalPreview = $(`#finalPreview-${context}`);
            const $finalImage = $(`#finalImage-${context}`);
            const $zoomRange = $(`#zoomRange-${context}`);

            let cropper = null;
            let originalFile = null;
            let croppedBlob = null;

            function resetCropper() {
                if (cropper) cropper.destroy();
                cropper = null;
                originalFile = null;
                croppedBlob = null;
                $fileInput.val('');
                $uploadArea.removeClass('hidden');
                $cropperSection.addClass('hidden');
                $finalPreview.addClass('hidden');
                $zoomRange.val(1);
            }

            $uploadArea.on('click', () => $fileInput.click());

            $fileInput.on('change', function(e) {
                handleFile(e.target.files[0]);
            });

            $uploadArea.on('dragover', function(e) {
                e.preventDefault();
                $(this).addClass('dragover');
            }).on('dragleave drop', function(e) {
                e.preventDefault();
                $(this).removeClass('dragover');
            }).on('drop', function(e) {
                handleFile(e.originalEvent.dataTransfer.files[0]);
            });

            function handleFile(file) {
                if (!file || !file.type.startsWith('image/')) return;
                if (file.size > 2 * 1024 * 1024) {
                    showToast('error', 'Ukuran max gambar 2 MB');
                    return;
                }
                originalFile = file;
                const reader = new FileReader();
                reader.onload = e => initializeCropper(e.target.result);
                reader.readAsDataURL(file);
            }

            function initializeCropper(imageSrc) {
                $cropperImage.attr('src', imageSrc);
                $uploadArea.addClass('hidden');
                $cropperSection.removeClass('hidden');

                $cropperImage.on('load', function() {
                    if (cropper) cropper.destroy();
                    cropper = new Cropper($cropperImage[0], {
                        aspectRatio: 1,
                        viewMode: 2,
                        dragMode: 'move',
                        autoCropArea: 0.8,
                        preview: `#cropPreview-${context}`
                    });
                });
            }

            $zoomRange.on('input', function() {
                if (cropper) cropper.zoomTo(parseFloat($(this).val()));
            });

            $(`#cropImage-${context}`).on('click', function() {
                if (cropper) {
                    const canvas = cropper.getCroppedCanvas({
                        width: 800,
                        height: 800
                    });
                    canvas.toBlob(blob => {
                        croppedBlob = blob;
                        $finalImage.attr('src', URL.createObjectURL(blob));
                        $cropperSection.addClass('hidden');
                        $finalPreview.removeClass('hidden');
                    }, 'image/jpeg', 0.9);
                }
            });

            $(`#editCrop-${context}`).on('click', function() {
                $finalPreview.addClass('hidden');
                $cropperSection.removeClass('hidden');
            });

            return {
                getBlob: () => croppedBlob,
                getFile: () => originalFile,
                reset: resetCropper
            };
        }

        function openDeleteModal(id) {
            $('#hapus-produk').data('id', id);
            openModal('deleteModal');
        }

        function confirmDelete() {
            closeModal('deleteModal');
        }

        function openAddModal() {
            cropperAdd.reset();
            openModal('addModal');
        }

        function openDetailModal(id) {

            initDetailModal({
                modalId: 'detailModal',
                endpoint: `produk/${id}`,
                fields: ['stok', 'deskripsi'],
                callback: function(data) {
                    const harga = data.harga;
                    const berat = data.berat;
                    const kategori = data.kategori.nama;
                    const image = data.image;
                    const created_at = data.created_at;
                    const updated_at = data.updated_at;
                    const status = data.status == true ? 'Aktif' : 'Nonaktif';
                    console.log(status)
                    $('#created_at-detail').html(formatTanggal(created_at));
                    $('#updated_at-detail').html(formatTanggal(updated_at));
                    $('#kategori_id-detail').html(kategori);
                    $('#statusDetail').html(status);
                    $('#harga-detail').html(formatRupiah(harga));
                    $('#berat-detail').html(formatBerat(berat));
                    $('#image-detail').attr('src', image.startsWith('http') ? image :
                        `{{ asset('storage') }}/${image}`);
                }
            });

            openModal('detailModal');
        }

        function openEditModal(id) {

            cropperEdit.reset();

            loadSelectOptions("#select-edit-kategori", "/kategori")

            initEditModal({
                modalId: 'editModal',
                formSelector: '#edit-produk',
                endpoint: `produk/${id}`,
                fields: ['nama', 'kategori_id', 'stok', 'berat', 'harga', 'deskripsi'],
                callback: function(data) {
                    const image = data.image;
                    $('#current-image').attr('src', image.startsWith('http') ? image :
                        `{{ asset('storage') }}/${image}`);
                },
                onFetched: function(data) {
                    openModal('editModal');
                }
            });
        }

        $(document).ready(function() {

            cropperAdd = initCropperHandlers("add");
            cropperEdit = initCropperHandlers("edit");

            console.log(cropperAdd)

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
                    url: `/produk?page=${page}&search=${encodeURIComponent(query)}`,
                    type: 'GET',
                    success: function(res) {
                        $('#produk-table').html(res.data.view);
                        $('#paginationLinks').html(res.data.pagination);

                        currentPage = page;
                        currentQuery = query;
                    },
                    error: function() {
                        alert('Gagal memuat data.');
                    }
                });
            }

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

            $(document).on('submit', '#tambah-produk', function(e) {
                e.preventDefault();

                const url = '{{ route('produk.store') }}';
                const method = 'POST'
                const formData = new FormData(this);

                if (cropperAdd.getBlob()) {
                    formData.append("image", cropperAdd.getBlob(), cropperAdd.getFile().name);
                }

                const successCallback = function(response) {
                    handleSuccess(response);
                    closeModal("addModal");
                    loadData(currentPage, currentQuery);
                };

                const errorCallback = function(error) {
                    handleValidationErrors(error, "tambah-produk", ["nama", "icon", "deskripsi"]);
                };

                ajaxCall(url, "POST", formData, successCallback, errorCallback);
            })

            $(document).on('submit', '#edit-produk', function(e) {
                e.preventDefault();

                const id = $(this).data('id');

                const url = `/produk/${id}`;
                const method = 'POST'
                const formData = new FormData(this);
                formData.append('_method', 'PUT')

                if (cropperEdit.getBlob()) {
                    console.log(cropperEdit.getBlob())
                    formData.append("image", cropperEdit.getBlob(), cropperEdit.getFile().name);
                }

                const successCallback = function(response) {
                    handleSuccess(response);
                    closeModal("editModal");
                    loadData(currentPage, currentQuery);
                };

                const errorCallback = function(error) {
                    handleValidationErrors(error, "tambah-produk", ["nama", "icon", "deskripsi"]);
                };

                ajaxCall(url, "POST", formData, successCallback, errorCallback);
            })

            $(document).on('submit', '#hapus-produk', function(e) {
                e.preventDefault();

                const id = $(this).data('id');

                const url = `/produk/${id}`;
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

            loadSelectOptions("#select-tambah-kategori", "/kategori")

            loadData(currentPage, currentQuery);
        });
    </script>
@endsection
