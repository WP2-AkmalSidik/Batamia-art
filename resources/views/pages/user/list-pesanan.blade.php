@extends('layouts.app')

@section('title', 'Pesanan Saya')

@section('content')
    <div class="mt-8 space-y-6">
        <!-- Header Section -->
        <div class="card rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 bg-white dark:bg-gray-900">
            <div class="flex items-center justify-between mb-2">
                <h1 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">Pesanan Saya</h1>
                <div class="flex items-center space-x-3">
                    <select class="form-input text-sm px-3 py-2 rounded-md border border-gray-300 dark:border-gray-600">
                        <option value="">Semua Status</option>
                        <option value="menunggu_pembayaran">Menunggu Pembayaran</option>
                        <option value="diproses">Diproses</option>
                        <option value="dikirim">Dikirim</option>
                        <option value="selesai">Selesai</option>
                        <option value="dibatalkan">Dibatalkan</option>
                    </select>
                </div>
            </div>
            <p class="text-gray-600 dark:text-gray-400">Kelola dan pantau status pesanan Anda</p>
        </div>

        <!-- Order Cards -->
        <div class="space-y-4">
            <!-- Pesanan 1 - Menunggu Pembayaran -->
            <div class="card rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 overflow-hidden">
                <div class="p-6">
                    <!-- Header Pesanan -->
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-4 space-y-2 sm:space-y-0">
                        <div class="flex items-center space-x-3">
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-shopping-bag text-blue-500"></i>
                                <span class="font-semibold text-gray-900 dark:text-gray-100">ORD-2024-001</span>
                            </div>
                            <span class="text-sm text-gray-500 dark:text-gray-400">•</span>
                            <span class="text-sm text-gray-600 dark:text-gray-400">15 Juni 2025</span>
                        </div>
                        <span class="status-belum-bayar px-3 py-1 rounded-full text-xs font-medium">
                            <i class="fas fa-clock mr-1"></i>
                            Menunggu Pembayaran
                        </span>
                    </div>

                    <!-- Items List -->
                    <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4 mb-4">
                        <h4 class="font-medium text-gray-900 dark:text-gray-100 mb-3">Item Pesanan</h4>
                        <div class="space-y-3">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-12 h-12 bg-gray-200 dark:bg-gray-700 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-dragon text-amber-600"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900 dark:text-gray-100">Kerajinan Kayu Ukir Naga</p>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">2x Rp 225.000</p>
                                    </div>
                                </div>
                                <span class="font-semibold text-gray-900 dark:text-gray-100">Rp 450.000</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-12 h-12 bg-gray-200 dark:bg-gray-700 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-tshirt text-purple-600"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900 dark:text-gray-100">Batik Handmade Motif Parang</p>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">1x Rp 280.000</p>
                                    </div>
                                </div>
                                <span class="font-semibold text-gray-900 dark:text-gray-100">Rp 280.000</span>
                            </div>
                        </div>
                    </div>

                    <!-- Total & Action -->
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between space-y-3 sm:space-y-0">
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Total Pembayaran</p>
                            <p class="text-xl font-bold text-gray-900 dark:text-gray-100">Rp 730.000</p>
                        </div>
                        <button onclick="openUploadModal('ORD-2024-001')" 
                                class="btn-accent px-6 py-2 rounded-lg font-medium transition-all duration-300 hover:shadow-lg">
                            <i class="fas fa-upload mr-2"></i>
                            Upload Bukti Pembayaran
                        </button>
                    </div>
                </div>
            </div>

            <!-- Pesanan 2 - Diproses -->
            <div class="card rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 overflow-hidden">
                <div class="p-6">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-4 space-y-2 sm:space-y-0">
                        <div class="flex items-center space-x-3">
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-shopping-bag text-blue-500"></i>
                                <span class="font-semibold text-gray-900 dark:text-gray-100">ORD-2024-002</span>
                            </div>
                            <span class="text-sm text-gray-500 dark:text-gray-400">•</span>
                            <span class="text-sm text-gray-600 dark:text-gray-400">12 Juni 2025</span>
                        </div>
                        <span class="status-diproses px-3 py-1 rounded-full text-xs font-medium">
                            <i class="fas fa-cog fa-spin mr-1"></i>
                            Diproses
                        </span>
                    </div>

                    <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4 mb-4">
                        <h4 class="font-medium text-gray-900 dark:text-gray-100 mb-3">Item Pesanan</h4>
                        <div class="space-y-3">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-12 h-12 bg-gray-200 dark:bg-gray-700 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-paint-brush text-green-600"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900 dark:text-gray-100">Tenun Tradisional Songket</p>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">1x Rp 750.000</p>
                                    </div>
                                </div>
                                <span class="font-semibold text-gray-900 dark:text-gray-100">Rp 750.000</span>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between space-y-3 sm:space-y-0">
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Total Pembayaran</p>
                            <p class="text-xl font-bold text-gray-900 dark:text-gray-100">Rp 750.000</p>
                        </div>
                        <div class="flex items-center text-blue-600 dark:text-blue-400">
                            <i class="fas fa-info-circle mr-2"></i>
                            <span class="text-sm">Pesanan sedang diproses</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pesanan 3 - Dikirim -->
            <div class="card rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 overflow-hidden">
                <div class="p-6">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-4 space-y-2 sm:space-y-0">
                        <div class="flex items-center space-x-3">
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-shopping-bag text-blue-500"></i>
                                <span class="font-semibold text-gray-900 dark:text-gray-100">ORD-2024-003</span>
                            </div>
                            <span class="text-sm text-gray-500 dark:text-gray-400">•</span>
                            <span class="text-sm text-gray-600 dark:text-gray-400">10 Juni 2025</span>
                        </div>
                        <span class="status-dikirim px-3 py-1 rounded-full text-xs font-medium">
                            <i class="fas fa-truck mr-1"></i>
                            Dikirim
                        </span>
                    </div>

                    <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4 mb-4">
                        <h4 class="font-medium text-gray-900 dark:text-gray-100 mb-3">Item Pesanan</h4>
                        <div class="space-y-3">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-12 h-12 bg-gray-200 dark:bg-gray-700 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-vase text-red-600"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900 dark:text-gray-100">Keramik Hias Tradisional</p>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">1 set Rp 320.000</p>
                                    </div>
                                </div>
                                <span class="font-semibold text-gray-900 dark:text-gray-100">Rp 320.000</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-purple-50 dark:bg-purple-900/20 border border-purple-200 dark:border-purple-800 rounded-lg p-3 mb-4">
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-shipping-fast text-purple-600"></i>
                            <div>
                                <p class="text-sm font-medium text-purple-800 dark:text-purple-200">Resi: JNE123456789</p>
                                <p class="text-xs text-purple-600 dark:text-purple-300">Paket sedang dalam perjalanan</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between space-y-3 sm:space-y-0">
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Total Pembayaran</p>
                            <p class="text-xl font-bold text-gray-900 dark:text-gray-100">Rp 320.000</p>
                        </div>
                        <button class="btn-outline text-purple-600 hover:bg-purple-50 dark:hover:bg-purple-900/30 px-4 py-2 rounded-lg">
                            <i class="fas fa-search mr-2"></i>
                            Lacak Paket
                        </button>
                    </div>
                </div>
            </div>

            <!-- Pesanan 4 - Selesai -->
            <div class="card rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 overflow-hidden">
                <div class="p-6">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-4 space-y-2 sm:space-y-0">
                        <div class="flex items-center space-x-3">
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-shopping-bag text-blue-500"></i>
                                <span class="font-semibold text-gray-900 dark:text-gray-100">ORD-2024-004</span>
                            </div>
                            <span class="text-sm text-gray-500 dark:text-gray-400">•</span>
                            <span class="text-sm text-gray-600 dark:text-gray-400">5 Juni 2025</span>
                        </div>
                        <span class="status-selesai px-3 py-1 rounded-full text-xs font-medium">
                            <i class="fas fa-check-circle mr-1"></i>
                            Selesai
                        </span>
                    </div>

                    <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4 mb-4">
                        <h4 class="font-medium text-gray-900 dark:text-gray-100 mb-3">Item Pesanan</h4>
                        <div class="space-y-3">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-12 h-12 bg-gray-200 dark:bg-gray-700 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-gem text-indigo-600"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900 dark:text-gray-100">Perhiasan Perak Handmade</p>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">1x Rp 850.000</p>
                                    </div>
                                </div>
                                <span class="font-semibold text-gray-900 dark:text-gray-100">Rp 850.000</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-lg p-3 mb-4">
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-check-circle text-green-600"></i>
                            <div>
                                <p class="text-sm font-medium text-green-800 dark:text-green-200">Pesanan telah diterima</p>
                                <p class="text-xs text-green-600 dark:text-green-300">Terima kasih atas kepercayaan Anda</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between space-y-3 sm:space-y-0">
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Total Pembayaran</p>
                            <p class="text-xl font-bold text-gray-900 dark:text-gray-100">Rp 850.000</p>
                        </div>
                        <button class="btn-outline text-amber-600 hover:bg-amber-50 dark:hover:bg-amber-900/30 px-4 py-2 rounded-lg">
                            <i class="fas fa-star mr-2"></i>
                            Beri Ulasan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Upload Bukti Pembayaran -->
    <div id="uploadModal" class="modal fixed inset-0 bg-black/30 backdrop-blur-sm hidden z-50 flex items-center justify-center p-4">
    <div class="modal-content bg-white/90 dark:bg-gray-800/90 backdrop-blur-md rounded-xl max-w-md w-full max-h-screen overflow-y-auto border border-white/20 dark:border-gray-700/50">
            <div class="p-6">
                <!-- Header Modal -->
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Upload Bukti Pembayaran</h3>
                    <button onclick="closeModal('uploadModal')" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>

                <!-- Ringkasan Pesanan -->
                <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4 mb-6">
                    <h4 class="font-medium text-gray-900 dark:text-gray-100 mb-3">Ringkasan Pesanan</h4>
                    <div class="space-y-2 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-600 dark:text-gray-400">No. Pesanan:</span>
                            <span class="font-medium text-gray-900 dark:text-gray-100" id="modalOrderNumber">-</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600 dark:text-gray-400">Total Pembayaran:</span>
                            <span class="font-bold text-gray-900 dark:text-gray-100" id="modalOrderTotal">-</span>
                        </div>
                    </div>
                </div>

                <!-- Upload Form -->
                <form id="uploadForm">
                    <div class="mb-6">
                        <label class="form-label text-gray-700 dark:text-gray-300">Pilih File Bukti Pembayaran</label>
                        <div class="mt-2">
                            <input type="file" id="paymentProof" accept="image/*,.pdf" 
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
                        <button type="submit" 
                                class="btn-accent flex-1 py-3 rounded-lg font-medium">
                            <i class="fas fa-upload mr-2"></i>
                            Upload
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Data pesanan untuk modal
        const orderData = {
            'ORD-2024-001': { total: 'Rp 730.000' },
            'ORD-2024-002': { total: 'Rp 750.000' },
            'ORD-2024-003': { total: 'Rp 320.000' },
            'ORD-2024-004': { total: 'Rp 850.000' }
        };

        function openUploadModal(orderNumber) {
            const modal = document.getElementById('uploadModal');
            const orderNumberElement = document.getElementById('modalOrderNumber');
            const orderTotalElement = document.getElementById('modalOrderTotal');
            
            // Set data pesanan
            orderNumberElement.textContent = orderNumber;
            orderTotalElement.textContent = orderData[orderNumber]?.total || '-';
            
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
                document.getElementById('uploadForm').reset();
                document.getElementById('filePreview').classList.add('hidden');
            }
        }

        // File upload preview
        document.getElementById('paymentProof').addEventListener('change', function(e) {
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

        // Form submission
        document.getElementById('uploadForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const fileInput = document.getElementById('paymentProof');
            if (!fileInput.files[0]) {
                alert('Mohon pilih file bukti pembayaran!');
                return;
            }
            
            // Simulasi upload
            const submitBtn = e.target.querySelector('button[type="submit"]');
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Mengupload...';
            submitBtn.disabled = true;
            
            setTimeout(() => {
                alert('Bukti pembayaran berhasil diupload! Tim kami akan memverifikasi dalam 1x24 jam.');
                closeModal('uploadModal');
                
                // Reset button
                submitBtn.innerHTML = '<i class="fas fa-upload mr-2"></i>Upload';
                submitBtn.disabled = false;
            }, 2000);
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
@endsection