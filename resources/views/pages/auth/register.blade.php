<!DOCTYPE html>
<html lang="en">

<head>
    <base href="../../../../">
    <meta charset="utf-8" />
    <title>TurbolyTask</title>
    <meta name="description" content="Register Page" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link href="{{ asset('assets/css/auth.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="shortcut icon" href="{{ asset('img/logo_tab.png') }}" />
</head>

<body>
    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-row-fluid">
            <div class="d-flex flex-center flex-row-fluid bg-size-cover bg-position-center bg-no-repeat">
                <div class="d-flex flex-column align-items-center">
                    <div class="d-flex flex-center mb-2">
                        <img src="{{ asset('img/logo.png') }}" class="max-h-80px" alt="" />
                    </div>

                    <div class="my-2">
                        <h2 class="font-weight-boldest">Register to TurbolyTask!</h2>
                    </div>
                    <div class="card card-custom p-10 bg-white border-card">

                        <form class="form" id="registForm">
                            <div class="form-group mb-3 text-center">
                                <input class="form-control form-control-solid py-3 px-8 w-350px bg-white border-form"
                                    type="text" placeholder="Name" name="name" id="name" autocomplete="off"
                                    required>
                                <div id="nameError" class="invalid-feedback"></div>
                            </div>
                            <div class="form-group mb-3 text-center">
                                <input class="form-control form-control-solid py-3 px-8 w-350px bg-white border-form"
                                    type="text" placeholder="Email" name="email" id="email" autocomplete="off"
                                    required />
                                <div id="emailError" class="invalid-feedback"></div>
                            </div>
                            <div class="form-group mb-3 text-center">
                                <div class="input-icon input-icon-right">
                                    <input
                                        class="form-control form-control-solid py-3 px-8 w-350px bg-white border-form"
                                        type="password" placeholder="Password" id="password" name="password"
                                        required />
                                    <span><i class="fas fa-eye" style="cursor: pointer" id="password_icon"></i></span>
                                    <div id="passwordError" class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="form-group mb-5 text-center">
                                <div class="input-icon input-icon-right">
                                    <input
                                        class="form-control form-control-solid py-3 px-8 w-350px bg-white border-form"
                                        type="password" placeholder="Konfirmasi Password" id="conf_password"
                                        name="conf_password" required />
                                    <span><i class="fas fa-eye" style="cursor: pointer"
                                            id="conf_password_icon"></i></span>
                                    <div id="confPasswordError" class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="d-flex flex-column text-center">
                                <button type="submit"
                                    class="cursor-pointer btn btn-primary font-weight-bold">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modals for error and success messages -->
    <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <img src="{{ asset('img/times.png') }}" alt="" class="icon-modal my-2">
                        <h4 class="modal-message text-center"></h4>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-primary mr-auto px-5" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <img src="{{ asset('img/check.png') }}" alt="" class="icon-modal my-2">
                        <h4 class="modal-message text-center"></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        let _token = $('meta[name="csrf-token"]').attr('content');

        var x = document.getElementById("password");
        var x_icon = document.getElementById("password_icon");
        $('#password_icon').click(function() {
            console.log('clicked!');
            if (x.type === "password") {
                x.type = "text";
                x_icon.className = 'fas fa-eye'
            } else {
                x.type = "password";
                x_icon.className = 'fas fa-eye-slash'

            }
        });

        var x_conf = document.getElementById("conf_password");
        var x_conf_icon = document.getElementById("conf_password_icon");
        $('#conf_password_icon').click(function() {
            console.log('clicked!');
            if (x_conf.type === "password") {
                x_conf.type = "text";
                x_conf_icon.className = 'fas fa-eye'
            } else {
                x_conf.type = "password";
                x_conf_icon.className = 'fas fa-eye-slash'

            }
        });

        function validateEmail(email) {
            var re = /\S+@\S+\.\S+/;
            return re.test(email);
        }

        $('#name').on('input', function() {
            var name = $(this).val().trim();
            if (name === '') {
                $('#name').addClass('is-invalid');
                $('#nameError').text('Name is required.');
            } else {
                $('#name').removeClass('is-invalid');
                $('#nameError').text('');
            }
        });

        $('#email').on('input', function() {
            var email = $(this).val().trim();
            var isValid = validateEmail(email);
            if (email === '') {
                $('#email').addClass('is-invalid');
                $('#emailError').text('Email is required.');
            } else if (!isValid) {
                $('#email').addClass('is-invalid');
                $('#emailError').text('Invalid email format.');
            } else {
                $('#email').removeClass('is-invalid');
                $('#emailError').text('');
            }
        });

        $('#password').on('input', function() {
            var password = $(this).val().trim();
            if (password === '') {
                $('#password').addClass('is-invalid');
                $('#passwordError').text('Password is required.');
            } else if (password.length < 6) {
                $('#password').addClass('is-invalid');
                $('#passwordError').text('Password must be at least 6 characters.');
            } else {
                $('#password').removeClass('is-invalid');
                $('#passwordError').text('');
            }
        });

        $('#conf_password').on('input', function() {
            var conf_password = $(this).val().trim();
            if (conf_password === '') {
                $('#conf_password').addClass('is-invalid');
                $('#confPasswordError').text('Password is required.');
            } else if (password.length < 6) {
                $('#conf_password').addClass('is-invalid');
                $('#confPasswordError').text('Password must be at least 6 characters.');
            } else {
                $('#conf_password').removeClass('is-invalid');
                $('#confPasswordError').text('');
            }
        });

        $('#registForm').submit(function(event) {
            event.preventDefault();

            var name = $('#name').val();
            var email = $('#email').val();
            var password = $('#password').val();
            var conf_password = $('#conf_password').val();
            var _token = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                type: 'POST',
                url: '/auth/register',
                data: {
                    _token: _token,
                    name: name,
                    email: email,
                    password: password,
                    conf_password: conf_password
                },
                success: function(response) {
                    if (response.success) {
                        $('#successModal .modal-title').text('Success');
                        $('#successModal .modal-message').html('<p>Register successful!</p>');
                        $('#successModal').modal('show');
                        if (response.redirect_url) {
                            window.location.href = response.redirect_url;
                        } else {
                            window.location.href = '/auth/login';
                        }
                    } else {
                        $('#errorModal .modal-title').text('Error');
                        $('#errorModal .modal-message').html('<p>' + response.message + '</p>');
                        $('#errorModal').modal('show');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', status, error);
                    $('#errorModal .modal-title').text('Error');
                    $('#errorModal .modal-message').html(
                        '<p>Failed to process your request. Please try again later.</p>');
                    $('#errorModal').modal('show');
                },
                dataType: 'json'
            });
        });
    </script>
</body>

</html>