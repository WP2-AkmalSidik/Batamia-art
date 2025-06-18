@extends('layouts.app')

@section('title', 'Pengaturan Profil')

@section('content')
    <div class="mt-8 space-y-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Sidebar Navigation -->
            <div class="lg:col-span-1">
                <div
                    class="card rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 p-6 sticky top-6">
                    <nav class="space-y-2">
                        <!-- Informasi Pribadi -->
                        <button onclick="showSection('personal')"
                            class="nav-btn w-full flex items-center space-x-3 px-4 py-3 rounded-lg text-left transition-all duration-200 bg-amber-50 dark:bg-amber-900/20 text-amber-600 dark:text-amber-400 border-l-3 border-amber-500 dark:border-amber-400"
                            data-section="personal">
                            <i class="fas fa-user-edit text-lg"></i>
                            <span class="font-medium">Informasi Pribadi</span>
                        </button>

                        <!-- Ubah Password -->
                        <button onclick="showSection('password')"
                            class="nav-btn w-full flex items-center space-x-3 px-4 py-3 rounded-lg text-left transition-all duration-200 hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-700 dark:text-gray-300"
                            data-section="password">
                            <i class="fas fa-lock text-lg"></i>
                            <span class="font-medium">Ubah Password</span>
                        </button>

                        <!-- Alamat Pengiriman -->
                        <button onclick="showSection('address')"
                            class="nav-btn w-full flex items-center space-x-3 px-4 py-3 rounded-lg text-left transition-all duration-200 hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-700 dark:text-gray-300"
                            data-section="address">
                            <i class="fas fa-map-marker-alt text-lg"></i>
                            <span class="font-medium">Alamat Pengiriman</span>
                        </button>
                    </nav>
                </div>
            </div>

            <!-- Main Content -->
            <div class="lg:col-span-2">
                <!-- Informasi Pribadi Section -->
                <div id="personal-section" class="section-content">
                    <div
                        class="card rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Informasi Pribadi</h2>
                            <div class="flex items-center space-x-2 text-sm text-gray-500 dark:text-gray-400">
                                <i class="fas fa-shield-alt"></i>
                                <span>Data Aman</span>
                            </div>
                        </div>

                        <form id="personalForm" class="space-y-6">
                            <!-- Profile Picture -->
                            <div class="flex items-center space-x-6">
                                <div class="relative">
                                    <div
                                        class="w-20 h-20 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center">
                                        <i class="fas fa-user text-white text-2xl"></i>
                                    </div>
                                    <button type="button"
                                        class="absolute -bottom-2 -right-2 w-8 h-8 bg-blue-500 hover:bg-blue-600 text-white rounded-full flex items-center justify-center transition-colors">
                                        <i class="fas fa-camera text-xs"></i>
                                    </button>
                                </div>
                                <div>
                                    <h3 class="font-medium text-gray-900 dark:text-gray-100">Foto Profil</h3>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">JPG, PNG. Maksimal 2MB</p>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="form-label text-gray-700 dark:text-gray-300">Nama Lengkap</label>
                                    <input type="text" value="John Doe"
                                        class="form-input w-full mt-2 px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                </div>
                                <div>
                                    <label class="form-label text-gray-700 dark:text-gray-300">Email</label>
                                    <input type="email" value="john.doe@example.com"
                                        class="form-input w-full mt-2 px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="form-label text-gray-700 dark:text-gray-300">Nomor Telepon</label>
                                    <input type="tel" value="+62 812-3456-7890"
                                        class="form-input w-full mt-2 px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                </div>
                                <div>
                                    <label class="form-label text-gray-700 dark:text-gray-300">Tanggal Lahir</label>
                                    <input type="date" value="1990-01-01"
                                        class="form-input w-full mt-2 px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                </div>
                            </div>

                            <div class="flex justify-end">
                                <button type="submit"
                                    class="btn-accent px-6 py-3 rounded-lg font-medium transition-all duration-300 hover:shadow-lg">
                                    <i class="fas fa-save mr-2"></i>
                                    Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Password Section -->
                <div id="password-section" class="section-content hidden">
                    <div
                        class="card rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Ubah Password</h2>
                            <div class="flex items-center space-x-2 text-sm text-gray-500 dark:text-gray-400">
                                <i class="fas fa-lock"></i>
                                <span>Keamanan</span>
                            </div>
                        </div>

                        <div
                            class="bg-amber-50 dark:bg-amber-900/20 border border-amber-200 dark:border-amber-800 rounded-lg p-4 mb-6">
                            <div class="flex items-start space-x-3">
                                <i class="fas fa-exclamation-triangle text-amber-600 mt-1"></i>
                                <div>
                                    <h4 class="font-medium text-amber-800 dark:text-amber-200">Tips Keamanan</h4>
                                    <p class="text-sm text-amber-700 dark:text-amber-300 mt-1">
                                        Gunakan kombinasi huruf besar, kecil, angka, dan simbol. Minimal 8 karakter.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <form id="passwordForm" class="space-y-6">
                            <div>
                                <label class="form-label text-gray-700 dark:text-gray-300">Password Saat Ini</label>
                                <div class="relative mt-2">
                                    <input type="password" id="currentPassword"
                                        class="form-input w-full px-4 py-3 pr-12 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                    <button type="button" onclick="togglePassword('currentPassword')"
                                        class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>

                            <div>
                                <label class="form-label text-gray-700 dark:text-gray-300">Password Baru</label>
                                <div class="relative mt-2">
                                    <input type="password" id="newPassword"
                                        class="form-input w-full px-4 py-3 pr-12 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                    <button type="button" onclick="togglePassword('newPassword')"
                                        class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                                <!-- Password Strength Indicator -->
                                <div class="mt-2">
                                    <div class="flex space-x-1">
                                        <div class="h-2 flex-1 bg-gray-200 dark:bg-gray-700 rounded-full overflow-hidden">
                                            <div id="strengthBar" class="h-full bg-red-500 transition-all duration-300"
                                                style="width: 0%"></div>
                                        </div>
                                    </div>
                                    <p id="strengthText" class="text-xs text-gray-500 dark:text-gray-400 mt-1">Kekuatan
                                        password</p>
                                </div>
                            </div>

                            <div>
                                <label class="form-label text-gray-700 dark:text-gray-300">Konfirmasi Password Baru</label>
                                <div class="relative mt-2">
                                    <input type="password" id="confirmPassword"
                                        class="form-input w-full px-4 py-3 pr-12 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                    <button type="button" onclick="togglePassword('confirmPassword')"
                                        class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="flex justify-end">
                                <button type="submit"
                                    class="btn-accent px-6 py-3 rounded-lg font-medium transition-all duration-300 hover:shadow-lg">
                                    <i class="fas fa-key mr-2"></i>
                                    Update Password
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Address Section -->
                <div id="address-section" class="section-content hidden">
                    <div
                        class="card rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Alamat Pengiriman</h2>
                            <button onclick="openAddressModal()"
                                class="btn-accent px-4 py-2 rounded-lg font-medium transition-all duration-300 hover:shadow-lg">
                                <i class="fas fa-plus mr-2"></i>
                                Tambah Alamat
                            </button>
                        </div>

                        <!-- Address List -->
                        <div class="space-y-4">
                            <!-- Address Card 1 -->
                            <div
                                class="border border-gray-200 dark:border-gray-700 rounded-lg p-4 hover:shadow-md transition-shadow">
                                <div class="flex items-start justify-between mb-3">
                                    <div class="flex items-center space-x-2">
                                        <i class="fas fa-home text-blue-500"></i>
                                        <span class="font-medium text-gray-900 dark:text-gray-100">Rumah</span>
                                        <span
                                            class="bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-200 text-xs px-2 py-1 rounded-full">
                                            Utama
                                        </span>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <button class="text-blue-500 hover:text-blue-600 text-sm">
                                            <i class="fas fa-edit mr-1"></i>
                                            Edit
                                        </button>
                                        <button class="text-red-500 hover:text-red-600 text-sm">
                                            <i class="fas fa-trash mr-1"></i>
                                            Hapus
                                        </button>
                                    </div>
                                </div>
                                <div class="text-sm text-gray-600 dark:text-gray-400 space-y-1">
                                    <p class="font-medium text-gray-900 dark:text-gray-100">John Doe</p>
                                    <p>+62 812-3456-7890</p>
                                    <p>Jl. Merdeka No. 123, RT 05/RW 03</p>
                                    <p>Kec. Indihiang, Tasikmalaya, Jawa Barat 46151</p>
                                </div>
                            </div>

                            <!-- Address Card 2 -->
                            <div
                                class="border border-gray-200 dark:border-gray-700 rounded-lg p-4 hover:shadow-md transition-shadow">
                                <div class="flex items-start justify-between mb-3">
                                    <div class="flex items-center space-x-2">
                                        <i class="fas fa-building text-purple-500"></i>
                                        <span class="font-medium text-gray-900 dark:text-gray-100">Kantor</span>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <button class="text-blue-500 hover:text-blue-600 text-sm">
                                            <i class="fas fa-edit mr-1"></i>
                                            Edit
                                        </button>
                                        <button class="text-red-500 hover:text-red-600 text-sm">
                                            <i class="fas fa-trash mr-1"></i>
                                            Hapus
                                        </button>
                                    </div>
                                </div>
                                <div class="text-sm text-gray-600 dark:text-gray-400 space-y-1">
                                    <p class="font-medium text-gray-900 dark:text-gray-100">John Doe</p>
                                    <p>+62 812-3456-7890</p>
                                    <p>Jl. Asia Afrika No. 456, Lantai 3</p>
                                    <p>Kec. Tawang, Tasikmalaya, Jawa Barat 46115</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah/Edit Alamat -->
    <div id="addressModal" class="modal fixed inset-0 bg-black/30 z-50 hidden flex items-center justify-center p-4">
        <div
            class="bg-white dark:bg-gray-800 rounded-xl shadow-xl max-w-md w-full max-h-[90vh] overflow-y-auto border border-gray-200 dark:border-gray-700">
            <!-- Header Modal -->
            <div
                class="sticky top-0 bg-white dark:bg-gray-800 p-5 border-b border-gray-100 dark:border-gray-700 flex justify-between items-center z-10">
                <h3 class="text-xl font-semibold text-gray-800 dark:text-white">Tambah Alamat Baru</h3>
                <button onclick="closeModal('addressModal')"
                    class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 transition-colors">
                    <i class="fas fa-times text-lg"></i>
                </button>
            </div>

            <!-- Address Form -->
            <form id="addressForm" class="p-5 space-y-4">
                <!-- Nama dan Nomor HP -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nama Lengkap</label>
                        <input type="text"
                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nomor HP</label>
                        <input type="tel"
                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition">
                    </div>
                </div>

                <!-- Provinsi dan Kota -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Provinsi</label>
                        <select
                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition">
                            <option value="">Pilih Provinsi</option>
                            <option>Jawa Barat</option>
                            <option>Jawa Tengah</option>
                        </select>
                    </div>
                    <div>
                        <label
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Kota/Kabupaten</label>
                        <select
                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition">
                            <option value="">Pilih Kota</option>
                            <option>Tasikmalaya</option>
                            <option>Bandung</option>
                        </select>
                    </div>
                </div>

                <!-- Kecamatan dan Kode Pos -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Kecamatan</label>
                        <select
                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition">
                            <option value="">Pilih Kecamatan</option>
                            <option>Indihiang</option>
                            <option>Tawang</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Kode Pos</label>
                        <input type="text"
                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition"
                            placeholder="46151">
                    </div>
                </div>

                <!-- Alamat Lengkap -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Alamat Lengkap</label>
                    <textarea rows="3"
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition"
                        placeholder="Nama jalan, nomor rumah, RT/RW"></textarea>
                </div>

                <!-- Action Buttons -->
                <div class="flex gap-3 pt-4">
                    <button type="button" onclick="closeModal('addressModal')"
                        class="btn-secondary flex-1 py-3 rounded-lg font-medium transition-all duration-200">
                        Batal
                    </button>
                    <button type="submit"
                        class="btn-accent flex-1 py-3 rounded-lg font-medium transition-all duration-200 hover:shadow-lg">
                        <i class="fas fa-save mr-2"></i>
                        Simpan Alamat
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Navigation
        function showSection(section, updateHistory = true) {
            // Hide all sections
            document.querySelectorAll('.section-content').forEach(el => {
                el.classList.add('hidden');
            });

            // Reset all nav buttons
            document.querySelectorAll('.nav-btn').forEach(el => {
                el.classList.remove(
                    'bg-amber-50', 'dark:bg-amber-900/20',
                    'text-amber-600', 'dark:text-amber-400',
                    'border-l-3', 'border-amber-500', 'dark:border-amber-400'
                );
                el.classList.add(
                    'hover:bg-gray-100', 'dark:hover:bg-gray-800',
                    'text-gray-700', 'dark:text-gray-300'
                );
            });

            // Show selected section
            document.getElementById(section + '-section').classList.remove('hidden');

            // Style active button
            const activeBtn = document.querySelector(`[data-section="${section}"]`);
            activeBtn.classList.add(
                'bg-amber-50', 'dark:bg-amber-900/20',
                'text-amber-600', 'dark:text-amber-400',
                'border-l-3', 'border-amber-500', 'dark:border-amber-400'
            );
            activeBtn.classList.remove(
                'hover:bg-gray-100', 'dark:hover:bg-gray-800',
                'text-gray-700', 'dark:text-gray-300'
            );

            // Update URL hash if needed
            if (updateHistory) {
                window.location.hash = section;
            }
        }

        // Check URL hash on page load
        function checkInitialSection() {
            const hash = window.location.hash.substring(1);
            const validSections = ['personal', 'password', 'address'];

            if (hash && validSections.includes(hash)) {
                showSection(hash, false);
            } else {
                // Default to first section if no hash or invalid hash
                showSection('personal', false);
            }
        }

        // Listen for hash changes
        window.addEventListener('hashchange', function() {
            const hash = window.location.hash.substring(1);
            const validSections = ['personal', 'password', 'address'];

            if (hash && validSections.includes(hash)) {
                showSection(hash, false);
            }
        });

        // Password toggle
        function togglePassword(inputId) {
            const input = document.getElementById(inputId);
            const icon = input.nextElementSibling.querySelector('i');

            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }

        // Password strength checker
        document.getElementById('newPassword').addEventListener('input', function(e) {
            const password = e.target.value;
            const strengthBar = document.getElementById('strengthBar');
            const strengthText = document.getElementById('strengthText');

            let strength = 0;
            let text = 'Sangat Lemah';
            let color = 'bg-red-500';

            if (password.length >= 8) strength += 25;
            if (/[a-z]/.test(password)) strength += 25;
            if (/[A-Z]/.test(password)) strength += 25;
            if (/[0-9]/.test(password) && /[^A-Za-z0-9]/.test(password)) strength += 25;

            if (strength >= 75) {
                text = 'Sangat Kuat';
                color = 'bg-green-500';
            } else if (strength >= 50) {
                text = 'Kuat';
                color = 'bg-yellow-500';
            } else if (strength >= 25) {
                text = 'Sedang';
                color = 'bg-orange-500';
            }

            strengthBar.style.width = strength + '%';
            strengthBar.className = `h-full ${color} transition-all duration-300`;
            strengthText.textContent = text;
        });

        // Modal functions
        function openAddressModal() {
            const modal = document.getElementById('addressModal');
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
        }

        // Form submissions
        document.getElementById('personalForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const submitBtn = e.target.querySelector('button[type="submit"]');
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Menyimpan...';
            submitBtn.disabled = true;

            setTimeout(() => {
                alert('Informasi pribadi berhasil diperbarui!');
                submitBtn.innerHTML = '<i class="fas fa-save mr-2"></i>Simpan Perubahan';
                submitBtn.disabled = false;
            }, 2000);
        });

        document.getElementById('passwordForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const currentPassword = document.getElementById('currentPassword').value;
            const newPassword = document.getElementById('newPassword').value;
            const confirmPassword = document.getElementById('confirmPassword').value;

            if (!currentPassword || !newPassword || !confirmPassword) {
                alert('Mohon lengkapi semua field password!');
                return;
            }

            if (newPassword !== confirmPassword) {
                alert('Konfirmasi password tidak cocok!');
                return;
            }

            if (newPassword.length < 8) {
                alert('Password baru minimal 8 karakter!');
                return;
            }

            const submitBtn = e.target.querySelector('button[type="submit"]');
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Mengupdate...';
            submitBtn.disabled = true;

            setTimeout(() => {
                alert('Password berhasil diperbarui!');
                e.target.reset();
                document.getElementById('strengthBar').style.width = '0%';
                document.getElementById('strengthText').textContent = 'Kekuatan password';
                submitBtn.innerHTML = '<i class="fas fa-key mr-2"></i>Update Password';
                submitBtn.disabled = false;
            }, 2000);
        });

        document.getElementById('addressForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(e.target);
            const requiredFields = ['nama', 'nomor_hp', 'alamat_lengkap', 'provinsi', 'kota', 'kecamatan',
                'kode_pos'
            ];
            const inputs = e.target.querySelectorAll('input, select, textarea');

            let isValid = true;
            inputs.forEach(input => {
                if (input.hasAttribute('required') && !input.value.trim()) {
                    input.classList.add('border-red-500');
                    isValid = false;
                } else {
                    input.classList.remove('border-red-500');
                }
            });

            if (!isValid) {
                alert('Mohon lengkapi semua field yang diperlukan!');
                return;
            }

            const submitBtn = e.target.querySelector('button[type="submit"]');
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Menyimpan...';
            submitBtn.disabled = true;

            setTimeout(() => {
                alert('Alamat berhasil disimpan!');
                closeModal('addressModal');
                e.target.reset();
                submitBtn.innerHTML = '<i class="fas fa-save mr-2"></i>Simpan Alamat';
                submitBtn.disabled = false;

                // Refresh address list (in real app, this would fetch from server)
                // location.reload();
            }, 2000);
        });

        // Close modal on click outside
        document.getElementById('addressModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal('addressModal');
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

        // Address validation
        function validateAddress() {
            const form = document.getElementById('addressForm');
            const inputs = form.querySelectorAll('input[required], select[required], textarea[required]');

            inputs.forEach(input => {
                input.addEventListener('blur', function() {
                    if (!this.value.trim()) {
                        this.classList.add('border-red-500');
                    } else {
                        this.classList.remove('border-red-500');
                    }
                });
            });
        }

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            validateAddress();
        });
    </script>
@endsection
