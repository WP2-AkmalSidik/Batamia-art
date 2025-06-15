<header class="header-bg">
    <div class="flex items-center justify-between px-6 py-4">
        <div class="flex items-center gap-3">
            <!-- Mobile menu button -->
            <button onclick="toggleSidebar()" class="lg:hidden text-gray-600 hover:text-gray-800 focus:outline-none">
                <i class="fas fa-bars text-2xl"></i>
            </button>

            <h2 class="text-2xl font-bold">@yield('title')</h2>
        </div>

        <div class="flex items-center space-x-3">

            @if (auth()->check())
                @if (auth()->user()->role === 'admin')
                    <!-- Is Admin -->
                    <button class="relative ml-2">
                        <i class="fas fa-bell text-gray-600 hover:text-gray-400"></i>
                        <span
                            class="absolute -top-2 -right-3 w-5 h-5 bg-gradient-to-r from-red-500 to-red-600 text-xs flex items-center justify-center text-white rounded-full animate-pulse">3</span>
                    </button>
                @elseif (auth()->user()->role === 'user')
                    <!-- Is Customers -->
                    <button class="relative ml-2">
                        <i class="fa-solid fa-cart-shopping text-gray-600 hover:text-gray-400"></i>
                        <span
                            class="absolute -top-2 -right-3 w-5 h-5 bg-gradient-to-r from-red-500 to-red-600 text-xs flex items-center justify-center text-white rounded-full animate-pulse">3</span>
                    </button>
                @endif
            @endif

            @guest
                <a href="{{ route('login') }}" class="relative ml-2">
                    <i class="fas fa-sign-in text-gray-600 hover:text-gray-400"></i>
                    <span
                        class="absolute -top-2 -right-3 w-5 h-5 bg-gradient-to-r from-red-500 to-red-600 text-xs flex items-center justify-center text-white rounded-full animate-pulse">3</span>
                </a>
            @endguest

            <!-- Theme Toggle (Icon only) -->
            <button onclick="toggleTheme()" class="relative ml-4">
                <i id="theme-icon" class="fas fa-moon text-5xl text-gray-600 hover:text-gray-400"></i>
            </button>
        </div>
    </div>
</header>
