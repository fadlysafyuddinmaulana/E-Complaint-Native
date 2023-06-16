<?php
include 'db_connection.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "select * from tb_petugas WHERE username='$username' AND password_enc='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['id_admin']       = $row['id_admin'];
        $_SESSION['username']       = $row['username'];
        $_SESSION['nama_petugas']   = $row['nama_petugas'];
        $_SESSION['role_id']        = $row['role_id'];
        header("Location: dashboard.php");
    } else {
        header("Location: login_admin.php");
    }
}
