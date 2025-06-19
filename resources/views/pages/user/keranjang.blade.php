@extends('layouts.app')

@section('title', 'Keranjang Belanja')

@section('content')
    <div class="min-h-screen bg-gray-50 dark:bg-gray-900 py-4 sm:py-8 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-3 sm:px-4 lg:px-6">

            <!-- Select All & Actions - Responsive -->
            <div
                class="bg-white dark:bg-gray-800 rounded-xl sm:rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 p-3 sm:p-4 mb-4 sm:mb-6 transition-colors duration-300">
                <div class="flex flex-col xs:flex-row xs:items-center xs:justify-between gap-3 sm:gap-4">
                    <div class="flex items-center gap-2 sm:gap-3">
                        <label class="flex items-center cursor-pointer">
                            <input type="checkbox" id="selectAll"
                                class="w-4 h-4 sm:w-5 sm:h-5 text-blue-600 bg-gray-100 dark:bg-gray-700 border-gray-300 dark:border-gray-600 rounded focus:ring-blue-500 dark:focus:ring-blue-600 focus:ring-2">
                            <span class="ml-2 text-xs sm:text-sm font-medium text-gray-900 dark:text-white">Pilih
                                Semua</span>
                        </label>
                        <span class="text-xs sm:text-sm text-gray-500 dark:text-gray-400" id="selectedCount">(0 item
                            dipilih)</span>
                    </div>
                    <div class="flex items-center gap-1 sm:gap-2">
                        <button id="deleteSelected"
                            class="px-3 py-1 sm:px-4 sm:py-2 text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition-colors text-xs sm:text-sm font-medium disabled:opacity-50"
                            disabled>
                            <i class="fas fa-trash text-xs sm:text-sm mr-1"></i>
                            Hapus Terpilih
                        </button>
                    </div>
                </div>
            </div>

            <!-- Main Content - Responsive Layout -->
            <div class="flex flex-col lg:grid lg:grid-cols-12 lg:gap-6 xl:gap-8">
                <!-- Cart Items - Mobile First -->
                <div class="lg:col-span-8 space-y-3 sm:space-y-4">
                    @foreach ($keranjangs->keranjangProduks as $keranjang)
                        <div class="cart-item bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden hover:shadow-md dark:hover:shadow-lg transition-all duration-300"
                            data-price="{{ $keranjang->produk->harga }}" data-id="{{ $keranjang->id }}"
                            data-berat="{{ $keranjang->produk->berat }}">

                            <!-- Desktop Layout (flex row) -->
                            <div class="hidden sm:flex items-start p-4 gap-4">
                                <!-- Checkbox -->
                                <div class="flex-shrink-0 pt-1">
                                    <input type="checkbox"
                                        class="item-checkbox w-5 h-5 text-blue-600 bg-gray-100 dark:bg-gray-700 border-gray-300 dark:border-gray-600 rounded focus:ring-blue-500">
                                </div>

                                <!-- Product Image -->
                                <div
                                    class="flex-shrink-0 w-24 h-24 rounded-lg overflow-hidden bg-gradient-to-br from-amber-50 to-orange-50 dark:from-gray-700 dark:to-gray-600">
                                    <img src="{{ Str::startsWith($keranjang->produk->image, 'http') ? $keranjang->produk->image : asset('storage/' . $keranjang->produk->image) }}"
                                        alt="{{ $keranjang->produk->nama }}" class="w-full h-full object-cover">
                                </div>

                                <!-- Product Details -->
                                <div class="flex-1 min-w-0">
                                    <div class="flex justify-between items-start gap-2">
                                        <div>
                                            <h3
                                                class="text-lg font-semibold text-gray-900 dark:text-white mb-1 line-clamp-1">
                                                {{ $keranjang->produk->nama }}
                                            </h3>
                                            <p class="text-sm text-gray-500 dark:text-gray-400 line-clamp-2 mb-3">
                                                {{ $keranjang->produk->deskripsi }}
                                            </p>
                                        </div>
                                        <button
                                            class="delete-item p-2 text-red-500 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-full">
                                            <i class="fas fa-trash text-sm"></i>
                                        </button>
                                    </div>

                                    <div class="flex items-center justify-between">
                                        <!-- Price -->
                                        <div class="text-lg font-bold text-amber-600 dark:text-amber-400">
                                            Rp {{ number_format($keranjang->produk->harga, 0, ',', '.') }}
                                        </div>

                                        <!-- Quantity Controls -->
                                        <div class="flex items-center gap-4">
                                            <div
                                                class="flex items-center border border-gray-200 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700">
                                                <button
                                                    class="qty-minus px-3 py-1 hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors">
                                                    <i class="fas fa-minus text-gray-600 dark:text-gray-300"></i>
                                                </button>
                                                <input type="number" value="{{ $keranjang->kuantitas }}" min="1"
                                                    class="qty-input w-12 text-center border-0 bg-transparent focus:ring-0 font-medium text-gray-900 dark:text-white">
                                                <button
                                                    class="qty-plus px-3 py-1 hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors">
                                                    <i class="fas fa-plus text-gray-600 dark:text-gray-300"></i>
                                                </button>
                                            </div>

                                            <!-- Total Price -->
                                            <div class="w-24 text-right">
                                                <p class="item-total text-lg font-bold text-blue-600 dark:text-blue-400">
                                                    Rp
                                                    {{ number_format($keranjang->kuantitas * $keranjang->produk->harga, 0, ',', '.') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Mobile Layout (stacked) -->
                            <div class="sm:hidden p-3">
                                <div class="flex items-start gap-3">
                                    <!-- Checkbox -->
                                    <div class="flex-shrink-0 pt-1">
                                        <input type="checkbox"
                                            class="item-checkbox w-4 h-4 text-blue-600 bg-gray-100 dark:bg-gray-700 border-gray-300 dark:border-gray-600 rounded focus:ring-blue-500">
                                    </div>

                                    <!-- Content -->
                                    <div class="flex-1">
                                        <div class="flex gap-3">
                                            <!-- Product Image -->
                                            <div
                                                class="flex-shrink-0 w-16 h-16 rounded-lg overflow-hidden bg-gradient-to-br from-amber-50 to-orange-50 dark:from-gray-700 dark:to-gray-600">
                                                <img src="{{ Str::startsWith($keranjang->produk->image, 'http') ? $keranjang->produk->image : asset('storage/' . $keranjang->produk->image) }}"
                                                    alt="{{ $keranjang->produk->nama }}"
                                                    class="w-full h-full object-cover">
                                            </div>

                                            <!-- Product Info -->
                                            <div class="flex-1 min-w-0">
                                                <div class="flex justify-between items-start">
                                                    <h3
                                                        class="text-sm font-semibold text-gray-900 dark:text-white line-clamp-2">
                                                        {{ $keranjang->produk->nama }}
                                                    </h3>
                                                    <button class="delete-item p-1 text-red-500">
                                                        <i class="fas fa-trash text-xs"></i>
                                                    </button>
                                                </div>

                                                <!-- Price -->
                                                <p class="text-sm font-bold text-amber-600 dark:text-amber-400 mt-1">
                                                    Rp {{ number_format($keranjang->produk->harga, 0, ',', '.') }}
                                                </p>
                                            </div>
                                        </div>

                                        <!-- Quantity Controls -->
                                        <div class="flex items-center justify-between mt-3">
                                            <div
                                                class="flex items-center border border-gray-200 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700">
                                                <button
                                                    class="qty-minus px-2 py-1 hover:bg-gray-100 dark:hover:bg-gray-600">
                                                    <i class="fas fa-minus text-xs text-gray-600 dark:text-gray-300"></i>
                                                </button>
                                                <input type="number" value="{{ $keranjang->kuantitas }}" min="1"
                                                    class="qty-input w-10 text-center border-0 bg-transparent focus:ring-0 text-xs font-medium text-gray-900 dark:text-white">
                                                <button class="qty-plus px-2 py-1 hover:bg-gray-100 dark:hover:bg-gray-600">
                                                    <i class="fas fa-plus text-xs text-gray-600 dark:text-gray-300"></i>
                                                </button>
                                            </div>

                                            <!-- Total Price -->
                                            <div>
                                                <p class="item-total text-sm font-bold text-blue-600 dark:text-blue-400">
                                                    Rp
                                                    {{ number_format($keranjang->kuantitas * $keranjang->produk->harga, 0, ',', '.') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Order Summary - Responsive -->
                <div class="lg:col-span-4 mt-4 sm:mt-6 lg:mt-0">
                    <div
                        class="bg-white dark:bg-gray-800 rounded-xl sm:rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 p-4 sm:p-6 sticky top-4 sm:top-6 lg:top-8 transition-colors duration-300">
                        <h2 class="text-lg sm:text-xl font-bold text-gray-900 dark:text-white mb-4 sm:mb-6">Ringkasan
                            Pesanan</h2>

                        <!-- Selected Items Info - Responsive -->
                        <div class="mb-3 sm:mb-4 p-2 sm:p-3 bg-blue-50 dark:bg-blue-900/20 rounded-lg">
                            <p class="text-xs sm:text-sm text-blue-800 dark:text-blue-200" id="selectedItemsInfo">
                                <i class="fas fa-info-circle mr-1"></i>
                                Pilih item yang ingin di-checkout
                            </p>
                        </div>

                        <!-- Summary Items - Responsive -->
                        <div class="space-y-3 sm:space-y-4 mb-4 sm:mb-6" id="summaryItems">

                            <hr class="border-gray-200 dark:border-gray-600">
                            <div class="flex justify-between">
                                <span class="text-base sm:text-lg font-bold text-gray-900 dark:text-white">Total</span>
                                <span class="text-lg sm:text-xl font-bold text-blue-600 dark:text-blue-400"
                                    id="grandTotal">Rp 0</span>
                                <input type="hidden" id="totalWeight">
                            </div>
                        </div>

                        <!-- Checkout Button - Responsive -->
                        <button id="checkoutBtn" onclick="openCheckoutModal()"
                            class="w-full bg-blue-600 hover:bg-blue-700 disabled:bg-gray-400 dark:disabled:bg-gray-600 text-white font-semibold py-3 sm:py-4 px-4 sm:px-6 rounded-lg sm:rounded-xl transition-colors duration-200 flex items-center justify-center gap-2 disabled:cursor-not-allowed"
                            disabled>
                            <i class="fas fa-shopping-cart text-sm sm:text-base"></i>
                            <span class="text-sm sm:text-base">Checkout Sekarang</span>
                        </button>

                        <!-- Continue Shopping - Responsive -->
                        <div class="mt-3 sm:mt-4 text-center">
                            <a href="#"
                                class="text-xs sm:text-sm text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                                <i class="fas fa-arrow-left mr-1"></i>
                                Lanjut Belanja
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Enhanced Checkout Modal -->
    <div id="checkoutModal"
        class="fixed inset-0 bg-black/60 backdrop-blur-sm hidden z-50 flex items-center justify-center p-4 transition-all duration-300">
        <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-2xl max-w-4xl w-full max-h-[95vh] overflow-hidden transform transition-all duration-300 scale-95 opacity-0"
            id="modalContent">
            <!-- Modal Header -->
            <div
                class="sticky top-0 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 px-6 py-4 z-10">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Checkout</h2>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Konfirmasi pesanan Anda</p>
                    </div>
                    <button onclick="closeCheckoutModal()"
                        class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-xl transition-colors">
                        <i class="fas fa-times text-gray-500 dark:text-gray-400"></i>
                    </button>
                </div>
            </div>

            <!-- Modal Content -->
            <div class="overflow-y-auto max-h-[calc(95vh-80px)]">
                <div class="p-6">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Left Column - Order Summary -->
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 flex items-center">
                                <i class="fas fa-list-ul mr-2 text-blue-600"></i>
                                Ringkasan Pesanan
                            </h3>
                            <div class="bg-gray-50 dark:bg-gray-900/50 rounded-2xl p-4 mb-4">
                                <div id="checkoutItems" class="space-y-3">
                                    <!-- Selected items will be populated here -->
                                </div>
                                <hr class="border-gray-300 dark:border-gray-600 my-4">
                                <div class="space-y-2">
                                    <div class="flex justify-between text-sm">
                                        <span class="text-gray-600 dark:text-gray-400">Subtotal</span>
                                        <span class="font-medium" id="checkoutSubtotal">Rp 0</span>
                                    </div>
                                    <div class="flex justify-between text-sm">
                                        <span class="text-gray-600 dark:text-gray-400">Ongkos Kirim</span>
                                        <span class="font-medium" id="checkoutShipping">Rp 0</span>
                                    </div>
                                    <div
                                        class="flex justify-between font-bold text-lg pt-2 border-t border-gray-300 dark:border-gray-600">
                                        <span class="text-gray-900 dark:text-white">Total</span>
                                        <span class="text-blue-600 dark:text-blue-400" id="checkoutTotal">Rp 0</span>
                                        <input type="hidden" id="checkoutWeight">
                                        <input type="hidden" id="checkoutTotalPrice">
                                    </div>
                                </div>
                            </div>

                            <!-- Payment Method -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">
                                    <i class="fas fa-credit-card mr-1"></i>
                                    Metode Pembayaran
                                </label>
                                <div class="space-y-2">
                                    @foreach (getBanks() as $bank)
                                        <label
                                            class="flex items-center p-4 border border-gray-300 dark:border-gray-600 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer transition-colors">
                                            <input type="radio" name="payment" value="transfer"
                                                class="mr-3 text-blue-600 focus:ring-blue-500">
                                            <i
                                                class="fas {{ $bank->jenis == 'bank' ? 'fa-university' : 'fa-mobile-alt' }} text-blue-600 mr-3"></i>
                                            <div>
                                                <span
                                                    class="font-medium text-gray-900 dark:text-white">{{ Str::ucfirst($bank->jenis) }}</span>
                                                <p class="text-xs text-gray-500 dark:text-gray-400">
                                                    {{ Str::ucfirst($bank->nama_bank) }}</p>
                                            </div>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Right Column - Shipping Form -->
                        <div>
                            <form id="checkoutForm">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 flex items-center">
                                    <i class="fas fa-shipping-fast mr-2 text-green-600"></i>
                                    Informasi Pengiriman
                                </h3>
                                <div class="space-y-4">
                                    <!-- Nama Lengkap -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                            <i class="fas fa-user mr-1"></i>
                                            Nama Lengkap
                                        </label>
                                        <input type="text" name="name" required value="{{ auth()->user()->nama }}"
                                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-xl focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-colors"
                                            placeholder="Masukkan nama lengkap">
                                    </div>

                                    <!-- Nomor HP dan Email -->
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                                <i class="fas fa-phone mr-1"></i>
                                                Nomor HP
                                            </label>
                                            <input type="tel" name="phone" required
                                                value="{{ getAlamat()->nomor_hp }}"
                                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-xl focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-colors"
                                                placeholder="08xxxxxxxxxx">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                                <i class="fas fa-envelope mr-1"></i>
                                                Email
                                            </label>
                                            <input type="email" name="email" required
                                                value="{{ auth()->user()->email }}"
                                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-xl focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-colors"
                                                placeholder="email@contoh.com">
                                        </div>
                                    </div>

                                    <!-- Provinsi dan Kota/Kabupaten -->
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                                <i class="fas fa-map mr-1"></i>
                                                Provinsi
                                            </label>
                                            <input type="text" name="province" required
                                                value="{{ getAlamat()->provinsi }}" id="provinsi"
                                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-xl focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-colors">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                                <i class="fas fa-city mr-1"></i>
                                                Kota/Kabupaten
                                            </label>
                                            <input type="text" name="kota" required
                                                value="{{ getAlamat()->kota }}" id="kota"
                                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-xl focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-colors">

                                        </div>
                                    </div>

                                    <!-- Kecamatan dan Kelurahan -->
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                                <i class="fas fa-map-marked-alt mr-1"></i>
                                                Kecamatan
                                            </label>
                                            <input type="text" name="kecamatan" required
                                                value="{{ getAlamat()->kecamatan }}" id="kecamatan"
                                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-xl focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-colors">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                                <i class="fas fa-map-pin mr-1"></i>
                                                Kelurahan
                                            </label>
                                            <input type="text" name="village" required
                                                value="{{ getAlamat()->kelurahan }}" id="kelurahan"
                                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-xl focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-colors">

                                        </div>
                                    </div>

                                    <!-- Kode Pos dan Alamat Lengkap -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                            <i class="fas fa-mail-bulk mr-1"></i>
                                            Kode Pos
                                        </label>
                                        <select type="text" name="postal_code" required id="kode_pos"
                                            value="{{ getAlamat()->kode_pos }}"
                                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-xl focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-colors"
                                            placeholder="12345">
                                        </select>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                            <i class="fas fa-map-marker-alt mr-1"></i>
                                            Alamat Lengkap
                                        </label>
                                        <textarea name="alamat_lengkap" required rows="3"
                                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-xl focus:ring-2 focus:ring-amber-500 focus:border-transparent resize-none transition-colors"
                                            placeholder="Masukkan alamat lengkap (jalan, nomor rumah, gedung, dll)">{{ getAlamat()->alamat_lengkap }}</textarea>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                            <i class="fas fa-mail-bulk mr-1"></i>
                                            Kurir
                                        </label>
                                        <select type="text" name="kurir" required id="kurir"
                                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-xl focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-colors"
                                            placeholder="12345">
                                            <option value="">Pilih Kurir</option>
                                            <option value="jne">JNE</option>
                                            <option value="jnt">J&T</option>
                                            <option value="sicepat">Sicepat</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                            <i class="fas fa-mail-bulk mr-1"></i>
                                            Ongkir
                                        </label>
                                        <select type="text" name="ongkir" required id="ongkir"
                                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-xl focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-colors"
                                            placeholder="12345">
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-3 mt-8 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <button type="button" onclick="closeCheckoutModal()"
                            class="flex-1 px-6 py-3 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Kembali
                        </button>
                        <button type="submit" form="checkoutForm"
                            class="flex-1 px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-semibold rounded-xl transition-all duration-200 flex items-center justify-center gap-2 shadow-lg">
                            <i class="fas fa-lock"></i>
                            <span>Konfirmasi Pembayaran</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Global variables
        let selectedItems = new Set();
        let cartData = {};
        let totalWeight = 0;

        // Initialize cart data
        function initializeCart() {
            $('.cart-item').each(function() {
                const $item = $(this);
                const id = $item.data('id');
                const price = parseInt($item.data('price'));
                const berat = parseInt($item.data('berat'));
                const $qtyInput = $item.find('.qty-input');
                const quantity = parseInt($qtyInput.val());

                cartData[id] = {
                    id: id,
                    price: price,
                    quantity: quantity,
                    element: $item,
                    berat: berat,
                    checkbox: $item.find('.item-checkbox'),
                    totalElement: $item.find('.item-total'),
                    deleteBtn: $item.find('.delete-item'),
                    qtyMinus: $item.find('.qty-minus'),
                    qtyPlus: $item.find('.qty-plus'),
                    qtyInput: $qtyInput
                };

            });

            // Set up event listeners
            setupEventListeners();
            updateSummary();
        }

        // Set up all event listeners
        function setupEventListeners() {
            // Select all checkbox
            $('#selectAll').on('change', function() {
                const isChecked = $(this).prop('checked');
                selectedItems.clear();

                Object.keys(cartData).forEach(id => {
                    cartData[id].checkbox.prop('checked', isChecked);
                    if (isChecked) {
                        selectedItems.add(id);
                    }
                });

                updateSelectedCount();
                updateSummary();
                toggleCheckoutButton();
            });

            // Individual item checkboxes
            Object.keys(cartData).forEach(id => {
                const item = cartData[id];

                item.checkbox.on('change', function() {
                    if ($(this).prop('checked')) {
                        selectedItems.add(id);
                    } else {
                        selectedItems.delete(id);
                        $('#selectAll').prop('checked', false);
                    }

                    updateSelectedCount();
                    updateSummary();
                    toggleCheckoutButton();
                });

                // Quantity minus button
                item.qtyMinus.on('click', function() {
                    if (item.quantity > 1) {
                        item.quantity--;
                        item.qtyInput.val(item.quantity);
                        const data = {
                            id: id,
                            kuantitas: item.quantity
                        }
                        const url = `/keranjang/${id}/kuantitas`;

                        ajaxCall(url, 'POST', data, null, null)
                        updateItemTotal(id);
                        updateSummary();
                    }
                });

                // Quantity plus button
                item.qtyPlus.on('click', function() {
                    item.quantity++;
                    item.qtyInput.val(item.quantity);
                    console.log(item.quantity);
                    const data = {
                        id: id,
                        kuantitas: item.quantity
                    }
                    const url = `/keranjang/${id}/kuantitas`;

                    ajaxCall(url, 'POST', data, null, null)
                    updateItemTotal(id);
                    updateSummary();
                });

                // Quantity input change
                item.qtyInput.on('change', function() {
                    const newQty = parseInt($(this).val()) || 1;
                    item.quantity = Math.max(1, newQty);
                    $(this).val(item.quantity);
                    const data = {
                        id: id,
                        kuantitas: item.quantity
                    }
                    const url = `/keranjang/${id}/kuantitas`;

                    ajaxCall(url, 'POST', data, null, null)
                    updateItemTotal(id);
                    updateSummary();
                });

                // Delete item button
                item.deleteBtn.on('click', function() {
                    deleteItem(id);
                });
            });

            // Delete selected items button
            $('#deleteSelected').on('click', function() {
                if (selectedItems.size > 0 && confirm('Apakah Anda yakin ingin menghapus item yang dipilih?')) {
                    selectedItems.forEach(id => {
                        deleteItem(id);
                    });
                    selectedItems.clear();
                    $('#selectAll').prop('checked', false);
                    updateSelectedCount();
                    updateSummary();
                    toggleCheckoutButton();
                }
            });
        }


        // Update the summary section
        function updateSummary() {
            let subtotal = 0;
            let itemCount = 0;

            selectedItems.forEach(id => {
                const item = cartData[id];
                subtotal += item.price * item.quantity;
                itemCount += item.quantity;
            });

            const grandTotal = subtotal

            // Update summary elements
            $('#itemCount').text(`(${itemCount} ${itemCount === 1 ? 'item' : 'items'})`);
            $('#grandTotal').text(`Rp ${grandTotal.toLocaleString('id-ID')}`);

            // Update selected items info
            const $infoElement = $('#selectedItemsInfo');
            if (itemCount > 0) {
                $infoElement.html(
                    `<i class="fas fa-check-circle mr-1"></i> ${itemCount} ${itemCount === 1 ? 'item' : 'items'} dipilih untuk checkout`
                );
                $infoElement.removeClass().addClass('text-sm text-green-800 dark:text-green-200');
            } else {
                $infoElement.html('<i class="fas fa-info-circle mr-1"></i> Pilih item yang ingin di-checkout');
                $infoElement.removeClass().addClass('text-sm text-blue-800 dark:text-blue-200');
            }
        }

        function updateItemTotal(id) {
            const item = cartData[id];
            const total = item.price * item.quantity;
            item.totalElement.text(`Rp ${total.toLocaleString('id-ID')}`);
        }

        // Update selected items count
        function updateSelectedCount() {
            const count = selectedItems.size;
            $('#selectedCount').text(`(${count} ${count === 1 ? 'item' : 'items'} dipilih)`);

            // Enable/disable delete selected button
            $('#deleteSelected').prop('disabled', count === 0);
        }

        // Toggle checkout button state
        function toggleCheckoutButton() {
            $('#checkoutBtn').prop('disabled', selectedItems.size === 0);
        }

        // Delete an item from cart
        function deleteItem(id) {
            const item = cartData[id];
            item.element.remove();
            delete cartData[id];
            selectedItems.delete(id);
        }

        // Open checkout modal
        function openCheckoutModal() {
            if (selectedItems.size === 0) return;

            const $modal = $('#checkoutModal');
            const $modalContent = $('#modalContent');

            // Populate checkout items
            const $checkoutItems = $('#checkoutItems');
            $checkoutItems.empty();

            let subtotal = 0;
            totalWeight = 0;
            selectedItems.forEach(id => {
                const item = cartData[id];
                subtotal += item.price * item.quantity;
                console.log(item.berat, item.quantity);
                totalWeight = item.berat * item.quantity

                const $itemElement = $(`
                <div class="flex items-start gap-3 p-2 bg-white/50 dark:bg-gray-800/50 rounded-lg">
                    <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-blue-100 to-indigo-100 dark:from-blue-900/30 dark:to-indigo-900/30 rounded-lg flex items-center justify-center">
                        <i class="fas fa-box text-blue-600 dark:text-blue-400"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="font-medium text-gray-900 dark:text-white">${item.element.find('h3').text()}</h4>
                        <p class="text-xs text-gray-500 dark:text-gray-400">${item.quantity} x Rp ${item.price.toLocaleString('id-ID')}</p>
                    </div>
                    <div class="font-medium text-gray-900 dark:text-white">Rp ${(item.price * item.quantity).toLocaleString('id-ID')}</div>
                </div>
            `);
                $checkoutItems.append($itemElement);
            });

            const grandTotal = subtotal;
            console.log(grandTotal);

            // Update checkout summary
            $('#checkoutSubtotal').text(`Rp ${subtotal.toLocaleString('id-ID')}`);
            $('#checkoutTotal').text(`Rp ${grandTotal.toLocaleString('id-ID')}`);
            $('#checkoutWeight').val(totalWeight);
            console.log(totalWeight, 'update checkout weight');

            // Show modal with animation
            $modal.removeClass('hidden');
            setTimeout(() => {
                $modalContent.removeClass('scale-95 opacity-0').addClass('scale-100 opacity-100');
            }, 10);
        }

        // Close checkout modal
        function closeCheckoutModal() {
            const $modal = $('#checkoutModal');
            const $modalContent = $('#modalContent');

            $modalContent.removeClass('scale-100 opacity-100').addClass('scale-95 opacity-0');

            setTimeout(() => {
                $modal.addClass('hidden');
            }, 300);
        }

        // Handle form submission
        $('#checkoutForm').on('submit', function(e) {
            e.preventDefault();

            // Here you would typically send the data to your backend
            // For this example, we'll just show an alert
            alert('Pesanan berhasil diproses! Terima kasih telah berbelanja.');
            closeCheckoutModal();

            // In a real app, you would redirect to a success page or show a confirmation
        });

        // Initialize the cart when DOM is loaded
        $(document).ready(function() {
            initializeCart();


            let provinsi = '{{ getAlamat()->provinsi }}';
            let kota = '{{ getAlamat()->kota }}';
            let kecamatan = '{{ getAlamat()->kecamatan }}';
            let kelurahan = '{{ getAlamat()->kelurahan }}';
            let kode_pos = '{{ getAlamat()->kode_pos }}';
            let origin = '{{ getPengaturan()->kode_pos }}';
            let weight = 0;

            $('#checkoutBtn').on('click', function() {
                weight = $('#checkoutWeight').val()
                console.log(weight);
            });
            $('#ongkir').on('change', function() {
                const ongkir = $('#ongkir option:selected').text();
                const harga = ongkir.split(' - ')[0];
                $('#checkoutShipping').text(harga);
                console.log(harga, grandTotal, 'ongkir');
            });
            let search = `${provinsi} ${kota} ${kecamatan} ${kelurahan} `;

            loadSelectOptions('#kode_pos', `/wilayah/tujuan?search=${search}`, kode_pos)

            $('#kode_pos').on('change', function() {
                kode_pos = $(this).val()
            })

            $('#kurir').on('change', function() {
                kurir = $(this).val()
                loadSelectOptions('#ongkir',
                    `/wilayah/ongkir?origin=${origin}&destination=${kode_pos}&courier=${kurir}&weight=${weight}`
                )
            })
        });
    </script>
@endsection
