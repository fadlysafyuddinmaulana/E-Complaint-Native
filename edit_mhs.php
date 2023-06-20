<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Complaint</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="./assets/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="./assets/AdminLTE-3.2.0/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="./assets/AdminLTE-3.2.0/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="./assets/AdminLTE-3.2.0/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="./assets/AdminLTE-3.2.0/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./assets/AdminLTE-3.2.0/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="dashboard.php" class="brand-link">
                <img src="./assets/AdminLTE-3.2.0/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Complaint</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">

                    <?php

                    session_start();

                    if (!isset($_SESSION['username'])) {
                        header("Location: index.php");
                    }

                    ?>

                    <div class="info">
                        <a href="#" class="d-block">

                            <?php
                            include 'db_connection.php';
                            $result = mysqli_query($conn, "select * from tb_petugas where id_admin = {$_SESSION['id_admin']}");
                            while ($user_data = mysqli_fetch_array($result)) {

                            ?>
                                <?php echo $user_data['nama_petugas']; ?>
                            <?php } ?>
                        </a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="dashboard.php" class="nav-link">
                                <i class="nav-icon fas fa-solid fa-gauge"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">Kelola Data</li>
                        <li class="nav-item">
                            <a href="data_keluhan.php" class="nav-link">
                                <i class="nav-icon fas fa-inbox"></i>
                                <p>
                                    Data Keluhan
                                </p>
                            </a>
                        </li>
                        <?php if ($_SESSION['role_id'] == 1) { ?>
                            <li class="nav-item">
                                <a href="data_petugas.php" class="nav-link">
                                    <i class="nav-icon fas fa-solid fa-person-military-pointing"></i>
                                    <p>
                                        Data Petugas
                                    </p>
                                </a>
                            </li>
                        <?php } ?>
                        <li class="nav-header">Kelola Mahasiswa</li>
                        <li class="nav-item">
                            <a href="data_mahasiswa.php" class="nav-link">
                                <i class="nav-icon fas fa-graduation-cap"></i>
                                <p>
                                    Data Mahasiswa
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="data_prodi.php" class="nav-link">
                                <i class="nav-icon fas fa-solid fa-building-columns"></i>
                                <p>
                                    Data Prodi
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">Profile</li>
                        <li class="nav-item">
                            <a href="conf_user.php" class="nav-link">
                                <i class="nav-icon fas fa-solid fa-gear"></i>
                                <p>
                                    Pengaturan User
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="conf_password.php" class="nav-link">
                                <i class="nav-icon fas fa-solid fa-lock"></i>
                                <p>
                                    Edit Password
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->

            <div class="sidebar-custom">
                <a href="logout.php" class="btn btn-secondary hide-on-collapse pos-right">Log Out</a>
            </div>
            <!-- /.sidebar-custom -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <h1 class="m-0 text-dark">Edit Mahasiswa</h1>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>

            <div class="content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Edit Siswa</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form id="edit-form" method="post" action="update_mhs.php" enctype="multipart/form-data">
                                    <?php
                                    include_once("db_connection.php");
                                    $id = $_GET['id_mhs'];

                                    $result = mysqli_query($conn, "
                                    select tm.id_mhs, tm.nim ,tm.nama_mahasiswa ,tm.jk ,tp.prodi ,tp.id_prodi
                                    from tb_mhs tm 
                                    join tb_prodi tp on tm.id_prodi = tp.id_prodi  ");

                                    while ($user_data = mysqli_fetch_array($result)) {
                                        $id_mhs             = $user_data['id_mhs'];
                                        $nim                = $user_data['nim'];
                                        $nama_mahasiswa     = $user_data['nama_mahasiswa'];
                                        $jk                 = $user_data['jk'];
                                        $prodi              = $user_data['prodi'];
                                    }
                                    ?>

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>NIM</label>
                                            <input type="hidden" autocomplete="off" name="id_mhs" id="id_mhs" value="<?php echo $_GET['id_mhs']; ?>" class="form-control">
                                            <input type="text" autocomplete="off" name="nim" id="nim" value="<?php echo "$nim"; ?>" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Mahasiswa</label>
                                            <input type="text" autocomplete="off" name="nama_mahasiswa" id="nama_mahasiswa" value="<?php echo "$nama_mahasiswa"; ?>" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <select class="form-control" name="jk" id="jk" style="width: 100%;">
                                                <option class="d-none" value="<?php echo $jk; ?>">
                                                    <?php
                                                    if ($jk == 'L') { ?>
                                                        Laki-Laki
                                                    <?php } else if ($jk == 'P') { ?>
                                                        Perempuan
                                                    <?php } ?>
                                                </option>
                                                <option value="L">Laki Laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Prodi</label>
                                            <select class="form-control select2" name="prodi" id="prodi" style="width: 100%;" required>
                                                <option class="d-none" value="<?php echo $id_prodi; ?>"><?php echo $prodi; ?>
                                                    <?php
                                                    include_once("db_connection.php");

                                                    $result = mysqli_query($conn, "select * from tb_prodi");
                                                    ?>
                                                    <?php while ($user_data = mysqli_fetch_array($result)) {

                                                    ?>
                                                <option value="<?php echo $user_data['id_prodi'] ?>"><?php echo $user_data['prodi'] ?></option>
                                            <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" name="update" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                </div>
            </div>
        </div>
        <style>
            .modal {
                position: absolute;
                top: 10px;
                right: 100px;
                bottom: 0;
                left: 50px;
                z-index: 10040;
                overflow: auto;
                overflow-y: auto;
            }
        </style>

        <footer class="main-footer">
            <strong>Copyright &copy;
                <?php
                date_default_timezone_set('Asia/Jakarta');
                $Date    = date('Y');
                $time      = date('H:i'); ?>
                2014 - <?php echo $Date ?>
        </footer>


        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="./assets/AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="./assets/AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="./assets/AdminLTE-3.2.0/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="./assets/AdminLTE-3.2.0/dist/js/adminlte.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="./assets/AdminLTE-3.2.0/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="./assets/AdminLTE-3.2.0/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="./assets/AdminLTE-3.2.0/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="./assets/AdminLTE-3.2.0/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="./assets/AdminLTE-3.2.0/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="./assets/AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="./assets/AdminLTE-3.2.0/plugins/jszip/jszip.min.js"></script>
    <script src="./assets/AdminLTE-3.2.0/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="./assets/AdminLTE-3.2.0/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="./assets/AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="./assets/AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="./assets/AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- jquery-validation -->
    <script src="./assets/AdminLTE-3.2.0/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="./assets/AdminLTE-3.2.0/plugins/jquery-validation/additional-methods.min.js"></script>


    <script>
        $(function() {
            $('#edit-form').validate({
                rules: {
                    'nim': {
                        required: true,
                    },
                    'nama_mahasiswa': {
                        required: true,
                    },
                    'jk': {
                        required: true,
                    },
                    'prodi': {
                        required: true,
                    },
                },
                messages: {
                    'nim': {
                        required: 'Tolong masukkan NIM!'
                    },
                    'nama_mahasiswa': {
                        required: "Tolong masukkan nama mahasiswa!"
                    },
                    'jk': {
                        required: "Tolong pilih jenis kelamin!"
                    },
                    'prodi': {
                        required: "Tolong pilih program studi!"
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>

</body>

</html>