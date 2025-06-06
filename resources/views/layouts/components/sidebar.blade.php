<aside id="sidebar"
    class="sidebar fixed left-0 top-0 w-64 h-full z-50 transform -translate-x-full lg:translate-x-0 transition-transform duration-300 bg-white dark:bg-gray-900 shadow-md">

    <!-- Wrapper dengan flex dan overflow-scroll -->
    <div class="flex flex-col h-full">

        <!-- Header: Logo -->
        <div class="p-6">
            <div class="flex items-center mb-5">
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
                <a href="{{ route('dashboard') }}"
                    class="nav-item flex items-center px-4 py-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt w-5 mr-3"></i>
                    <span>Dashboard</span>
                </a>

                <!-- Is User -->
                <a href="{{ route('user.dashboard') }}"
                    class="nav-item flex items-center px-4 py-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition {{ request()->routeIs('user.dashboard') ? 'active' : '' }}">
                    <i class="fa-solid fa-house-chimney w-5 mr-3"></i>
                    <span>Beranda</span>
                </a>

                <a href="{{ route('kategori.index') }}"
                    class="nav-item flex items-center px-4 py-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition {{ request()->routeIs('kategori.index') ? 'active' : '' }}">
                    <i class="fas fa-tags w-5 mr-3"></i>
                    <span>Kategori Produk</span>
                </a>
                <a href="{{ route('produk.index') }}"
                    class="nav-item flex items-center px-4 py-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition {{ request()->routeIs('produk.index') ? 'active' : '' }}">
                    <i class="fas fa-box w-5 mr-3"></i>
                    <span>Produk</span>
                </a>
                <a href="{{ route('pesanan.index') }}"
                    class="nav-item flex items-center px-4 py-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition {{ request()->routeIs('pesanan.index') ? 'active' : '' }}">
                    <i class="fas fa-shopping-cart w-5 mr-3"></i>
                    <span>Pesanan</span>
                </a>
                <a href="{{ route('laporan.index') }}"
                    class="nav-item flex items-center px-4 py-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition {{ request()->routeIs('laporan.index') ? 'active' : '' }}">
                    <i class="fas fa-chart-line w-5 mr-3"></i>
                    <span>Laporan Penjualan</span>
                </a>
                <a href="{{ route('pengguna.index') }}"
                    class="nav-item flex items-center px-4 py-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition {{ request()->routeIs('pengguna.index') ? 'active' : '' }}">
                    <i class="fa-solid fa-users mr-3"></i>
                    <span>Pengguna</span>
                </a>
                <a href="{{ route('pengaturan.index') }}"
                    class="nav-item flex items-center px-4 py-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition {{ request()->routeIs('pengaturan.index') ? 'active' : '' }}">
                    <i class="fas fa-cog w-5 mr-3"></i>
                    <span>Pengaturan Toko</span>
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
                <a href="#"
                    class="nav-item flex items-center px-4 py-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                    <i class="fa-solid fa-arrow-right-from-bracket mr-3"></i>
                    <span>Logout</span>
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
