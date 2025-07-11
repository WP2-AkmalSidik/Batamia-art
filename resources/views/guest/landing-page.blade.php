<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Batamia Art - Kerajinan Tangan Berkualitas</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/af96158b7b.js" crossorigin="anonymous"></script>
    @include('guest.assets.style')
</head>
<body class="antialiased">
    <!-- Navigation -->
    <nav class="fixed top-0 left-0 right-0 z-50 glass-card border-0 border-b border-gray-200 dark:border-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <i class="fas fa-leaf text-2xl mr-2" style="background: var(--accent-color); -webkit-background-clip: text; -webkit-text-fill-color: transparent;"></i>
                        <span class="text-xl font-bold">Batamia Art</span>
                    </div>
                </div>
                
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="#beranda" class="nav-item px-3 py-2 rounded-md text-sm font-medium">Beranda</a>
                        <a href="#produk" class="nav-item px-3 py-2 rounded-md text-sm font-medium">Produk</a>
                        <a href="#tentang" class="nav-item px-3 py-2 rounded-md text-sm font-medium">Tentang</a>
                        <a href="#kontak" class="nav-item px-3 py-2 rounded-md text-sm font-medium">Kontak</a>
                        <button id="theme-toggle" class="nav-item px-3 py-2 rounded-md text-sm font-medium">
                            <i class="fas fa-moon" id="theme-icon"></i>
                        </button>
                    </div>
                </div>
                
                <div class="md:hidden">
                    <button id="mobile-menu-btn" class="nav-item px-3 py-2 rounded-md text-sm font-medium">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden hidden">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="#beranda" class="nav-item block px-3 py-2 rounded-md text-base font-medium">Beranda</a>
                <a href="#produk" class="nav-item block px-3 py-2 rounded-md text-base font-medium">Produk</a>
                <a href="#tentang" class="nav-item block px-3 py-2 rounded-md text-base font-medium">Tentang</a>
                <a href="#kontak" class="nav-item block px-3 py-2 rounded-md text-base font-medium">Kontak</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="beranda" class="hero-gradient min-h-screen flex items-center justify-center pt-16 parallax-bg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center fade-in">
                <div class="floating-element mb-8">
                    <div class="w-24 h-24 mx-auto mb-6 rounded-full flex items-center justify-center glass-card">
                        <i class="fas fa-leaf text-4xl" style="background: var(--accent-color); -webkit-background-clip: text; -webkit-text-fill-color: transparent;"></i>
                    </div>
                </div>
                
                <h1 class="text-5xl md:text-7xl font-bold mb-6">
                    <span class="block">Batamia</span>
                    <span class="block" style="background: var(--accent-color); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Art</span>
                </h1>
                
                <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto opacity-80">
                    Kerajinan tangan berkualitas tinggi dari kayu, plastik, dan bambu. 
                    Solusi sempurna untuk kebutuhan peralatan dan alat rumah tangga Anda.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="/login" class="btn-accent px-8 py-3 text-lg font-semibold">
                        <i class="fas fa-shopping-cart mr-2"></i>
                        Belanja Sekarang
                    </a>
                    <a href="/" class="glass-card px-8 py-3 text-lg font-semibold hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                        <i class="fas fa-play mr-2"></i>
                        Lihat Koleksi
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section id="produk" class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-4">Produk Unggulan</h2>
                <p class="text-xl opacity-70 max-w-2xl mx-auto">
                    Temukan koleksi kerajinan tangan dan peralatan berkualitas tinggi kami
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Kerajinan Kayu -->
                <div class="glass-card p-8 text-center">
                    <div class="w-16 h-16 mx-auto mb-6 rounded-full flex items-center justify-center" style="background: var(--green-gradient);">
                        <i class="fas fa-tree text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Kerajinan Kayu</h3>
                    <p class="opacity-70 mb-6">Produk kayu berkualitas tinggi dengan finishing yang halus dan tahan lama</p>
                    <button class="btn-accent w-full">
                        <i class="fas fa-eye mr-2"></i>
                        Lihat Koleksi
                    </button>
                </div>
                
                <!-- Kerajinan Plastik -->
                <div class="glass-card p-8 text-center">
                    <div class="w-16 h-16 mx-auto mb-6 rounded-full flex items-center justify-center" style="background: var(--blue-gradient);">
                        <i class="fas fa-cube text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Kerajinan Plastik</h3>
                    <p class="opacity-70 mb-6">Inovasi plastik modern dengan desain yang menarik dan fungsional</p>
                    <button class="btn-accent w-full">
                        <i class="fas fa-eye mr-2"></i>
                        Lihat Koleksi
                    </button>
                </div>
                
                <!-- Kerajinan Bambu -->
                <div class="glass-card p-8 text-center">
                    <div class="w-16 h-16 mx-auto mb-6 rounded-full flex items-center justify-center" style="background: var(--amber-gradient);">
                        <i class="fas fa-seedling text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Kerajinan Bambu</h3>
                    <p class="opacity-70 mb-6">Produk ramah lingkungan dengan kualitas premium dan desain natural</p>
                    <button class="btn-accent w-full">
                        <i class="fas fa-eye mr-2"></i>
                        Lihat Koleksi
                    </button>
                </div>
                
                <!-- Peralatan -->
                <div class="glass-card p-8 text-center">
                    <div class="w-16 h-16 mx-auto mb-6 rounded-full flex items-center justify-center" style="background: var(--purple-gradient);">
                        <i class="fas fa-tools text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Peralatan</h3>
                    <p class="opacity-70 mb-6">Perkakas berkualitas untuk berbagai kebutuhan pekerjaan Anda</p>
                    <button class="btn-accent w-full">
                        <i class="fas fa-eye mr-2"></i>
                        Lihat Koleksi
                    </button>
                </div>
                
                <!-- Alat Rumah Tangga -->
                <div class="glass-card p-8 text-center">
                    <div class="w-16 h-16 mx-auto mb-6 rounded-full flex items-center justify-center" style="background: var(--info-color);">
                        <i class="fas fa-home text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Alat Rumah Tangga</h3>
                    <p class="opacity-70 mb-6">Solusi praktis untuk kebutuhan sehari-hari di rumah Anda</p>
                    <button class="btn-accent w-full">
                        <i class="fas fa-eye mr-2"></i>
                        Lihat Koleksi
                    </button>
                </div>
                
                <!-- Custom Order -->
                <div class="glass-card p-8 text-center">
                    <div class="w-16 h-16 mx-auto mb-6 rounded-full flex items-center justify-center" style="background: var(--warning-color);">
                        <i class="fas fa-magic text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Custom Order</h3>
                    <p class="opacity-70 mb-6">Pesan sesuai keinginan Anda dengan desain dan spesifikasi khusus</p>
                    <button class="btn-accent w-full">
                        <i class="fas fa-phone mr-2"></i>
                        Hubungi Kami
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="tentang" class="py-20 parallax-bg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-4xl md:text-5xl font-bold mb-6">Tentang Batamia Art</h2>
                    <p class="text-lg opacity-80 mb-6">
                        Batamia Art adalah toko online yang mengkhususkan diri dalam penyediaan kerajinan tangan 
                        berkualitas tinggi dan peralatan rumah tangga. Kami berkomitmen memberikan produk terbaik 
                        dengan harga yang kompetitif.
                    </p>
                    <div class="space-y-4">
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-green-500 mr-3"></i>
                            <span>Kualitas produk terjamin</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-green-500 mr-3"></i>
                            <span>Harga kompetitif</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-green-500 mr-3"></i>
                            <span>Pengiriman cepat dan aman</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-green-500 mr-3"></i>
                            <span>Layanan customer service 24/7</span>
                        </div>
                    </div>
                </div>
                
                <div class="floating-element">
                    <div class="glass-card p-8 text-center">
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <h3 class="text-3xl font-bold mb-2" style="background: var(--accent-color); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">1000+</h3>
                                <p class="opacity-70">Produk Tersedia</p>
                            </div>
                            <div>
                                <h3 class="text-3xl font-bold mb-2" style="background: var(--success-color); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">500+</h3>
                                <p class="opacity-70">Pelanggan Puas</p>
                            </div>
                            <div>
                                <h3 class="text-3xl font-bold mb-2" style="background: var(--info-color); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">5+</h3>
                                <p class="opacity-70">Tahun Pengalaman</p>
                            </div>
                            <div>
                                <h3 class="text-3xl font-bold mb-2" style="background: var(--purple-gradient); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">98%</h3>
                                <p class="opacity-70">Rating Kepuasan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="kontak" class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-4">Hubungi Kami</h2>
                <p class="text-xl opacity-70 max-w-2xl mx-auto">
                    Siap membantu Anda menemukan produk yang tepat untuk kebutuhan Anda
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="glass-card p-8 text-center">
                    <div class="w-16 h-16 mx-auto mb-6 rounded-full flex items-center justify-center" style="background: var(--info-color);">
                        <i class="fas fa-phone text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Telepon</h3>
                    <p class="opacity-70 mb-4">+62 812-3456-7890</p>
                    <button class="btn-accent w-full">
                        <i class="fas fa-phone mr-2"></i>
                        Hubungi
                    </button>
                </div>
                
                <div class="glass-card p-8 text-center">
                    <div class="w-16 h-16 mx-auto mb-6 rounded-full flex items-center justify-center" style="background: var(--success-color);">
                        <i class="fab fa-whatsapp text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-4">WhatsApp</h3>
                    <p class="opacity-70 mb-4">+62 812-3456-7890</p>
                    <button class="btn-accent w-full">
                        <i class="fab fa-whatsapp mr-2"></i>
                        Chat Sekarang
                    </button>
                </div>
                
                <div class="glass-card p-8 text-center">
                    <div class="w-16 h-16 mx-auto mb-6 rounded-full flex items-center justify-center" style="background: var(--purple-gradient);">
                        <i class="fas fa-envelope text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Email</h3>
                    <p class="opacity-70 mb-4">info@batamiaart.com</p>
                    <button class="btn-accent w-full">
                        <i class="fas fa-envelope mr-2"></i>
                        Kirim Email
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="glass-card border-0 border-t border-gray-200 dark:border-gray-700 mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center mb-4">
                        <i class="fas fa-palette text-2xl mr-2" style="background: var(--accent-color); -webkit-background-clip: text; -webkit-text-fill-color: transparent;"></i>
                        <span class="text-xl font-bold">Batamia Art</span>
                    </div>
                    <p class="opacity-70 mb-4">
                        Toko online terpercaya untuk kerajinan tangan berkualitas dan peralatan rumah tangga.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-2xl hover:opacity-60 transition-opacity">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="text-2xl hover:opacity-60 transition-opacity">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="#" class="text-2xl hover:opacity-60 transition-opacity">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </div>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Produk</h4>
                    <ul class="space-y-2 opacity-70">
                        <li><a href="#" class="hover:opacity-100 transition-opacity">Kerajinan Kayu</a></li>
                        <li><a href="#" class="hover:opacity-100 transition-opacity">Kerajinan Plastik</a></li>
                        <li><a href="#" class="hover:opacity-100 transition-opacity">Kerajinan Bambu</a></li>
                        <li><a href="#" class="hover:opacity-100 transition-opacity">Peralatan</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Layanan</h4>
                    <ul class="space-y-2 opacity-70">
                        <li><a href="#" class="hover:opacity-100 transition-opacity">Custom Order</a></li>
                        <li><a href="#" class="hover:opacity-100 transition-opacity">Konsultasi</a></li>
                        <li><a href="#" class="hover:opacity-100 transition-opacity">Pengiriman</a></li>
                        <li><a href="#" class="hover:opacity-100 transition-opacity">Garansi</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Kontak</h4>
                    <ul class="space-y-2 opacity-70">
                        <li>Tasikmalaya, Jawa Barat</li>
                        <li>+62 812-3456-7890</li>
                        <li>info@batamiaart.com</li>
                        <li>Senin - Sabtu: 08:00 - 17:00</li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-200 dark:border-gray-700 mt-8 pt-8 text-center opacity-70">
                <p>&copy; 2025 Batamia Art. Semua hak dilindungi.</p>
            </div>
        </div>
    </footer>

    <script>
        // Theme Toggle
        const themeToggle = document.getElementById('theme-toggle');
        const themeIcon = document.getElementById('theme-icon');
        const html = document.documentElement;

        themeToggle.addEventListener('click', () => {
            html.classList.toggle('dark');
            if (html.classList.contains('dark')) {
                themeIcon.classList.replace('fa-moon', 'fa-sun');
                localStorage.setItem('theme', 'dark');
            } else {
                themeIcon.classList.replace('fa-sun', 'fa-moon');
                localStorage.setItem('theme', 'light');
            }
        });

        // Load saved theme
        const savedTheme = localStorage.getItem('theme');
        if (savedTheme === 'dark') {
            html.classList.add('dark');
            themeIcon.classList.replace('fa-moon', 'fa-sun');
        }

        // Mobile Menu Toggle
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Smooth Scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Intersection Observer for fade-in animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('fade-in');
                }
            });
        }, observerOptions);

        // Observe all cards
        document.querySelectorAll('.glass-card').forEach(card => {
            observer.observe(card);
        });
    </script>
</body>
</html>