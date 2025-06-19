@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800">
        <div
            class="sticky top-0 z-40 bg-white/80 dark:bg-gray-900/80 backdrop-blur-md border-b border-gray-200 dark:border-gray-600">
            <div class="max-w-7xl mx-auto px-4 py-4">
                <div class="flex items-center gap-2">
                    <!-- Search Bar -->
                    <div class="flex-1">
                        <div class="relative">
                            <input type="text" id="searchInput" placeholder="Cari produk kerajinan tangan..."
                                class="pl-4 pr-10 py-3 w-full text-sm rounded-xl border border-gray-300 dark:border-gray-600 bg-white/50 dark:bg-gray-800/50 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all duration-200 backdrop-blur-sm">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <i class="fas fa-search text-gray-400 dark:text-gray-500"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Filter Button -->
                    <button id="filterBtn"
                        class="bg-amber-500 hover:bg-amber-600 text-white p-3 text-sm font-medium rounded-xl flex items-center justify-center">
                        <i class="fas fa-filter"></i>
                        <span class="sr-only sm:not-sr-only sm:ml-2">Filter</span>
                    </button>
                </div>

                <!-- Filter Options -->
                <div id="filterOptions"
                    class="hidden mt-4 p-4 bg-white/60 dark:bg-gray-800/60 backdrop-blur-sm rounded-xl border border-gray-200 dark:border-gray-600">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Kategori</label>
                            <select id="filterKategori"
                                class="w-full text-sm rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 px-3 py-2">
                                <option value="">Semua Kategori</option>
                                @foreach (getKategori() as $kategori)
                                    <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Harga</label>
                            <select id="filterHarga"
                                class="w-full text-sm rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 px-3 py-2">
                                <option>Semua Harga</option>
                                <option value="0-50000">
                                    Kurang dari Rp 50.000</option>
                                <option value="50000-100000">Rp 50.000 sampai 100.000</option>
                                <option value="100000-1000000">Lebih dari Rp 100.000</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Urutkan</label>
                            <select id="filterUrutkan"
                                class="w-full text-sm rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 px-3 py-2">
                                <option value="populer">Terpopuler</option>
                                <option value="termurah">Harga Terendah</option>
                                <option value="termahal">Harga Tertinggi</option>
                                <option value="terbaru">Terbaru</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="max-w-7xl mx-auto px-4 py-6">
            <!-- Grid Produk -->
            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4"
                id="produk-grid">

            </div>

            <!-- Load More Button -->
            <div class="text-center mt-15">
                <button
                    class="border-2 border-amber-500 text-amber-500 hover:bg-amber-500 hover:text-white px-6 py-3 text-sm font-medium rounded-xl transition-colors duration-200"
                    id="loadMoreBtn">
                    <i class="fas fa-plus mr-2"></i>Muat Lebih Banyak
                </button>
            </div>
        </div>
    </div>

    <!-- Modal Tambah ke Keranjang -->
    <div id="cartModal" class="modal fixed inset-0 z-50 flex items-center justify-center bg-black/60">
        <div class="modal-content bg-white dark:bg-gray-800 w-full max-w-md mx-4 rounded-2xl shadow-2xl">
            <!-- Header Modal -->
            <div class="flex items-center justify-between p-6 border-b border-gray-200 dark:border-gray-700">
                <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100">Tambah ke Keranjang</h3>
                <button onclick="closeCartModal()"
                    class="text-gray-500 hover:text-gray-700 dark:hover:text-gray-300 text-2xl">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <!-- Body Modal -->
            <div class="p-6">
                <!-- Gambar dan Info Produk -->
                <div class="flex gap-4 mb-6">
                    <div
                        class="w-20 h-20 rounded-lg overflow-hidden border border-gray-200 dark:border-gray-700 flex-shrink-0">
                        <img id="modalProductImage" src="" alt="Product" class="w-full h-full object-cover">
                    </div>
                    <div class="flex-1">
                        <h4 id="modalProductName" class="font-semibold text-gray-900 dark:text-gray-100 mb-1"></h4>
                        <p id="modalProductPrice" class="text-lg font-bold text-amber-600 dark:text-amber-400"></p>
                    </div>
                </div>

                <!-- Form Options -->
                <form id="addToCartForm">
                    <!-- Kuantitas -->
                    <input type="hidden" name="produk_id" id="produk_id">
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Kuantitas</label>
                        <div class="flex items-center gap-3">
                            <button type="button" onclick="changeQuantity(-1)"
                                class="w-10 h-10 flex items-center justify-center bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors">
                                <i class="fas fa-minus text-sm"></i>
                            </button>
                            <input type="number" id="quantity" value="1" min="1" max="100"
                                name="kuantitas"
                                class="w-16 text-center border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-lg py-2 focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                            <button type="button" onclick="changeQuantity(1)"
                                class="w-10 h-10 flex items-center justify-center bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors">
                                <i class="fas fa-plus text-sm"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Total Harga -->
                    <div
                        class="mb-6 p-4 bg-amber-50 dark:bg-amber-900/20 rounded-lg border border-amber-200 dark:border-amber-800">
                        <div class="flex justify-between items-center">
                            <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Total Harga:</span>
                            <span id="totalPrice" class="text-xl font-bold text-amber-600 dark:text-amber-400">Rp
                                125.000</span>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex gap-3">
                        <button type="button" onclick="closeCartModal()"
                            class="flex-1 py-3 px-4 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-lg font-medium hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors">
                            Batal
                        </button>
                        <button type="submit"
                            class="flex-1 py-3 px-4 bg-amber-500 hover:bg-amber-600 text-white rounded-lg font-medium transition-colors flex items-center justify-center gap-2 tambah-ke-keranjang">
                            Tambah
                            <i class="fas fa-shopping-cart"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <style>
        .modal {
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .modal.show {
            opacity: 1;
            visibility: visible;
        }

        .modal-content {
            transform: scale(0.7);
            transition: transform 0.3s ease;
        }

        .modal.show .modal-content {
            transform: scale(1);
        }

        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>

    <script>
        let currentProductPrice = 0;

        // Toggle filter options
        document.getElementById('filterBtn').addEventListener('click', function() {
            const filterOptions = document.getElementById('filterOptions');
            filterOptions.classList.toggle('hidden');
        });

        // Search functionality
        document.getElementById('searchInput').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const productCards = document.querySelectorAll('.product-card');

            productCards.forEach(card => {
                const productName = card.querySelector('h3').textContent.toLowerCase();
                if (productName.includes(searchTerm)) {
                    card.style.display = 'flex';
                } else {
                    card.style.display = 'none';
                }
            });
        });

        // Modal functions
        function openCartModal(productName, price, imageUrl, productId) {
            currentProductPrice = price;

            document.getElementById('modalProductName').textContent = productName;
            document.getElementById('modalProductPrice').textContent = 'Rp ' + price.toLocaleString('id-ID');
            document.getElementById('modalProductImage').src = imageUrl;

            $('#produk_id').val(productId);

            updateTotalPrice();

            const modal = document.getElementById('cartModal');
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.add('show');
            }, 10);
            document.body.style.overflow = 'hidden';
        }

        function closeCartModal() {
            const modal = document.getElementById('cartModal');
            modal.classList.remove('show');
            setTimeout(() => {
                modal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }, 300);

            // Reset form
            document.getElementById('addToCartForm').reset();
            document.getElementById('quantity').value = 1;
            document.querySelector('input[name="color"][value="natural"]').checked = true;
            document.querySelector('input[name="size"][value="M"]').checked = true;
        }

        function changeQuantity(change) {
            const quantityInput = document.getElementById('quantity');
            let currentQuantity = parseInt(quantityInput.value);
            let newQuantity = currentQuantity + change;

            if (newQuantity >= 1 && newQuantity <= 10) {
                quantityInput.value = newQuantity;
                updateTotalPrice();
            }
        }

        function updateTotalPrice() {
            const quantity = parseInt(document.getElementById('quantity').value);
            const total = currentProductPrice * quantity;
            document.getElementById('totalPrice').textContent = 'Rp ' + total.toLocaleString('id-ID');
        }

        // Event listeners
        document.getElementById('quantity').addEventListener('input', updateTotalPrice);

        // Close modal when clicking outside
        document.getElementById('cartModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeCartModal();
            }
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                const modal = document.getElementById('cartModal');
                if (modal.classList.contains('show')) {
                    closeCartModal();
                }
            }
        });
        $(document).ready(function() {
            let debounceTimeout;
            const debounceDelay = 500;

            // State
            let currentPage = 1;
            let currentQuery = '';
            let isLoading = false;
            let hasMore = true;
            let currentKategori = '';
            let currentHarga = '';
            let currentUrutkan = '';

            // Fungsi untuk reset state filter
            function resetFilterState() {
                currentPage = 1;
                hasMore = true;
                $('#produk-grid').html(''); // Kosongkan grid
                $('#loadMoreBtn').show(); // Pastikan tombol load more visible
            }

            // Fungsi Load Data
            function loadData(page = 1, query = currentQuery, append = false,
                kategori = currentKategori,
                harga = currentHarga,
                urutkan = currentUrutkan) {

                if (isLoading || (!append && !hasMore)) return;

                isLoading = true;
                $('#loadMoreBtn').prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Loading...');

                // Build query parameters
                let params = {
                    page: page,
                    search: query,
                    kategori: kategori,
                    harga: harga,
                    urutkan: urutkan
                };

                // Convert to query string
                let queryString = Object.keys(params)
                    .filter(key => params[key] !== '')
                    .map(key => `${key}=${encodeURIComponent(params[key])}`)
                    .join('&');

                $.ajax({
                    url: `/produk?${queryString}`,
                    type: 'GET',
                    success: function(res) {
                        if (!res.success || !res.data) {
                            showToast('error', 'Gagal memuat data');
                            return;
                        }

                        if (append) {
                            $('#produk-grid').append(res.data.view);
                        } else {
                            $('#produk-grid').html(res.data.view);
                        }

                        // Update state
                        hasMore = res.data.has_more;
                        currentPage = page;
                        currentQuery = query;
                        currentKategori = kategori;
                        currentHarga = harga;
                        currentUrutkan = urutkan;

                        // Update tombol load more
                        $('#loadMoreBtn').toggle(hasMore)
                            .prop('disabled', false)
                            .html('Load More');

                        // Tampilkan pesan jika tidak ada produk
                        if (!append && $('#produk-grid').children().length === 0) {
                            $('#produk-grid').html(
                                '<div class="col-span-full text-center py-8">Tidak ada produk yang ditemukan</div>'
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
                currentPage = 1; // Reset to first page on any filter change
                loadData(1, currentQuery, false, currentKategori, currentHarga, currentUrutkan);
            }

            // Search with debounce
            $('#searchInput').on('keyup', function() {
                clearTimeout(debounceTimeout);
                currentQuery = $(this).val();
                currentPage = 1; // Reset page when searching

                debounceTimeout = setTimeout(() => {
                    loadData(1, currentQuery, false);
                }, debounceDelay);
            });

            // Regular filter changes
            $('#filterKategori').on('change', function() {
                currentKategori = $(this).val();
                handleFilterChange();
            });

            $('#filterHarga').on('change', function() {
                currentHarga = $(this).val();
                handleFilterChange();
            });

            $('#filterUrutkan').on('change', function() {
                currentUrutkan = $(this).val();
                handleFilterChange();
            });

            // Load More button
            $('#loadMoreBtn').on('click', function() {
                loadData(currentPage + 1, currentQuery, true);
            });

            $(document).on('submit', '#addToCartForm', function(e) {
                e.preventDefault();
                const url = '{{ route('keranjang.store') }}';
                const method = 'POST'
                const formData = new FormData(this);

                formData.append('keranjang_id', '{{ getKeranjangId() }}');

                const successCallback = function(response) {
                    handleSuccess(response);
                    loadData();
                };

                const errorCallback = function(error) {
                    handleSimpleError(error)
                };

                ajaxCall(url, "POST", formData, successCallback, errorCallback);
            })

            // Initial load
            loadData();
        });
    </script>
@endsection
