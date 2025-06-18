@extends('layouts.app')

@section('title', 'Pengaturan Toko')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js"></script>
@endpush

@section('content')
    <div class="space-y-6">
        <div class="card rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 bg-white dark:bg-gray-900">
            <div class="absolute top-6 right-6">
                <button id="savePengaturan" class="btn-accent px-6 py-2.5">
                    <i class="fas fa-save mr-2"></i>Simpan Semua
                </button>
            </div>

            <div class="flex items-center mb-6">
                <div class="w-12 h-12 gradient-icon-bg rounded-lg flex items-center justify-center mr-4">
                    <i class="fas fa-store text-white text-xl"></i>
                </div>
                <div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Informasi Toko</h3>
                    <p class="text-gray-600 dark:text-gray-400 text-sm">Pengaturan detail informasi toko Anda</p>
                </div>
            </div>

            <form id="storeInfoForm" class="space-y-6">
                <div>
                    <label class="form-label">Nama Toko</label>
                    <input type="text" id="nama_toko" class="form-input w-full" value="{{ getPengaturan()->nama_toko }}"
                        placeholder="Masukkan nama toko" required>
                </div>

                <!-- Alamat Section -->
                <div class="border-t border-gray-200 dark:border-gray-700 pt-6">
                    <h4 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Alamat Toko</h4>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Provinsi -->
                        <div>
                            <label class="form-label">Provinsi</label>
                            <input type='text' id="provinsi" value="{{ getPengaturan()->provinsi }}"
                                class="form-input w-full" required>
                        </div>

                        <!-- Kota/Kabupaten -->
                        <div>
                            <label class="form-label">Kota/Kabupaten</label>
                            <input type='text' id="kota" class="form-input w-full"
                                value="{{ getPengaturan()->kota }}" required>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                        <!-- Kecamatan -->
                        <div>
                            <label class="form-label">Kecamatan</label>
                            <input type='text' id="kecamatan" class="form-input w-full"
                                value="{{ getPengaturan()->kecamatan }}" required>
                        </div>

                        <!-- Desa/Kelurahan -->
                        <div>
                            <label class="form-label">Desa/Kelurahan</label>
                            <input type='text' id="kelurahan" class="form-input w-full"
                                value="{{ getPengaturan()->kelurahan }}" required>
                        </div>
                        <!-- Kode Post -->
                        <div>
                            <label class="form-label">Kode Pos</label>
                            <select type="text" name="kode_pos" id="kode_pos" class="form-input w-full">
                                <option value="{{ getPengaturan()->kode_pos }}">{{ getPengaturan()->kode_pos }}</option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-4">
                        <label class="form-label">Alamat Lengkap / Nama Jalan</label>
                        <textarea id="alamat" name="alamat" class="form-input w-full" rows="3"
                            placeholder="Contoh: Jl. Raya Tawang No. 123, RT 01/RW 05" required>{{ getPengaturan()->alamat }}</textarea>
                    </div>

                </div>
            </form>
        </div>

        <!-- Pengaturan Jenis Pembayaran -->
        <div class="card rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 bg-white dark:bg-gray-900">
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center">
                    <div class="w-12 h-12 blue-gradient-bg rounded-lg flex items-center justify-center mr-4">
                        <i class="fas fa-credit-card text-white text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Metode Pembayaran</h3>
                        <p class="text-gray-600 dark:text-gray-400 text-sm">Atur jenis pembayaran yang tersedia di toko</p>
                    </div>
                </div>
                <button onclick="openAddPaymentModal()" class="btn-accent px-4 py-2 text-sm">
                    <i class="fas fa-plus mr-2"></i>Tambah Metode
                </button>
            </div>

            <div class="space-y-4" id="bank-card">
                {{-- card bank  --}}
            </div>
        </div>
    </div>

    @include('pages.admin.pengaturan-toko.components.modal')

    <script>
        function openAddPaymentModal() {
            cropperAdd.reset();
            $('#modal-title').html('Tambah Metode Pembayaran')
            const $form = $('#payment-form');
            $form[0].reset();
            $form.attr('data-id', '');
            $('#currentImagePreview').removeClass('mb-3 flex items-center space-x-3').addClass('hidden')
            openModal('paymentModal')
        }

        function editPaymentMethod(id) {

            $('#currentImagePreview').addClass('mb-3 flex items-center space-x-3').removeClass('hidden')
            const $form = $('#payment-form');
            $form[0].reset();
            $form.attr('data-id', id);
            $('#modal-title').html('Edit Metode Pembayaran')
            cropperAdd.reset();

            initEditModal({
                modalId: 'paymentModal',
                formSelector: '#payment-form',
                endpoint: `pengaturan/bank/${id}`,
                fields: ['nama_bank', 'nama_akun', 'no_akun', 'jenis'],
                callback: function(data) {
                    const logo = data.logo;
                    $('#current-image').attr('src', logo.startsWith('http') ? logo :
                        `{{ asset('storage') }}/${logo}`);

                },
                onFetched: function(data) {
                    openModal('paymentModal');
                }
            });
            openModal('paymentModal');
            // Populate form with existing data
        }

        function showNotification(message, type = 'info') {
            // Create notification element
            const notification = document.createElement('div');
            notification.className =
                `fixed top-4 right-4 z-50 p-4 rounded-lg shadow-lg transition-all duration-300 transform translate-x-full`;

            if (type === 'success') {
                notification.className += ' bg-green-500 text-white';
            } else if (type === 'error') {
                notification.className += ' bg-red-500 text-white';
            } else {
                notification.className += ' bg-blue-500 text-white';
            }

            notification.innerHTML = `
                <div class="flex items-center">
                    <i class="fas fa-check-circle mr-2"></i>
                    <span>${message}</span>
                </div>
            `;

            document.body.appendChild(notification);

            setTimeout(() => {
                notification.classList.remove('translate-x-full');
            }, 100);

            setTimeout(() => {
                notification.classList.add('translate-x-full');
                setTimeout(() => {
                    document.body.removeChild(notification);
                }, 300);
            }, 3000);
        }

        // Tutup modal klik selain modal
        document.getElementById('paymentModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closePaymentModal();
            }
        });

        // Auto-populate city/district based on province selection
        document.querySelector('select[name="province"]')?.addEventListener('change', function() {
            // Implementation for dynamic city loading
        });
    </script>
