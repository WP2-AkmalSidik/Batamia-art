@extends('layouts.app')

@section('title', 'Keranjang Belanja')

@section('content')
    <div class="min-h-screen bg-gray-50 dark:bg-gray-900 py-8 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Select All & Actions -->
            <div
                class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 p-4 mb-6 transition-colors duration-300">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div class="flex items-center gap-3">
                        <label class="flex items-center cursor-pointer">
                            <input type="checkbox" id="selectAll"
                                class="w-5 h-5 text-blue-600 bg-gray-100 dark:bg-gray-700 border-gray-300 dark:border-gray-600 rounded focus:ring-blue-500 dark:focus:ring-blue-600 focus:ring-2">
                            <span class="ml-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Semua</span>
                        </label>
                        <span class="text-sm text-gray-500 dark:text-gray-400" id="selectedCount">(0 item dipilih)</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <button id="deleteSelected"
                            class="px-4 py-2 text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition-colors text-sm font-medium disabled:opacity-50"
                            disabled>
                            <i class="fas fa-trash mr-1"></i>
                            Hapus Terpilih
                        </button>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="lg:grid lg:grid-cols-12 lg:gap-8">
                <!-- Cart Items -->
                <div class="lg:col-span-8">
                    <!-- Cart Item 1 -->
                    <div class="cart-item bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 p-6 mb-4 hover:shadow-md dark:hover:shadow-lg transition-all duration-300"
                        data-price="225000" data-id="1">
                        <div class="flex items-start gap-4">
                            <!-- Checkbox -->
                            <div class="flex-shrink-0 pt-1">
                                <input type="checkbox"
                                    class="item-checkbox w-5 h-5 text-blue-600 bg-gray-100 dark:bg-gray-700 border-gray-300 dark:border-gray-600 rounded focus:ring-blue-500 dark:focus:ring-blue-600 focus:ring-2">
                            </div>

                            <!-- Product Image -->
                            <div class="flex-shrink-0">
                                <div
                                    class="w-24 h-24 bg-gradient-to-br from-amber-100 to-orange-100 dark:from-amber-900/30 dark:to-orange-900/30 rounded-xl flex items-center justify-center">
                                    <i class="fas fa-dragon text-2xl text-amber-600 dark:text-amber-400"></i>
                                </div>
                            </div>

                            <!-- Product Details -->
                            <div class="flex-1 min-w-0">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-1">Kerajinan Kayu Ukir
                                    Naga</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400 mb-3">Ukiran tradisional dengan detail
                                    tinggi</p>

                                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                                    <!-- Price -->
                                    <div class="flex items-center gap-2">
                                        <span class="text-lg font-bold text-gray-900 dark:text-white">Rp 225.000</span>
                                        <span class="text-sm text-gray-500 dark:text-gray-400">per pcs</span>
                                    </div>

                                    <!-- Quantity Controls -->
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="flex items-center border border-gray-200 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700">
                                            <button
                                                class="qty-minus p-2 hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors">
                                                <i class="fas fa-minus text-xs text-gray-600 dark:text-gray-300"></i>
                                            </button>
                                            <input type="number" value="2" min="1"
                                                class="qty-input w-16 text-center border-0 bg-transparent focus:ring-0 text-sm font-medium text-gray-900 dark:text-white">
                                            <button
                                                class="qty-plus p-2 hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors">
                                                <i class="fas fa-plus text-xs text-gray-600 dark:text-gray-300"></i>
                                            </button>
                                        </div>

                                        <!-- Total Price -->
                                        <div class="text-right">
                                            <p class="item-total text-lg font-bold text-blue-600 dark:text-blue-400">Rp
                                                450.000</p>
                                        </div>

                                        <!-- Delete Button -->
                                        <button
                                            class="delete-item p-2 text-red-500 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition-colors">
                                            <i class="fas fa-trash text-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Cart Item 2 -->
                    <div class="cart-item bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 p-6 mb-4 hover:shadow-md dark:hover:shadow-lg transition-all duration-300"
                        data-price="280000" data-id="2">
                        <div class="flex items-start gap-4">
                            <!-- Checkbox -->
                            <div class="flex-shrink-0 pt-1">
                                <input type="checkbox"
                                    class="item-checkbox w-5 h-5 text-blue-600 bg-gray-100 dark:bg-gray-700 border-gray-300 dark:border-gray-600 rounded focus:ring-blue-500 dark:focus:ring-blue-600 focus:ring-2">
                            </div>

                            <!-- Product Image -->
                            <div class="flex-shrink-0">
                                <div
                                    class="w-24 h-24 bg-gradient-to-br from-blue-100 to-indigo-100 dark:from-blue-900/30 dark:to-indigo-900/30 rounded-xl flex items-center justify-center">
                                    <i class="fas fa-tshirt text-2xl text-blue-600 dark:text-blue-400"></i>
                                </div>
                            </div>

                            <!-- Product Details -->
                            <div class="flex-1 min-w-0">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-1">Batik Handmade Motif
                                    Parang</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400 mb-3">Batik tulis asli dengan motif
                                    klasik</p>

                                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                                    <!-- Price -->
                                    <div class="flex items-center gap-2">
                                        <span class="text-lg font-bold text-gray-900 dark:text-white">Rp 280.000</span>
                                        <span class="text-sm text-gray-500 dark:text-gray-400">per pcs</span>
                                    </div>

                                    <!-- Quantity Controls -->
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="flex items-center border border-gray-200 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700">
                                            <button
                                                class="qty-minus p-2 hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors">
                                                <i class="fas fa-minus text-xs text-gray-600 dark:text-gray-300"></i>
                                            </button>
                                            <input type="number" value="1" min="1"
                                                class="qty-input w-16 text-center border-0 bg-transparent focus:ring-0 text-sm font-medium text-gray-900 dark:text-white">
                                            <button
                                                class="qty-plus p-2 hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors">
                                                <i class="fas fa-plus text-xs text-gray-600 dark:text-gray-300"></i>
                                            </button>
                                        </div>

                                        <!-- Total Price -->
                                        <div class="text-right">
                                            <p class="item-total text-lg font-bold text-blue-600 dark:text-blue-400">Rp
                                                280.000</p>
                                        </div>

                                        <!-- Delete Button -->
                                        <button
                                            class="delete-item p-2 text-red-500 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition-colors">
                                            <i class="fas fa-trash text-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Cart Item 3 -->
                    <div class="cart-item bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 p-6 mb-4 hover:shadow-md dark:hover:shadow-lg transition-all duration-300"
                        data-price="350000" data-id="3">
                        <div class="flex items-start gap-4">
                            <!-- Checkbox -->
                            <div class="flex-shrink-0 pt-1">
                                <input type="checkbox"
                                    class="item-checkbox w-5 h-5 text-blue-600 bg-gray-100 dark:bg-gray-700 border-gray-300 dark:border-gray-600 rounded focus:ring-blue-500 dark:focus:ring-blue-600 focus:ring-2">
                            </div>

                            <!-- Product Image -->
                            <div class="flex-shrink-0">
                                <div
                                    class="w-24 h-24 bg-gradient-to-br from-purple-100 to-pink-100 dark:from-purple-900/30 dark:to-pink-900/30 rounded-xl flex items-center justify-center">
                                    <i class="fas fa-palette text-2xl text-purple-600 dark:text-purple-400"></i>
                                </div>
                            </div>

                            <!-- Product Details -->
                            <div class="flex-1 min-w-0">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-1">Tenun Tradisional
                                    Songket</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400 mb-3">Kain tenun dengan benang emas</p>

                                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                                    <!-- Price -->
                                    <div class="flex items-center gap-2">
                                        <span class="text-lg font-bold text-gray-900 dark:text-white">Rp 350.000</span>
                                        <span class="text-sm text-gray-500 dark:text-gray-400">per pcs</span>
                                    </div>

                                    <!-- Quantity Controls -->
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="flex items-center border border-gray-200 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700">
                                            <button
                                                class="qty-minus p-2 hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors">
                                                <i class="fas fa-minus text-xs text-gray-600 dark:text-gray-300"></i>
                                            </button>
                                            <input type="number" value="1" min="1"
                                                class="qty-input w-16 text-center border-0 bg-transparent focus:ring-0 text-sm font-medium text-gray-900 dark:text-white">
                                            <button
                                                class="qty-plus p-2 hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors">
                                                <i class="fas fa-plus text-xs text-gray-600 dark:text-gray-300"></i>
                                            </button>
                                        </div>

                                        <!-- Total Price -->
                                        <div class="text-right">
                                            <p class="item-total text-lg font-bold text-blue-600 dark:text-blue-400">Rp
                                                350.000</p>
                                        </div>

                                        <!-- Delete Button -->
                                        <button
                                            class="delete-item p-2 text-red-500 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition-colors">
                                            <i class="fas fa-trash text-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="lg:col-span-4 mt-8 lg:mt-0">
                    <div
                        class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 p-6 sticky top-8 transition-colors duration-300">
                        <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-6">Ringkasan Pesanan</h2>

                        <!-- Selected Items Info -->
                        <div class="mb-4 p-3 bg-blue-50 dark:bg-blue-900/20 rounded-lg">
                            <p class="text-sm text-blue-800 dark:text-blue-200" id="selectedItemsInfo">
                                <i class="fas fa-info-circle mr-1"></i>
                                Pilih item yang ingin di-checkout
                            </p>
                        </div>

                        <!-- Summary Items -->
                        <div class="space-y-4 mb-6" id="summaryItems">
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600 dark:text-gray-400">Subtotal <span id="itemCount">(0
                                        items)</span></span>
                                <span class="font-medium text-gray-900 dark:text-white" id="subtotal">Rp 0</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600 dark:text-gray-400">Ongkos Kirim</span>
                                <span class="font-medium text-gray-900 dark:text-white" id="shipping">Rp 0</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600 dark:text-gray-400">Biaya Admin</span>
                                <span class="font-medium text-gray-900 dark:text-white" id="adminFee">Rp 0</span>
                            </div>
                            <hr class="border-gray-200 dark:border-gray-600">
                            <div class="flex justify-between">
                                <span class="text-lg font-bold text-gray-900 dark:text-white">Total</span>
                                <span class="text-xl font-bold text-blue-600 dark:text-blue-400" id="grandTotal">Rp
                                    0</span>
                            </div>
                        </div>

                        <!-- Checkout Button -->
                        <button id="checkoutBtn" onclick="openCheckoutModal()"
                            class="w-full bg-blue-600 hover:bg-blue-700 disabled:bg-gray-400 dark:disabled:bg-gray-600 text-white font-semibold py-4 px-6 rounded-xl transition-colors duration-200 flex items-center justify-center gap-2 disabled:cursor-not-allowed"
                            disabled>
                            <i class="fas fa-shopping-cart"></i>
                            <span>Checkout Sekarang</span>
                        </button>

                        <!-- Continue Shopping -->
                        <div class="mt-4 text-center">
                            <a href="#"
                                class="text-sm text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
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
                                    <div class="flex justify-between text-sm">
                                        <span class="text-gray-600 dark:text-gray-400">Biaya Admin</span>
                                        <span class="font-medium" id="checkoutAdmin">Rp 0</span>
                                    </div>
                                    <div
                                        class="flex justify-between font-bold text-lg pt-2 border-t border-gray-300 dark:border-gray-600">
                                        <span class="text-gray-900 dark:text-white">Total</span>
                                        <span class="text-blue-600 dark:text-blue-400" id="checkoutTotal">Rp 0</span>
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
                                    <label
                                        class="flex items-center p-4 border border-gray-300 dark:border-gray-600 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer transition-colors">
                                        <input type="radio" name="payment" value="transfer"
                                            class="mr-3 text-blue-600 focus:ring-blue-500">
                                        <i class="fas fa-university text-blue-600 mr-3"></i>
                                        <div>
                                            <span class="font-medium text-gray-900 dark:text-white">Transfer
                                                Bank</span>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">BCA, Mandiri, BNI,
                                                BRI</p>
                                        </div>
                                    </label>
                                    <label
                                        class="flex items-center p-4 border border-gray-300 dark:border-gray-600 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer transition-colors">
                                        <input type="radio" name="payment" value="ewallet"
                                            class="mr-3 text-blue-600 focus:ring-blue-500">
                                        <i class="fas fa-mobile-alt text-green-600 mr-3"></i>
                                        <div>
                                            <span class="font-medium text-gray-900 dark:text-white">E-Wallet</span>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">GoPay, OVO, Dana,
                                                ShopeePay</p>
                                        </div>
                                    </label>
                                    <label
                                        class="flex items-center p-4 border border-gray-300 dark:border-gray-600 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer transition-colors">
                                        <input type="radio" name="payment" value="cod"
                                            class="mr-3 text-blue-600 focus:ring-blue-500">
                                        <i class="fas fa-money-bill text-yellow-600 mr-3"></i>
                                        <div>
                                            <span class="font-medium text-gray-900 dark:text-white">Bayar di Tempat
                                                (COD)</span>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">Bayar saat barang
                                                sampai</p>
                                        </div>
                                    </label>
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
                                        <input type="text" name="name" required
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
                                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-xl focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-colors"
                                                placeholder="08xxxxxxxxxx">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                                <i class="fas fa-envelope mr-1"></i>
                                                Email
                                            </label>
                                            <input type="email" name="email" required
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
                                            <select name="province" required
                                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-xl focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-colors">
                                                <option value="">Pilih Provinsi</option>
                                                <!-- Options will be populated by JavaScript -->
                                            </select>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                                <i class="fas fa-city mr-1"></i>
                                                Kota/Kabupaten
                                            </label>
                                            <select name="city" required
                                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-xl focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-colors">
                                                <option value="">Pilih Kota/Kabupaten</option>
                                                <!-- Options will be populated by JavaScript -->
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Kecamatan dan Kelurahan -->
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                                <i class="fas fa-map-marked-alt mr-1"></i>
                                                Kecamatan
                                            </label>
                                            <select name="district" required
                                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-xl focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-colors">
                                                <option value="">Pilih Kecamatan</option>
                                                <!-- Options will be populated by JavaScript -->
                                            </select>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                                <i class="fas fa-map-pin mr-1"></i>
                                                Kelurahan
                                            </label>
                                            <select name="village" required
                                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-xl focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-colors">
                                                <option value="">Pilih Kelurahan</option>
                                                <!-- Options will be populated by JavaScript -->
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Kode Pos dan Alamat Lengkap -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                                <i class="fas fa-mail-bulk mr-1"></i>
                                                Kode Pos
                                            </label>
                                        <input type="text" name="postal_code" required
                                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-xl focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-colors"
                                                placeholder="12345">
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                            <i class="fas fa-map-marker-alt mr-1"></i>
                                            Alamat Lengkap
                                        </label>
                                        <textarea name="address" required rows="3"
                                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-xl focus:ring-2 focus:ring-amber-500 focus:border-transparent resize-none transition-colors"
                                            placeholder="Masukkan alamat lengkap (jalan, nomor rumah, gedung, dll)"></textarea>
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

        // Initialize cart data
        function initializeCart() {
            document.querySelectorAll('.cart-item').forEach(item => {
                const id = item.dataset.id;
                const price = parseInt(item.dataset.price);
                const qtyInput = item.querySelector('.qty-input');
                const quantity = parseInt(qtyInput.value);

                cartData[id] = {
                    id: id,
                    price: price,
                    quantity: quantity,
                    element: item,
                    checkbox: item.querySelector('.item-checkbox'),
                    totalElement: item.querySelector('.item-total'),
                    deleteBtn: item.querySelector('.delete-item'),
                    qtyMinus: item.querySelector('.qty-minus'),
                    qtyPlus: item.querySelector('.qty-plus')
                };

                // Update total price for this item
                updateItemTotal(id);
            });

            // Set up event listeners
            setupEventListeners();
            updateSummary();
        }

        // Set up all event listeners
        function setupEventListeners() {
            // Select all checkbox
            document.getElementById('selectAll').addEventListener('change', function() {
                const isChecked = this.checked;
                selectedItems.clear();

                Object.keys(cartData).forEach(id => {
                    cartData[id].checkbox.checked = isChecked;
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

                item.checkbox.addEventListener('change', function() {
                    if (this.checked) {
                        selectedItems.add(id);
                    } else {
                        selectedItems.delete(id);
                        document.getElementById('selectAll').checked = false;
                    }

                    updateSelectedCount();
                    updateSummary();
                    toggleCheckoutButton();
                });

                // Quantity minus button
                item.qtyMinus.addEventListener('click', function() {
                    if (item.quantity > 1) {
                        item.quantity--;
                        item.qtyInput.value = item.quantity;
                        updateItemTotal(id);
                        updateSummary();
                    }
                });

                // Quantity plus button
                item.qtyPlus.addEventListener('click', function() {
                    item.quantity++;
                    item.qtyInput.value = item.quantity;
                    updateItemTotal(id);
                    updateSummary();
                });

                // Quantity input change
                item.qtyInput.addEventListener('change', function() {
                    const newQty = parseInt(this.value) || 1;
                    item.quantity = Math.max(1, newQty);
                    this.value = item.quantity;
                    updateItemTotal(id);
                    updateSummary();
                });

                // Delete item button
                item.deleteBtn.addEventListener('click', function() {
                    deleteItem(id);
                });
            });

            // Delete selected items button
            document.getElementById('deleteSelected').addEventListener('click', function() {
                if (selectedItems.size > 0 && confirm('Apakah Anda yakin ingin menghapus item yang dipilih?')) {
                    selectedItems.forEach(id => {
                        deleteItem(id);
                    });
                    selectedItems.clear();
                    document.getElementById('selectAll').checked = false;
                    updateSelectedCount();
                    updateSummary();
                    toggleCheckoutButton();
                }
            });
        }

        // Update total price for a single item
        function updateItemTotal(id) {
            const item = cartData[id];
            const total = item.price * item.quantity;
            item.totalElement.textContent = `Rp ${total.toLocaleString('id-ID')}`;
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

            // Calculate shipping (10% of subtotal, min 20k)
            const shipping = Math.max(20000, subtotal * 0.1);
            // Calculate admin fee (5% of subtotal, min 5k)
            const adminFee = Math.max(5000, subtotal * 0.05);
            const grandTotal = subtotal + shipping + adminFee;

            // Update summary elements
            document.getElementById('itemCount').textContent = `(${itemCount} ${itemCount === 1 ? 'item' : 'items'})`;
            document.getElementById('subtotal').textContent = `Rp ${subtotal.toLocaleString('id-ID')}`;
            document.getElementById('shipping').textContent = `Rp ${shipping.toLocaleString('id-ID')}`;
            document.getElementById('adminFee').textContent = `Rp ${adminFee.toLocaleString('id-ID')}`;
            document.getElementById('grandTotal').textContent = `Rp ${grandTotal.toLocaleString('id-ID')}`;

            // Update selected items info
            const infoElement = document.getElementById('selectedItemsInfo');
            if (itemCount > 0) {
                infoElement.innerHTML =
                    `<i class="fas fa-check-circle mr-1"></i> ${itemCount} ${itemCount === 1 ? 'item' : 'items'} dipilih untuk checkout`;
                infoElement.className = 'text-sm text-green-800 dark:text-green-200';
            } else {
                infoElement.innerHTML = '<i class="fas fa-info-circle mr-1"></i> Pilih item yang ingin di-checkout';
                infoElement.className = 'text-sm text-blue-800 dark:text-blue-200';
            }
        }

        // Update selected items count
        function updateSelectedCount() {
            const count = selectedItems.size;
            document.getElementById('selectedCount').textContent = `(${count} ${count === 1 ? 'item' : 'items'} dipilih)`;

            // Enable/disable delete selected button
            document.getElementById('deleteSelected').disabled = count === 0;
        }

        // Toggle checkout button state
        function toggleCheckoutButton() {
            document.getElementById('checkoutBtn').disabled = selectedItems.size === 0;
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

            const modal = document.getElementById('checkoutModal');
            const modalContent = document.getElementById('modalContent');

            // Populate checkout items
            const checkoutItems = document.getElementById('checkoutItems');
            checkoutItems.innerHTML = '';

            let subtotal = 0;
            selectedItems.forEach(id => {
                const item = cartData[id];
                subtotal += item.price * item.quantity;

                const itemElement = document.createElement('div');
                itemElement.className = 'flex items-start gap-3 p-2 bg-white/50 dark:bg-gray-800/50 rounded-lg';
                itemElement.innerHTML = `
                    <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-blue-100 to-indigo-100 dark:from-blue-900/30 dark:to-indigo-900/30 rounded-lg flex items-center justify-center">
                        <i class="fas fa-box text-blue-600 dark:text-blue-400"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="font-medium text-gray-900 dark:text-white">${item.element.querySelector('h3').textContent}</h4>
                        <p class="text-xs text-gray-500 dark:text-gray-400">${item.quantity} x Rp ${item.price.toLocaleString('id-ID')}</p>
                    </div>
                    <div class="font-medium text-gray-900 dark:text-white">Rp ${(item.price * item.quantity).toLocaleString('id-ID')}</div>
                `;
                checkoutItems.appendChild(itemElement);
            });

            // Calculate totals (same as in updateSummary)
            const shipping = Math.max(20000, subtotal * 0.1);
            const adminFee = Math.max(5000, subtotal * 0.05);
            const grandTotal = subtotal + shipping + adminFee;

            // Update checkout summary
            document.getElementById('checkoutSubtotal').textContent = `Rp ${subtotal.toLocaleString('id-ID')}`;
            document.getElementById('checkoutShipping').textContent = `Rp ${shipping.toLocaleString('id-ID')}`;
            document.getElementById('checkoutAdmin').textContent = `Rp ${adminFee.toLocaleString('id-ID')}`;
            document.getElementById('checkoutTotal').textContent = `Rp ${grandTotal.toLocaleString('id-ID')}`;

            // Show modal with animation
            modal.classList.remove('hidden');
            setTimeout(() => {
                modalContent.classList.remove('scale-95', 'opacity-0');
                modalContent.classList.add('scale-100', 'opacity-100');
            }, 10);
        }

        // Close checkout modal
        function closeCheckoutModal() {
            const modal = document.getElementById('checkoutModal');
            const modalContent = document.getElementById('modalContent');

            modalContent.classList.remove('scale-100', 'opacity-100');
            modalContent.classList.add('scale-95', 'opacity-0');

            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }

        // Handle form submission
        document.getElementById('checkoutForm').addEventListener('submit', function(e) {
            e.preventDefault();

            // Here you would typically send the data to your backend
            // For this example, we'll just show an alert
            alert('Pesanan berhasil diproses! Terima kasih telah berbelanja.');
            closeCheckoutModal();

            // In a real app, you would redirect to a success page or show a confirmation
        });

        // Initialize the cart when DOM is loaded
        document.addEventListener('DOMContentLoaded', initializeCart);
    </script>
@endsection
