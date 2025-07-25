@foreach ($pesanans as $pesanan)
    <div
        class="card rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 overflow-hidden">
        <div class="p-6">
            <!-- Header Pesanan -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-4 space-y-2 sm:space-y-0">
                <div class="flex items-center space-x-3">
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-shopping-bag text-blue-500"></i>
                        <span class="font-semibold text-gray-900 dark:text-gray-100">{{ $pesanan->invoice }}</span>
                    </div>
                    <span class="text-sm text-gray-500 dark:text-gray-400">•</span>
                    <span class="text-sm text-gray-600 dark:text-gray-400">{{ $pesanan->created_at }}</span>
                    @if ($pesanan->resi)
                        <span class="text-sm text-gray-500 dark:text-gray-400">•</span>
                        <span class="text-sm text-gray-600 dark:text-gray-400">{{ $pesanan->resi }}</span>
                    @endif
                </div>
                <span
                    class="status-{{ $pesanan->status == 'belum_dibayar' ? 'belum-bayar' : ($pesanan->status == 'Diproses' ? 'diproses' : ($pesanan->status == 'Dikirim' ? 'dikirim' : $pesanan->status)) }} px-3 py-1 rounded-full text-xs font-medium">
                    <i
                        class="fas fa-{{ $pesanan->status == 'belum_dibayar' ? 'clock' : ($pesanan->status == 'Diproses' ? 'cog fa-spin' : ($pesanan->status == 'Dikirim' ? 'truck' : 'check-circle')) }} mr-1"></i>
                    {{ toTitleCase($pesanan->status) }}
                </span>
            </div>

            <!-- Items List -->
            <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4 mb-4">
                <h4 class="font-medium text-gray-900 dark:text-gray-100 mb-3">Item Pesanan</h4>
                <div class="space-y-3">
                    @php
                        $totalHarga = 0;
                    @endphp
                    @foreach ($pesanan->orderProduks as $pesananProduk)
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <div
                                    class="w-12 h-12 bg-gray-200 dark:bg-gray-700 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-dragon text-amber-600"></i>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-900 dark:text-gray-100">
                                        {{ $pesananProduk->produk->nama }}</p>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ $pesananProduk->kuantitas }}x
                                        {{ format_rp($pesananProduk->produk->harga) }}</p>
                                </div>
                            </div>
                            <span
                                class="font-semibold text-gray-900 dark:text-gray-100">{{ format_rp($pesananProduk->produk->harga * $pesananProduk->kuantitas) }}</span>
                        </div>
                        @php
                            $totalHarga += $pesananProduk->produk->harga * $pesananProduk->kuantitas;
                        @endphp
                    @endforeach
                </div>
            </div>

            <!-- Total & Action -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between space-y-3 sm:space-y-0">
                <div>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Total Pembayaran</p>
                    <p class="text-xl font-bold text-gray-900 dark:text-gray-100">{{ format_rp($totalHarga) }}</p>
                </div>
                @if ($pesanan->status == 'belum_dibayar')
                    <div>
                        <button
                            onclick="openUploadModal({{ $pesanan->id }}, '{{ format_rp($pesanan->total_harga) }}')"
                            data-total-harga="{{ format_rp($totalHarga) }}"
                            class="btn-accent px-6 py-2 rounded-lg font-medium transition-all duration-300 hover:shadow-lg">
                            <i class="fas fa-upload mr-2"></i>
                            Upload Bukti Pembayaran
                        </button>
                        <button onclick="openCancelModal({{ $pesanan->id }})"
                            class="btn-accent px-6   py-2 rounded-lg font-medium transition-all duration-300 hover:shadow-lg">
                            <i class="fas fa-times mr-2"></i>
                            Batalkan Pesanan
                        </button>
                    </div>
                @elseif ($pesanan->status == 'diproses' || $pesanan->status == 'dibayar')
                    <button disabled
                        class="btn-accent px-6 py-2 rounded-lg font-medium transition-all duration-300 hover:shadow-lg">
                        <i class="fas fa-truck mr-2"></i>
                        Pesanan Sedang Diproses
                    </button>
                @elseif ($pesanan->status == 'dikirim')
                    <button onclick="openSelesaiModal({{ $pesanan->id }},'{{ $pesanan->invoice }}')"
                        class="btn-accent px-6 py-2 rounded-lg font-medium transition-all duration-300 hover:shadow-lg">
                        <i class="fas fa-truck mr-2"></i>
                        Selesaikan Pesanan
                    </button>
                @elseif($pesanan->status == 'selesai')
                    @if (cekReviews($pesanan->orderProduks->first()->produk_id, $pesanan->id))
                        <button
                            class="btn-outline text-amber-600 hover:bg-amber-50 dark:hover:bg-amber-900/30 px-4 py-2 rounded-lg">
                            <i class="fas fa-star mr-2"></i>
                            Beri Ulasan
                        </button>
                    @endif
                    <button
                        class="btn-accent px-6 py-2 rounded-lg font-medium transition-all duration-300 hover:shadow-lg">
                        <i class="fas fa-check-circle mr-2"></i>
                        Pesanan Selesai
                    </button>
                @elseif($pesanan->status == 'dibatalkan')
                    <button
                        class="btn-accent px-6 py-2 rounded-lg font-medium transition-all duration-300 hover:shadow-lg">
                        <i class="fas fa-times mr-2"></i>
                        Pesanan {{ $pesanan->status }}
                    </button>
                @elseif($pesanan->status == 'ditolak')
                    <button
                        class="btn-accent px-6 py-2 rounded-lg font-medium transition-all duration-300 hover:shadow-lg">
                        <i class="fas fa-times mr-2"></i>
                        Pesanan {{ $pesanan->status }}
                    </button>
                @endif
            </div>
        </div>
    </div>
@endforeach