@endsection
@push('scripts')
    <script>
        let cropperAdd = null;
        let originalFileAdd = null;
        let croppedBlobAdd = null;

        function initCropperHandlers(context) {
            const $uploadArea = $(`#uploadArea-${context}`);
            const $fileInput = $(`#fileInput-${context}`);
            const $cropperSection = $(`#cropperSection-${context}`);
            const $cropperImage = $(`#cropperImage-${context}`);
            const $finalPreview = $(`#finalPreview-${context}`);
            const $finalImage = $(`#finalImage-${context}`);
            const $zoomRange = $(`#zoomRange-${context}`);

            let cropper = null;
            let originalFile = null;
            let croppedBlob = null;

            function resetCropper() {
                if (cropper) cropper.destroy();
                cropper = null;
                originalFile = null;
                croppedBlob = null;
                $fileInput.val('');
                $uploadArea.removeClass('hidden');
                $cropperSection.addClass('hidden');
                $finalPreview.addClass('hidden');
                $zoomRange.val(1);
            }

            $uploadArea.on('click', () => $fileInput.click());

            $fileInput.on('change', function(e) {
                handleFile(e.target.files[0]);
            });

            $uploadArea.on('dragover', function(e) {
                e.preventDefault();
                $(this).addClass('dragover');
            }).on('dragleave drop', function(e) {
                e.preventDefault();
                $(this).removeClass('dragover');
            }).on('drop', function(e) {
                handleFile(e.originalEvent.dataTransfer.files[0]);
            });

            function handleFile(file) {
                if (!file || !file.type.startsWith('image/')) return;
                if (file.size > 2 * 1024 * 1024) {
                    showToast('error', 'Ukuran max gambar 2 MB');
                    return;
                }
                originalFile = file;
                const reader = new FileReader();
                reader.onload = e => initializeCropper(e.target.result);
                reader.readAsDataURL(file);
            }

            function initializeCropper(imageSrc) {
                $cropperImage.attr('src', imageSrc);
                $uploadArea.addClass('hidden');
                $cropperSection.removeClass('hidden');

                $cropperImage.on('load', function() {
                    if (cropper) cropper.destroy();
                    cropper = new Cropper($cropperImage[0], {
                        aspectRatio: 1,
                        viewMode: 2,
                        dragMode: 'move',
                        autoCropArea: 0.8,
                        preview: `#cropPreview-${context}`
                    });
                });
            }

            $zoomRange.on('input', function() {
                if (cropper) cropper.zoomTo(parseFloat($(this).val()));
            });

            $(`#cropImage-${context}`).on('click', function() {
                if (cropper) {
                    const canvas = cropper.getCroppedCanvas({
                        width: 800,
                        height: 800
                    });
                    canvas.toBlob(blob => {
                        croppedBlob = blob;
                        $finalImage.attr('src', URL.createObjectURL(blob));
                        $cropperSection.addClass('hidden');
                        $finalPreview.removeClass('hidden');
                    }, 'image/jpeg', 0.9);
                }
            });

            $(`#editCrop-${context}`).on('click', function() {
                $finalPreview.addClass('hidden');
                $cropperSection.removeClass('hidden');
            });

            return {
                getBlob: () => croppedBlob,
                getFile: () => originalFile,
                reset: resetCropper
            };
        }

        function loadData() {
            $.ajax({
                url: `/pengaturan`,
                type: 'GET',
                success: function(res) {
                    $('#bank-card').html(res.data.view);
                },
                error: function() {
                    showToast('error', 'Gagal memuat data');
                }
            });
        }

        $(document).ready(function() {
            cropperAdd = initCropperHandlers("add");
            let provinsi = '{{ getPengaturan()->provinsi }}';
            let kota = '{{ getPengaturan()->kota }}';;
            let kecamatan = '{{ getPengaturan()->kecamatan }}';
            let kelurahan = '{{ getPengaturan()->kelurahan }}';
            let kode_pos = '{{ getPengaturan()->kode_pos }}';
            let search = `${provinsi} ${kota} ${kecamatan} ${kelurahan} `;

            loadSelectOptions('#kode_pos', `/wilayah/tujuan?search=${search}`, '{{ getPengaturan()->kode_pos }}')

            $('#kode_pos').on('change', function() {
                kode_pos = $(this).val()
            })

            $('#alamat').val('{{ getPengaturan()->alamat }}')

            $('#savePengaturan').on('click', function(e) {
                e.preventDefault();

                const data = {
                    provinsi: $('#provinsi').val(),
                    kota: $('#kota').val(),
                    kecamatan: $('#kecamatan').val(),
                    kelurahan: $('#kelurahan').val(),
                    kode_pos: $('#kode_pos').val(),
                    alamat: $('#alamat').val(),
                    nama_toko: $('#nama_toko').val()
                }

                const url = '{{ route('pengaturan.update') }}';

                const successCallback = function(response) {
                    showToast('success', response.message);
                };

                const errorCallback = function(error) {
                    handleValidationErrors(error, "storeInfoForm");
                };

                ajaxCall(url, "POST", data, successCallback, errorCallback);
            })

            $(document).on('change', '.update-status', function(e) {
                e.preventDefault();

                console.log('checked')

                const id = $(this).data('id');
                const status = $(this).is(':checked') ? 1 : 0

                const url = `/pengaturan/bank/${id}/status`;
                const method = 'PUT'
                const data = {
                    status
                };

                const successCallback = function(response) {
                    showToast('success', response.message);
                    loadData()
                    closeModal("paymentModal");
                };

                const errorCallback = function(error) {
                    handleValidationErrors(error, "payment-form");
                };

                ajaxCall(url, method, data, successCallback, errorCallback);
            });

            $(document).on('submit', '#payment-form', function(e) {
                e.preventDefault();

                let url;
                url = '{{ route('bank.store') }}';
                const method = 'POST'
                const formData = new FormData(this);

                const id = $(this).data('id');

                if (id) {
                    url = `/pengaturan/bank/${id}`
                    formData.append('_method', 'PUT');
                }

                if (cropperAdd.getBlob()) {
                    formData.append("logo", cropperAdd.getBlob(), cropperAdd.getFile().name);
                }

                const successCallback = function(response) {
                    handleSuccess(response);
                    loadData()
                    closeModal("paymentModal");
                };

                const errorCallback = function(error) {
                    handleValidationErrors(error, "payment-form");
                };

                ajaxCall(url, "POST", formData, successCallback, errorCallback);
            })

            loadData();

        })
    </script>
@endpush
