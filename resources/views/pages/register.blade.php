<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.22.0/dist/sweetalert2.min.css" rel="stylesheet">
    <style>
        .password-match {
            color: green;
            font-size: 0.875em;
        }

        .password-mismatch {
            color: red;
            font-size: 0.875em;
        }

        .hidden {
            display: none;
        }
    </style>
</head>

<body class="bg-light">

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow p-4" style="width: 100%; max-width: 400px;">
            <h4 class="text-center mb-4">Register</h4>
            <form id="Register">
                <!-- Simulasi CSRF token -->
                {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" required autofocus>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                        required>
                    <div id="password-feedback" class="hidden mt-1"></div>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary" id="register-button">Register</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS (opsional) -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.22.0/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Real-time password confirmation check
            $("#password_confirmation").on('keyup', function() {
                const password = $("#password").val();
                const confirmPassword = $(this).val();
                const feedback = $("#password-feedback");

                if (confirmPassword.length === 0) {
                    feedback.addClass("hidden");
                    return;
                }

                feedback.removeClass("hidden");

                if (password === confirmPassword) {
                    feedback.removeClass("password-mismatch").addClass("password-match");
                    feedback.text("Passwords match!");
                    $("#register-button").prop("disabled", false);
                } else {
                    feedback.removeClass("password-match").addClass("password-mismatch");
                    feedback.text("Passwords do not match!");
                    $("#register-button").prop("disabled", true);
                }
            });

            // Also check when typing in password field
            $("#password").on('keyup', function() {
                if ($("#password_confirmation").val().length > 0) {
                    $("#password_confirmation").trigger('keyup');
                }
            });

            $("#Register").submit(function(e) {
                e.preventDefault();

                // Check passwords match before submitting
                const password = $("#password").val();
                const confirmPassword = $("#password_confirmation").val();

                if (password !== confirmPassword) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Passwords do not match!'
                    });
                    return;
                }

                setButtonLoadingState("#Register .btn.btn-primary", true, "Registering");

                const url = "{{ route('register.store') }}";
                const data = new FormData(this);

                const successCallback = function(response) {
                    setButtonLoadingState("#Register .btn.btn-primary", false,
                        "Register");
                    handleSuccess(response, null, null, "/");
                };

                const errorCallback = function(error) {
                    setButtonLoadingState("#Register .btn.btn-primary", false,
                        "Register");
                    handleValidationErrors(error, "Register", ["email", "password", "nama"]);
                };

                ajaxCall(url, "POST", data, successCallback, errorCallback);
            });
        });
    </script>
</body>

</html>
