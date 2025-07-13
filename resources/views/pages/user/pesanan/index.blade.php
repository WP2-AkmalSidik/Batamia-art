@extends('layouts.app')

@section('title', 'Pesanan Saya')

@section('content')
    <div class="mt-8 space-y-6">
        <!-- Header Section -->
        <div class="card rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 bg-white dark:bg-gray-900">
            <div class="flex items-center justify-between mb-2">
                <h1 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">Pesanan Saya</h1>
                <div class="flex items-center space-x-3">
                    <select class="form-input text-sm px-3 py-2 rounded-md border border-gray-300 dark:border-gray-600"
                        id="statusFilter">
                        <option value="">Semua Status</option>
                        <option value="belum_dibayar">Menunggu Pembayaran</option>
                        <option value="dibayar">Dibayar</option>
                        <option value="dikirim">Dikirim</option>
                        <option value="selesai">Selesai</option>
                        <option value="dibatalkan">Dibatalkan</option>
                    </select>
                </div>
            </div>
            <p class="text-gray-600 dark:text-gray-400">Kelola dan pantau status pesanan Anda</p>
        </div>

        <!-- Order Cards -->
        <div class="space-y-4" id="card-container">

        </div>

        <div class="text-center mt-15">
            <button
                class="border-2 border-amber-500 text-amber-500 hover:bg-amber-500 hover:text-white px-6 py-3 text-sm font-medium rounded-xl transition-colors duration-200"
                id="loadMoreBtn">
                <i class="fas fa-plus mr-2"></i>Muat Lebih Banyak
            </button>
        </div>
    </div>

    @include('pages.user.pesanan.modal')

@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            let debounceTimeout;
            const debounceDelay = 500;

            let currentPage = 1;
            let currentStatus = '';
            let isLoading = false;
            let hasMore = true;

            function resetFilterState() {
                currentPage = 1;
                hasMore = true;
                $('#card-container').html('');
                $('#loadMoreBtn').show();
            }

            function loadData(page = 1, status = currentStatus, append = false) {
                console.log('load data di panggil', isLoading, append, hasMore)
                if (isLoading || (!append && !hasMore)) return;

                isLoading = true;
                console.log(isLoading)
                $('#loadMoreBtn').prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Loading...');

                const params = {
                    page: page,
                    status: status,
                };

                const queryString = $.param(params);

                $.get(`/pesanan?${queryString}`, function(res) {

                    if (!res.success || !res.data) {
                        showToast('error', 'Gagal memuat data');
                        return;
                    }

                    if (append) {
                        $('#card-container').append(res.data.view);
                        console.log('append data')
                    } else {
                        $('#card-container').html(res.data.view);
                        console.log('! append data')
                    }

                    hasMore = res.data.has_more;
                    currentPage = page;
                    currentStatus = status;

                    $('#loadMoreBtn').toggle(hasMore)
                        .prop('disabled', false)
                        .html('<i class="fas fa-plus mr-2"></i>Muat Lebih Banyak');

                    if (!append && $('#card-container').children().length === 0) {
                        $('#card-container').html(
                            '<div class="text-center py-8">Tidak ada pesanan yang ditemukan</div>');
                    }

                    isLoading = false;
                    console.log(isLoading)

                }).fail(function(xhr) {
                    console.error('Error:', xhr.responseText);
                    showToast('error', 'Gagal memuat data');
                    isLoading = false;
                    console.log(isLoading)

                }).always(function() {
                    isLoading = false;
                    console.log(isLoading)

                });
            }

            // Event filter
            $('#filterStatus').on('change', function() {
                currentStatus = $(this).val();
                resetFilterState();
                loadData();
            });

            // Load more
            $('#loadMoreBtn').on('click', function() {
                loadData(currentPage + 1, currentStatus, true);
            });

            // Upload bukti
            $(document).on('submit', '#paymentForm', function(e) {
                e.preventDefault();

                const file = $('#bukti_pembayaran').prop('files')[0];
                if (!file) {
                    showToast('error', 'Mohon pilih file bukti pembayaran!');
                    return;
                }

                const url = '{{ route('pesanan.update.pembayaran') }}';
                const formData = new FormData(this);

                ajaxCall(url, 'POST', formData, function(res) {
                    successToast(res);
                    resetFilterState()
                    loadData();
                    closeModal('uploadModal');
                }, function(err) {
                    errorToast(err);
                });
            });

            // Batalkan pesanan
            $(document).on('submit', '#cancelForm', function(e) {
                e.preventDefault();

                const url = '{{ route('pesanan.update.cancel') }}';
                const formData = new FormData(this);

                ajaxCall(url, 'POST', formData, function(res) {
                    successToast(res);
                    resetFilterState()
                    loadData();
                    closeModal('cancelModal');
                }, function(err) {
                    errorToast(err);
                });
            });

            // Tandai selesai
            $(document).on('submit', '#form-selesai', function(e) {
                e.preventDefault();

                const id = $(this).attr('data-id'); // gunakan attr, bukan data()

                const url = `/pesanan/${id}/selesai`;
                const data = {
                    _method: 'PUT'
                };

                ajaxCall(url, 'POST', data, function(res) {
                    successToast(res);
                    closeModal('modal-selesai');
                    console.log(isLoading)
                    resetFilterState()
                    loadData();
                }, function(err) {
                    errorToast(err);
                });
            });

            // Upload preview
            $('#bukti_pembayaran').on('change', function() {
                const file = this.files[0];
                if (file) {
                    $('#fileName').text(file.name);
                    $('#filePreview').removeClass('hidden');
                } else {
                    $('#filePreview').addClass('hidden');
                }
            });

            // Modal: buka
            window.openUploadModal = function(orderId, totalHarga) {
                $('#modalOrderId').val(orderId);
                $('#modalOrderTotal').text(totalHarga);
                $('#uploadModal').removeClass('hidden');
                setTimeout(() => $('#uploadModal').addClass('show'), 10);
                $('body').css('overflow', 'hidden');
            };

            window.openCancelModal = function(orderId) {
                $('#cancelOrderId').val(orderId);
                $('#cancelModal').removeClass('hidden');
                setTimeout(() => $('#cancelModal').addClass('show'), 10);
                $('body').css('overflow', 'hidden');
            };

            window.openSelesaiModal = function(id, invoice) {
                $('#invoice-pesanan').text(invoice);
                $('#form-selesai').attr('data-id', id);
                $('#modal-selesai').removeClass('hidden');
                setTimeout(() => $('#modal-selesai').addClass('show'), 10);
                $('body').css('overflow', 'hidden');
            };

            window.closeModal = function(modalId) {
                const $modal = $('#' + modalId);
                $modal.removeClass('show');
                setTimeout(() => {
                    $modal.addClass('hidden');
                    $('body').css('overflow', 'auto');
                }, 300);

                if (modalId === 'uploadModal') {
                    $('#paymentForm')[0].reset();
                    $('#filePreview').addClass('hidden');
                }
            };

            // Close modal saat klik luar
            $('.modal').on('click', function(e) {
                if (e.target === this) {
                    closeModal(this.id);
                }
            });

            // Close ESC
            $(document).on('keydown', function(e) {
                if (e.key === 'Escape') {
                    const openModal = $('.modal.show').first();
                    if (openModal.length) {
                        closeModal(openModal.attr('id'));
                    }
                }
            });

            loadData();
        });
    </script>
@endpush
