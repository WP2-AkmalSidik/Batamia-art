@extends('layouts.app')

@section('title', 'Pesanan Saya')

@section('content')
    <div class="mt-8 space-y-6">
        <!-- Header Section -->
        <div class="card rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 bg-white dark:bg-gray-900">
            <div class="flex items-center justify-between mb-2">
                <h1 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">Pesanan Saya</h1>
                <div class="flex items-center space-x-3">
                    <select class="form-input text-sm px-3 py-2 rounded-md border border-gray-300 dark:border-gray-600"
                        id="statusFilter">
                        <option value="">Semua Status</option>
                        <option value="belum_dibayar">Menunggu Pembayaran</option>
                        <option value="dibayar">Dibayar</option>
                        <option value="dikirim">Dikirim</option>
                        <option value="selesai">Selesai</option>
                        <option value="dibatalkan">Dibatalkan</option>
                    </select>
                </div>
            </div>
            <p class="text-gray-600 dark:text-gray-400">Kelola dan pantau status pesanan Anda</p>
        </div>

        <!-- Order Cards -->
        <div class="space-y-4" id="card-container">

        </div>

        <div class="text-center mt-15">
            <button
                class="border-2 border-amber-500 text-amber-500 hover:bg-amber-500 hover:text-white px-6 py-3 text-sm font-medium rounded-xl transition-colors duration-200"
                id="loadMoreBtn">
                <i class="fas fa-plus mr-2"></i>Muat Lebih Banyak
            </button>
        </div>
    </div>

    <!-- Modal Upload Bukti Pembayaran -->
    <div id="uploadModal"
        class="modal fixed inset-0 bg-black/30 backdrop-blur-sm hidden z-50 flex items-center justify-center p-4">
        <div
            class="modal-content bg-white/90 dark:bg-gray-800/90 backdrop-blur-md rounded-xl max-w-md w-full max-h-screen overflow-y-auto border border-white/20 dark:border-gray-700/50">
            <div class="p-6">
                <!-- Header Modal -->
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Upload Bukti Pembayaran</h3>
                    <button onclick="closeModal('uploadModal')"
                        class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>

                <!-- Ringkasan Pesanan -->
                <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4 mb-6">
                    <h4 class="font-medium text-gray-900 dark:text-gray-100 mb-3">Ringkasan Pesanan</h4>
                    <div class="space-y-2 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-600 dark:text-gray-400">Total Pembayaran:</span>
                            <span class="font-bold text-gray-900 dark:text-gray-100" id="modalOrderTotal">-</span>
                        </div>
                    </div>
                </div>

                <!-- Upload Form -->
                <form id="paymentForm">
                    <div class="mb-6">
                        <label class="form-label text-gray-700 dark:text-gray-300">Pilih File Bukti Pembayaran</label>
                        <div class="mt-2">
                            <input type="hidden" name="order_id" id="modalOrderId">
                            <input type="file" id="bukti_pembayaran" name="bukti_pembayaran" accept="image/*,.pdf"
                                class="form-input w-full file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200">
                        </div>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Format: JPG, PNG, PDF. Maksimal 5MB</p>
                    </div>

                    <!-- Preview -->
                    <div id="filePreview" class="hidden mb-6">
                        <div class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg p-4 text-center">
                            <i class="fas fa-file-image text-4xl text-gray-400 mb-2"></i>
                            <p class="text-sm text-gray-600 dark:text-gray-400" id="fileName">-</p>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex space-x-3">
                        <button type="button" onclick="closeModal('uploadModal')"
                            class="btn-secondary flex-1 py-3 rounded-lg font-medium">
                            Batal
                        </button>
                        <button type="submit" class="btn-accent flex-1 py-3 rounded-lg font-medium">
                            <i class="fas fa-upload mr-2"></i>
                            Upload
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Batal -->
    <div id="cancelModal"
        class="modal fixed inset-0 bg-black/30 backdrop-blur-sm hidden z-50 flex items-center justify-center p-4">
        <div
            class="modal-content bg-white/90 dark:bg-gray-800/90 backdrop-blur-md rounded-xl max-w-md w-full max-h-screen overflow-y-auto border border-white/20 dark:border-gray-700/50">
            <div class="p-6">
                <!-- Header Modal -->
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Batalkan Pesanan</h3>
                    <button onclick="closeModal('cancelModal')"
                        class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
                <!-- Upload Form -->
                <form id="cancelForm">
                    <div class="mb-6">
                        <label class="form-label text-gray-700 dark:text-gray-300">Alasan Pembatalan</label>
                        <div class="mt-2">
                            <input type="hidden" name="order_id" id="cancelOrderId">
                            <input type="text" id="ket" name="ket" accept="image/*,.pdf"
                                class="form-input w-full file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200">
                        </div>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Deskripsikan alasan pembatalan pesanan
                            anda.</p>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex space-x-3">
                        <button type="button" onclick="closeModal('uploadModal')"
                            class="btn-secondary flex-1 py-3 rounded-lg font-medium">
                            Batal
                        </button>
                        <button type="submit" class="btn-accent flex-1 py-3 rounded-lg font-medium">
                            <i class="fas fa-upload mr-2"></i>
                            Batalkan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="ratingModal"
        class="modal fixed inset-0 z-50 hidden flex items-center justify-center p-4 bg-black/50 backdrop-blur-sm">
        <div
            class="modal-content bg-white dark:bg-gray-800 rounded-xl shadow-xl w-full max-w-md border border-gray-200 dark:border-gray-700 transform transition-all duration-300 ease-out translate-y-4 opacity-0">
            <div class="p-6">
                <!-- Header -->
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Beri Ulasan</h3>
                    <button onclick="closeModal('ratingModal')"
                        class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>

                <!-- Product Info -->
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-16 h-16 bg-gray-200 dark:bg-gray-700 rounded-lg overflow-hidden flex-shrink-0">
                        <img src="https://images.unsplash.com/photo-1602143407151-7111542de6e8?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=256&h=256&q=80"
                            alt="Produk" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <h4 class="font-medium text-gray-900 dark:text-white" id="ratingProductName">-</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-400" id="ratingOrderNumber">-</p>
                    </div>
                </div>

                <!-- Rating Form -->
                <form id="ratingForm">
                    <input type="hidden" id="orderId" name="order_id">
                    <input type="hidden" id="productId" name="product_id">

                    <!-- Star Rating -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">Rating
                            Produk</label>
                        <div class="flex justify-center gap-1" id="starRating">
                            <!-- Stars will be generated by JavaScript -->
                        </div>
                        <input type="hidden" id="ratingValue" name="rating" value="0">
                    </div>

                    <!-- Review Text -->
                    <div class="mb-6">
                        <label for="reviewText"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Ulasan Anda</label>
                        <textarea id="reviewText" name="review" rows="4"
                            class="w-full px-3 py-2 text-sm text-gray-900 bg-gray-50 rounded-lg border border-amber-500 focus:ring-amber-500 focus:border-amber-500 dark:bg-gray-700 dark:border-amber-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-500 dark:focus:border-amber-500"
                            placeholder="Bagaimana pengalaman Anda dengan produk ini?"></textarea>
                    </div>

                    <!-- Actions -->
                    <div class="flex gap-3">
                        <button type="button" onclick="closeModal('ratingModal')"
                            class="flex-1 py-3 px-4 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-lg font-medium hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors">
                            Batal
                        </button>
                        <button type="submit"
                            class="flex-1 py-3 px-4 bg-amber-500 hover:bg-amber-600 text-white rounded-lg font-medium transition-colors flex items-center justify-center gap-2">
                            <i class="fas fa-star"></i>
                            Kirim Ulasan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openUploadModal(orderNumber, totalHarga) {
            const modal = document.getElementById('uploadModal');
            const orderTotalElement = document.getElementById('modalOrderTotal');

            // Set order ID
            const orderIdInput = document.getElementById('modalOrderId');
            orderIdInput.value = orderNumber;

            // Set data pesanan
            orderTotalElement.textContent = totalHarga;

            // Show modal
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.add('show');
            }, 10);
            document.body.style.overflow = 'hidden';
        }

        function openCancelModal(orderNumber) {
            const modal = document.getElementById('cancelModal');

            // Set order ID
            const orderIdInput = document.getElementById('cancelOrderId');
            orderIdInput.value = orderNumber;

            // Show modal
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

            // Reset form
            if (modalId === 'uploadModal') {
                document.getElementById('paymentForm').reset();
                document.getElementById('filePreview').classList.add('hidden');
            }
        }

        // File upload preview
        document.getElementById('bukti_pembayaran').addEventListener('change', function(e) {
            const file = e.target.files[0];
            const preview = document.getElementById('filePreview');
            const fileName = document.getElementById('fileName');

            if (file) {
                fileName.textContent = file.name;
                preview.classList.remove('hidden');
            } else {
                preview.classList.add('hidden');
            }
        });

        // Close modal on click outside
        document.getElementById('uploadModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal('uploadModal');
            }
        });

        // Close modal on ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                const openModal = document.querySelector('.modal.show');
                if (openModal) {
                    closeModal(openModal.id);
                }
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            let debounceTimeout;
            const debounceDelay = 500;

            // State
            let currentPage = 1;
            let currentStatus = '';
            let isLoading = false;
            let hasMore = true;

            // Fungsi untuk reset state filter
            function resetFilterState() {
                currentPage = 1;
                hasMore = true;
                $('#card-container').html('');
                $('#loadMoreBtn').show();
            }

            // Fungsi Load Data
            function loadData(page = 1, status = currentStatus, append = false) {

                if (isLoading || (!append && !hasMore)) return;

                isLoading = true;
                $('#loadMoreBtn').prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Loading...');

                // Build query parameters
                let params = {
                    page: page,
                    status: status,
                };

                // Convert to query string
                let queryString = Object.keys(params)
                    .filter(key => params[key] !== '')
                    .map(key => `${key}=${encodeURIComponent(params[key])}`)
                    .join('&');

                $.ajax({
                    url: `/pesanan?${queryString}`,
                    type: 'GET',
                    success: function(res) {
                        if (!res.success || !res.data) {
                            showToast('error', 'Gagal memuat data');
                            return;
                        }

                        if (append) {
                            $('#card-container').append(res.data.view);
                        } else {
                            $('#card-container').html(res.data.view);
                        }

                        // Update state
                        hasMore = res.data.has_more;
                        currentPage = page;
                        cuurentStatus = status;

                        // Update tombol load more
                        $('#loadMoreBtn').toggle(hasMore)
                            .prop('disabled', false)
                            .html('Load More');

                        // Tampilkan pesan jika tidak ada produk
                        if (!append && $('#card-container').children().length === 0) {
                            $('#card-container').html(
                                '<div class="col-span-full text-center py-8">Tidak ada pesanan yang ditemukan</div>'
                            );
                        }
                    },
                    error: function(xhr) {
                        console.error('Error:', xhr.responseText);
                        showToast('error', 'Gagal memuat data');
                    },
                    complete: function() {
                        isLoading = false;
                    }
                });
            }

            // Event Handlers
            function handleFilterChange() {
                resetFilterState();
                currentPage = 1;
                loadData(1, currentStatus, false);
            }

            // Regular filter changes
            $('#filterStatus').on('change', function() {
                currentStatus = $(this).val();
                handleFilterChange();
            });

            // Load More button
            $('#loadMoreBtn').on('click', function() {
                loadData(currentPage + 1, currentQuery, true);
            });

            $(document).on('submit', '#paymentForm', function(e) {
                e.preventDefault();

                const fileInput = document.getElementById('bukti_pembayaran');
                if (!fileInput.files[0]) {
                    showToast('error', 'Mohon pilih file bukti pembayaran!');
                    return;
                }

                const url = '{{ route('pesanan.update.pembayaran') }}';
                const method = 'POST'
                const formData = new FormData(this);

                const successCallback = function(response) {
                    successToast(response);
                    loadData();
                };

                const errorCallback = function(error) {
                    errorToast(error)
                };

                ajaxCall(url, "POST", formData, successCallback, errorCallback);
            })
            $(document).on('submit', '#cancelForm', function(e) {
                e.preventDefault();

                const url = '{{ route('pesanan.update.cancel') }}';
                const formData = new FormData(this);

                const successCallback = function(response) {
                    successToast(response);
                    loadData();
                };

                const errorCallback = function(error) {
                    errorToast(error)
                };

                ajaxCall(url, "POST", formData, successCallback, errorCallback);
            })

            // Initial load
            loadData();
        });
    </script>
@endsection
