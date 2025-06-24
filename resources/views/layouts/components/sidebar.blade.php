<aside id="sidebar"
    class="sidebar fixed left-0 top-0 w-64 h-full z-50 transform -translate-x-full lg:translate-x-0 transition-transform duration-300 bg-white dark:bg-gray-900 shadow-md">
    <div class="flex flex-col h-full">

        <!-- Header: Logo -->
        <div class="p-6">
            <div class="flex items-center mb-5">
                <div
                    class="w-12 h-12 rounded-lg flex items-center justify-center mr-3 bg-gradient-to-br from-amber-100 to-orange-100">
                    <i class="fas fa-leaf icon-accent text-xl"></i>
                </div>
                <div>
                    <h1 class="text-xl font-bold">{{ getPengaturan()->nama_toko }}</h1>
                    <p class="text-sm text-gray-500">@yield('title')</p>
                </div>
            </div>
        </div>

        <div class="flex-1 overflow-y-auto px-6 custom-scrollbar space-y-1">
            <nav class="space-y-1">
                @if (auth()->check() && auth()->user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-item flex items-center px-4 py-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="fas fa-tachometer-alt w-5 mr-3"></i>
                        <span>Dashboard</span>
                    </a>
                @endif

                <!-- Is User -->
                <a href="{{ route('user.dashboard') }}"
                    class="nav-item flex items-center px-4 py-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition {{ request()->routeIs('user.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-house-chimney w-5 mr-3"></i>
                    <span>Beranda</span>
                </a>
                @if (auth()->check() && auth()->user()->role === 'admin')
                    <a href="{{ route('kategori.index') }}"
                        class="nav-item flex items-center px-4 py-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition {{ request()->routeIs('kategori.*') ? 'active' : '' }}">
                        <i class="fas fa-tags w-5 mr-3"></i>
                        <span>Kategori Produk</span>
                    </a>
                    <a href="{{ route('admin.produk.index') }}"
                        class="nav-item flex items-center px-4 py-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition {{ request()->routeIs('produk.*') || request()->routeIs('admin.produk.*') ? 'active' : '' }}">
                        <i class="fas fa-box w-5 mr-3"></i>
                        <span>Produk</span>
                    </a>
                    @if (auth()->check() && auth()->user()->role === 'admin')
                        <a href="{{ route('admin.pesanan.index') }}"
                            class="nav-item flex items-center px-4 py-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition {{ request()->routeIs('admin/pesanan.*') ? 'active' : '' }}">
                            <i class="fas fa-shopping-cart w-5 mr-3"></i>
                            <span>Pesanan</span>
                        </a>
                    @elseif (auth()->check() && auth()->user()->role === 'user')
                        <a href="{{ route('pesanan.index') }}"
                            class="nav-item flex items-center px-4 py-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition {{ request()->routeIs('pesanan.*') ? 'active' : '' }}">
                            <i class="fas fa-shopping-cart w-5 mr-3"></i>
                            <span>Pesanan</span>
                        </a>
                    @endif
                    <a href="{{ route('laporan.index') }}"
                        class="nav-item flex items-center px-4 py-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition {{ request()->routeIs('laporan.*') ? 'active' : '' }}">
                        <i class="fas fa-chart-line w-5 mr-3"></i>
                        <span>Laporan Penjualan</span>
                    </a>
                    <a href="{{ route('pengguna.index') }}"
                        class="nav-item flex items-center px-4 py-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition {{ request()->routeIs('pengguna.*') ? 'active' : '' }}">
                        <i class="fa-solid fa-users mr-3"></i>
                        <span>Pengguna</span>
                    </a>
                    <a href="{{ route('pengaturan.index') }}"
                        class="nav-item flex items-center px-4 py-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition {{ request()->routeIs('pengaturan.*') ? 'active' : '' }}">
                        <i class="fas fa-cog w-5 mr-3"></i>
                        <span>Pengaturan Toko</span>
                    </a>
                @endif

                @if (auth()->check() && auth()->user()->role === 'user')
                    <a href="/keranjang"
                        class="nav-item flex items-center px-4 py-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition {{ request()->is('keranjang') ? 'active' : '' }}">
                        <i class="fas fa-shopping-cart w-5 mr-3"></i>
                        <span>Keranjang</span>
                    </a>

                    <a href="/pesanan"
                        class="nav-item flex items-center px-4 py-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition {{ request()->is('pesanan') ? 'active' : '' }}">
                        <i class="fas fa-clipboard-list w-5 mr-3"></i>
                        <span>List Pesanan</span>
                    </a>
                @endif

                @if (auth()->check())
                    <button onclick="openModal('logoutModal')"
                        class="nav-item flex items-center px-4 py-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition text-gray-700 dark:text-gray-300 w-full text-left">
                        <i class="fa-solid fa-arrow-right-from-bracket mr-3"></i>
                        <span>Logout</span>
                    </button>
                @endif

                @guest
                    <a href="{{ route('login') }}"
                        class="nav-item flex items-center px-4 py-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition {{ request()->routeIs('login') ? 'bg-amber-50 dark:bg-amber-900/20 text-amber-600 dark:text-amber-400 border-l-3 border-amber-500 dark:border-amber-400' : 'text-gray-700 dark:text-gray-300' }} w-full">
                        <i class="fa-solid fa-sign-in mr-3"></i>
                        <span>Login</span>
                    </a>
                @endguest
            </nav>
        </div>

        @if (auth()->check())
            <a href="/profile" class="m-6">
                <div
                    class="flex items-center px-4 py-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition cursor-pointer {{ request()->is('profile') ? 'bg-amber-50 dark:bg-amber-900/20 text-amber-600 dark:text-amber-400 border-l-3 border-amber-500 dark:border-amber-400' : 'text-gray-700 dark:text-gray-300' }}">
                    <div class="relative mr-3">
                        <div class="w-10 h-10 rounded-full overflow-hidden border-2 border-white shadow-sm">
                            <img src="{{ getUiAvatar(auth()->user()->nama) }}" alt="{{ auth()->user()->nama }}">
                        </div>
                        <div
                            class="absolute -bottom-1 -right-1 w-4 h-4 bg-green-400 rounded-full border-2 border-white dark:border-gray-800">
                        </div>
                    </div>
                    <div>
                        <p class="text-sm font-semibold">{{ auth()->user()->nama }}</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">{{ auth()->user()->email }}</p>
                    </div>
                </div>
            </a>
        @endif
    </div>
</aside>
