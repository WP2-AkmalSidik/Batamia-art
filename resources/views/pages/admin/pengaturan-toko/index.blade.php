@extends('layouts.app')

@section('title', 'Pengaturan Toko')

@section('content')
    <div class="space-y-6">
        <div class="card rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 bg-white dark:bg-gray-900">
            <div class="absolute top-6 right-6">
                <button onclick="saveAllSettings()" class="btn-accent px-6 py-2.5">
                    <i class="fas fa-save mr-2"></i>Simpan Semua
                </button>
            </div>

            <div class="flex items-center mb-6">
                <div class="w-12 h-12 gradient-icon-bg rounded-lg flex items-center justify-center mr-4">
                    <i class="fas fa-store text-white text-xl"></i>
                </div>
                <div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Informasi Toko</h3>
                    <p class="text-gray-600 dark:text-gray-400 text-sm">Pengaturan detail informasi toko Anda</p>
                </div>
            </div>

            <form id="storeInfoForm" class="space-y-6">
                <div>
                    <label class="form-label">Nama Toko</label>
                    <input type="text" class="form-input w-full" value="Toko Kerajinan Nusantara"
                        placeholder="Masukkan nama toko" required>
                </div>

                <!-- Alamat Section -->
                <div class="border-t border-gray-200 dark:border-gray-700 pt-6">
                    <h4 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Alamat Toko</h4>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="form-label">Provinsi</label>
                            <select class="form-input w-full" required>
                                <option value="">Pilih Provinsi</option>
                                <option value="jawa-barat" selected>Jawa Barat</option>
                                <option value="jawa-tengah">Jawa Tengah</option>
                                <option value="jawa-timur">Jawa Timur</option>
                                <option value="dki-jakarta">DKI Jakarta</option>
                                <option value="banten">Banten</option>
                                <option value="yogyakarta">D.I. Yogyakarta</option>
                            </select>
                        </div>

                        <div>
                            <label class="form-label">Kota/Kabupaten</label>
                            <select class="form-input w-full" required>
                                <option value="">Pilih Kota/Kabupaten</option>
                                <option value="tasikmalaya" selected>Kota Tasikmalaya</option>
                                <option value="kabupaten-tasikmalaya">Kabupaten Tasikmalaya</option>
                                <option value="bandung">Kota Bandung</option>
                                <option value="kabupaten-bandung">Kabupaten Bandung</option>
                            </select>
                        </div>

                        <div>
                            <label class="form-label">Kecamatan</label>
                            <select class="form-input w-full" required>
                                <option value="">Pilih Kecamatan</option>
                                <option value="tawang" selected>Tawang</option>
                                <option value="cihideung">Cihideung</option>
                                <option value="cipedes">Cipedes</option>
                                <option value="kawalu">Kawalu</option>
                                <option value="mangkubumi">Mangkubumi</option>
                            </select>
                        </div>

                        <div>
                            <label class="form-label">Desa/Kelurahan</label>
                            <select class="form-input w-full" required>
                                <option value="">Pilih Desa/Kelurahan</option>
                                <option value="tawang" selected>Tawang</option>
                                <option value="parakannyasag">Parakannyasag</option>
                                <option value="kahuripan">Kahuripan</option>
                                <option value="yudanagara">Yudanagara</option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-4">
                        <label class="form-label">Alamat Lengkap / Nama Jalan</label>
                        <textarea class="form-input w-full" rows="3" placeholder="Contoh: Jl. Raya Tawang No. 123, RT 01/RW 05" required>Jl. Raya Tawang No. 123, RT 01/RW 05, Dekat Pasar Tawang</textarea>
                    </div>
                </div>
            </form>
        </div>

        <!-- Pengaturan Jenis Pembayaran -->
        <div class="card rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 bg-white dark:bg-gray-900">
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center">
                    <div class="w-12 h-12 blue-gradient-bg rounded-lg flex items-center justify-center mr-4">
                        <i class="fas fa-credit-card text-white text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Metode Pembayaran</h3>
                        <p class="text-gray-600 dark:text-gray-400 text-sm">Atur jenis pembayaran yang tersedia di toko</p>
                    </div>
                </div>
                <button onclick="openAddPaymentModal()" class="btn-accent px-4 py-2 text-sm">
                    <i class="fas fa-plus mr-2"></i>Tambah Metode
                </button>
            </div>

            <div class="space-y-4">
                <!-- Bank Transfer -->
                <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center">
                            <i class="fas fa-university text-blue-600 text-xl mr-3"></i>
                            <h4 class="text-lg font-medium text-gray-900 dark:text-gray-100">Transfer Bank</h4>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" checked>
                            <span class="slider"></span>
                        </label>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div class="payment-method-item">
                            <div
                                class="flex items-center justify-between p-4 border border-gray-200 dark:border-gray-600 rounded-lg">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 rounded-lg overflow-hidden border bg-white p-1.5 mr-3">
                                        <img src="{{ asset('brand/bri.png') }}" alt="BRI"
                                            class="w-full h-full object-contain">
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900 dark:text-gray-100">Bank BRI</p>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">1234-5678-9012-3456</p>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <label class="toggle-switch-sm">
                                        <input type="checkbox" checked>
                                        <span class="slider-sm"></span>
                                    </label>
                                    <button onclick="editPaymentMethod('bri')"
                                        class="text-yellow-500 hover:text-yellow-600">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="payment-method-item">
                            <div
                                class="flex items-center justify-between p-4 border border-gray-200 dark:border-gray-600 rounded-lg">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 rounded-lg overflow-hidden border bg-white p-1.5 mr-3">
                                        <img src="{{ asset('brand/bjb.png') }}" alt="BJB"
                                            class="w-full h-full object-contain">
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900 dark:text-gray-100">Bank BJB</p>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">9876-5432-1098-7654</p>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <label class="toggle-switch-sm">
                                        <input type="checkbox" checked>
                                        <span class="slider-sm"></span>
                                    </label>
                                    <button onclick="editPaymentMethod('bjb')"
                                        class="text-yellow-500 hover:text-yellow-600">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- E-Wallet -->
                <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center">
                            <i class="fas fa-mobile-alt text-green-600 text-xl mr-3"></i>
                            <h4 class="text-lg font-medium text-gray-900 dark:text-gray-100">E-Wallet</h4>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" checked>
                            <span class="slider"></span>
                        </label>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div class="payment-method-item">
                            <div
                                class="flex items-center justify-between p-4 border border-gray-200 dark:border-gray-600 rounded-lg">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 rounded-lg overflow-hidden border bg-white p-1.5 mr-3">
                                        <img src="{{ asset('brand/gopay.png') }}" alt="GoPay"
                                            class="w-full h-full object-contain">
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900 dark:text-gray-100">GoPay</p>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">+62 812-3456-7890</p>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <label class="toggle-switch-sm">
                                        <input type="checkbox" checked>
                                        <span class="slider-sm"></span>
                                    </label>
                                    <button onclick="editPaymentMethod('gopay')"
                                        class="text-yellow-500 hover:text-yellow-600">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="payment-method-item">
                            <div
                                class="flex items-center justify-between p-4 border border-gray-200 dark:border-gray-600 rounded-lg">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 rounded-lg overflow-hidden border bg-white p-1.5 mr-3">
                                        <img src="{{ asset('brand/dana.png') }}" alt="DANA"
                                            class="w-full h-full object-contain">
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900 dark:text-gray-100">DANA</p>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">+62 821-9876-5432</p>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <label class="toggle-switch-sm">
                                        <input type="checkbox">
                                        <span class="slider-sm"></span>
                                    </label>
                                    <button onclick="editPaymentMethod('dana')"
                                        class="text-yellow-500 hover:text-yellow-600">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="payment-method-item">
                            <div
                                class="flex items-center justify-between p-4 border border-gray-200 dark:border-gray-600 rounded-lg">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 rounded-lg overflow-hidden border bg-white p-1.5 mr-3">
                                        <img src="{{ asset('brand/ovo.png') }}" alt="OVO"
                                            class="w-full h-full object-contain">
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900 dark:text-gray-100">OVO</p>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">+62 856-1234-5678</p>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <label class="toggle-switch-sm">
                                        <input type="checkbox">
                                        <span class="slider-sm"></span>
                                    </label>
                                    <button onclick="editPaymentMethod('ovo')"
                                        class="text-yellow-500 hover:text-yellow-600">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cash on Delivery -->
                <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <i class="fas fa-hand-holding-usd text-amber-600 text-xl mr-3"></i>
                            <div>
                                <h4 class="text-lg font-medium text-gray-900 dark:text-gray-100">Cash on Delivery (COD)
                                </h4>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Pembayaran tunai saat barang diterima
                                </p>
                            </div>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" checked>
                            <span class="slider"></span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah/Edit Metode Pembayaran -->
    <div id="paymentModal"
        class="modal fixed inset-0 z-50 flex items-center justify-center hidden bg-white/80 dark:bg-black/60">
        <div class="modal-content w-full max-w-lg mx-4 p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-xl font-semibold">Tambah Metode Pembayaran</h3>
                <button onclick="closePaymentModal()" class="text-gray-500 hover:text-gray-700 text-xl">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <form id="paymentMethodForm" class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="form-label">Nama Bank/E-Wallet</label>
                        <input type="text" class="form-input w-full" placeholder="Contoh: Bank Mandiri" required>
                    </div>
                    <div>
                        <label class="form-label">Jenis</label>
                        <select class="form-input w-full" required>
                            <option value="">Pilih Jenis</option>
                            <option value="bank">Bank</option>
                            <option value="e-wallet">E-Wallet</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="form-label">Nomor Akun</label>
                        <input type="text" class="form-input w-full" placeholder="Nomor rekening/telepon" required>
                    </div>
                    <div>
                        <label class="form-label">Nama Akun</label>
                        <input type="text" class="form-input w-full" placeholder="Nama pemilik akun" required>
                    </div>
                </div>

                <div>
                    <label class="form-label">Logo</label>
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center">
                        <i class="fas fa-image text-2xl text-gray-400 mb-2"></i>
                        <p class="text-gray-500 text-sm">Drag & drop logo atau <span
                                class="text-blue-500 cursor-pointer">browse</span></p>
                        <input type="file" class="hidden" accept="image/*">
                    </div>
                </div>

                <div class="flex justify-end space-x-3 pt-4">
                    <button type="button" onclick="closePaymentModal()" class="btn-secondary px-4 py-2">Batal</button>
                    <button type="submit" class="btn-accent px-4 py-2">
                        <i class="fas fa-save mr-2"></i>Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function saveAllSettings() {
            // Collect store info
            const storeForm = document.getElementById('storeInfoForm');
            const formData = new FormData(storeForm);

            // Collect payment methods status
            const paymentMethods = {};
            document.querySelectorAll('.toggle-switch input, .toggle-switch-sm input').forEach(toggle => {
                // Collect toggle states
            });

            // Send AJAX request to save data
            showNotification('Pengaturan berhasil disimpan!', 'success');
        }

        function openAddPaymentModal() {
            document.getElementById('paymentModal').classList.remove('hidden');
            setTimeout(() => {
                document.getElementById('paymentModal').classList.add('show');
            }, 10);
        }

        function closePaymentModal() {
            const modal = document.getElementById('paymentModal');
            modal.classList.remove('show');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }

        function editPaymentMethod(methodId) {
            // Load method data and open modal for editing
            openAddPaymentModal();
            // Populate form with existing data
        }

        function showNotification(message, type = 'info') {
            // Create notification element
            const notification = document.createElement('div');
            notification.className =
                `fixed top-4 right-4 z-50 p-4 rounded-lg shadow-lg transition-all duration-300 transform translate-x-full`;

            if (type === 'success') {
                notification.className += ' bg-green-500 text-white';
            } else if (type === 'error') {
                notification.className += ' bg-red-500 text-white';
            } else {
                notification.className += ' bg-blue-500 text-white';
            }

            notification.innerHTML = `
                <div class="flex items-center">
                    <i class="fas fa-check-circle mr-2"></i>
                    <span>${message}</span>
                </div>
            `;

            document.body.appendChild(notification);

            setTimeout(() => {
                notification.classList.remove('translate-x-full');
            }, 100);

            setTimeout(() => {
                notification.classList.add('translate-x-full');
                setTimeout(() => {
                    document.body.removeChild(notification);
                }, 300);
            }, 3000);
        }

        // Form submission
        document.getElementById('paymentMethodForm').addEventListener('submit', function(e) {
            e.preventDefault();
            // Process form data
            showNotification('Metode pembayaran berhasil ditambahkan!', 'success');
            closePaymentModal();
        });

        // Tutup modal klik selain modal
        document.getElementById('paymentModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closePaymentModal();
            }
        });

        // Auto-populate city/district based on province selection
        document.querySelector('select[name="province"]')?.addEventListener('change', function() {
            // Implementation for dynamic city loading
        });
    </script>
@endsection
