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
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Kategori</label>
                            <select
                                class="w-full text-sm rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 px-3 py-2">
                                <option>Semua Kategori</option>
                                <option>Kerajinan Kayu</option>
                                <option>Perhiasan</option>
                                <option>Dekorasi Rumah</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Harga</label>
                            <select
                                class="w-full text-sm rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 px-3 py-2">
                                <option>Semua Harga</option>
                                <option>
                                    < Rp 50.000</option>
                                <option>Rp 50.000 - 100.000</option>
                                <option>> Rp 100.000</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Bahan</label>
                            <select
                                class="w-full text-sm rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 px-3 py-2">
                                <option>Semua Bahan</option>
                                <option>Kayu</option>
                                <option>Bambu</option>
                                <option>Logam</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Urutkan</label>
                            <select
                                class="w-full text-sm rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 px-3 py-2">
                                <option>Terpopuler</option>
                                <option>Harga Terendah</option>
                                <option>Harga Tertinggi</option>
                                <option>Terbaru</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="max-w-7xl mx-auto px-4 py-6">
            <!-- Grid Produk -->
            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">

                <!-- Product Card 1 - Vas Bunga Kayu Jati -->
                <a href="{{ route('user.detail') }}" class="block h-full">
                    <div
                        class="product-card bg-white/70 dark:bg-gray-800/70 backdrop-blur-sm rounded-xl border border-gray-200 dark:border-gray-600 p-3 hover:shadow-lg hover:scale-105 transition-all duration-300 cursor-pointer flex flex-col h-full">
                        <!-- Konten card yang sama persis -->
                        <div class="relative">
                            <img src="https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=400&h=400&fit=crop&crop=center"
                                alt="Vas Bunga Kayu Jati" class="w-full h-32 object-cover rounded-lg mb-3">
                            <div
                                class="absolute top-2 right-2 bg-amber-100 dark:bg-amber-900/30 text-amber-800 dark:text-amber-300 px-2 py-1 rounded-full text-xs font-medium">
                                Populer
                            </div>
                        </div>
                        <div class="flex-1 flex flex-col">
                            <h3 class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-2 line-clamp-2 flex-1">Vas
                                Bunga Kayu Jati Handmade</h3>
                            <p class="text-lg font-bold text-amber-600 dark:text-amber-400 mb-3">Rp 125.000</p>
                            <button
                                onclick="event.stopPropagation(); openCartModal('Vas Bunga Kayu Jati Handmade', 125000, 'https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=400&h=400&fit=crop&crop=center')"
                                class="w-full bg-amber-500 hover:bg-amber-600 text-white py-2 px-3 rounded-lg text-sm font-medium transition-colors duration-200 flex items-center justify-center gap-2">
                                <span>🛒</span>
                                <span>Tambah</span>
                            </button>
                        </div>
                    </div>
                </a>

                <!-- Product Card 2 - Gelang Perak Ukiran -->
                <div
                    class="product-card bg-white/70 dark:bg-gray-800/70 backdrop-blur-sm rounded-xl border border-gray-200 dark:border-gray-600 p-3 hover:shadow-lg hover:scale-105 transition-all duration-300 cursor-pointer flex flex-col h-full">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1515562141207-7a88fb7ce338?w=400&h=400&fit=crop&crop=center"
                            alt="Gelang Perak Ukiran" class="w-full h-32 object-cover rounded-lg mb-3">
                        <div
                            class="absolute top-2 right-2 bg-amber-100 dark:bg-amber-900/30 text-amber-800 dark:text-amber-300 px-2 py-1 rounded-full text-xs font-medium">
                            Populer
                        </div>
                    </div>
                    <div class="flex-1 flex flex-col">
                        <h3 class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-2 line-clamp-2 flex-1">Gelang
                            Perak Ukiran Tradisional</h3>
                        <p class="text-lg font-bold text-amber-600 dark:text-amber-400 mb-3">Rp 85.000</p>
                        <button
                            onclick="openCartModal('Gelang Perak Ukiran Tradisional', 85000, 'https://images.unsplash.com/photo-1515562141207-7a88fb7ce338?w=400&h=400&fit=crop&crop=center')"
                            class="w-full bg-amber-500 hover:bg-amber-600 text-white py-2 px-3 rounded-lg text-sm font-medium transition-colors duration-200 flex items-center justify-center gap-2">
                            <span>🛒</span>
                            <span>Tambah</span>
                        </button>
                    </div>
                </div>

                <!-- Product Card 3 - Tempat Pensil Bambu -->
                <div
                    class="product-card bg-white/70 dark:bg-gray-800/70 backdrop-blur-sm rounded-xl border border-gray-200 dark:border-gray-600 p-3 hover:shadow-lg hover:scale-105 transition-all duration-300 cursor-pointer flex flex-col h-full">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=400&fit=crop&crop=center"
                            alt="Tempat Pensil Bambu" class="w-full h-32 object-cover rounded-lg mb-3">
                        <div
                            class="absolute top-2 right-2 bg-amber-100 dark:bg-amber-900/30 text-amber-800 dark:text-amber-300 px-2 py-1 rounded-full text-xs font-medium">
                            Populer
                        </div>
                    </div>
                    <div class="flex-1 flex flex-col">
                        <h3 class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-2 line-clamp-2 flex-1">Tempat
                            Pensil Bambu Eco-Friendly</h3>
                        <p class="text-lg font-bold text-amber-600 dark:text-amber-400 mb-3">Rp 45.000</p>
                        <button
                            onclick="openCartModal('Tempat Pensil Bambu Eco-Friendly', 45000, 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=400&fit=crop&crop=center')"
                            class="w-full bg-amber-500 hover:bg-amber-600 text-white py-2 px-3 rounded-lg text-sm font-medium transition-colors duration-200 flex items-center justify-center gap-2">
                            <span>🛒</span>
                            <span>Tambah</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Load More Button -->
            <div class="text-center mt-15">
                <button
                    class="border-2 border-amber-500 text-amber-500 hover:bg-amber-500 hover:text-white px-6 py-3 text-sm font-medium rounded-xl transition-colors duration-200">
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
                    <!-- Warna -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Warna</label>
                        <div class="flex gap-2">
                            <label class="flex items-center">
                                <input type="radio" name="color" value="merah" class="sr-only peer">
                                <div
                                    class="w-8 h-8 bg-red-500 rounded-full border-2 border-gray-300 peer-checked:border-amber-500 peer-checked:ring-2 peer-checked:ring-amber-200 cursor-pointer">
                                </div>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="color" value="biru" class="sr-only peer">
                                <div
                                    class="w-8 h-8 bg-blue-500 rounded-full border-2 border-gray-300 peer-checked:border-amber-500 peer-checked:ring-2 peer-checked:ring-amber-200 cursor-pointer">
                                </div>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="color" value="hijau" class="sr-only peer">
                                <div
                                    class="w-8 h-8 bg-green-500 rounded-full border-2 border-gray-300 peer-checked:border-amber-500 peer-checked:ring-2 peer-checked:ring-amber-200 cursor-pointer">
                                </div>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="color" value="natural" class="sr-only peer" checked>
                                <div
                                    class="w-8 h-8 bg-amber-600 rounded-full border-2 border-gray-300 peer-checked:border-amber-500 peer-checked:ring-2 peer-checked:ring-amber-200 cursor-pointer">
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Ukuran -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Ukuran</label>
                        <div class="grid grid-cols-3 gap-2">
                            <label
                                class="flex items-center justify-center p-2 border border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-700 has-[:checked]:border-amber-500 has-[:checked]:bg-amber-50 dark:has-[:checked]:bg-amber-900/20">
                                <input type="radio" name="size" value="S" class="sr-only">
                                <span class="text-sm font-medium">S</span>
                            </label>
                            <label
                                class="flex items-center justify-center p-2 border border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-700 has-[:checked]:border-amber-500 has-[:checked]:bg-amber-50 dark:has-[:checked]:bg-amber-900/20">
                                <input type="radio" name="size" value="M" class="sr-only" checked>
                                <span class="text-sm font-medium">M</span>
                            </label>
                            <label
                                class="flex items-center justify-center p-2 border border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-700 has-[:checked]:border-amber-500 has-[:checked]:bg-amber-50 dark:has-[:checked]:bg-amber-900/20">
                                <input type="radio" name="size" value="L" class="sr-only">
                                <span class="text-sm font-medium">L</span>
                            </label>
                        </div>
                    </div>

                    <!-- Kuantitas -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Kuantitas</label>
                        <div class="flex items-center gap-3">
                            <button type="button" onclick="changeQuantity(-1)"
                                class="w-10 h-10 flex items-center justify-center bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors">
                                <i class="fas fa-minus text-sm"></i>
                            </button>
                            <input type="number" id="quantity" value="1" min="1" max="10"
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
                            class="flex-1 py-3 px-4 bg-amber-500 hover:bg-amber-600 text-white rounded-lg font-medium transition-colors flex items-center justify-center gap-2">
                            <i class="fas fa-shopping-cart"></i>
                            Tambah ke Keranjang
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
        function openCartModal(productName, price, imageUrl) {
            currentProductPrice = price;

            document.getElementById('modalProductName').textContent = productName;
            document.getElementById('modalProductPrice').textContent = 'Rp ' + price.toLocaleString('id-ID');
            document.getElementById('modalProductImage').src = imageUrl;

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

        document.getElementById('addToCartForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);
            const cartData = {
                product: document.getElementById('modalProductName').textContent,
                price: currentProductPrice,
                quantity: parseInt(document.getElementById('quantity').value),
                color: formData.get('color'),
                size: formData.get('size'),
                total: currentProductPrice * parseInt(document.getElementById('quantity').value)
            };

            console.log('Data keranjang:', cartData);
            alert('Produk berhasil ditambahkan ke keranjang!\n\n' +
                'Produk: ' + cartData.product + '\n' +
                'Warna: ' + cartData.color + '\n' +
                'Ukuran: ' + cartData.size + '\n' +
                'Jumlah: ' + cartData.quantity + '\n' +
                'Total: Rp ' + cartData.total.toLocaleString('id-ID'));

            closeCartModal();
        });

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
    </script>
@endsection
