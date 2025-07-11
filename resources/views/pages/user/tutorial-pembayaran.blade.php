@extends('layouts.app')

@section('title', 'Tutorial Pembayaran')

@section('content')
    <div class="mt-8 space-y-6">
        <!-- Header Section -->
        <div class="card rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 bg-white dark:bg-gray-900">
            <div class="flex items-center justify-between mb-2">
                <h1 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">Tutorial Pembayaran</h1>
                {{-- <div class="flex items-center space-x-3">
                    <span class="bg-amber-100 text-amber-800 text-xs font-medium px-2.5 py-1 rounded-full dark:bg-amber-900 dark:text-amber-300">
                        <i class="fas fa-info-circle mr-1"></i>
                        Panduan Lengkap
                    </span>
                </div> --}}
            </div>
            <p class="text-gray-600 dark:text-gray-400">Pelajari cara melakukan pembayaran di Batamia Art dengan mudah dan aman</p>
        </div>

        <!-- Quick Navigation -->
        <div class="card rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 bg-white dark:bg-gray-900">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">
                <i class="fas fa-compass mr-2 text-amber-500"></i>
                Navigasi Cepat
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <a href="#bank-transfer" class="flex items-center p-3 rounded-lg border border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                    <i class="fas fa-university text-blue-500 mr-3"></i>
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Transfer Bank</span>
                </a>
                <a href="#e-wallet" class="flex items-center p-3 rounded-lg border border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                    <i class="fas fa-mobile-alt text-green-500 mr-3"></i>
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">E-Wallet</span>
                </a>
                <a href="#cod" class="flex items-center p-3 rounded-lg border border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                    <i class="fas fa-hand-holding-usd text-orange-500 mr-3"></i>
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">COD</span>
                </a>
                <a href="#faq" class="flex items-center p-3 rounded-lg border border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                    <i class="fas fa-question-circle text-purple-500 mr-3"></i>
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">FAQ</span>
                </a>
            </div>
        </div>

        <!-- Bank Transfer Tutorial -->
        <div id="bank-transfer" class="card rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 bg-white dark:bg-gray-900">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">
                <i class="fas fa-university text-blue-500 mr-2"></i>
                Transfer Bank
            </h2>
            
            <div class="mb-6">
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-3">Rekening Tujuan</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="bg-blue-50 dark:bg-blue-900/20 p-4 rounded-lg border border-blue-200 dark:border-blue-800">
                        <div class="flex items-center justify-between mb-2">
                            <h4 class="font-medium text-blue-900 dark:text-blue-100">Bank BCA</h4>
                            <i class="fas fa-copy text-blue-500 cursor-pointer hover:text-blue-700" onclick="copyToClipboard('1234567890')" title="Salin nomor rekening"></i>
                        </div>
                        <p class="text-sm text-blue-700 dark:text-blue-300">No. Rekening: <span class="font-mono font-bold">1234567890</span></p>
                        <p class="text-sm text-blue-700 dark:text-blue-300">a.n. Batamia Art</p>
                    </div>
                    <div class="bg-green-50 dark:bg-green-900/20 p-4 rounded-lg border border-green-200 dark:border-green-800">
                        <div class="flex items-center justify-between mb-2">
                            <h4 class="font-medium text-green-900 dark:text-green-100">Bank Mandiri</h4>
                            <i class="fas fa-copy text-green-500 cursor-pointer hover:text-green-700" onclick="copyToClipboard('0987654321')" title="Salin nomor rekening"></i>
                        </div>
                        <p class="text-sm text-green-700 dark:text-green-300">No. Rekening: <span class="font-mono font-bold">0987654321</span></p>
                        <p class="text-sm text-green-700 dark:text-green-300">a.n. Batamia Art</p>
                    </div>
                </div>
            </div>

            <div class="mb-6">
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-3">Langkah-langkah Pembayaran</h3>
                <div class="space-y-4">
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-8 h-8 bg-amber-500 text-white rounded-full flex items-center justify-center text-sm font-bold">1</div>
                        <div>
                            <h4 class="font-medium text-gray-900 dark:text-gray-100">Buka Aplikasi Mobile Banking</h4>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Masuk ke aplikasi mobile banking atau internet banking Anda</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-8 h-8 bg-amber-500 text-white rounded-full flex items-center justify-center text-sm font-bold">2</div>
                        <div>
                            <h4 class="font-medium text-gray-900 dark:text-gray-100">Pilih Menu Transfer</h4>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Pilih menu transfer ke rekening bank lain</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-8 h-8 bg-amber-500 text-white rounded-full flex items-center justify-center text-sm font-bold">3</div>
                        <div>
                            <h4 class="font-medium text-gray-900 dark:text-gray-100">Masukkan Nomor Rekening</h4>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Masukkan nomor rekening tujuan sesuai dengan bank yang Anda pilih</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-8 h-8 bg-amber-500 text-white rounded-full flex items-center justify-center text-sm font-bold">4</div>
                        <div>
                            <h4 class="font-medium text-gray-900 dark:text-gray-100">Masukkan Nominal Transfer</h4>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Masukkan nominal sesuai dengan total pesanan Anda</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-8 h-8 bg-amber-500 text-white rounded-full flex items-center justify-center text-sm font-bold">5</div>
                        <div>
                            <h4 class="font-medium text-gray-900 dark:text-gray-100">Upload Bukti Transfer</h4>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Setelah transfer berhasil, screenshot bukti transfer dan upload melalui halaman pesanan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- E-Wallet Tutorial -->
        <div id="e-wallet" class="card rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 bg-white dark:bg-gray-900">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">
                <i class="fas fa-mobile-alt text-green-500 mr-2"></i>
                E-Wallet (OVO, DANA, GoPay)
            </h2>
            
            <div class="mb-6">
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-3">Nomor E-Wallet</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="bg-purple-50 dark:bg-purple-900/20 p-4 rounded-lg border border-purple-200 dark:border-purple-800">
                        <div class="flex items-center justify-between mb-2">
                            <h4 class="font-medium text-purple-900 dark:text-purple-100">OVO</h4>
                            <i class="fas fa-copy text-purple-500 cursor-pointer hover:text-purple-700" onclick="copyToClipboard('081234567890')" title="Salin nomor"></i>
                        </div>
                        <p class="text-sm text-purple-700 dark:text-purple-300">No. HP: <span class="font-mono font-bold">081234567890</span></p>
                        <p class="text-sm text-purple-700 dark:text-purple-300">a.n. Batamia Art</p>
                    </div>
                    <div class="bg-blue-50 dark:bg-blue-900/20 p-4 rounded-lg border border-blue-200 dark:border-blue-800">
                        <div class="flex items-center justify-between mb-2">
                            <h4 class="font-medium text-blue-900 dark:text-blue-100">DANA</h4>
                            <i class="fas fa-copy text-blue-500 cursor-pointer hover:text-blue-700" onclick="copyToClipboard('081234567890')" title="Salin nomor"></i>
                        </div>
                        <p class="text-sm text-blue-700 dark:text-blue-300">No. HP: <span class="font-mono font-bold">081234567890</span></p>
                        <p class="text-sm text-blue-700 dark:text-blue-300">a.n. Batamia Art</p>
                    </div>
                    <div class="bg-green-50 dark:bg-green-900/20 p-4 rounded-lg border border-green-200 dark:border-green-800">
                        <div class="flex items-center justify-between mb-2">
                            <h4 class="font-medium text-green-900 dark:text-green-100">GoPay</h4>
                            <i class="fas fa-copy text-green-500 cursor-pointer hover:text-green-700" onclick="copyToClipboard('081234567890')" title="Salin nomor"></i>
                        </div>
                        <p class="text-sm text-green-700 dark:text-green-300">No. HP: <span class="font-mono font-bold">081234567890</span></p>
                        <p class="text-sm text-green-700 dark:text-green-300">a.n. Batamia Art</p>
                    </div>
                </div>
            </div>

            <div class="mb-6">
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-3">Cara Pembayaran</h3>
                <div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-lg">
                    <ol class="list-decimal list-inside space-y-2 text-sm text-gray-600 dark:text-gray-400">
                        <li>Buka aplikasi e-wallet (OVO/DANA/GoPay)</li>
                        <li>Pilih menu "Transfer" atau "Kirim Uang"</li>
                        <li>Masukkan nomor HP tujuan sesuai e-wallet yang dipilih</li>
                        <li>Masukkan nominal sesuai total pesanan</li>
                        <li>Konfirmasi pembayaran dengan PIN/fingerprint</li>
                        <li>Screenshot bukti transfer dan upload melalui halaman pesanan</li>
                    </ol>
                </div>
            </div>
        </div>

        <!-- COD Tutorial -->
        <div id="cod" class="card rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 bg-white dark:bg-gray-900">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">
                <i class="fas fa-hand-holding-usd text-orange-500 mr-2"></i>
                Cash on Delivery (COD)
            </h2>
            
            <div class="bg-orange-50 dark:bg-orange-900/20 p-4 rounded-lg border border-orange-200 dark:border-orange-800 mb-6">
                <div class="flex items-center">
                    <i class="fas fa-info-circle text-orange-500 mr-3"></i>
                    <div>
                        <h3 class="font-medium text-orange-900 dark:text-orange-100">Tersedia untuk wilayah Batam</h3>
                        <p class="text-sm text-orange-700 dark:text-orange-300">Pembayaran dilakukan saat barang diterima</p>
                    </div>
                </div>
            </div>

            <div class="space-y-4">
                <div class="flex items-start space-x-4">
                    <div class="flex-shrink-0 w-8 h-8 bg-orange-500 text-white rounded-full flex items-center justify-center text-sm font-bold">1</div>
                    <div>
                        <h4 class="font-medium text-gray-900 dark:text-gray-100">Pilih Metode COD</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Pilih Cash on Delivery saat checkout</p>
                    </div>
                </div>
                <div class="flex items-start space-x-4">
                    <div class="flex-shrink-0 w-8 h-8 bg-orange-500 text-white rounded-full flex items-center justify-center text-sm font-bold">2</div>
                    <div>
                        <h4 class="font-medium text-gray-900 dark:text-gray-100">Tunggu Kurir Datang</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Kurir akan menghubungi Anda sebelum pengiriman</p>
                    </div>
                </div>
                <div class="flex items-start space-x-4">
                    <div class="flex-shrink-0 w-8 h-8 bg-orange-500 text-white rounded-full flex items-center justify-center text-sm font-bold">3</div>
                    <div>
                        <h4 class="font-medium text-gray-900 dark:text-gray-100">Periksa Barang</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Periksa kondisi barang sebelum membayar</p>
                    </div>
                </div>
                <div class="flex items-start space-x-4">
                    <div class="flex-shrink-0 w-8 h-8 bg-orange-500 text-white rounded-full flex items-center justify-center text-sm font-bold">4</div>
                    <div>
                        <h4 class="font-medium text-gray-900 dark:text-gray-100">Bayar Tunai</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Bayar sesuai nominal yang tertera pada pesanan</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- FAQ Section -->
        <div id="faq" class="card rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 bg-white dark:bg-gray-900">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">
                <i class="fas fa-question-circle text-purple-500 mr-2"></i>
                Frequently Asked Questions
            </h2>
            
            <div class="space-y-4">
                <div class="border border-gray-200 dark:border-gray-700 rounded-lg">
                    <button class="w-full text-left p-4 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-opacity-50 rounded-lg" onclick="toggleFAQ(this)">
                        <div class="flex items-center justify-between">
                            <h3 class="font-medium text-gray-900 dark:text-gray-100">Berapa lama proses verifikasi pembayaran?</h3>
                            <i class="fas fa-chevron-down text-gray-500 transform transition-transform duration-200"></i>
                        </div>
                    </button>
                    <div class="hidden p-4 pt-0">
                        <p class="text-sm text-gray-600 dark:text-gray-400">Proses verifikasi pembayaran biasanya memakan waktu 1-2 jam kerja setelah bukti transfer diterima. Pada hari libur, verifikasi akan dilakukan pada hari kerja berikutnya.</p>
                    </div>
                </div>

                <div class="border border-gray-200 dark:border-gray-700 rounded-lg">
                    <button class="w-full text-left p-4 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-opacity-50 rounded-lg" onclick="toggleFAQ(this)">
                        <div class="flex items-center justify-between">
                            <h3 class="font-medium text-gray-900 dark:text-gray-100">Apakah ada biaya tambahan untuk COD?</h3>
                            <i class="fas fa-chevron-down text-gray-500 transform transition-transform duration-200"></i>
                        </div>
                    </button>
                    <div class="hidden p-4 pt-0">
                        <p class="text-sm text-gray-600 dark:text-gray-400">Ya, untuk metode COD dikenakan biaya tambahan sebesar Rp 5.000 untuk area Batam. Biaya ini sudah termasuk dalam total yang harus dibayar.</p>
                    </div>
                </div>

                <div class="border border-gray-200 dark:border-gray-700 rounded-lg">
                    <button class="w-full text-left p-4 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-opacity-50 rounded-lg" onclick="toggleFAQ(this)">
                        <div class="flex items-center justify-between">
                            <h3 class="font-medium text-gray-900 dark:text-gray-100">Bagaimana jika transfer berlebih?</h3>
                            <i class="fas fa-chevron-down text-gray-500 transform transition-transform duration-200"></i>
                        </div>
                    </button>
                    <div class="hidden p-4 pt-0">
                        <p class="text-sm text-gray-600 dark:text-gray-400">Jika nominal transfer berlebih, sisa uang akan dikembalikan melalui metode yang sama atau dapat digunakan untuk pembelian berikutnya sesuai kesepakatan.</p>
                    </div>
                </div>

                <div class="border border-gray-200 dark:border-gray-700 rounded-lg">
                    <button class="w-full text-left p-4 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-opacity-50 rounded-lg" onclick="toggleFAQ(this)">
                        <div class="flex items-center justify-between">
                            <h3 class="font-medium text-gray-900 dark:text-gray-100">Apakah bisa menggunakan kartu kredit?</h3>
                            <i class="fas fa-chevron-down text-gray-500 transform transition-transform duration-200"></i>
                        </div>
                    </button>
                    <div class="hidden p-4 pt-0">
                        <p class="text-sm text-gray-600 dark:text-gray-400">Saat ini kami belum menerima pembayaran melalui kartu kredit. Metode pembayaran yang tersedia adalah transfer bank, e-wallet, dan COD untuk wilayah Batam.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Support -->
        <div class="card rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 bg-white dark:bg-gray-900">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">
                <i class="fas fa-headset text-blue-500 mr-2"></i>
                Butuh Bantuan?
            </h2>
            <p class="text-gray-600 dark:text-gray-400 mb-4">Tim customer service kami siap membantu Anda 24/7</p>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <a href="https://wa.me/6281234567890" class="flex items-center p-4 bg-green-50 dark:bg-green-900/20 rounded-lg border border-green-200 dark:border-green-800 hover:bg-green-100 dark:hover:bg-green-900/30 transition-colors">
                    <i class="fab fa-whatsapp text-green-500 text-2xl mr-3"></i>
                    <div>
                        <h3 class="font-medium text-green-900 dark:text-green-100">WhatsApp</h3>
                        <p class="text-sm text-green-700 dark:text-green-300">081234567890</p>
                    </div>
                </a>
                <a href="mailto:support@batamia-art.com" class="flex items-center p-4 bg-blue-50 dark:bg-blue-900/20 rounded-lg border border-blue-200 dark:border-blue-800 hover:bg-blue-100 dark:hover:bg-blue-900/30 transition-colors">
                    <i class="fas fa-envelope text-blue-500 text-2xl mr-3"></i>
                    <div>
                        <h3 class="font-medium text-blue-900 dark:text-blue-100">Email</h3>
                        <p class="text-sm text-blue-700 dark:text-blue-300">support@batamia-art.com</p>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <script>
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(function() {
                // Show success notification
                const notification = document.createElement('div');
                notification.className = 'fixed top-4 right-4 bg-green-500 text-white px-4 py-2 rounded-lg shadow-lg z-50';
                notification.textContent = 'Nomor berhasil disalin!';
                document.body.appendChild(notification);
                
                setTimeout(() => {
                    notification.remove();
                }, 3000);
            }).catch(function(err) {
                console.error('Could not copy text: ', err);
            });
        }

        function toggleFAQ(button) {
            const content = button.nextElementSibling;
            const icon = button.querySelector('i');
            
            content.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');
        }

        // Smooth scrolling for navigation links
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
    </script>
@endsection