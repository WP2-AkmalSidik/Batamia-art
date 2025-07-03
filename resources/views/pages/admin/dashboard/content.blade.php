<!-- Summary Cards -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6" id="summaryCards">
    <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-4">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-blue-600 dark:text-blue-400 text-sm font-medium">Total Penjualan</p>
                <p class="text-2xl font-bold text-blue-700 dark:text-blue-300">{{ $totalPenjualan }}</p>
            </div>
            <div class="w-12 h-12 bg-blue-100 dark:bg-blue-800 rounded-lg flex items-center justify-center">
                <i class="fas fa-shopping-cart text-blue-600 dark:text-blue-400"></i>
            </div>
        </div>
    </div>

    <div class="bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-lg p-4">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-green-600 dark:text-green-400 text-sm font-medium">Total Pendapatan</p>
                <p class="text-2xl font-bold text-green-700 dark:text-green-300">{{ format_rp($totalPemasukan) }}</p>
            </div>
            <div class="w-12 h-12 bg-green-100 dark:bg-green-800 rounded-lg flex items-center justify-center">
                <i class="fas fa-money-bill-wave text-green-600 dark:text-green-400"></i>
            </div>
        </div>
    </div>

    <div class="bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-800 rounded-lg p-4">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-yellow-600 dark:text-yellow-400 text-sm font-medium">Rata-rata Penjualan</p>
                <p class="text-2xl font-bold text-yellow-700 dark:text-yellow-300">
                    {{ format_rp($averagePemasukanPerTransaksi) }}</p>
            </div>
            <div class="w-12 h-12 bg-yellow-100 dark:bg-yellow-800 rounded-lg flex items-center justify-center">
                <i class="fas fa-chart-line text-yellow-600 dark:text-yellow-400"></i>
            </div>
        </div>
    </div>

    <div class="bg-purple-50 dark:bg-purple-900/20 border border-purple-200 dark:border-purple-800 rounded-lg p-4">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-purple-600 dark:text-purple-400 text-sm font-medium">Produk Terjual</p>
                <p class="text-2xl font-bold text-purple-700 dark:text-purple-300">{{ $totalProdukTerjual }}</p>
            </div>
            <div class="w-12 h-12 bg-purple-100 dark:bg-purple-800 rounded-lg flex items-center justify-center">
                <i class="fas fa-box text-purple-600 dark:text-purple-400"></i>
            </div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
    <div class="bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-lg p-4">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-red-600 dark:text-red-400 text-sm font-medium">Total Pesanan Dibatalkan/Ditolak</p>
                <p class="text-2xl font-bold text-red-700 dark:text-red-300">{{ $totalProdukDibatalkan }}</p>
            </div>
            <div class="w-12 h-12 bg-red-100 dark:bg-red-800 rounded-lg flex items-center justify-center">
                <i class="fas fa-shopping-cart text-red-600 dark:text-red-400"></i>
            </div>
        </div>
    </div>

    <div class="bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-lg p-4">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-green-600 dark:text-green-400 text-sm font-medium">Total Pesanan Diproses</p>
                <p class="text-2xl font-bold text-green-700 dark:text-green-300">{{ $totalProdukDiproses }}</p>
            </div>
            <div class="w-12 h-12 bg-green-100 dark:bg-green-800 rounded-lg flex items-center justify-center">
                <i class="fas fa-money-bill-wave text-green-600 dark:text-green-400"></i>
            </div>
        </div>
    </div>

    <div class="bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-800 rounded-lg p-4">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-yellow-600 dark:text-yellow-400 text-sm font-medium">Total Pesanan Dibayar</p>
                <p class="text-2xl font-bold text-yellow-700 dark:text-yellow-300">
                    {{ $totalProdukDibayar }}</p>
            </div>
            <div class="w-12 h-12 bg-yellow-100 dark:bg-yellow-800 rounded-lg flex items-center justify-center">
                <i class="fas fa-chart-line text-yellow-600 dark:text-yellow-400"></i>
            </div>
        </div>
    </div>

    <div class="bg-purple-50 dark:bg-purple-900/20 border border-purple-200 dark:border-purple-800 rounded-lg p-4">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-purple-600 dark:text-purple-400 text-sm font-medium">Total Pesanan Dikirim</p>
                <p class="text-2xl font-bold text-purple-700 dark:text-purple-300">{{ $totalProdukDikirim }}</p>
            </div>
            <div class="w-12 h-12 bg-purple-100 dark:bg-purple-800 rounded-lg flex items-center justify-center">
                <i class="fas fa-box text-purple-600 dark:text-purple-400"></i>
            </div>
        </div>
    </div>
