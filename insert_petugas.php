<?php
include 'db_connection.php';

if (isset($_POST['submit'])) {
    $nama_petugas       = $_POST['nama_petugas'];
    $username           = $_POST['username'];
    $password_enc       = md5($_POST['password']);
    $password_dec       = $_POST['password'];
    $role               = $_POST['role'];

    $result = mysqli_query($conn, "insert into tb_petugas(nama_petugas,username,password_dec,password_enc,role_id) values('$nama_petugas','$username','$password_dec','$password_enc','$role')");
    header("Location: data_petugas.php");
}
