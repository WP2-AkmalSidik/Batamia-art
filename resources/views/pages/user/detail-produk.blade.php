@extends('layouts.app')

@section('title', 'Detail Produk')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800">
        <!-- Header dengan Back Button -->
        <div
            class="sticky top-0 z-40 bg-white/80 dark:bg-gray-900/80 backdrop-blur-md border-b border-gray-200 dark:border-gray-600">
            <div class="max-w-7xl mx-auto px-4 py-4">
                <div class="flex items-center gap-3">
                    <button onclick="history.back()"
                        class="p-2 rounded-xl bg-white/50 dark:bg-gray-800/50 hover:bg-white dark:hover:bg-gray-800 transition-colors duration-200">
                        <i class="fas fa-arrow-left text-gray-700 dark:text-gray-300"></i>
                    </button>
                    <h1 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Detail Produk</h1>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="max-w-4xl mx-auto px-4 py-6">
            <!-- Product Image -->
            <div class="mb-6">
                <div
                    class="relative aspect-square rounded-2xl overflow-hidden bg-white/70 dark:bg-gray-800/70 backdrop-blur-sm border border-gray-200 dark:border-gray-600">
                    <img id="mainProductImage" src="{{ asset('storage/' . $produk->image) }}"
                        alt="Vas Bunga Kayu Jati Handmade" class="w-full h-full object-cover">

                    <!-- Badge Populer -->
                    <div
                        class="absolute top-4 right-4 bg-amber-100 dark:bg-amber-900/30 text-amber-800 dark:text-amber-300 px-3 py-1 rounded-full text-sm font-medium">
                        Populer
                    </div>

                    {{-- <!-- Wishlist Button -->
                    <button
                        class="absolute top-4 left-4 p-2 bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm rounded-full hover:bg-white dark:hover:bg-gray-800 transition-colors duration-200">
                        <i class="far fa-heart text-gray-700 dark:text-gray-300 hover:text-red-500"></i>
                    </button> --}}
                </div>

                {{-- <!-- Thumbnail Images -->
                <div class="flex gap-2 mt-4 overflow-x-auto pb-2">
                    <button
                        onclick="changeImage('https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=600&h=600&fit=crop&crop=center')"
                        class="thumbnail-btn flex-shrink-0 w-16 h-16 rounded-lg overflow-hidden border-2 border-amber-500">
                        <img src="https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=100&h=100&fit=crop&crop=center"
                            alt="Thumbnail 1" class="w-full h-full object-cover">
                    </button>
                    <button
                        onclick="changeImage('https://images.unsplash.com/photo-1586023492125-27b2c045efd7?w=600&h=600&fit=crop&crop=center')"
                        class="thumbnail-btn flex-shrink-0 w-16 h-16 rounded-lg overflow-hidden border-2 border-transparent hover:border-amber-300">
                        <img src="https://images.unsplash.com/photo-1586023492125-27b2c045efd7?w=100&h=100&fit=crop&crop=center"
                            alt="Thumbnail 2" class="w-full h-full object-cover">
                    </button>
                    <button
                        onclick="changeImage('https://images.unsplash.com/photo-1565821952374-c4f6d35c2e0c?w=600&h=600&fit=crop&crop=center')"
                        class="thumbnail-btn flex-shrink-0 w-16 h-16 rounded-lg overflow-hidden border-2 border-transparent hover:border-amber-300">
                        <img src="https://images.unsplash.com/photo-1565821952374-c4f6d35c2e0c?w=100&h=100&fit=crop&crop=center"
                            alt="Thumbnail 3" class="w-full h-full object-cover">
                    </button>
                </div> --}}
            </div>

            <!-- Product Info -->
            <div
                class="bg-white/70 dark:bg-gray-800/70 backdrop-blur-sm rounded-2xl border border-gray-200 dark:border-gray-600 p-6 mb-6">
                <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-2">{{ $produk->nama }}</h1>
                <p class="text-3xl font-bold text-amber-600 dark:text-amber-400 mb-4">Rp {{ $produk->harga }}</p>

                <!-- Rating -->
                <div class="flex items-center gap-2 mb-6">
                    <div class="flex items-center">
                        @php
                            $avgRating = $produk->averageRating();
                            $fullStars = floor($avgRating);
                            $hasHalfStar = $avgRating - $fullStars >= 0.5;
                            $emptyStars = 5 - $fullStars - ($hasHalfStar ? 1 : 0);
                        @endphp

                        @for ($i = 0; $i < $fullStars; $i++)
                            <i class="fas fa-star text-yellow-400"></i>
                        @endfor

                        @if ($hasHalfStar)
                            <i class="fas fa-star-half-alt text-yellow-400"></i>
                        @endif

                        @for ($i = 0; $i < $emptyStars; $i++)
                            <i class="far fa-star text-yellow-400"></i>
                        @endfor
                    </div>
                    <span
                        class="text-sm font-medium text-gray-700 dark:text-gray-300">({{ $produk->reviews->count() ?? 0 }})</span>
                    <span class="text-sm text-gray-500 dark:text-gray-400">({{ $produk->reviews->count() }} ulasan)</span>
                    <span class="text-sm text-gray-500 dark:text-gray-400">•</span>
                    <span class="text-sm text-gray-500 dark:text-gray-400">{{ $terjual }} terjual</span>
                </div>

                <!-- Quick Info -->
                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div class="bg-gray-50 dark:bg-gray-700/50 rounded-lg p-3">
                        <div class="text-xs text-gray-500 dark:text-gray-400 mb-1">Kategori</div>
                        <div class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ $produk->kategori->nama }}
                        </div>
                    </div>
                    <div class="bg-gray-50 dark:bg-gray-700/50 rounded-lg p-3">
                        <div class="text-xs text-gray-500 dark:text-gray-400 mb-1">Bahan</div>
                        <div class="text-sm font-medium text-gray-900 dark:text-gray-100">Kayu Jati</div>
                    </div>
                    <div class="bg-gray-50 dark:bg-gray-700/50 rounded-lg p-3">
                        <div class="text-xs text-gray-500 dark:text-gray-400 mb-1">Berat</div>
                        <div class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ $produk->berat }} gram</div>
                    </div>
                    <div class="bg-gray-50 dark:bg-gray-700/50 rounded-lg p-3">
                        <div class="text-xs text-gray-500 dark:text-gray-400 mb-1">Stok</div>
                        <div class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ $produk->stok }} pcs</div>
                    </div>
                </div>
            </div>

            <!-- Product Description -->
            <div
                class="bg-white/70 dark:bg-gray-800/70 backdrop-blur-sm rounded-2xl border border-gray-200 dark:border-gray-600 p-6 mb-6">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Deskripsi Produk</h2>
                <div class="text-sm text-gray-700 dark:text-gray-300 leading-relaxed space-y-3">
                    <p>{{ $produk->deskripsi }}</p>
                </div>
            </div>

            <!-- Reviews Section -->
            <div
                class="bg-white/70 dark:bg-gray-800/70 backdrop-blur-sm rounded-2xl border border-gray-200 dark:border-gray-600 p-6 mb-20">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Ulasan Pembeli</h2>
                    <button class="text-sm text-amber-600 dark:text-amber-400 font-medium">Lihat Semua</button>
                </div>

                <!-- Review Items -->
                <div class="space-y-4">
                    <!-- Review 1 -->
                    @forelse ($produk->reviews as $review)
                        <div class="border-b border-gray-200 dark:border-gray-600 pb-4 last:border-b-0 last:pb-0">
                            <div class="flex items-start gap-3">
                                <div
                                    class="w-8 h-8 bg-amber-100 dark:bg-amber-900/30 rounded-full flex items-center justify-center flex-shrink-0">
                                    <span
                                        class="text-sm font-medium text-amber-800 dark:text-amber-300">{{ substr($review->user->name, 0, 1) }}</span>
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center gap-2 mb-1">
                                        <span
                                            class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ $review->user->name }}</span>
                                        <div class="flex items-center">
                                            <i class="fas fa-star text-yellow-400 text-xs"></i>
                                            <i class="fas fa-star text-yellow-400 text-xs"></i>
                                            <i class="fas fa-star text-yellow-400 text-xs"></i>
                                            <i class="fas fa-star text-yellow-400 text-xs"></i>
                                            <i class="fas fa-star text-yellow-400 text-xs"></i>
                                        </div>
                                    </div>
                                    <p class="text-sm text-gray-700 dark:text-gray-300 mb-2">{{ $review->komen }}</p>
                                    <div class="flex items-center gap-4 text-xs text-gray-500 dark:text-gray-400">
                                        <span>{{ $review->created_at }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-sm text-gray-700 dark:text-gray-300">Belum ada ulasan.</p>
                    @endforelse
                </div>
            </div>
        </div>
        <!-- Fixed Bottom Button -->
        <div class="fixed bottom-0 left-0 lg:left-64 right-0 z-50">
            <div class="max-w-7xl mx-auto px-4">
                <div
                    class="bg-white/80 dark:bg-gray-900/80 backdrop-blur-md border-t border-gray-200 dark:border-gray-600 p-2 lg:p-4 rounded-t-xl">
                    <div class="flex gap-2 lg:gap-3">
                        <!-- Tombol Tambah ke Keranjang -->
                        <button onclick="openCartModal()"
                            class="flex-1 bg-amber-500 hover:bg-amber-600 text-white py-2 lg:py-3 px-4 lg:px-6 rounded-xl font-medium transition-colors duration-200 flex items-center justify-center gap-1 lg:gap-2 text-sm lg:text-base">
                            <i class="fas fa-shopping-cart"></i>
                            <span class="whitespace-nowrap">Tambah ke Keranjang</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah ke Keranjang -->
    <div id="cartModal" class="modal fixed inset-0 z-50 flex items-center justify-center bg-black/60">
        <div
            class="modal-content bg-white dark:bg-gray-800 w-full max-w-md mx-2 rounded-xl shadow-xl max-h-[80vh] overflow-y-auto">
            <!-- Header -->
            <div class="flex items-center justify-between px-4 py-3 border-b border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Tambah ke Keranjang</h3>
                <button onclick="closeCartModal()"
                    class="text-gray-500 hover:text-gray-700 dark:hover:text-gray-300 text-xl">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <!-- Body -->
            <div class="px-4 py-3">
                <!-- Produk -->
                <div class="flex gap-3 mb-4">
                    <div
                        class="w-16 h-16 rounded-lg overflow-hidden border border-gray-200 dark:border-gray-700 flex-shrink-0">
                        <img src="https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=400&h=400&fit=crop&crop=center"
                            alt="Product" class="w-full h-full object-cover">
                    </div>
                    <div class="flex-1">
                        <h4 class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ $produk->nama }}</h4>
                        <p class="text-sm font-bold text-amber-600 dark:text-amber-400" id="modalProductPrice">Rp
                            {{ number_format($produk->harga, 0, ',', '.') }}
                        </p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">Stok: {{ $produk->stok }} pcs</p>
                    </div>
                </div>

                <!-- Form -->
                <form id="addToCartForm">
                    <!-- Jumlah -->
                    <input type="hidden" name="produk_id">
                    <div class="mb-4">
                        <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-2">Jumlah</label>
                        <div class="flex items-center gap-2">
                            <button type="button" onclick="changeQuantity(-1)"
                                class="w-8 h-8 flex items-center justify-center bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-md text-xs hover:bg-gray-200 dark:hover:bg-gray-600 transition">
                                <i class="fas fa-minus"></i>
                            </button>
                            <input type="text" id="quantity" value="1" min="1" max="25"
                                class="w-14 py-1 text-center border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-sm text-gray-900 dark:text-gray-100 rounded-md focus:ring-1 focus:ring-amber-500 focus:outline-none">
                            <button type="button" onclick="changeQuantity(1)"
                                class="w-8 h-8 flex items-center justify-center bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-md text-xs hover:bg-gray-200 dark:hover:bg-gray-600 transition">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Total Harga -->
                    <div
                        class="mb-4 p-3 bg-amber-50 dark:bg-amber-900/20 rounded-md border border-amber-200 dark:border-amber-800">
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-700 dark:text-gray-300">Total Harga:</span>
                            <span id="totalPrice"
                                class="font-bold text-amber-600 dark:text-amber-400">{{ $produk->harga }}</span>
                        </div>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="flex gap-2">
                        <button type="button" onclick="closeCartModal()"
                            class="flex-1 py-2 text-sm bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-md hover:bg-gray-200 dark:hover:bg-gray-600 transition">
                            Batal
                        </button>
                        <button type="submit"
                            class="flex-1 py-2 text-sm bg-amber-500 hover:bg-amber-600 text-white rounded-md flex items-center justify-center gap-1 transition">
                            <i class="fas fa-shopping-cart text-sm"></i>
                            Tambah
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

        .thumbnail-btn {
            transition: all 0.2s ease;
        }

        .thumbnail-btn:hover {
            opacity: 0.8;
        }
    </style>

    <script>
        let currentProductPrice = {{ $produk->harga }};
        $('#totalPrice').text('Rp ' + currentProductPrice.toLocaleString('id-ID'));
        console.log(currentProductPrice)

        // Change main product image
        function changeImage(imageUrl) {
            document.getElementById('mainProductImage').src = imageUrl;

            // Update thumbnail borders
            document.querySelectorAll('.thumbnail-btn').forEach(btn => {
                btn.classList.remove('border-amber-500');
                btn.classList.add('border-transparent');
            });

            // Add active border to clicked thumbnail
            event.target.closest('.thumbnail-btn').classList.remove('border-transparent');
            event.target.closest('.thumbnail-btn').classList.add('border-amber-500');
        }

        // Modal functions
        function openCartModal() {
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
            updateTotalPrice();
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
            console.log(total);
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
