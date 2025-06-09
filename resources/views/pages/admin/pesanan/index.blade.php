@extends('layouts.app')

@section('title', 'Manajemen Pesanan')

@section('content')
    <div class="mt-8 card rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 bg-white dark:bg-gray-900">
        <div class="flex items-center justify-between mb-5">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-400">Daftar Orderan</h3>
            <div class="flex items-center space-x-3">
                <!-- Filter Status -->
                <select class="form-input text-sm px-3 py-2 rounded-md border border-gray-300">
                    <option value="">Semua Status</option>
                    <option value="belum_bayar">Belum Dibayar</option>
                    <option value="dibayar">Dibayar</option>
                    <option value="diproses">Diproses</option>
                    <option value="ditolak">Ditolak</option>
                    <option value="dikirim">Dikirim</option>
                    <option value="sampai">Sampai Lokasi</option>
                </select>
            </div>
        </div>

        <div class="overflow-x-auto rounded-lg">
            <table class="w-full text-sm text-left whitespace-nowrap">
                <thead>
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <th class="text-left py-3 px-4 font-medium text-gray-600 dark:text-gray-400">No Order</th>
                        <th class="text-left py-3 px-4 font-medium text-gray-600 dark:text-gray-400">Nama Produk</th>
                        <th class="text-left py-3 px-4 font-medium text-gray-600 dark:text-gray-400">Kuantitas</th>
                        <th class="text-left py-3 px-4 font-medium text-gray-600 dark:text-gray-400">Total Harga</th>
                        <th class="text-left py-3 px-4 font-medium text-gray-600 dark:text-gray-400">Status</th>
                        <th class="text-left py-3 px-4 font-medium text-gray-600 dark:text-gray-400">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-400/80 transition-colors duration-200">
                        <td class="py-3 px-4 font-medium text-gray-900 dark:text-gray-200">ORD001</td>
                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300 font-medium">Kerajinan Kayu Ukir Naga</td>
                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300">100 pcs</td>
                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300 font-semibold">Rp 1.450.000</td>
                        <td class="py-3 px-4">
                            <span class="px-3 py-1 rounded-full text-sm text-white status-ditolak">Ditolak</span>
                        </td>
                        <td class="py-3 px-4 text-center">
                            <div class="inline-flex space-x-2">
                                <button onclick="openDetailModal(1)"
                                    class="btn-outline text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-900/30">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button onclick="openStatusModal(1)"
                                    class="btn-outline text-green-600 hover:bg-green-50 dark:hover:bg-green-900/30">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-400/80 transition-colors duration-200">
                        <td class="py-3 px-4 font-medium text-gray-900 dark:text-gray-200">ORD001</td>
                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300 font-medium">Kerajinan Kayu Ukir Naga</td>
                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300">2 pcs</td>
                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300 font-semibold">Rp 450.000</td>
                        <td class="py-3 px-4">
                            <span class="px-3 py-1 rounded-full text-sm text-white status-dibayar">Dibayar</span>
                        </td>
                        <td class="py-3 px-4 text-center">
                            <div class="inline-flex space-x-2">
                                <button onclick="openDetailModal(1)"
                                    class="btn-outline text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-900/30">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button onclick="openStatusModal(1)"
                                    class="btn-outline text-green-600 hover:bg-green-50 dark:hover:bg-green-900/30">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-400/80 transition-colors duration-200">
                        <td class="py-3 px-4 font-medium text-gray-900 dark:text-gray-200">ORD002</td>
                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300 font-medium">Batik Handmade Motif Parang</td>
                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300">1 pcs</td>
                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300 font-semibold">Rp 280.000</td>
                        <td class="py-3 px-4">
                            <span class="px-3 py-1 rounded-full text-sm text-white status-diproses">Diproses</span>
                        </td>
                        <td class="py-3 px-4 text-center">
                            <div class="inline-flex space-x-2">
                                <button onclick="openDetailModal(2)"
                                    class="btn-outline text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-900/30">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button onclick="openStatusModal(2)"
                                    class="btn-outline text-green-600 hover:bg-green-50 dark:hover:bg-green-900/30">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-400/80 transition-colors duration-200">
                        <td class="py-3 px-4 font-medium text-gray-900 dark:text-gray-200">ORD003</td>
                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300 font-medium">Tenun Tradisional Songket</td>
                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300">3 pcs</td>
                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300 font-semibold">Rp 750.000</td>
                        <td class="py-3 px-4">
                            <span class="px-3 py-1 rounded-full text-sm text-white status-belum-bayar">Belum Bayar</span>
                        </td>
                        <td class="py-3 px-4 text-center">
                            <div class="inline-flex space-x-2">
                                <button onclick="openDetailModal(3)"
                                    class="btn-outline text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-900/30">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button onclick="openStatusModal(3)"
                                    class="btn-outline text-green-600 hover:bg-green-50 dark:hover:bg-green-900/30">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-400/80 transition-colors duration-200">
                        <td class="py-3 px-4 font-medium text-gray-900 dark:text-gray-200">ORD004</td>
                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300 font-medium">Keramik Hias Tradisional</td>
                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300">1 set</td>
                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300 font-semibold">Rp 320.000</td>
                        <td class="py-3 px-4">
                            <span class="px-3 py-1 rounded-full text-sm text-white status-dikirim">Dikirim</span>
                        </td>
                        <td class="py-3 px-4 text-center">
                            <div class="inline-flex space-x-2">
                                <button onclick="openDetailModal(4)"
                                    class="btn-outline text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-900/30">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button onclick="openStatusModal(4)"
                                    class="btn-outline text-green-600 hover:bg-green-50 dark:hover:bg-green-900/30">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-400/80 transition-colors duration-200">
                        <td class="py-3 px-4 font-medium text-gray-900 dark:text-gray-200">ORD004</td>
                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300 font-medium">Keramik Hias Tradisional</td>
                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300">1 set</td>
                        <td class="py-3 px-4 text-gray-700 dark:text-gray-300 font-semibold">Rp 320.000</td>
                        <td class="py-3 px-4">
                            <span class="px-3 py-1 rounded-full text-sm text-white status-sampai">Diterima</span>
                        </td>
                        <td class="py-3 px-4 text-center">
                            <div class="inline-flex space-x-2">
                                <button onclick="openDetailModal(4)"
                                    class="btn-outline text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-900/30">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button onclick="openStatusModal(4)"
                                    class="btn-outline text-green-600 hover:bg-green-50 dark:hover:bg-green-900/30">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function openDetailModal(id) {
            // Di sini bisa fetch data orderan berdasarkan ID
            openModal('detailModal');
        }

        function openStatusModal(id) {
            // Di sini bisa fetch current status berdasarkan ID
            openModal('statusModal');
        }

        function openModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.add('show');
            }, 10);
            document.body.style.overflow = 'hidden';
        }

        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.remove('show');
            setTimeout(() => {
                modal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }, 300);
        }

        function saveResi() {
            const resiValue = document.getElementById('resiInput').value;
            if (resiValue.trim() === '') {
                alert('Mohon masukkan nomor resi!');
                return;
            }
            // Implementasi save resi
            alert('Nomor resi berhasil disimpan!');
        }

        // Status change handler
        document.getElementById('statusSelect').addEventListener('change', function() {
            const status = this.value;
            const resiSection = document.getElementById('resiSection');
            const rejectSection = document.getElementById('rejectSection');

            // Hide all sections first
            resiSection.style.display = 'none';
            rejectSection.style.display = 'none';

            // Show relevant section based on status
            if (status === 'dikirim') {
                resiSection.style.display = 'block';
            } else if (status === 'ditolak') {
                rejectSection.style.display = 'block';
            }
        });

        // Form Submissions
        document.getElementById('statusForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const status = document.getElementById('statusSelect').value;

            if (status === 'dikirim') {
                const resi = document.getElementById('resiNumber').value;
                if (resi.trim() === '') {
                    alert('Mohon masukkan nomor resi untuk status dikirim!');
                    return;
                }
            }

            // Implementasi update status
            alert('Status orderan berhasil diupdate!');
            closeModal('statusModal');

            // Refresh halaman atau update UI
            location.reload();
        });

        // Tutup modal klik diluar
        document.querySelectorAll('.modal').forEach(modal => {
            modal.addEventListener('click', function(e) {
                if (e.target === this) {
                    closeModal(this.id);
                }
            });
        });

        // Tutup modal klik ESC
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                const openModal = document.querySelector('.modal.show');
                if (openModal) {
                    closeModal(openModal.id);
                }
            }
        });
    </script>
@endsection
