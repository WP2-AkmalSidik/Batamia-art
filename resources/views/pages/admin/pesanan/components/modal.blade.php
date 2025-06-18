    <!-- Detail Orderan -->
    <div id="detailModal"
        class="modal fixed inset-0 z-50 flex items-center justify-center hidden bg-white/90 dark:bg-gray-900/80 backdrop-blur-sm">
        <div
            class="modal-content w-full max-w-4xl mx-4 p-0 max-h-[90vh] overflow-y-auto rounded-xl shadow-2xl bg-white dark:bg-gray-800 border border-gray-100 dark:border-gray-700">
            <!-- Header -->
            <div
                class="sticky top-0 z-10 bg-white dark:bg-gray-800 p-6 border-b border-gray-100 dark:border-gray-700 flex items-center justify-between">
                <div>
                    <h3 class="text-2xl font-bold text-gray-800 dark:text-white">Order #ORD001</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">15 Januari 2024</p>
                </div>
                <button onclick="closeModal('detailModal')"
                    class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="p-6">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Kolom Kiri -->
                    <div class="space-y-6">
                        <!-- Info Produk -->
                        <div class="bg-gray-50 dark:bg-gray-700 rounded-xl p-5">
                            <div class="flex items-center space-x-3 mb-4">
                                <div class="bg-green-100 dark:bg-green-900/50 p-2 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5 text-green-600 dark:text-green-400" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                    </svg>
                                </div>
                                <h4 class="font-semibold text-gray-800 dark:text-gray-200">Detail Produk</h4>
                            </div>

                            <!-- Container untuk daftar produk -->
                            <div class="space-y-3" id="produk-container">
                                <!-- Template untuk satu produk (akan diisi oleh JavaScript) -->
                                <div class="hidden produk-template">
                                    <div
                                        class="flex items-start space-x-4 p-3 bg-white dark:bg-gray-600 rounded-lg border border-gray-100 dark:border-gray-600">
                                        <div
                                            class="w-16 h-16 rounded-lg overflow-hidden border bg-white dark:bg-gray-500 flex-shrink-0">
                                            <img src="" alt="Produk"
                                                class="w-full h-full object-cover produk-image">
                                        </div>
                                        <div class="flex-1">
                                            <h5 class="font-medium text-gray-800 dark:text-white produk-nama"></h5>
                                            <div class="grid grid-cols-2 gap-2 mt-2 text-sm">
                                                <div>
                                                    <p class="text-gray-500 dark:text-gray-400">Kuantitas</p>
                                                    <p
                                                        class="font-medium text-gray-800 dark:text-white produk-kuantitas">
                                                    </p>
                                                </div>
                                                <div>
                                                    <p class="text-gray-500 dark:text-gray-400">Harga Satuan</p>
                                                    <p class="font-medium text-gray-800 dark:text-white produk-harga">
                                                    </p>
                                                </div>
                                                <div>
                                                    <p class="text-gray-500 dark:text-gray-400">Subtotal</p>
                                                    <p
                                                        class="font-medium text-gray-800 dark:text-white produk-subtotal">
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Info Pelanggan -->
                        <div class="bg-gray-50 dark:bg-gray-700 rounded-xl p-5">
                            <div class="flex items-center space-x-3 mb-4">
                                <div class="bg-blue-100 dark:bg-blue-900/50 p-2 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5 text-blue-600 dark:text-blue-400" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <h4 class="font-semibold text-gray-800 dark:text-gray-200">Informasi Pelanggan</h4>
                            </div>
                            <div class="space-y-3 text-sm">
                                <div class="flex">
                                    <span class="text-gray-500 dark:text-gray-400 w-24">Nama</span>
                                    <span class="font-medium text-gray-800 dark:text-white" id="detail-user-nama">Ahmad
                                        Wijaya</span>
                                </div>
                                <div class="flex">
                                    <span class="text-gray-500 dark:text-gray-400 w-24">Email</span>
                                    <span class="font-medium text-gray-800 dark:text-white"
                                        id="detail-user-email">ahmad@email.com</span>
                                </div>
                                <div class="flex">
                                    <span class="text-gray-500 dark:text-gray-400 w-24">Telepon</span>
                                    <span class="font-medium text-gray-800 dark:text-white" id="detail-user-telepon">+62
                                        812-3456-7890</span>
                                </div>
                                <div class="flex">
                                    <span class="text-gray-500 dark:text-gray-400 w-24">Alamat</span>
                                    <span class="font-medium text-gray-800 dark:text-white" id="detail-user-alamat">Jl.
                                        Merdeka No. 123, Jakarta
                                        Pusat</span>
                                </div>
                            </div>
                        </div>

                        <!-- Pengiriman -->
                        <div class="bg-gray-50 dark:bg-gray-700 rounded-xl p-5">
                            <div class="flex items-center space-x-3 mb-4">
                                <div class="bg-purple-100 dark:bg-purple-900/50 p-2 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5 text-purple-600 dark:text-purple-400" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                                    </svg>
                                </div>
                                <h4 class="font-semibold text-gray-800 dark:text-gray-200">Informasi Pengiriman</h4>
                            </div>
                            <div class="space-y-4">
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-500 dark:text-gray-400">Kurir</span>
                                    <span class="font-medium text-gray-800 dark:text-white" id="detail-kurir">JNE -
                                        REG</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-500 dark:text-gray-400">Estimasi</span>
                                    <span class="font-medium text-gray-800 dark:text-white" id="detail-estimasi">2-3
                                        hari kerja</span>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Nomor
                                        Resi</label>
                                    <div class="flex space-x-2">
                                        <input type="text" id="resiInput" name="no_resi"
                                            class="form-input flex-1 rounded-lg" placeholder="Masukkan nomor resi...">
                                        <button onclick="saveResi()"
                                            class="btn-accent px-4 py-2 text-sm rounded-lg flex items-center space-x-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                                            </svg>
                                            <span>Simpan</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Kolom Kanan -->
                    <div class="space-y-6">

                        <!-- Status Order -->
                        <div
                            class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-gray-700 dark:to-gray-700 rounded-xl p-5">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h4
                                        class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        STATUS ORDER</h4>
                                    <div class="flex items-center mt-1">
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200"
                                            id="detail-status">
                                            Dibayar
                                        </span>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <h4
                                        class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        TOTAL</h4>
                                    <p class="text-2xl font-bold text-gray-800 dark:text-white mt-1"
                                        id="detail-total-harga">Rp 450.000</p>
                                </div>
                            </div>
                        </div>
                        <!-- Bukti Transfer -->
                        <div class="bg-gray-50 dark:bg-gray-700 rounded-xl p-5">
                            <div class="flex items-center space-x-3 mb-4">
                                <div class="bg-amber-100 dark:bg-amber-900/50 p-2 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5 text-amber-600 dark:text-amber-400" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <h4 class="font-semibold text-gray-800 dark:text-gray-200">Bukti Transfer</h4>
                            </div>
                            <div class="space-y-4">
                                <div
                                    class="bg-white dark:bg-gray-600 rounded-lg overflow-hidden border border-gray-100 dark:border-gray-600">
                                    <img id="bukti-transfer" alt="Bukti Transfer"
                                        class="w-full h-auto max-h-[400px] object-contain">
                                </div>
                                <div class="grid grid-cols-2 gap-4 text-sm">
                                    <div>
                                        <p class="text-gray-500 dark:text-gray-400">Bank</p>
                                        <p class="font-medium text-gray-800 dark:text-white" id="detail-bank">Bank BRI
                                        </p>
                                    </div>
                                    <div>
                                        <p class="text-gray-500 dark:text-gray-400">Jumlah</p>
                                        <p class="font-medium text-gray-800 dark:text-white" id="detail-jumlah">Rp
                                            450.000</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-500 dark:text-gray-400">No Rekening</p>
                                        <p class="font-medium text-gray-800 dark:text-white" id="detail-no-rekening">
                                            00123456789</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-500 dark:text-gray-400">Tanggal</p>
                                        <p class="font-medium text-gray-800 dark:text-white"
                                            id="detail-tanggal-transfer">15 Jan 2024, 14:30</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div
                class="sticky bottom-0 bg-white dark:bg-gray-800 p-4 border-t border-gray-100 dark:border-gray-700 flex justify-end space-x-3">
                <button onclick="closeModal('detailModal')"
                    class="btn-secondary px-5 py-2 rounded-lg text-sm font-medium transition-colors">
                    Tutup
                </button>
                <button onclick="openStatusModal(1)"
                    class="btn-accent px-5 py-2 rounded-lg text-sm font-medium flex items-center space-x-2 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    <span>Update Status</span>
                </button>
            </div>
        </div>
    </div>
    <!-- Update Status -->
    <div id="statusModal"
        class="modal fixed inset-0 z-50 flex items-center justify-center hidden bg-white/80 dark:bg-black/60">
        <div class="modal-content w-full max-w-md mx-4 p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-xl font-semibold">Update Status Orderan</h3>
                <button onclick="closeModal('statusModal')" class="text-gray-500 hover:text-gray-700 text-xl">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <form id="statusForm">
                <div class="mb-4">
                    <label class="form-label">Status Orderan</label>
                    <select class="form-input w-full" id="statusSelect" name="status" required>
                        <option value="">Pilih Status</option>
                        <option value="belum_bayar">Belum Dibayar</option>
                        <option value="dibayar">Dibayar</option>
                        <option value="diproses">Diproses</option>
                        <option value="ditolak">Ditolak</option>
                        <option value="dikirim">Dikirim</option>
                        <option value="sampai">Sampai Lokasi</option>
                    </select>
                </div>

                <div class="mb-4" id="resiSection" style="display: none;">
                    <label class="form-label">Nomor Resi (Khusus Status Dikirim)</label>
                    <input type="text" class="form-input w-full" id="resiNumber" name="resi"
                        placeholder="Masukkan nomor resi...">
                </div>

                <div class="mb-4" id="rejectSection" style="display: none;">
                    <label class="form-label">Alasan Penolakan</label>
                    <textarea class="form-input w-full" rows="3" name="alasan" placeholder="Masukkan alasan penolakan..."></textarea>
                </div>

                <div class="flex justify-end space-x-2">
                    <button type="button" onclick="closeModal('statusModal')" class="btn-secondary">Batal</button>
                    <button type="submit" class="btn-accent">
                        <i class="fas fa-save mr-2"></i>Update Status
                    </button>
                </div>
            </form>
        </div>
    </div>
