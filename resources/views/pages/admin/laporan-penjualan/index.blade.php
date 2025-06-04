@extends('layouts.app')

@section('title', 'Laporan Penjualan')

@section('content')
    <!-- Sales Report Management -->
    <div class="mt-8 card rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 bg-white dark:bg-gray-900">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-400">Laporan Penjualan</h3>
            <div class="flex space-x-3">
                <button onclick="exportExcel()" class="btn-outline text-green-600 hover:bg-green-50 dark:hover:bg-green-900/30 px-4 py-2 text-sm">
                    <i class="fas fa-file-excel mr-2"></i>Export Excel
                </button>
                <button onclick="printReport()" class="btn-accent px-4 py-2 text-sm font-medium rounded-md">
                    <i class="fas fa-print mr-2"></i>Print Laporan
                </button>
            </div>
        </div>

        <!-- Filter Section -->
        <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4 mb-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div>
                    <label class="form-label">Periode</label>
                    <select id="periodFilter" class="form-input w-full" onchange="updatePeriodInputs()">
                        <option value="weekly">Mingguan</option>
                        <option value="monthly" selected>Bulanan</option>
                        <option value="yearly">Tahunan</option>
                    </select>
                </div>
                
                <!-- Monthly Filter (Default Shown) -->
                <div id="monthlyFilter" class="grid grid-cols-2 gap-2">
                    <div>
                        <label class="form-label">Bulan</label>
                        <select class="form-input w-full">
                            <option value="1">Januari</option>
                            <option value="2">Februari</option>
                            <option value="3" selected>Maret</option>
                            <option value="4">April</option>
                            <option value="5">Mei</option>
                            <option value="6">Juni</option>
                            <option value="7">Juli</option>
                            <option value="8">Agustus</option>
                            <option value="9">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                    </div>
                    <div>
                        <label class="form-label">Tahun</label>
                        <select class="form-input w-full">
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024" selected>2024</option>
                            <option value="2025">2025</option>
                        </select>
                    </div>
                </div>

                <!-- Weekly Filter (Hidden by default) -->
                <div id="weeklyFilter" class="grid grid-cols-2 gap-2 hidden">
                    <div>
                        <label class="form-label">Dari Tanggal</label>
                        <input type="date" class="form-input w-full" value="2024-03-01">
                    </div>
                    <div>
                        <label class="form-label">Sampai Tanggal</label>
                        <input type="date" class="form-input w-full" value="2024-03-07">
                    </div>
                </div>

                <!-- Yearly Filter (Hidden by default) -->
                <div id="yearlyFilter" class="hidden">
                    <label class="form-label">Tahun</label>
                    <select class="form-input w-full">
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024" selected>2024</option>
                        <option value="2025">2025</option>
                    </select>
                </div>

                <div class="flex items-end">
                    <button onclick="filterReport()" class="btn-accent w-full px-4 py-2 text-sm">
                        <i class="fas fa-search mr-2"></i>Filter
                    </button>
                </div>
            </div>
        </div>

        <!-- Summary Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
            <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-4">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-blue-600 dark:text-blue-400 text-sm font-medium">Total Penjualan</p>
                        <p class="text-2xl font-bold text-blue-700 dark:text-blue-300">156</p>
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
                        <p class="text-2xl font-bold text-green-700 dark:text-green-300">Rp 23.450.000</p>
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
                        <p class="text-2xl font-bold text-yellow-700 dark:text-yellow-300">Rp 150.321</p>
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
                        <p class="text-2xl font-bold text-purple-700 dark:text-purple-300">342</p>
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
                    Periode: <strong>Maret 2024</strong>
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
                    <!-- Sample Data Row 1 -->
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-400/80 transition-colors duration-200">
                        <td class="py-3 px-4 font-medium text-gray-900 dark:text-gray-200">1</td>
                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300">01 Mar 2024</td>
                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300 font-mono">INV-2024-001</td>
                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300">Budi Santoso</td>
                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300">Vas Bambu Minimalis</td>
                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300">2</td>
                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300">Rp 125.000</td>
                        <td class="py-3 px-4 font-semibold text-gray-900 dark:text-gray-300">Rp 250.000</td>
                        <td class="py-3 px-4">
                            <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">Selesai</span>
                        </td>
                    </tr>

                    <!-- Sample Data Row 2 -->
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-400/80 transition-colors duration-200">
                        <td class="py-3 px-4 font-medium text-gray-900 dark:text-gray-200">2</td>
                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300">02 Mar 2024</td>
                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300 font-mono">INV-2024-002</td>
                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300">Siti Nurhaliza</td>
                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300">Tas Rajut Etnik</td>
                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300">1</td>
                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300">Rp 180.000</td>
                        <td class="py-3 px-4 font-semibold text-gray-900 dark:text-gray-300">Rp 180.000</td>
                        <td class="py-3 px-4">
                            <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">Selesai</span>
                        </td>
                    </tr>

                    <!-- Sample Data Row 3 -->
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-400/80 transition-colors duration-200">
                        <td class="py-3 px-4 font-medium text-gray-900 dark:text-gray-200">3</td>
                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300">03 Mar 2024</td>
                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300 font-mono">INV-2024-003</td>
                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300">Ahmad Wijaya</td>
                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300">Hiasan Dinding Kayu</td>
                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300">3</td>
                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300">Rp 95.000</td>
                        <td class="py-3 px-4 font-semibold text-gray-900 dark:text-gray-300">Rp 285.000</td>
                        <td class="py-3 px-4">
                            <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">Selesai</span>
                        </td>
                    </tr>

                    <!-- Sample Data Row 4 -->
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-400/80 transition-colors duration-200">
                        <td class="py-3 px-4 font-medium text-gray-900 dark:text-gray-200">4</td>
                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300">05 Mar 2024</td>
                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300 font-mono">INV-2024-004</td>
                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300">Dewi Kartika</td>
                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300">Keramik Hias Batik</td>
                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300">4</td>
                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300">Rp 75.000</td>
                        <td class="py-3 px-4 font-semibold text-gray-900 dark:text-gray-300">Rp 300.000</td>
                        <td class="py-3 px-4">
                            <span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs">Pending</span>
                        </td>
                    </tr>

                    <!-- Sample Data Row 5 -->
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-400/80 transition-colors duration-200">
                        <td class="py-3 px-4 font-medium text-gray-900 dark:text-gray-200">5</td>
                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300">07 Mar 2024</td>
                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300 font-mono">INV-2024-005</td>
                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300">Rendra Pratama</td>
                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300">Lampu Hias Rotan</td>
                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300">2</td>
                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300">Rp 220.000</td>
                        <td class="py-3 px-4 font-semibold text-gray-900 dark:text-gray-300">Rp 440.000</td>
                        <td class="py-3 px-4">
                            <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">Selesai</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Summary Footer -->
        <div class="mt-6 bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">
                <div>
                    <p class="text-gray-500 dark:text-gray-400">Total Transaksi:</p>
                    <p class="text-lg font-semibold text-gray-900 dark:text-gray-200">156 Transaksi</p>
                </div>
                <div>
                    <p class="text-gray-500 dark:text-gray-400">Total Kuantitas:</p>
                    <p class="text-lg font-semibold text-gray-900 dark:text-gray-200">342 Items</p>
                </div>
                <div>
                    <p class="text-gray-500 dark:text-gray-400">Total Pendapatan:</p>
                    <p class="text-2xl font-bold text-green-600 dark:text-green-400">Rp 23.450.000</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Print Style -->
    <style>
        @media print {
            body * {
                visibility: hidden;
            }
            #reportContent, #reportContent * {
                visibility: visible;
            }
            #reportContent {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
            }
            
            .print-header {
                display: block !important;
                text-align: center;
                margin-bottom: 20px;
                border-bottom: 2px solid #000;
                padding-bottom: 10px;
            }
            
            .print-summary {
                display: block !important;
                margin-top: 20px;
                border-top: 1px solid #000;
                padding-top: 10px;
            }
            
            .no-print {
                display: none !important;
            }
        }
        
        .print-only {
            display: none;
        }
        
        @media print {
            .print-only {
                display: block !important;
            }
        }
    </style>

    <script>
        function updatePeriodInputs() {
            const period = document.getElementById('periodFilter').value;
            const monthlyFilter = document.getElementById('monthlyFilter');
            const weeklyFilter = document.getElementById('weeklyFilter');
            const yearlyFilter = document.getElementById('yearlyFilter');
            
            // Hide all filters
            monthlyFilter.classList.add('hidden');
            weeklyFilter.classList.add('hidden');
            yearlyFilter.classList.add('hidden');
            
            // Show selected filter
            if (period === 'monthly') {
                monthlyFilter.classList.remove('hidden');
            } else if (period === 'weekly') {
                weeklyFilter.classList.remove('hidden');
            } else if (period === 'yearly') {
                yearlyFilter.classList.remove('hidden');
            }
        }

        function filterReport() {
            // Implementasi filter report
            const period = document.getElementById('periodFilter').value;
            console.log('Filtering report for period:', period);
            
            // Simulasi loading
            const reportContent = document.getElementById('reportContent');
            reportContent.style.opacity = '0.5';
            
            setTimeout(() => {
                reportContent.style.opacity = '1';
                alert('Data laporan berhasil difilter!');
            }, 1000);
        }

        function printReport() {
            // Add print header
            const printHeader = document.createElement('div');
            printHeader.className = 'print-only print-header';
            printHeader.innerHTML = `
                <h1 style="margin: 0; font-size: 24px; font-weight: bold;">LAPORAN PENJUALAN</h1>
                <h2 style="margin: 5px 0; font-size: 18px;">Toko Kerajinan Nusantara</h2>
                <p style="margin: 5px 0;">Periode: Maret 2024</p>
                <p style="margin: 5px 0;">Dicetak pada: ${new Date().toLocaleDateString('id-ID')}</p>
            `;
            
            // Add print summary
            const printSummary = document.createElement('div');
            printSummary.className = 'print-only print-summary';
            printSummary.innerHTML = `
                <div style="display: flex; justify-content: space-between; margin-top: 20px;">
                    <div>Total Transaksi: <strong>156</strong></div>
                    <div>Total Items: <strong>342</strong></div>
                    <div>Total Pendapatan: <strong>Rp 23.450.000</strong></div>
                </div>
            `;
            
            const reportContent = document.getElementById('reportContent');
            reportContent.insertBefore(printHeader, reportContent.firstChild);
            reportContent.appendChild(printSummary);
            
            // Print
            window.print();
            
            setTimeout(() => {
                printHeader.remove();
                printSummary.remove();
            }, 1000);
        }

        function exportExcel() {
            // Implementasi export Excel
            alert('Fitur export Excel akan segera tersedia!');
        }

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            updatePeriodInputs();
        });
    </script>
@endsection