Fajar - Mentahan
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Batamia Art - Admin Dashboard</title>
    @vite('resources/css/app.css')
    <script src="https://kit.fontawesome.com/af96158b7b.js" crossorigin="anonymous"></script>
    <script>
        function initTheme() {
            const savedTheme = localStorage.getItem('theme') || 'light';
            document.documentElement.className = savedTheme;
        }

        function toggleTheme() {
            const currentTheme = document.documentElement.className;
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';

            document.documentElement.className = newTheme;
            localStorage.setItem('theme', newTheme);

            updateThemeIndicator(newTheme);
        }

        function updateThemeIndicator(theme) {
            const icon = document.getElementById('theme-icon');
            icon.className = theme === 'dark' ?
                'fas fa-sun text-yellow-500 text-2xl drop-shadow-md' :
                'fas fa-moon text-gray-600 text-2xl';
        }

        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('mobile-overlay');

            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }

        function closeSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('mobile-overlay');

            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        }

        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('mobile-overlay');
            const menuButton = document.querySelector('[onclick="toggleSidebar()"]');

            if (!sidebar.contains(event.target) &&
                event.target !== menuButton &&
                !menuButton.contains(event.target) &&
                !overlay.classList.contains('hidden')) {
                closeSidebar();
            }
        });

        document.addEventListener('DOMContentLoaded', () => {
            initTheme();
            updateThemeIndicator(document.documentElement.className);
        });
    </script>
</head>

