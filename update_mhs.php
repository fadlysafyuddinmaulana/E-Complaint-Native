<?php
include_once("config/db_connection.php");

if (isset($_POST['update'])) {
    $id             = $_POST['id_mhs'];
    $nim            = $_POST['nim'];
    $nama_mahasiswa = $_POST['nama_mahasiswa'];
    $jk             = $_POST['jk'];
    $prodi          = $_POST['prodi'];

    $result = mysqli_query($conn, "update tb_mhs set nim='$nim',nama_mahasiswa='$nama_mahasiswa',jk='$jk',prodi='$prodi' where id_mhs='$id'");

    header("Location: data_mahasiswa.php");
}
