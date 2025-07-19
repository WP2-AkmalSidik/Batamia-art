<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ getPengaturan()->nama_toko }}</title>
    @vite('resources/css/app.css')
    <script src="https://kit.fontawesome.com/af96158b7b.js" crossorigin="anonymous"></script>
    @include('guest.assets.style')
</head>

<body class="bg-gradient-to-br from-orange-50 via-rose-50 to-amber-50">
    <!-- Header -->
    <header class="bg-white/80 backdrop-blur-sm shadow-sm sticky top-0 z-50 animate-fade-in">
        <div class="container mx-auto px-4 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3 animate-slide-in-left">
                    <div
                        class="w-10 h-10 bg-gradient-peach rounded-full flex items-center justify-center overflow-hidden">
                        <img src="{{ asset('brand/logo.png') }}" alt="Batamia Art Logo"
                            class="w-full h-full object-cover">
                    </div>
                    <h1 class="text-2xl font-bold text-gray-800">Batamia Art</h1>
                </div>

                <!-- Desktop Navigation -->
                <nav class="hidden md:flex space-x-8 animate-fade-in delay-200">
                    <a href="#heroSection"
                        class="text-gray-700 hover:text-orange-500 transition-colors duration-300 font-medium">Home</a>
                    <a href="#kategori"
                        class="text-gray-700 hover:text-orange-500 transition-colors duration-300 font-medium">Produk</a>
                    <a href="#review"
                        class="text-gray-700 hover:text-orange-500 transition-colors duration-300 font-medium">Testimoni</a>
                    <a href="#kontak"
                        class="text-gray-700 hover:text-orange-500 transition-colors duration-300 font-medium">Kontak</a>
                </nav>

                <!-- Mobile Hamburger Button -->
                <button class="md:hidden focus:outline-none hamburger" id="hamburger">
                    <span class="block w-5 h-0.5 bg-gray-800 mb-1 transition-all"></span>
                    <span class="block w-5 h-0.5 bg-gray-800 mb-1 transition-all"></span>
                    <span class="block w-5 h-0.5 bg-gray-800 transition-all"></span>
                </button>
            </div>

            <!-- Mobile Navigation -->
            <nav class="mobile-menu md:hidden bg-white/90 mt-1 rounded-lg shadow-md" id="mobileMenu">
                <!-- Ubah mt-4 menjadi mt-2 -->
                <div class="flex flex-col space-y-2 p-2"> <!-- Ubah space-y-3 menjadi space-y-2 dan p-4 menjadi p-2 -->
                    <a href="#heroSection"
                        class="text-sm text-gray-700 hover:text-orange-500 transition-colors duration-300 font-medium py-1 px-3 rounded-lg hover:bg-orange-50">Home</a>
                    <!-- Tambah text-sm dan ubah padding -->
                    <a href="#kategori"
                        class="text-sm text-gray-700 hover:text-orange-500 transition-colors duration-300 font-medium py-1 px-3 rounded-lg hover:bg-orange-50">Produk</a>
                    <a href="#review"
                        class="text-sm text-gray-700 hover:text-orange-500 transition-colors duration-300 font-medium py-1 px-3 rounded-lg hover:bg-orange-50">Testimoni</a>
                    <a href="#kontak"
                        class="text-sm text-gray-700 hover:text-orange-500 transition-colors duration-300 font-medium py-1 px-3 rounded-lg hover:bg-orange-50">Kontak</a>
                </div>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="heroSection" class="relative min-h-screen flex items-center overflow-hidden">
        <!-- Background Shapes -->
        <div class="absolute inset-0 overflow-hidden">
            <div
                class="absolute top-20 left-10 w-72 h-72 bg-gradient-sage shape-blob opacity-20 animate-scale-in delay-300">
            </div>
            <div
                class="absolute bottom-20 right-10 w-96 h-96 bg-gradient-lavender shape-organic opacity-20 animate-scale-in delay-500">
            </div>
            <div
                class="absolute top-1/2 left-1/2 w-64 h-64 bg-gradient-dusty shape-blob opacity-15 animate-scale-in delay-700">
            </div>
        </div>

        <div class="container mx-auto px-4 grid lg:grid-cols-2 gap-12 items-center relative z-10">
            <div class="text-center lg:text-left space-y-8">
                <h2 class="text-5xl lg:text-6xl font-bold text-gray-800 leading-tight animate-fade-in-up">
                    Temukan <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-orange-500 to-rose-500">Produk
                        Terbaik</span> untuk Hidup Anda
                </h2>

                <p class="text-xl text-gray-600 leading-relaxed animate-fade-in-up delay-200">
                    Koleksi eksklusif produk berkualitas tinggi dengan desain modern dan harga terjangkau. Wujudkan gaya
                    hidup impian Anda bersama kami.
                </p>

                <div
                    class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start animate-fade-in-up delay-400">
                    <a href="{{ route('login') }}"
                        class="bg-gradient-to-r from-orange-500 to-rose-500 text-white px-8 py-4 rounded-full font-semibold hover:scale-105 transition-transform duration-300 shadow-lg hover:shadow-xl">
                        <i class="fas fa-shopping-bag mr-2"></i>
                        Belanja Sekarang
                    </a>
                    <a href="{{ route('user.dashboard') }}"
                        class="border-2 border-orange-500 text-orange-500 px-8 py-4 rounded-full font-semibold hover:bg-orange-500 hover:text-white transition-all duration-300">
                        <i class="fas fa-play mr-2"></i>
                        Lihat Produk
                    </a>
                </div>

                <div class="flex items-center justify-center lg:justify-start space-x-8 animate-fade-in-up delay-600">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-gray-800">5000+</div>
                        <div class="text-gray-600">Produk</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-gray-800">10k+</div>
                        <div class="text-gray-600">Pelanggan</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-gray-800">4.9</div>
                        <div class="text-gray-600">Rating</div>
                    </div>
                </div>
            </div>

            <div class="relative animate-scale-in delay-300">
                <div
                    class="w-full h-96 bg-gradient-to-br from-orange-100 to-rose-100 rounded-3xl shadow-2xl overflow-hidden">
                    <div
                        class="w-full h-full bg-gradient-to-br from-orange-200/50 to-rose-200/50 flex items-center justify-center">
                        <img src="{{ asset('landing/herosection.jpg') }}" alt="Hero Product"
                            class="w-full h-full object-cover">
                    </div>
                </div>
                <div
                    class="absolute -top-4 -left-4 w-20 h-20 bg-gradient-sage rounded-full flex items-center justify-center shadow-lg animate-fade-in delay-800">
                    <i class="fas fa-truck text-green-600 text-xl"></i>
                </div>
                <div
                    class="absolute -bottom-4 -right-4 w-24 h-24 bg-gradient-lavender rounded-full flex items-center justify-center shadow-lg animate-fade-in delay-1000">
                    <i class="fas fa-shield-alt text-purple-600 text-xl"></i>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Products -->
    <section id="kategori" class="py-20 bg-white/50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16 animate-fade-in-up">
                <h3 class="text-4xl font-bold text-gray-800 mb-4">Kategori Produk</h3>
                <p class="text-xl text-gray-600">Berbagai macam kategori produk yang kami jual</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Kategori Perhiasan -->
                <div
                    class="bg-white rounded-3xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-500 hover:scale-105 animate-fade-in-up delay-200 group">
                    <div class="h-64 relative overflow-hidden">
                        <img src="{{ asset('landing/perhiasan.jpg') }}" alt="Koleksi Perhiasan"
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-end p-6">
                            <span class="text-white font-medium text-lg">Jelajahi Koleksi →</span>
                        </div>
                    </div>

                    <div class="p-6 text-center">
                        <h4 class="text-xl font-semibold text-gray-800 mb-2">Perhiasan Eksklusif</h4>
                        <p class="text-gray-500 italic">
                            "Keanggunan yang abadi dalam setiap detail"
                        </p>

                        <div class="my-4 flex justify-center">
                            <div class="w-16 h-px bg-gradient-to-r from-transparent via-amber-400 to-transparent"></div>
                        </div>
                        <span class="text-xs tracking-widest text-amber-600 font-medium">GOLD COLLECTION</span>
                    </div>
                </div>

                <!-- Card Kerajinan Tangan - Dual Material -->
                <div
                    class="bg-white rounded-3xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-500 hover:scale-[1.02] animate-fade-in-up delay-200 group">
                    <!-- Header Card -->
                    <div class="bg-gradient-to-r from-amber-50 to-green-50 py-4 text-center">
                        <h3 class="text-xl font-semibold text-gray-800 uppercase tracking-wider">Kerajinan Tangan</h3>
                        <p class="text-xs text-gray-500 mt-1">Karya Seni Berkelas dengan Bahan Daur Ulang</p>
                    </div>

                    <!-- Grid Dua Gambar Bahan -->
                    <div class="grid grid-cols-2 divide-x divide-gray-100">
                        <!-- Plastik -->
                        <div class="relative h-48 overflow-hidden">
                            <img src="{{ asset('landing/plastik.jpg') }}" alt="Kerajinan Plastik Daur Ulang"
                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent flex items-end p-4">
                                <span class="text-white text-sm font-medium bg-black/60 px-2 py-1 rounded-full">PLASTIK
                                    DAUR ULANG</span>
                            </div>
                        </div>

                        <!-- Bambu -->
                        <div class="relative h-48 overflow-hidden">
                            <img src="{{ asset('landing/bambu.jpg') }}" alt="Kerajinan Bambu Tradisional"
                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent flex items-end p-4">
                                <span class="text-white text-sm font-medium bg-black/60 px-2 py-1 rounded-full">BAMBU
                                    ALAMI</span>
                            </div>
                        </div>
                    </div>

                    <!-- Footer Deskripsi -->
                    <div class="p-5 text-center border-t border-gray-100">
                        <p class="text-gray-600 mb-3">
                            <span class="font-medium text-amber-600">Plastik</span> - Karya inovatif ramah
                            lingkungan<br>
                            <span class="font-medium text-green-600">Bambu</span> - Keindahan alam yang abadi
                        </p>
                        <div class="flex justify-center space-x-2">
                            <span
                                class="text-xs px-3 py-1 bg-amber-100 text-amber-800 rounded-full">Eco-Friendly</span>
                            <span class="text-xs px-3 py-1 bg-green-100 text-green-800 rounded-full">Handmade</span>
                        </div>
                    </div>
                </div>
                <!-- Kategori Perkakas Rumah Tangga -->
                <div
                    class="bg-white rounded-3xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-500 hover:scale-[1.02] animate-fade-in-up delay-200 group">
                    <div class="h-64 relative overflow-hidden">
                        <img src="{{ asset('landing/perkakas.jpg') }}" alt="Perkakas Rumah Tangga Premium"
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-end p-6">
                            <span class="text-white font-medium text-lg">Telusuri Koleksi →</span>
                        </div>
                    </div>
                    <div class="p-6 text-center">
                        <h4 class="text-xl font-semibold text-gray-800 mb-2">Perkakas Rumah Tangga</h4>
                        <p class="text-gray-500 italic">
                            "Fungsionalitas premium untuk kenyamanan harian"
                        </p>

                        <div class="my-4 flex justify-center">
                            <div class="w-16 h-px bg-gradient-to-r from-transparent via-blue-400 to-transparent"></div>
                        </div>

                        <span class="text-xs tracking-widest text-blue-600 font-medium">HOME ESSENTIALS</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section id="review" class="py-20 bg-gradient-to-br from-orange-50 to-rose-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16 animate-fade-in-up">
                <h3 class="text-4xl font-bold text-gray-800 mb-4">Testimoni Pelanggan</h3>
                <p class="text-xl text-gray-600">Apa kata pelanggan tentang produk dan layanan kami</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div
                    class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 hover:scale-105 animate-fade-in-up delay-200">
                    <div class="flex items-center mb-6">
                        <div
                            class="w-16 h-16 bg-gradient-peach rounded-full flex items-center justify-center overflow-hidden">
                            <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Sarah Putri"
                                class="w-full h-full object-cover">
                        </div>
                        <div class="ml-4">
                            <h4 class="font-semibold text-gray-800">Sarah Putri</h4>
                            <p class="text-gray-600">Jakarta</p>
                        </div>
                    </div>
                    <div class="text-yellow-400 text-lg mb-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="text-gray-700 italic leading-relaxed">
                        "Produk yang dibeli benar-benar berkualitas tinggi. Pengiriman cepat dan packaging sangat rapi.
                        Sangat puas dengan pelayanannya!"
                    </p>
                </div>

                <!-- Testimonial 2 -->
                <div
                    class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 hover:scale-105 animate-fade-in-up delay-400">
                    <div class="flex items-center mb-6">
                        <div
                            class="w-16 h-16 bg-gradient-peach rounded-full flex items-center justify-center overflow-hidden">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Sarah Putri"
                                class="w-full h-full object-cover">
                        </div>
                        <div class="ml-4">
                            <h4 class="font-semibold text-gray-800">Budi Santoso</h4>
                            <p class="text-gray-600">Surabaya</p>
                        </div>
                    </div>
                    <div class="text-yellow-400 text-lg mb-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="text-gray-700 italic leading-relaxed">
                        "Website sangat user-friendly dan mudah digunakan. Harga produk kompetitif dengan kualitas yang
                        tidak mengecewakan. Recommended!"
                    </p>
                </div>

                <!-- Testimonial 3 -->
                <div
                    class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 hover:scale-105 animate-fade-in-up delay-600">
                    <div class="flex items-center mb-6">
                        <div
                            class="w-16 h-16 bg-gradient-peach rounded-full flex items-center justify-center overflow-hidden">
                            <img src="https://randomuser.me/api/portraits/women/41.jpg" alt="Sarah Putri"
                                class="w-full h-full object-cover">
                        </div>
                        <div class="ml-4">
                            <h4 class="font-semibold text-gray-800">Maya Sari</h4>
                            <p class="text-gray-600">Bandung</p>
                        </div>
                    </div>
                    <div class="text-yellow-400 text-lg mb-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="text-gray-700 italic leading-relaxed">
                        "Customer service yang responsif dan membantu. Produk sesuai dengan deskripsi di website. Akan
                        order lagi di masa depan!"
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-r from-orange-500 to-rose-500 relative overflow-hidden">
        <div class="absolute inset-0 bg-white/10"></div>
        <div class="container mx-auto px-4 text-center relative z-10">
            <div class="max-w-4xl mx-auto animate-fade-in-up">
                <h3 class="text-4xl md:text-5xl font-bold text-white mb-6">
                    Bergabunglah dengan Komunitas Kami
                </h3>
                <p class="text-xl text-white/90 mb-8 leading-relaxed">
                    Dapatkan update produk terbaru, promo eksklusif, dan tips lifestyle menarik langsung ke inbox Anda.
                    Jangan lewatkan kesempatan emas ini!
                </p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center max-w-md mx-auto mb-8">
                    <input type="email" placeholder="Masukkan email Anda..."
                        class="flex-1 px-6 py-4 rounded-full border-0 focus:outline-none focus:ring-4 focus:ring-white/30 text-gray-800 placeholder-gray-500">
                    <button
                        class="bg-white text-orange-500 px-8 py-4 rounded-full font-semibold hover:scale-105 transition-transform duration-300 shadow-lg">
                        <i class="fas fa-paper-plane mr-2"></i>
                        Subscribe
                    </button>
                </div>

                <div class="flex items-center justify-center space-x-8 text-white/80">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle mr-2"></i>
                        <span>Promo Eksklusif</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-gift mr-2"></i>
                        <span>Bonus Member</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-bell mr-2"></i>
                        <span>Update Terbaru</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="kontak" class="bg-gray-900 text-white py-16">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Company Info -->
                <div class="animate-fade-in-up">
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-10 h-10 bg-gradient-peach rounded-full flex items-center justify-center">
                            <i class="fas fa-seedling text-orange-600 text-xl"></i>
                        </div>
                        <h4 class="text-2xl font-bold">Bloom Store</h4>
                    </div>
                    <p class="text-gray-400 leading-relaxed mb-6">
                        Toko online terpercaya dengan koleksi produk berkualitas tinggi untuk memenuhi kebutuhan
                        lifestyle modern Anda.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#"
                            class="w-10 h-10 bg-orange-500 rounded-full flex items-center justify-center hover:scale-110 transition-transform duration-300">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-orange-500 rounded-full flex items-center justify-center hover:scale-110 transition-transform duration-300">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-orange-500 rounded-full flex items-center justify-center hover:scale-110 transition-transform duration-300">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-orange-500 rounded-full flex items-center justify-center hover:scale-110 transition-transform duration-300">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="animate-fade-in-up delay-200">
                    <h5 class="text-xl font-semibold mb-6">Quick Links</h5>
                    <ul class="space-y-3">
                        <li><a href="#"
                                class="text-gray-400 hover:text-orange-500 transition-colors duration-300">Tentang
                                Kami</a></li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-orange-500 transition-colors duration-300">Produk</a>
                        </li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-orange-500 transition-colors duration-300">Promo</a>
                        </li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-orange-500 transition-colors duration-300">Blog</a>
                        </li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-orange-500 transition-colors duration-300">Karier</a>
                        </li>
                    </ul>
                </div>

                <!-- Customer Service -->
                <div class="animate-fade-in-up delay-400">
                    <h5 class="text-xl font-semibold mb-6">Customer Service</h5>
                    <ul class="space-y-3">
                        <li><a href="#"
                                class="text-gray-400 hover:text-orange-500 transition-colors duration-300">Pusat
                                Bantuan</a></li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-orange-500 transition-colors duration-300">Cara
                                Pemesanan</a></li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-orange-500 transition-colors duration-300">Kebijakan
                                Privasi</a></li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-orange-500 transition-colors duration-300">Syarat &
                                Ketentuan</a></li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-orange-500 transition-colors duration-300">Pengembalian</a>
                        </li>
                    </ul>
                </div>

                <!-- Contact -->
                <div class="animate-fade-in-up delay-600">
                    <h5 class="text-xl font-semibold mb-6">Hubungi Kami</h5>
                    <div class="space-y-4">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-map-marker-alt text-orange-500"></i>
                            <span class="text-gray-400">Jl. Raya Jakarta No. 123, Indonesia</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-phone text-orange-500"></i>
                            <span class="text-gray-400">+62 812-3456-7890</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-envelope text-orange-500"></i>
                            <span class="text-gray-400">hello@bloomstore.com</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-clock text-orange-500"></i>
                            <span class="text-gray-400">Senin - Jumat: 08:00 - 17:00</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-800 mt-12 pt-8 text-center">
                <p class="text-gray-400">
                    © 2024 Bloom Store. All rights reserved. Made with <i class="fas fa-heart text-red-500"></i> in
                    Indonesia.
                </p>
            </div>
        </div>
    </footer>
    <script>
        const hamburger = document.getElementById('hamburger');
        const mobileMenu = document.getElementById('mobileMenu');

        hamburger.addEventListener('click', function() {
            this.classList.toggle('active');
            mobileMenu.classList.toggle('open');
        });

        // Tutup mobile menu saat mengklik link
        document.querySelectorAll('#mobileMenu a').forEach(link => {
            link.addEventListener('click', function() {
                hamburger.classList.remove('active');
                mobileMenu.classList.remove('open');
            });
        });
        // Smooth scroll dengan offset untuk fixed header
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();

                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);
                const headerOffset = 80; // Sesuaikan dengan tinggi header Anda

                if (targetElement) {
                    const elementPosition = targetElement.getBoundingClientRect().top;
                    const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

                    // Animasi scroll
                    window.scrollTo({
                        top: offsetPosition,
                        behavior: 'smooth'
                    });

                    // Tambahkan efek aktif pada menu
                    document.querySelectorAll('nav a').forEach(link => {
                        link.classList.remove('text-orange-500', 'font-bold');
                    });
                    this.classList.add('text-orange-500', 'font-bold');
                }
            });
        });

        // Animasi saat scroll ke section
        function animateOnScroll() {
            const sections = document.querySelectorAll('section');
            const windowHeight = window.innerHeight;

            sections.forEach(section => {
                const sectionTop = section.getBoundingClientRect().top;
                const sectionVisible = 150;

                if (sectionTop < windowHeight - sectionVisible) {
                    section.classList.add('animate-section');
                }
            });
        }

        // Jalankan saat load dan scroll
        window.addEventListener('load', animateOnScroll);
        window.addEventListener('scroll', animateOnScroll);
    </script>
</body>

</html>
