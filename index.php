<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Complaint</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <!-- <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css"> -->
    <link rel="stylesheet" href="./assets/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="./assets/AdminLTE-3.2.0/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./assets/AdminLTE-3.2.0/dist/css/adminlte.min.css">
    <!-- Css-Custom -->
    <link rel="stylesheet" href="./css-custom/cp.css">
</head>

<body class="hold-transition login-page">
    <div class="register-box" style="width: 400px;">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <div class="h1"><b>Complaint</b> Box</div>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Silahkan masukkan keluhan anda.</p>

                <form action="Insert_complaint.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>NIM</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="nim_check" placeholder="Masukkan NIM anda">
                    </div>
                    <div class="form-group">
                        <label>Keluhan Anda</label>
                        <textarea class="form-control" rows="4" placeholder="Enter ..." name="keluhan" style="resize: none;"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Saran Anda</label>
                        <textarea class="form-control" rows="4" placeholder="Enter ..." name="saran" style="resize: none;"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="foto" id="foto">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                        </div>
                        <span style="text-align: justify;" class="sm-1">Notes:Jika anda punya bukti sebuah foto/dokumen bisa di upload.</span>
                    </div>
                    <div class="row mt-3">
                        <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="./assets/AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="./assets/AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="./assets/AdminLTE-3.2.0/dist/js/adminlte.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="./assets/AdminLTE-3.2.0/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
</body>

</html>