<body class="font-sans">
    <div id="mobile-overlay" class="fixed inset-0 bg-black bg-opacity-30 z-40 hidden lg:hidden" onclick="closeSidebar()">
    </div>
    <!-- Sidebar -->
    <aside id="sidebar"
        class="sidebar fixed left-0 top-0 w-64 h-full z-50 transform -translate-x-full lg:translate-x-0 transition-transform duration-300 bg-white dark:bg-gray-900 shadow-md">

        <!-- Wrapper dengan flex dan overflow-scroll -->
        <div class="flex flex-col h-full">

            <!-- Header: Logo -->
            <div class="p-6">
                <div class="flex items-center mb-8">
                    <div
                        class="w-12 h-12 rounded-lg flex items-center justify-center mr-3 bg-gradient-to-br from-amber-100 to-orange-100">
                        <i class="fas fa-leaf icon-accent text-xl"></i>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold">Batamia Art</h1>
                        <p class="text-sm text-gray-500">Admin Dashboard</p>
                    </div>
                </div>
            </div>

            <!-- Navigasi scrollable -->
            <div class="flex-1 overflow-y-auto px-6 custom-scrollbar space-y-1">
                <nav class="space-y-1">
                    <a href="#"
                        class="nav-item active flex items-center px-4 py-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                        <i class="fas fa-tachometer-alt w-5 mr-3"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="#"
                        class="nav-item flex items-center px-4 py-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                        <i class="fas fa-tags w-5 mr-3"></i>
                        <span>Kategori Produk</span>
                    </a>
                    <a href="#"
                        class="nav-item flex items-center px-4 py-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                        <i class="fas fa-box w-5 mr-3"></i>
                        <span>Produk</span>
                    </a>
                    <a href="#"
                        class="nav-item flex items-center px-4 py-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                        <i class="fas fa-shopping-cart w-5 mr-3"></i>
                        <span>Pesanan</span>
                    </a>
                    <a href="#"
                        class="nav-item flex items-center px-4 py-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                        <i class="fas fa-university w-5 mr-3"></i>
                        <span>Bank</span>
                    </a>
                    <a href="#"
                        class="nav-item flex items-center px-4 py-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                        <i class="fas fa-chart-line w-5 mr-3"></i>
                        <span>Laporan Penjualan</span>
                    </a>
                    <a href="#"
                        class="nav-item flex items-center px-4 py-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                        <i class="fas fa-cog w-5 mr-3"></i>
                        <span>Pengaturan</span>
                    </a>
                    <a href="#"
                        class="nav-item flex items-center px-4 py-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                        <i class="fas fa-shopping-cart w-5 mr-3"></i>
                        <span>Keranjang</span>
                    </a>
                    <a href="#"
                        class="nav-item flex items-center px-4 py-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                        <i class="fas fa-clipboard-list w-5 mr-3"></i>
                        <span>List Pesanan</span>
                    </a>
                </nav>
            </div>

            <!-- Profil user di bawah, tampil seperti nav-item -->
            <a href="/profile" class="m-6">
                <div
                    class="flex items-center px-4 py-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition cursor-pointer">
                    <div class="relative mr-3">
                        <div class="w-10 h-10 rounded-full overflow-hidden border-2 border-white shadow-sm">
                            <img src="https://ui-avatars.com/api/?name=AB&background=d4a574&color=fff&format=svg"
                                alt="A">
                        </div>
                        <div
                            class="absolute -bottom-1 -right-1 w-4 h-4 bg-green-400 rounded-full border-2 border-white dark:border-gray-800">
                        </div>
                    </div>
                    <div>
                        <p class="text-gray-700 dark:text-gray-200 text-sm font-semibold">Admin Batamia</p>
                        <p class="text-gray-500 dark:text-gray-400 text-xs">admin@batamia.com</p>
                    </div>
                </div>
            </a>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="lg:ml-64 min-h-screen" style="background-color: var(--surface-color);">
        <!-- Top Navigation -->
        <header class="header-bg">
            <div class="flex items-center justify-between px-6 py-4">
                <div class="flex items-center gap-3">
                    <!-- Mobile menu button -->
                    <button onclick="toggleSidebar()"
                        class="lg:hidden text-gray-600 hover:text-gray-800 focus:outline-none">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>

                    <h2 class="text-2xl font-bold">Dashboard</h2>
                </div>

                <div class="flex items-center space-x-3">

                    <!-- Is Admin -->
                    <button class="relative ml-2">
                        <i class="fas fa-bell text-gray-600 hover:text-gray-400"></i>
                        <span
                            class="absolute -top-2 -right-3 w-5 h-5 bg-gradient-to-r from-red-500 to-red-600 text-xs flex items-center justify-center text-white rounded-full animate-pulse">3</span>
                    </button>

                    <!-- Is Customers -->
                    <button class="relative ml-2">
                        <i class="fa-solid fa-cart-shopping text-gray-600 hover:text-gray-400"></i>
                        <span
                            class="absolute -top-2 -right-3 w-5 h-5 bg-gradient-to-r from-red-500 to-red-600 text-xs flex items-center justify-center text-white rounded-full animate-pulse">3</span>
                    </button>

                    <!-- Theme Toggle (Icon only) -->
                    <button onclick="toggleTheme()" class="relative ml-4">
                        <i id="theme-icon" class="fas fa-moon text-5xl text-gray-600 hover:text-gray-400"></i>
                    </button>
                </div>
            </div>
        </header>

        <!-- Dashboard Content -->
        <div class="p-6">
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">
                <div class="stat-card">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm">Penjualan Hari Ini</p>
                            <p class="text-2xl font-bold text-green-600">Rp 2.450.000</p>
                        </div>
                        <div class="w-12 h-12 bg-green-50 rounded-lg flex items-center justify-center">
                            <i class="fas fa-money-bill-wave text-green-600 text-xl"></i>
                        </div>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm">Pesanan Aktif</p>
                            <p class="text-2xl font-bold text-blue-600">24</p>
                        </div>
                        <div class="w-12 h-12 bg-blue-50 rounded-lg flex items-center justify-center">
                            <i class="fas fa-shopping-bag text-blue-600 text-xl"></i>
                        </div>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm">Total Produk</p>
                            <p class="text-2xl font-bold text-purple-600">156</p>
                        </div>
                        <div class="w-12 h-12 bg-purple-50 rounded-lg flex items-center justify-center">
                            <i class="fas fa-box text-purple-600 text-xl"></i>
                        </div>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm">Pelanggan Baru</p>
                            <p class="text-2xl font-bold icon-accent">12</p>
                        </div>
                        <div class="w-12 h-12 bg-amber-50 rounded-lg flex items-center justify-center">
                            <i class="fas fa-user-plus icon-accent text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Grid -->
            <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
                <!-- Grafik Penjualan -->
                <div class="xl:col-span-2 card">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-xl font-semibold">Grafik Penjualan Mingguan</h3>
                        <button class="btn-accent">
                            <i class="fas fa-download mr-2"></i>Export
                        </button>
                    </div>
                    <div class="h-64 flex items-center justify-center rounded-lg"
                        style="background-color: var(--surface-color);">
                        <div class="text-center">
                            <i class="fas fa-chart-area text-4xl mb-4 icon-accent"></i>
                            <p class="text-lg font-medium">Grafik Penjualan</p>
                            <p class="text-sm text-gray-500">Data akan ditampilkan di sini</p>
                        </div>
                    </div>
                </div>

                <!-- Produk Terlaris -->
                <div class="card">
                    <h3 class="text-xl font-semibold mb-6">Produk Terlaris</h3>
                    <div class="space-y-4">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-amber-50 rounded-lg flex items-center justify-center">
                                <i class="fas fa-leaf icon-accent"></i>
                            </div>
                            <div class="flex-1">
                                <p class="font-medium">Vas Bambu Minimalis</p>
                                <p class="text-sm text-gray-500">45 terjual</p>
                            </div>
                            <p class="font-semibold">Rp 125.000</p>
                        </div>

                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-green-50 rounded-lg flex items-center justify-center">
                                <i class="fas fa-recycle text-green-600"></i>
                            </div>
                            <div class="flex-1">
                                <p class="font-medium">Tas Plastik Daur Ulang</p>
                                <p class="text-sm text-gray-500">32 terjual</p>
                            </div>
                            <p class="font-semibold">Rp 85.000</p>
                        </div>

                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-blue-50 rounded-lg flex items-center justify-center">
                                <i class="fas fa-tools text-blue-600"></i>
                            </div>
                            <div class="flex-1">
                                <p class="font-medium">Set Perkakas Bambu</p>
                                <p class="text-sm text-gray-500">28 terjual</p>
                            </div>
                            <p class="font-semibold">Rp 150.000</p>
                        </div>

                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-purple-50 rounded-lg flex items-center justify-center">
                                <i class="fas fa-gem text-purple-600"></i>
                            </div>
                            <div class="flex-1">
                                <p class="font-medium">Kalung Bambu Etnik</p>
                                <p class="text-sm text-gray-500">21 terjual</p>
                            </div>
                            <p class="font-semibold">Rp 95.000</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Orders -->
            <div class="mt-8 card">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-semibold">Pesanan Terbaru</h3>
                    <button class="btn-accent">
                        <i class="fas fa-eye mr-2"></i>Lihat Semua
                    </button>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr style="border-bottom: 1px solid var(--border-color);">
                                <th class="text-left py-3 px-4 font-medium text-gray-600">ID Pesanan</th>
                                <th class="text-left py-3 px-4 font-medium text-gray-600">Pelanggan</th>
                                <th class="text-left py-3 px-4 font-medium text-gray-600">Produk</th>
                                <th class="text-left py-3 px-4 font-medium text-gray-600">Total</th>
                                <th class="text-left py-3 px-4 font-medium text-gray-600">Status</th>
                                <th class="text-left py-3 px-4 font-medium text-gray-600">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="border-bottom: 1px solid var(--border-color);">
                                <td class="py-3 px-4 font-medium">#BAT001</td>
                                <td class="py-3 px-4">Ahmad Fauzi</td>
                                <td class="py-3 px-4">Vas Bambu Minimalis</td>
                                <td class="py-3 px-4 font-semibold">Rp 125.000</td>
                                <td class="py-3 px-4">
                                    <span
                                        class="px-3 py-1 rounded-full text-sm text-white status-warning">Proses</span>
                                </td>
                                <td class="py-3 px-4">
                                    <button class="btn-outline">
                                        <i class="fas fa-eye mr-1"></i>Detail
                                    </button>
                                </td>
                            </tr>
                            <tr style="border-bottom: 1px solid var(--border-color);">
                                <td class="py-3 px-4 font-medium">#BAT002</td>
                                <td class="py-3 px-4">Siti Nurhaliza</td>
                                <td class="py-3 px-4">Set Perkakas Bambu</td>
                                <td class="py-3 px-4 font-semibold">Rp 150.000</td>
                                <td class="py-3 px-4">
                                    <span
                                        class="px-3 py-1 rounded-full text-sm text-white status-success">Selesai</span>
                                </td>
                                <td class="py-3 px-4">
                                    <button class="btn-outline">
                                        <i class="fas fa-eye mr-1"></i>Detail
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-3 px-4 font-medium">#BAT003</td>
                                <td class="py-3 px-4">Budi Santoso</td>
                                <td class="py-3 px-4">Tas Plastik Daur Ulang</td>
                                <td class="py-3 px-4 font-semibold">Rp 85.000</td>
                                <td class="py-3 px-4">
                                    <span class="px-3 py-1 rounded-full text-sm text-white status-info">Dikirim</span>
                                </td>
                                <td class="py-3 px-4">
                                    <button class="btn-outline">
                                        <i class="fas fa-eye mr-1"></i>Detail
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
