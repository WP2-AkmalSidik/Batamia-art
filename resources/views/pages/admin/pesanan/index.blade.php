@extends('layouts.app')

@section('title', 'Manajemen Pesanan')

@section('content')
    <div class="mt-8 card rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 bg-white dark:bg-gray-900">
        <div class="flex items-center justify-between mb-5">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-400">Daftar Orderan</h3>
            <div class="flex items-center space-x-3">
                <!-- Filter Status -->
                <select class="form-input text-sm px-3 py-2 rounded-md border border-gray-300" id="statusFilter">
                    <option value="">Semua Status</option>
                    <option value="belum_bayar">Belum Dibayar</option>
                    <option value="dibayar">Dibayar</option>
                    <option value="dibatalkan">Dibatalkan</option>
                    <option value="diproses">Diproses</option>
                    <option value="ditolak">Ditolak</option>
                    <option value="dikirim">Dikirim</option>
                    <option value="diterima">Diterima</option>
                </select>
            </div>
        </div>

        <div class="overflow-x-auto rounded-lg" id="table-pesanan">

        </div>
    </div>
    @include('pages.admin.pesanan.components.modal')
    <script>
        function openDetailModal(id) {
            initDetailModal({
                modalId: 'detailModal',
                endpoint: `admin/pesanan/${id}`,
                fields: [],
                callback: function(data) {
                    console.log(data);
                    // Update order information
                    $('#detailModal h3').text(`Order #${data.id}`);
                    $('#detailModal p.text-sm').text(formatTanggal(data.created_at));

                    const produkContainer = $('#produk-container');
                    const produkTemplate = $('.produk-template').clone().removeClass('produk-template hidden');

                    // Kosongkan container produk
                    produkContainer.empty();

                    // Asumsi data.items adalah array dari produk dalam pesanan
                    data.order_produks.forEach(item => {
                        const produkElement = produkTemplate.clone();

                        // Isi data produk
                        const product = item.produk; // Asumsi struktur data produk
                        const imageUrl = product.image.startsWith('http') ?
                            product.image :
                            `{{ asset('storage') }}/${product.image}`;

                        produkElement.find('.produk-image').attr('src', imageUrl);
                        produkElement.find('.produk-nama').text(item.produk.nama);
                        produkElement.find('.produk-kuantitas').text(`${item.kuantitas} pcs`);
                        produkElement.find('.produk-harga').text(formatRupiah(product.harga));
                        produkElement.find('.produk-subtotal').text(formatRupiah(product.harga * item
                            .kuantitas));

                        // Tambahkan ke container
                        produkContainer.append(produkElement);
                    });

                    // Jika tidak ada produk, tampilkan pesan
                    if (data.order_produks.length === 0) {
                        produkContainer.html(
                            '<p class="text-gray-500 dark:text-gray-400 text-center py-4">Tidak ada produk dalam pesanan ini</p>'
                        );
                    }
                    // Update customer information
                    $('#detail-user-nama').text(data.user.nama);
                    $('#detail-user-email').text(data.user.email);
                    $('#detail-user-telepon').text(data.alamat.nomor_hp || '-');
                    $('#detail-user-alamat').text(data.alamat.alamat_lengkap || '-');

                    // Update shipping information
                    $('#detail-kurir').text(`${data.kurir}`);
                    $('#detail-estimasi').text(data.etd || '-');
                    $('#resiInput').val(data.no_resi || '');
                    $('#orderIdUpdate').val(data.id || '');

                    // Update payment status and total
                    $('#detail-status').text(data.status);
                    $('#detail-total-harga').text(formatRupiah(data.total_harga));

                    // Update payment proof information
                    $('#detail-bank').text(data.bank.nama_bank || '-');
                    $('#detail-ket').text(data.ket || '-');
                    $('#detail-estimasi').text(data.etd || '-');
                    $('#detail-no-rekening').text(data.bank.no_akun || '-');
                    $('#bukti-transfer').attr('src', `{{ asset('storage/') }}/${data.bukti_pembayaran}`);
                    console.log(data.bank.nama_bank, 'console.log bank.nama_bank')
                    console.log(data.bank.no_akun, 'console.log bank.no_akun')
                    console.log(`{{ asset('storage/') }}/${data.bukti_pembayaran}`)
                    $('#detail-jumlah').text(formatRupiah(data.total_harga));
                    $('#detail-tanggal-transfer').text(data.tanggal_transfer ?
                        formatTanggal(data.tanggal_transfer) : '-');

                    $('#resiInput').val(data.resi || '');

                    // Update created/updated dates if needed
                    $('#created_at-detail').text(formatTanggal(data.created_at));
                    $('#updated_at-detail').text(formatTanggal(data.updated_at));
                }
            });
            openModal('detailModal');
        }

        function openStatusModal(id) {
            initEditModal({
                modalId: 'statusModal',
                endpoint: `admin/pesanan/${id}`,
                fields: ['status'],
                callback: function(data) {
                    const status = data.status;
                    $('#statusSelect').val(status);
                    $('#statusForm').data('id', id);
                }
            });
            openModal('statusModal');
        }

        function saveResi() {
            const id = $('#orderIdUpdate').val()
            console.log(id);
            const url = '/admin/pesanan/' + id + '/resi';
            const data = {
                status: 'dikirim',
                resi: $('#resiInput').val(),
                id: id
            };

            const _method = 'POST';

            ajaxCall(url, _method, data, function(response) {
                successToast(response);
                closeModal('detailModal');
                // loadData(currentPage, currentQuery, currentStatus);
            }, function(error) {
                errorToast(error);
            });
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
        $(document).ready(function() {
            console.log('ready')
            // Debounce untuk search input
            let debounceTimeout;
            const debounceDelay = 500;

            // State
            let currentPage = 1;
            let currentQuery = '';
            let currentStatus = '';
            console.log(currentPage, currentQuery, currentStatus);

            // Fungsi Load Data
            function loadData(page = 1, query = '', status = currentStatus) {
                $.ajax({
                    url: `/admin/pesanan?page=${page}&search=${encodeURIComponent(query)}&status=${encodeURIComponent(status)}`,
                    type: 'GET',
                    success: function(res) {
                        $('#table-pesanan').html(res.data.view);
                        $('#paginationLinks').html(res.data.pagination);

                        currentPage = page;
                        currentQuery = query;
                        currentStatus = status;
                    },
                    error: function() {
                        showToast('error', 'Gagal memuat data.');
                    }
                });
            }

            $(document).on('submit', '#statusForm', function(e) {
                e.preventDefault();

                const formData = new FormData(this);
                const id = $(this).data('id');

                for (let [key, value] of formData.entries()) {
                    console.log(`${key}: ${value}`);
                }

                formData.append('_method', 'PUT');

                const successCallback = function(response) {
                    successToast(response);
                    closeModal("statusModal");
                    loadData(currentPage, currentQuery, currentStatus);
                };

                const errorCallback = function(error) {
                    errorToast(error)
                };

                ajaxCall(`/admin/pesanan/${id}/status`, 'POST', formData, successCallback, errorCallback);
            });

            // Event: Search input (debounced)
            $('#searchInput').on('keyup', function() {
                clearTimeout(debounceTimeout);

                const query = $(this).val();
                currentQuery = query;

                debounceTimeout = setTimeout(() => {
                    loadData(1, currentQuery, currentStatus); // reset ke page 1 saat search
                }, debounceDelay);
            });

            $('#statusFilter').on('change', function() {
                const status = $(this).val();
                console.log(status);
                currentStatus = status;
                loadData(1, currentQuery, status);
            });

            // Event: Klik link pagination
            $(document).on('click', '.pagination a', function(e) {
                e.preventDefault();

                const href = $(this).attr('href');
                const urlParams = new URLSearchParams(href.split('?')[1]);
                const page = urlParams.get('page') || 1;
                console.log(href, urlParams, page);

                loadData(page, currentQuery, currentStatus);
            });

            loadData(currentPage, currentQuery, currentStatus);
        });
    </script>
@endsection
