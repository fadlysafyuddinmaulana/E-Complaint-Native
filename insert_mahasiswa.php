<?php
include 'db_connection.php';
if (isset($_POST['submit'])) {
    $nim                = $_POST['nim'];
    $nama_mahasiswa     = $_POST['nama_mahasiswa'];
    $jk                 = $_POST['jk'];
    $prodi              = $_POST['prodi'];

    $result = mysqli_query($conn, "insert into tb_mhs(nim,nama_mahasiswa,jk,id_prodi) values('$nim','$nama_mahasiswa','$jk','$prodi')");
    header("Location: data_mahasiswa.php");
}
