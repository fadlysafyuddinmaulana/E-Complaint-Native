<?php
include_once("db_connection.php");


if (isset($_POST['update'])) {

    $id                 = $_POST['id_admin'];
    $password_enc       = md5($_POST['password']);
    $password_dec       = $_POST['password'];

    $result = mysqli_query($conn, "update tb_petugas set password_enc='$password_enc',password_dec='$password_dec' where id_admin='$id'");

    header("Location: dashboard.php");
}
