@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <!-- Sales Report Management -->
    <div class="mt-8 card rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 bg-white dark:bg-gray-900">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-400">Laporan Penjualan</h3>
            <div class="flex space-x-3">
                <button onclick="exportExcel()"
                    class="btn-outline text-green-600 hover:bg-green-50 dark:hover:bg-green-900/30 px-4 py-2 text-sm">
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
                <div id="statusFilter">
                    <label class="form-label">Status</label>
                    <select class="form-input w-full" id="statusSelect" name="status" required>
                        <option value="">Semua</option>
                        <option value="belum_dibayar">Belum Dibayar</option>
                        <option value="dibayar">Dibayar</option>
                        <option value="diproses">Diproses</option>
                        <option value="ditolak">Ditolak</option>
                        <option value="dikirim">Dikirim</option>
                        <option value="diterima">Diterima</option>
                        <option value="selesai">Selesai</option>
                    </select>
                </div>

                <div class="flex items-end">
                    <button onclick="filterReport()" class="btn-accent w-full px-4 py-2 text-sm">
                        <i class="fas fa-search mr-2"></i>Filter
                    </button>
                </div>
            </div>
        </div>

        <div id="reportContent">

        </div>
    </div>

    <!-- Print Style -->
    <style>
        @media print {
            body * {
                visibility: hidden;
            }

            #reportContent,
            #reportContent * {
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
        // State
        let currentPage = 1;
        let status = '';

        function filterReport() {
            const reportContent = document.getElementById('reportContent');
            reportContent.style.opacity = '0.5';

            status = document.getElementById('statusSelect').value || '';

            setTimeout(() => {
                reportContent.style.opacity = '1';
                loadData(1, status);
            }, 1000);
        }
        // Fungsi Load Data
        function loadData(page = 1, status = '') {
            $.ajax({
                url: `/dashboard?page=${page}&status=${status}`,
                type: 'GET',
                success: function(res) {
                    $('#reportContent').html(res.data.view);
                    $('#paginationLinks').html(res.data.pagination);

                    currentPage = page;
                    status = status;
                },
                error: function() {
                    errorToast('error', 'Gagal memuat data');
                }
            });
        }

        function printReport() {
            // Add print header
            const url =
                `/dashboard/pdf`;
            window.location.href = url;
        }

        function exportExcel() {
            const url =
                `/dashboard/excel`;
            window.location.href = url;
        }

        $(document).ready(function() {

            // Event: Klik link pagination
            $(document).on('click', '.pagination a', function(e) {
                e.preventDefault();

                const href = $(this).attr('href');
                const urlParams = new URLSearchParams(href.split('?')[1]);
                const page = urlParams.get('page') || 1;
                console.log(href, urlParams, page);

                loadData(page, status);

            });

            loadData(currentPage, status);

        });
    </script>
@endsection
