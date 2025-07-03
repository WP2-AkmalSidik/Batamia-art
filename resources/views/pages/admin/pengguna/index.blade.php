@extends('layouts.app')

@section('title', 'Pengguna')

@section('content')
    <!-- User Management -->
    <div class="mt-8 card rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 bg-white dark:bg-gray-900">
        <div class="flex items-center justify-between mb-5">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-400">Daftar Pengguna</h3>
            <button onclick="openAddModal()" class="btn-accent px-4 py-2 text-sm font-medium rounded-md">
                <i class="fas fa-plus mr-2"></i>Tambah Pengguna
            </button>
        </div>

        <div id="pengguna-table">
            {{-- tabel pengguna  --}}
        </div>
    </div>

    <!-- Tambah Pengguna -->
    @include('pages.admin.pengguna.components.modal-tambah')

    <!-- Edit Pengguna -->
    @include('pages.admin.pengguna.components.modal-edit')

    <!-- Hapus Pengguna -->
    @include('pages.admin.pengguna.components.modal-hapus')

    <script>
        let $password = $('input[name="password"]');
        let $passwordConfirmation = $('input[name="password_confirmation"]');
        let $feedback = $('<div class="text-sm mt-1"></div>').insertAfter($passwordConfirmation.parent());

        let isEdit;

        function openAddModal() {
            isEdit = null;
            const $form = $('#tambah-pengguna');
            $form[0].reset();
            $form.attr('data-id', '');

            $('#modal-title').html('Tambah Pengguna');
            $('#tambah-password').html(`
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-input w-full pr-10" placeholder="Masukkan password" required>
    `);
            $('#tambah-password_confirmation').html(`
        <label class="form-label">Konfirmasi Password</label>
        <input type="password" name="password_confirmation" class="form-input w-full pr-10" placeholder="Konfirmasi password" required>
    `);
            setupTogglePassword();

            // Ambil ulang referensi ke elemen input baru
            $password = $('input[name="password"]');
            $passwordConfirmation = $('input[name="password_confirmation"]');

            // Buat feedback jika belum ada
            let $feedback = $passwordConfirmation.parent().next('.text-sm.mt-1');
            if ($feedback.length === 0) {
                $feedback = $('<div class="text-sm mt-1"></div>').insertAfter($passwordConfirmation.parent());
            }

            // Tambahkan event listener baru
            $password.add($passwordConfirmation).on('input', function() {
                const password = $password.val();
                const passwordConfirmation = $passwordConfirmation.val();

                if (password && passwordConfirmation) {
                    if (password === passwordConfirmation) {
                        $feedback.text('✓ Password cocok').removeClass('text-red-500').addClass('text-green-500');
                        $passwordConfirmation[0].setCustomValidity('');
                    } else {
                        $feedback.text('✗ Password tidak cocok').removeClass('text-green-500').addClass(
                            'text-red-500');
                        $passwordConfirmation[0].setCustomValidity('Password tidak sesuai');
                    }
                } else {
                    $feedback.text('');
                    $passwordConfirmation[0].setCustomValidity('');
                }
            });

            openModal('addModal');
        }

        function openEditModal(id) {
            isEdit = true;
            const $form = $('#tambah-pengguna');
            $form[0].reset();
            $form.attr('data-id', id);
            $form.attr('data-mode', 'edit');
            $('#modal-title').html('Edit Pengguna')
            $('#tambah-password').html('')
            $('#tambah-password_confirmation').html('')

            initEditModal({
                modalId: 'addModal',
                formSelector: '#tambah-pengguna',
                endpoint: `pengguna/${id}`,
                fields: ['nama', 'email', 'password', 'password', 'role'],
                callback: null,
                onFetched: function(data) {
                    openModal('addModal');
                }
            });

            openModal('addModal');
        }

        function openDeleteModal(id, nama) {
            $('#hapus-pengguna').data('id', id);
            $('#delete-name').text(nama);
            openModal('deleteModal');
        }

        function confirmDelete() {
            closeModal('deleteModal');
        }

        // Tutup Modal klik diluar
        document.querySelectorAll('.modal').forEach(modal => {
            modal.addEventListener('click', function(e) {
                if (e.target === this) {
                    closeModal(this.id);
                }
            });
        });

        // Tutup modal mnggunakan ESC
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                const openModal = document.querySelector('.modal.show');
                if (openModal) {
                    closeModal(openModal.id);
                }
            }
        });

        function checkPasswordMatch() {
            const password = $password.val();
            const passwordConfirmation = $passwordConfirmation.val();

            if (password && passwordConfirmation) {
                if (password === passwordConfirmation) {
                    $feedback.text('✓ Password cocok').removeClass('text-red-500').addClass('text-green-500');
                    $passwordConfirmation[0].setCustomValidity('');
                } else {
                    $feedback.text('✗ Password tidak cocok').removeClass('text-green-500').addClass(
                        'text-red-500');
                    $passwordConfirmation[0].setCustomValidity('Password tidak sesuai');
                }
            } else {
                $feedback.text('');
                $passwordConfirmation[0].setCustomValidity('');
            }
        }

        // Toggle password visibility
        function setupTogglePassword() {
            $('input[type="password"]').each(function() {
                const $input = $(this);
                const $toggleBtn = $(`
                <button type="button" class="absolute inset-y-0 right-0 px-3 flex items-center text-gray-500 hover:text-gray-700">
                    <i class="far fa-eye-slash"></i>
                </button>
            `);

                $input.wrap('<div class="relative"></div>').after($toggleBtn);

                $toggleBtn.on('click', function() {
                    const isPassword = $input.attr('type') === 'password';
                    $input.attr('type', isPassword ? 'text' : 'password');
                    $(this).find('i')
                        .toggleClass('fa-eye-slash fa-eye')
                        .toggleClass('text-gray-500 text-blue-500');
                });
            });
        }

        $(document).ready(function() {
            // Real-time password check
            const $password = $('input[name="password"]');
            const $passwordConfirmation = $('input[name="password_confirmation"]');
            const $feedback = $('<div class="text-sm mt-1"></div>').insertAfter($passwordConfirmation.parent());

            // Initialize
            setupTogglePassword();
            $password.add($passwordConfirmation).on('input', checkPasswordMatch);

            let debounceTimeout;
            const debounceDelay = 500;

            // State
            let currentPage = 1;
            let currentQuery = '';
            console.log(currentPage, currentQuery);

            // Fungsi Load Data
            function loadData(page = 1, query = '') {
                $.ajax({
                    url: `/pengguna?page=${page}&search=${encodeURIComponent(query)}`,
                    type: 'GET',
                    success: function(res) {
                        $('#pengguna-table').html(res.data.view);
                        $('#paginationLinks').html(res.data.pagination);
                        // update state
                        currentPage = page;
                        currentQuery = query;
                    },
                    error: function() {
                        alert('Gagal memuat data.');
                    }
                });
            }

            $('.icon-option').on('click', function(e) {
                e.preventDefault()

                const $modal = $(this).closest('.modal')

                // Hapus highlight dari semua icon dalam modal yang sama
                $modal.find('.icon-option')
                    .removeClass('border-blue-500 bg-blue-50')
                    .addClass('border-gray-300')

                // Tambahkan highlight ke icon yang diklik
                $(this)
                    .removeClass('border-gray-300')
                    .addClass('border-blue-500 bg-blue-50')

                // Update input tersembunyi
                const iconClass = $(this).data('icon')
                const $hiddenInput = $modal.find('input[name="icon"]')
                if ($hiddenInput.length > 0) {
                    $hiddenInput.val(iconClass)
                }
            })

            // Event: Search input (debounced)
            $('#searchInput').on('keyup', function() {
                clearTimeout(debounceTimeout);

                const query = $(this).val();
                currentQuery = query;

                debounceTimeout = setTimeout(() => {
                    loadData(1, currentQuery); // reset ke page 1 saat search
                }, debounceDelay);
            });

            // Event: Klik link pagination
            $(document).on('click', '.pagination a', function(e) {
                e.preventDefault();

                const href = $(this).attr('href');
                const urlParams = new URLSearchParams(href.split('?')[1]);
                const page = urlParams.get('page') || 1;
                console.log(href, urlParams, page);

                loadData(page, currentQuery);
            });

            $(document).on('click', '.icon-option', function() {
                // Hapus class selected dari semua button
                $('.icon-option').removeClass('icon-selected');

                // Tambahkan class selected ke button yang diklik
                $(this).addClass('icon-selected');

                // Ambil data-icon dan simpan ke hidden input
                var selectedIcon = $(this).data('icon');
                $('#selectedIcon').val(selectedIcon);
            });

            $(document).on('submit', '#tambah-pengguna', function(e) {
                e.preventDefault();

                checkPasswordMatch();
                if (this.checkValidity() === false) {
                    e.preventDefault();
                    e.stopPropagation();
                }

                $(this).addClass('was-validated');

                let url;
                url = '{{ route('pengguna.store') }}';
                const method = 'POST'
                const formData = new FormData(this);

                const id = $(this).data('id');
                const mode = $(this).data('mode');

                if (isEdit == true) {
                    url = `/pengguna/${id}`
                    formData.append('_method', 'PUT');
                }

                console.log(id, mode, url)

                const successCallback = function(response) {
                    handleSuccess(response);
                    closeModal("addModal");
                    loadData(currentPage, currentQuery);
                };

                const errorCallback = function(error) {
                    handleValidationErrors(error, "tambah-pengguna", ["nama", "icon", "deskripsi"]);
                };

                ajaxCall(url, "POST", formData, successCallback, errorCallback);
            })

            $(document).on('submit', '#edit-pengguna', function(e) {
                e.preventDefault();

                const id = $(this).data('id');

                const url = `/pengguna/${id}`;
                const method = 'POST'
                const formData = new FormData(this);
                formData.append('_method', 'PUT')

                const successCallback = function(response) {
                    handleSuccess(response);
                    closeModal("editModal");
                    loadData(currentPage, currentQuery);
                };

                const errorCallback = function(error) {
                    handleValidationErrors(error, "tambah-pengguna", ["nama", "icon", "deskripsi"]);
                };

                ajaxCall(url, "POST", formData, successCallback, errorCallback);
            })

            $(document).on('submit', '#hapus-pengguna', function(e) {
                e.preventDefault();

                const id = $(this).data('id');

                const url = `/pengguna/${id}`;
                const method = 'DELETE'

                const successCallback = function(response) {
                    handleSuccess(response);
                    closeModal("deleteModal");
                    loadData(currentPage, currentQuery);
                };

                const errorCallback = function(error) {
                    handleSimpleError(error)
                };

                ajaxCall(url, method, null, successCallback, errorCallback);
            })

            loadData(currentPage, currentQuery);
        });
    </script>

@endsection