</div>

<!-- Report Period Info -->
<div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-3 mb-4">
    <div class="flex items-center justify-between text-sm">
        <span class="text-gray-600 dark:text-gray-400">
            <i class="fas fa-calendar-alt mr-2"></i>
            Periode: <strong>{{ getNamaBulan($bulanIni) }} {{ $tahunIni }}</strong>
        </span>
        <span class="text-gray-600 dark:text-gray-400">
            <i class="fas fa-clock mr-2"></i>
            Dibuat: <strong>{{ date('d M Y H:i') }}</strong>
        </span>
    </div>
</div>

<!-- Sales Report Table -->
<div id="reportContent" class="overflow-x-auto rounded-lg">
    <table class="w-full text-sm text-left whitespace-nowrap">
        <thead>
            <tr class="border-b border-gray-200 dark:border-gray-700">
                <th class="text-left py-3 px-4 font-medium text-gray-600 dark:text-gray-400">#</th>
                <th class="text-left py-3 px-4 font-medium text-gray-600 dark:text-gray-400">Tanggal</th>
                <th class="text-left py-3 px-4 font-medium text-gray-600 dark:text-gray-400">No. Invoice</th>
                <th class="text-left py-3 px-4 font-medium text-gray-600 dark:text-gray-400">Pelanggan</th>
                <th class="text-left py-3 px-4 font-medium text-gray-600 dark:text-gray-400">Produk</th>
                <th class="text-left py-3 px-4 font-medium text-gray-600 dark:text-gray-400">Qty</th>
                <th class="text-left py-3 px-4 font-medium text-gray-600 dark:text-gray-400">Harga Satuan</th>
                <th class="text-left py-3 px-4 font-medium text-gray-600 dark:text-gray-400">Total</th>
                <th class="text-left py-3 px-4 font-medium text-gray-600 dark:text-gray-400">Status</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
            @php
                $barisKe = ($orders->currentPage() - 1) * $orders->perPage();
                $no = $barisKe + 1;
                $totalPendafaran = 0;
            @endphp

            @foreach ($orders as $order)
                @foreach ($order->orderProduks as $produk)
                    @php
                        $totalPendafaran += $produk->kuantitas * $produk->produk->harga;
                    @endphp
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-400/80 transition-colors duration-200">
                        <td class="py-3 px-4 font-medium text-gray-900 dark:text-gray-200">
                            {{ $no++ }}
                        </td>
                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300">
                            {{ $order->created_at->format('d M Y') }}
                        </td>
                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300 font-medium">
                            {{ $order->invoice }}</td>
                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300">{{ $order->alamat->user->nama }}</td>
                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300">{{ $produk->produk->nama }}</td>
                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300">{{ $produk->kuantitas }}</td>
                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300 text-right">
                            {{ format_rp($produk->produk->harga) }}</td>
                        <td class="py-3 px-4 font-semibold text-gray-900 dark:text-gray-300 text-right">
                            {{ format_rp($produk->kuantitas * $produk->produk->harga) }}
                        </td>
                        <td class="py-3 px-4">
                            <span
                                class="px-2 py-1 status-{{ $order->status == 'belum_dibayar' ? 'belum-bayar' : $order->status }} rounded-full text-xs">
                                {{ toTitleCase($order->status) }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>


    </table>
    <div id="paginationLinks">
        {!! $orders->withQueryString()->links() !!}
    </div>
</div>

<!-- Summary Footer -->
<div class="mt-6 bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">
        <div>
            <p class="text-gray-500 dark:text-gray-400">Total Transaksi:</p>
            <p class="text-lg font-semibold text-gray-900 dark:text-gray-200">{{ $totalTransaksi }} Transaksi</p>
        </div>
        <div>
            <p class="text-gray-500 dark:text-gray-400">Total Kuantitas:</p>
            <p class="text-lg font-semibold text-gray-900 dark:text-gray-200">
                {{ $totalKuantitasProduk }}
                Item</p>
        </div>
        <div>
            <p class="text-gray-500 dark:text-gray-400">Total Pendapatan:</p>
            <p class="text-2xl font-bold text-green-600 dark:text-green-400">{{ format_rp($totalPemasukan) }}</p>
        </div>
    </div>
</div>
