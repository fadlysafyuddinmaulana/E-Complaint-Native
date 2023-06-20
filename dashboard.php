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
                            <a href="dashboard.php" class="nav-link active">
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
                                    Edit Profile
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
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dasboard</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <?php
                                    include 'db_connection.php';
                                    $query = mysqli_query($conn, "select * from tb_keluhan_mhs");
                                    $result = mysqli_num_rows($query);
                                    ?>
                                    <h3><?php echo $result; ?></h3>

                                    <p>Complaint</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-solid fa-inbox"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-gray">
                                <div class="inner">
                                    <?php
                                    include 'db_connection.php';
                                    $query = mysqli_query($conn, "select * from tb_mhs");
                                    $result = mysqli_num_rows($query);
                                    ?>
                                    <h3><?php echo $result; ?></h3>

                                    <p>Mahasiswa</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-solid fa-graduation-cap"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-lightblue color-palette">
                                <div class="inner">
                                    <?php
                                    include 'db_connection.php';
                                    $query = mysqli_query($conn, "select * from tb_mhs");
                                    $result = mysqli_num_rows($query);
                                    ?>
                                    <h3><?php echo $result; ?></h3>

                                    <p>Petugas</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-solid fa-person-military-pointing"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

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
</body>

</html>