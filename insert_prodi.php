<?php
include 'db_connection.php';

if (isset($_POST['submit'])) {
    $prodi       = $_POST['prodi'];

    $result = mysqli_query($conn, "insert into tb_prodi(prodi) values('$prodi')");
    header("Location: data_prodi.php");
}
