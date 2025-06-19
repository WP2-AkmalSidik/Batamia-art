@extends('layouts.app')

@section('title', 'Pesanan Saya')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <!-- Header Section -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 mb-6">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Pesanan Saya</h1>
                    <p class="text-gray-600 dark:text-gray-400 mt-1">Kelola dan pantau status pesanan Anda</p>
                </div>
                <div class="w-full md:w-auto">
                    <select
                        class="w-full px-4 py-2 text-sm rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="">Semua Status</option>
                        <option value="menunggu_pembayaran">Menunggu Pembayaran</option>
                        <option value="diproses">Diproses</option>
                        <option value="dikirim">Dikirim</option>
                        <option value="selesai">Selesai</option>
                        <option value="dibatalkan">Dibatalkan</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Order Cards -->
        <div class="space-y-4">
            <!-- Pesanan 1 - Menunggu Pembayaran -->
            <div
                class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden transition-all duration-300 hover:shadow-md dark:hover:shadow-lg">
                <div class="p-4 sm:p-6">
                    <!-- Order Header -->
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-4">
                        <div class="flex items-center flex-wrap gap-2">
                            <div class="flex items-center gap-2">
                                <i class="fas fa-shopping-bag text-blue-500"></i>
                                <span class="font-semibold text-gray-900 dark:text-white">ORD-2024-001</span>
                            </div>
                            <span class="hidden sm:block text-gray-500 dark:text-gray-400">•</span>
                            <span class="text-sm text-gray-600 dark:text-gray-400">15 Juni 2025</span>
                        </div>
                        <span
                            class="bg-yellow-100 dark:bg-yellow-900/30 text-yellow-800 dark:text-yellow-200 px-3 py-1 rounded-full text-xs font-medium inline-flex items-center">
                            <i class="fas fa-clock mr-1"></i>
                            Menunggu Pembayaran
                        </span>
                    </div>

                    <!-- Order Items -->
                    <div class="bg-gray-50 dark:bg-gray-700/30 rounded-lg p-4 mb-4">
                        <h4 class="font-medium text-gray-900 dark:text-white mb-3">Item Pesanan</h4>
                        <div class="space-y-4">
                            <!-- Item 1 -->
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                                <div class="flex items-center gap-3">
                                    <div class="relative w-16 h-16 rounded-lg overflow-hidden flex-shrink-0 group">
                                        <!-- Gambar Produk 1" -->
                                        <img src="https://images.unsplash.com/photo-1583394838336-acd977736f90?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=256&h=256&q=80"
                                            alt="Produk 1"
                                            class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                                        <div
                                            class="absolute inset-0 bg-black/5 group-hover:bg-black/10 transition-colors duration-300">
                                        </div>

                                        <!-- Badge diskon (opsional) -->
                                        <div class="absolute top-1 right-1 bg-red-500 text-white text-xs px-1 rounded">
                                            -15%
                                        </div>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900 dark:text-white">Kerajinan Kayu Ukir Naga</p>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">2 × Rp 225.000</p>
                                    </div>
                                </div>
                                <span class="font-semibold text-gray-900 dark:text-white sm:text-right">Rp 450.000</span>
                            </div>

                            <!-- Item 2 -->
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="relative w-16 h-16 rounded-lg overflow-hidden flex-shrink-0 group shadow-md hover:shadow-lg transition-shadow">
                                        <img src="https://images.unsplash.com/photo-1602143407151-7111542de6e8?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=256&h=256&q=80"
                                            alt="Produk Nyata" class="w-full h-full object-cover">
                                        <div
                                            class="absolute inset-0 border border-gray-200/50 rounded-lg pointer-events-none">
                                        </div>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900 dark:text-white">Batik Handmade Motif Parang</p>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">1 × Rp 280.000</p>
                                    </div>
                                </div>
                                <span class="font-semibold text-gray-900 dark:text-white sm:text-right">Rp 280.000</span>
                            </div>
                        </div>
                    </div>

                    <!-- Order Summary -->
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Total Pembayaran</p>
                            <p class="text-xl font-bold text-gray-900 dark:text-white">Rp 730.000</p>
                        </div>
                        <button onclick="openUploadModal('ORD-2024-001')"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-medium transition-all duration-300 flex items-center justify-center gap-2">
                            <i class="fas fa-upload"></i>
                            <span>Upload Bukti</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Pesanan 2 - Diproses -->
            <div
                class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden transition-all duration-300 hover:shadow-md dark:hover:shadow-lg">
                <div class="p-4 sm:p-6">
                    <!-- Order Header -->
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-4">
                        <div class="flex items-center flex-wrap gap-2">
                            <div class="flex items-center gap-2">
                                <i class="fas fa-shopping-bag text-blue-500"></i>
                                <span class="font-semibold text-gray-900 dark:text-white">ORD-2024-002</span>
                            </div>
                            <span class="hidden sm:block text-gray-500 dark:text-gray-400">•</span>
                            <span class="text-sm text-gray-600 dark:text-gray-400">12 Juni 2025</span>
                        </div>
                        <span
                            class="bg-blue-100 dark:bg-blue-900/30 text-blue-800 dark:text-blue-200 px-3 py-1 rounded-full text-xs font-medium inline-flex items-center">
                            <i class="fas fa-cog fa-spin mr-1"></i>
                            Diproses
                        </span>
                    </div>

                    <!-- Order Items -->
                    <div class="bg-gray-50 dark:bg-gray-700/30 rounded-lg p-4 mb-4">
                        <h4 class="font-medium text-gray-900 dark:text-white mb-3">Item Pesanan</h4>
                        <div class="space-y-4">
                            <!-- Item 1 -->
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-16 h-16 bg-gray-200 dark:bg-gray-600 rounded-lg overflow-hidden flex-shrink-0">
                                        <img src="https://via.placeholder.com/150" alt="Produk"
                                            class="w-full h-full object-cover">
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900 dark:text-white">Tenun Tradisional Songket</p>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">1 × Rp 750.000</p>
                                    </div>
                                </div>
                                <span class="font-semibold text-gray-900 dark:text-white sm:text-right">Rp 750.000</span>
                            </div>
                        </div>
                    </div>

                    <!-- Order Summary -->
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Total Pembayaran</p>
                            <p class="text-xl font-bold text-gray-900 dark:text-white">Rp 750.000</p>
                        </div>
                        <div class="flex items-center text-blue-600 dark:text-blue-400">
                            <i class="fas fa-info-circle mr-2"></i>
                            <span class="text-sm">Pesanan sedang diproses</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pesanan 3 - Dikirim -->
            <div
                class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden transition-all duration-300 hover:shadow-md dark:hover:shadow-lg">
                <div class="p-4 sm:p-6">
                    <!-- Order Header -->
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-4">
                        <div class="flex items-center flex-wrap gap-2">
                            <div class="flex items-center gap-2">
                                <i class="fas fa-shopping-bag text-blue-500"></i>
                                <span class="font-semibold text-gray-900 dark:text-white">ORD-2024-003</span>
                            </div>
                            <span class="hidden sm:block text-gray-500 dark:text-gray-400">•</span>
                            <span class="text-sm text-gray-600 dark:text-gray-400">10 Juni 2025</span>
                        </div>
                        <span
                            class="bg-purple-100 dark:bg-purple-900/30 text-purple-800 dark:text-purple-200 px-3 py-1 rounded-full text-xs font-medium inline-flex items-center">
                            <i class="fas fa-truck mr-1"></i>
                            Dikirim
                        </span>
                    </div>

                    <!-- Order Items -->
                    <div class="bg-gray-50 dark:bg-gray-700/30 rounded-lg p-4 mb-4">
                        <h4 class="font-medium text-gray-900 dark:text-white mb-3">Item Pesanan</h4>
                        <div class="space-y-4">
                            <!-- Item 1 -->
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-16 h-16 bg-gray-200 dark:bg-gray-600 rounded-lg overflow-hidden flex-shrink-0">
                                        <img src="https://via.placeholder.com/150" alt="Produk"
                                            class="w-full h-full object-cover">
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900 dark:text-white">Keramik Hias Tradisional</p>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">1 set × Rp 320.000</p>
                                    </div>
                                </div>
                                <span class="font-semibold text-gray-900 dark:text-white sm:text-right">Rp 320.000</span>
                            </div>
                        </div>
                    </div>

                    <!-- Shipping Info -->
                    <div
                        class="bg-purple-50 dark:bg-purple-900/20 border border-purple-200 dark:border-purple-700 rounded-lg p-3 mb-4">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-shipping-fast text-purple-600 dark:text-purple-400"></i>
                            <div>
                                <p class="text-sm font-medium text-purple-800 dark:text-purple-200">Resi: JNE123456789</p>
                                <p class="text-xs text-purple-600 dark:text-purple-300">Paket sedang dalam perjalanan</p>
                            </div>
                        </div>
                    </div>

                    <!-- Order Summary -->
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Total Pembayaran</p>
                            <p class="text-xl font-bold text-gray-900 dark:text-white">Rp 320.000</p>
                        </div>
                        <button
                            class="border border-purple-600 text-purple-600 dark:text-purple-400 hover:bg-purple-50 dark:hover:bg-purple-900/30 px-4 py-2 rounded-lg font-medium transition-colors flex items-center justify-center gap-2">
                            <i class="fas fa-search"></i>
                            <span>Lacak Paket</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Pesanan 4 - Selesai -->
            <div
                class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden transition-all duration-300 hover:shadow-md dark:hover:shadow-lg">
                <div class="p-4 sm:p-6">
                    <!-- Order Header -->
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-4">
                        <div class="flex items-center flex-wrap gap-2">
                            <div class="flex items-center gap-2">
                                <i class="fas fa-shopping-bag text-blue-500"></i>
                                <span class="font-semibold text-gray-900 dark:text-white">ORD-2024-004</span>
                            </div>
                            <span class="hidden sm:block text-gray-500 dark:text-gray-400">•</span>
                            <span class="text-sm text-gray-600 dark:text-gray-400">5 Juni 2025</span>
                        </div>
                        <span
                            class="bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-200 px-3 py-1 rounded-full text-xs font-medium inline-flex items-center">
                            <i class="fas fa-check-circle mr-1"></i>
                            Selesai
                        </span>
                    </div>

                    <!-- Order Items -->
                    <div class="bg-gray-50 dark:bg-gray-700/30 rounded-lg p-4 mb-4">
                        <h4 class="font-medium text-gray-900 dark:text-white mb-3">Item Pesanan</h4>
                        <div class="space-y-4">
                            <!-- Item 1 -->
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-16 h-16 bg-gray-200 dark:bg-gray-600 rounded-lg overflow-hidden flex-shrink-0">
                                        <img src="https://via.placeholder.com/150" alt="Produk"
                                            class="w-full h-full object-cover">
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900 dark:text-white">Perhiasan Perak Handmade</p>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">1 × Rp 850.000</p>
                                    </div>
                                </div>
                                <span class="font-semibold text-gray-900 dark:text-white sm:text-right">Rp 850.000</span>
                            </div>
                        </div>
                    </div>

                    <!-- Completion Info -->
                    <div
                        class="bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-700 rounded-lg p-3 mb-4">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-check-circle text-green-600 dark:text-green-400"></i>
                            <div>
                                <p class="text-sm font-medium text-green-800 dark:text-green-200">Pesanan telah diterima
                                </p>
                                <p class="text-xs text-green-600 dark:text-green-300">Terima kasih atas kepercayaan Anda
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Order Summary -->
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Total Pembayaran</p>
                            <p class="text-xl font-bold text-gray-900 dark:text-white">Rp 850.000</p>
                        </div>
                        <button onclick="openRatingModal('ORD-2024-004', 'Perhiasan Perak Handmade')"
                            class="border border-amber-600 text-amber-600 dark:text-amber-400 hover:bg-amber-50 dark:hover:bg-amber-900/30 px-4 py-2 rounded-lg font-medium transition-colors flex items-center justify-center gap-2">
                            <i class="fas fa-star"></i>
                            <span>Beri Ulasan</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Upload Bukti Pembayaran -->
    <div id="uploadModal"
        class="modal fixed inset-0 z-50 hidden flex items-center justify-center p-4 bg-black/50 backdrop-blur-sm">
        <div
            class="modal-content bg-white dark:bg-gray-800 rounded-xl shadow-2xl w-full max-w-md border border-gray-200 dark:border-gray-700 overflow-hidden">
            <!-- Header -->
            <div class="px-6 pt-6 pb-4 border-b border-gray-200 dark:border-gray-700">
                <div class="flex items-center justify-between">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white">Upload Bukti Pembayaran</h3>
                    <button onclick="closeModal('uploadModal')"
                        class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 transition-colors">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
            </div>

            <!-- Content -->
            <div class="p-6">
                <!-- Order Summary -->
                <div class="bg-gray-50 dark:bg-gray-700/30 rounded-lg p-4 mb-6">
                    <h4 class="font-semibold text-gray-900 dark:text-white mb-3">Ringkasan Pesanan</h4>
                    <div class="space-y-2 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-600 dark:text-gray-400">No. Pesanan:</span>
                            <span class="font-medium text-gray-900 dark:text-white"
                                id="modalOrderNumber">#ORD123456</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600 dark:text-gray-400">Total Pembayaran:</span>
                            <span class="font-bold text-gray-900 dark:text-white" id="modalOrderTotal">Rp 1.250.000</span>
                        </div>
                    </div>
                </div>

                <!-- Upload Form -->
                <form id="uploadForm">
                    <!-- Upload Area -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Upload Bukti
                            Pembayaran</label>

                        <div class="relative group">
                            <input type="file" id="paymentProof" accept="image/*,.pdf"
                                class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">

                            <div id="uploadArea"
                                class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-xl p-6 text-center transition-all hover:border-blue-500 dark:hover:border-blue-400 group-hover:bg-gray-50/50 dark:group-hover:bg-gray-700/20">
                                <div class="flex flex-col items-center justify-center space-y-3">
                                    <div
                                        class="w-12 h-12 bg-blue-100 dark:bg-blue-900/30 rounded-full flex items-center justify-center">
                                        <i class="fas fa-cloud-upload-alt text-blue-500 dark:text-blue-400 text-xl"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-700 dark:text-gray-300">Klik untuk memilih
                                            file</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Format: JPG, PNG, PDF
                                            (Maks. 5MB)</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- File Preview -->
                    <div id="filePreview" class="hidden mb-6">
                        <h4 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Pratinjau</h4>
                        <div class="relative rounded-lg overflow-hidden border border-gray-200 dark:border-gray-700">
                            <div id="imagePreview"
                                class="bg-gray-100 dark:bg-gray-700 aspect-video flex items-center justify-center">
                                <i class="fas fa-file-image text-4xl text-gray-400"></i>
                            </div>
                            <div
                                class="p-3 bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700 flex justify-between items-center">
                                <div class="truncate">
                                    <p id="fileName"
                                        class="text-sm font-medium text-gray-700 dark:text-gray-300 truncate">nama_file.jpg
                                    </p>
                                    <p id="fileSize" class="text-xs text-gray-500 dark:text-gray-400">2.4 MB</p>
                                </div>
                                <button id="removeFile" type="button"
                                    class="text-red-500 hover:text-red-700 dark:hover:text-red-400">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="flex gap-3 mt-6">
                        <button type="button" onclick="closeModal('uploadModal')"
                            class="flex-1 py-3 px-4 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-lg font-medium hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors">
                            Batal
                        </button>
                        <button type="submit" id="submitBtn"
                            class="flex-1 py-3 px-4 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium transition-colors flex items-center justify-center gap-2">
                            <i class="fas fa-upload"></i>
                            Upload
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Rating Produk -->
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
                        <img src="https://images.unsplash.com/photo-1602143407151-7111542de6e8?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=256&h=256&q=80" alt="Produk" class="w-full h-full object-cover">
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

    <style>
        .star-rating {
            font-size: 2rem;
            color: #d1d5db;
            /* Default gray color for stars */
            cursor: pointer;
            transition: color 0.2s;
        }

        .star-rating.active {
            color: #f59e0b;
            /* Amber color for active stars */
        }
    </style>

    <script>
        // Order data
        const orderData = {
            'ORD-2024-001': {
                total: 'Rp 730.000'
            },
            'ORD-2024-002': {
                total: 'Rp 750.000'
            },
            'ORD-2024-003': {
                total: 'Rp 320.000'
            },
            'ORD-2024-004': {
                total: 'Rp 850.000'
            }
        };

        // Initialize star rating
        function initStarRating() {
            const container = document.getElementById('starRating');
            container.innerHTML = '';

            for (let i = 1; i <= 5; i++) {
                const star = document.createElement('span');
                star.className = 'star-rating';
                star.innerHTML = '★';
                star.dataset.value = i;

                star.addEventListener('click', function() {
                    setRating(i);
                });

                star.addEventListener('mouseover', function() {
                    highlightStars(i);
                });

                star.addEventListener('mouseout', function() {
                    const currentRating = parseInt(document.getElementById('ratingValue').value);
                    highlightStars(currentRating);
                });

                container.appendChild(star);
            }
        }

        function setRating(value) {
            document.getElementById('ratingValue').value = value;
            highlightStars(value);
        }

        function highlightStars(value) {
            const stars = document.querySelectorAll('.star-rating');
            stars.forEach((star, index) => {
                if (index < value) {
                    star.classList.add('active');
                } else {
                    star.classList.remove('active');
                }
            });
        }

        // Upload Modal
        function openUploadModal(orderNumber) {
            document.getElementById('modalOrderNumber').textContent = orderNumber;
            document.getElementById('modalOrderTotal').textContent = orderData[orderNumber]?.total || '-';

            const modal = document.getElementById('uploadModal');
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.add('show');
            }, 10);
            document.body.style.overflow = 'hidden';
        }

        // Rating Modal
        function openRatingModal(orderNumber, productName) {
            document.getElementById('ratingOrderNumber').textContent = orderNumber;
            document.getElementById('ratingProductName').textContent = productName;

            // Initialize star rating
            initStarRating();
            setRating(0);

            const modal = document.getElementById('ratingModal');
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

            // Reset forms
            if (modalId === 'uploadModal') {
                document.getElementById('uploadForm').reset();
                document.getElementById('filePreview').classList.add('hidden');
            } else if (modalId === 'ratingModal') {
                document.getElementById('ratingForm').reset();
                setRating(0);
            }
        }
        // File upload preview
        document.getElementById('paymentProof').addEventListener('change', function(e) {
            const file = e.target.files[0];
            const preview = document.getElementById('filePreview');
            const fileName = document.getElementById('fileName');
            const fileSize = document.getElementById('fileSize');
            const imagePreview = document.getElementById('imagePreview');
            const uploadArea = document.getElementById('uploadArea');

            if (file) {
                // Show file info
                fileName.textContent = file.name;
                fileSize.textContent = formatFileSize(file.size);

                // Show preview for images
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        imagePreview.innerHTML =
                            `<img src="${e.target.result}" class="w-full h-full object-contain" alt="Preview">`;
                    };
                    reader.readAsDataURL(file);
                } else {
                    imagePreview.innerHTML = '<i class="fas fa-file text-4xl text-gray-400"></i>';
                }

                // Update UI
                preview.classList.remove('hidden');
                uploadArea.classList.add('hidden');
            } else {
                preview.classList.add('hidden');
                uploadArea.classList.remove('hidden');
            }
        });

        // Remove file handler
        document.getElementById('removeFile').addEventListener('click', function() {
            document.getElementById('paymentProof').value = '';
            document.getElementById('filePreview').classList.add('hidden');
            document.getElementById('uploadArea').classList.remove('hidden');
        });

        // Format file size
        function formatFileSize(bytes) {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const sizes = ['Bytes', 'KB', 'MB', 'GB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
        }

        // Form submissions
        document.getElementById('uploadForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const fileInput = document.getElementById('paymentProof');
            if (!fileInput.files[0]) {
                showAlert('error', 'Mohon pilih file bukti pembayaran!');
                return;
            }

            // Simulate upload
            const submitBtn = document.getElementById('submitBtn');
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Mengupload...';
            submitBtn.disabled = true;

            setTimeout(() => {
                showAlert('success',
                    'Bukti pembayaran berhasil diupload! Tim kami akan memverifikasi dalam 1x24 jam.');
                closeModal('uploadModal');

                // Reset form
                fileInput.value = '';
                document.getElementById('filePreview').classList.add('hidden');
                document.getElementById('uploadArea').classList.remove('hidden');

                // Reset button
                submitBtn.innerHTML = '<i class="fas fa-upload mr-2"></i> Upload';
                submitBtn.disabled = false;
            }, 2000);
        });

        // Helper function to show alert (you can replace with your preferred alert/notification system)
        function showAlert(type, message) {
            const alert = document.createElement('div');
            alert.className = `fixed top-4 right-4 z-50 px-6 py-4 rounded-lg shadow-lg text-white font-medium ${
            type === 'success' ? 'bg-green-500' : 'bg-red-500'
        }`;
            alert.textContent = message;
            document.body.appendChild(alert);

            setTimeout(() => {
                alert.remove();
            }, 3000);
        }

        document.getElementById('ratingForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const rating = document.getElementById('ratingValue').value;
            if (rating < 1) {
                alert('Mohon berikan rating dengan memilih bintang!');
                return;
            }

            // Simulate submission
            const submitBtn = e.target.querySelector('button[type="submit"]');
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Mengirim...';
            submitBtn.disabled = true;

            setTimeout(() => {
                alert('Terima kasih atas ulasan Anda! Ulasan Anda sangat berarti bagi kami.');
                closeModal('ratingModal');

                // Reset button
                submitBtn.innerHTML = '<i class="fas fa-star mr-2"></i> Kirim Ulasan';
                submitBtn.disabled = false;
            }, 2000);
        });

        // Close modals when clicking outside
        document.querySelectorAll('.modal').forEach(modal => {
            modal.addEventListener('click', function(e) {
                if (e.target === this) {
                    closeModal(this.id);
                }
            });
        });

        // Close modals with ESC key
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
