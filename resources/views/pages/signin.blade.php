<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Batamia Art</title>
    @vite('resources/css/app.css')
    <script src="https://kit.fontawesome.com/af96158b7b.js" crossorigin="anonymous"></script>
</head>

<body class="min-h-screen bg-white dark:bg-slate-900 text-gray-900 dark:text-slate-100 transition-colors duration-300">
    <div class="min-h-screen flex items-center justify-center p-4 py-8">
        <div class="w-full max-w-md">
            <!-- Header -->
            <div class="text-center mb-8">
                <div
                    class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-amber-600 to-amber-700 rounded-full mb-4 shadow-lg">
                    <i class="fas fa-leaf text-white text-2xl"></i>
                </div>
                <h1 class="text-3xl font-bold mb-2 text-gray-900 dark:text-white">Batamia Art</h1>
                <p class="text-sm text-gray-600 dark:text-slate-400">Kerajinan Tangan Berkualitas</p>
            </div>

            <!-- Register Form -->
            <div
                class="bg-white dark:bg-slate-800 backdrop-blur-sm rounded-2xl p-8 shadow-xl border border-gray-200 dark:border-slate-700 transition-all duration-300">
                <div class="mb-6">
                    <h2 class="text-2xl font-semibold mb-2 text-gray-900 dark:text-white">Buat Akun Baru</h2>
                    <p class="text-sm text-gray-600 dark:text-slate-400">Bergabunglah Dan Belanja Di Batamia Art</p>
                </div>

                <form class="space-y-4">
                    <!-- Full Name Input -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-slate-300 mb-2" for="fullname">
                            <i class="fas fa-user mr-2 text-amber-600"></i>Nama Lengkap
                        </label>
                        <input type="text" id="fullname" name="fullname"
                            class="w-full px-4 py-3 bg-gray-50 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-xl focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all duration-300 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-slate-400"
                            placeholder="Masukkan nama lengkap" required>
                    </div>

                    <!-- Email Input -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-slate-300 mb-2" for="email">
                            <i class="fas fa-envelope mr-2 text-amber-600"></i>Email
                        </label>
                        <input type="email" id="email" name="email"
                            class="w-full px-4 py-3 bg-gray-50 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-xl focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all duration-300 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-slate-400"
                            placeholder="Masukkan email Anda" required>
                    </div>

                    <!-- Phone Input -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-slate-300 mb-2" for="phone">
                            <i class="fas fa-phone mr-2 text-amber-600"></i>Nomor Telepon
                        </label>
                        <input type="tel" id="phone" name="phone"
                            class="w-full px-4 py-3 bg-gray-50 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-xl focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all duration-300 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-slate-400"
                            placeholder="Masukkan nomor telepon" required>
                    </div>

                    <!-- Password Input -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-slate-300 mb-2" for="password">
                            <i class="fas fa-lock mr-2 text-amber-600"></i>Kata Sandi
                        </label>
                        <div class="relative">
                            <input type="password" id="password" name="password"
                                class="w-full px-4 py-3 pr-12 bg-gray-50 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-xl focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all duration-300 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-slate-400"
                                placeholder="Minimal 8 karakter" required>
                            <button type="button"
                                class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-500 dark:text-slate-400 hover:text-amber-600 dark:hover:text-amber-500 transition-colors duration-300"
                                onclick="togglePassword('password', 'toggleIcon1')">
                                <i class="fas fa-eye" id="toggleIcon1"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Confirm Password Input -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-slate-300 mb-2"
                            for="confirm_password">
                            <i class="fas fa-lock mr-2 text-amber-600"></i>Konfirmasi Kata Sandi
                        </label>
                        <div class="relative">
                            <input type="password" id="confirm_password" name="confirm_password"
                                class="w-full px-4 py-3 pr-12 bg-gray-50 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 rounded-xl focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all duration-300 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-slate-400"
                                placeholder="Ulangi kata sandi" required>
                            <button type="button"
                                class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-500 dark:text-slate-400 hover:text-amber-600 dark:hover:text-amber-500 transition-colors duration-300"
                                onclick="togglePassword('confirm_password', 'toggleIcon2')">
                                <i class="fas fa-eye" id="toggleIcon2"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Terms & Conditions -->
                    <div class="flex items-start space-x-3">
                        <input type="checkbox" id="terms"
                            class="mt-1 rounded border-gray-300 dark:border-slate-600 text-amber-600 focus:ring-amber-500"
                            required>
                        <label for="terms" class="text-sm cursor-pointer text-gray-600 dark:text-slate-400">
                            Saya menyetujui
                            <a href="#"
                                class="text-amber-600 dark:text-amber-500 hover:text-amber-700 dark:hover:text-amber-400 transition-colors duration-300">Syarat
                                & Ketentuan</a>
                            dan
                            <a href="#"
                                class="text-amber-600 dark:text-amber-500 hover:text-amber-700 dark:hover:text-amber-400 transition-colors duration-300">Kebijakan
                                Privasi</a>
                        </label>
                    </div>

                    <!-- Register Button -->
                    <button type="submit"
                        class="w-full bg-gradient-to-r from-amber-600 to-amber-700 hover:from-amber-700 hover:to-amber-800 text-white font-medium py-3 px-4 rounded-xl transition-all duration-300 transform hover:-translate-y-0.5 hover:shadow-lg">
                        <i class="fas fa-user-plus mr-2"></i>
                        Daftar Sekarang
                    </button>

                    <!-- Social Register -->
                    <div class="text-center">
                        <div class="flex items-center mb-4">
                            <div class="flex-1 h-px bg-gray-300 dark:bg-slate-600"></div>
                            <span class="px-4 text-sm text-gray-500 dark:text-slate-400">atau</span>
                            <div class="flex-1 h-px bg-gray-300 dark:bg-slate-600"></div>
                        </div>
                        <p class="text-sm text-gray-600 dark:text-slate-400">
                            Sudah punya akun?
                            <a href="/masuk"
                                class="text-amber-600 dark:text-amber-500 hover:text-amber-700 dark:hover:text-amber-400 font-medium transition-colors duration-300">
                                Masuk di sini
                            </a>
                        </p>
                    </div>
                </form>
            </div>

            <!-- Footer -->
            <div class="text-center mt-8">
                <p class="text-xs text-gray-500 dark:text-slate-500">
                    © 2024 Batamia Art. Semua hak dilindungi.
                </p>
            </div>
        </div>
    </div>

    <script>
        // Load dark mode preference
        if (localStorage.getItem('darkMode') === 'true' ||
            (!localStorage.getItem('darkMode') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        }

        // Password toggle functionality
        function togglePassword(inputId, iconId) {
            const passwordInput = document.getElementById(inputId);
            const toggleIcon = document.getElementById(iconId);

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }

        // Password confirmation validation
        document.getElementById('confirm_password').addEventListener('input', function() {
            const password = document.getElementById('password').value;
            const confirmPassword = this.value;

            if (password !== confirmPassword) {
                this.setCustomValidity('Kata sandi tidak cocok');
                this.classList.add('border-red-500');
                this.classList.remove('border-gray-300', 'dark:border-slate-600');
            } else {
                this.setCustomValidity('');
                this.classList.remove('border-red-500');
                this.classList.add('border-gray-300', 'dark:border-slate-600');
            }
        });
    </script>
</body>

</html>
