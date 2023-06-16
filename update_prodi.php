<?php
include_once("db_connection.php");

if (isset($_POST['update'])) {
    $id                 = $_POST['id_prodi'];
    $prodi              = $_POST['prodi'];

    $result = mysqli_query($conn, "update tb_prodi set prodi='$prodi'where id_prodi='$id'");

    header("Location: data_prodi.php");
}
