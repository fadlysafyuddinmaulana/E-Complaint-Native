<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Log in (v2)</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="./assets/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../assets/AdminLTE-3.2.0/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./assets/AdminLTE-3.2.0/dist/css/adminlte.min.css">
    <!-- Css-Custom -->
    <link rel="stylesheet" href="./css-custom/cp.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <div class="h1"><b>Login</b>Admin</div>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form id="login-admin" action="auth.php" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="username" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" name="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="./assets/AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="./assets/AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="./assets/AdminLTE-3.2.0/dist/js/adminlte.min.js"></script>
    <!-- jquery-validation -->
    <script src="./assets/AdminLTE-3.2.0/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="./assets/AdminLTE-3.2.0/plugins/jquery-validation/additional-methods.min.js"></script>
    <!-- custom-script -->

    <script>
        $(function() {
            $('#login-admin').validate({
                rules: {
                    'username': {
                        required: true,
                    },
                    'password': {
                        required: true,
                    }
                },
                messages: {
                    'username': {
                        required: "<span class='form-error-icon badge badge-danger text-uppercase'>Error</span> Tolong masukkan username anda!"
                    },
                    'password': {
                        required: "<span class='form-error-icon badge badge-danger text-uppercase'>Error</span> Tolong masukkan password anda!"
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    let customError = $([
                        '<label class="invalid-feedback mt-0 mb-2 d-block">',
                        '  <span class="error-box mb-0 d-block">',
                        '  </span>',
                        '</label>'
                    ].join(""));

                    // Add `form-error-message` class to the error element
                    error.addClass("form-error-message");

                    // Insert it inside the span that has `mb-0` class
                    error.appendTo(customError.find('.error-box'));

                    // Insert your custom error
                    customError.insertBefore(element);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
                submitHandler: function(form) {
                    if (form.isValid()) {
                        form.submit();
                    }
                }
            });
        });
    </script>
</body>

</html>