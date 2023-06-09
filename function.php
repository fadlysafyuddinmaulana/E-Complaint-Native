<?php
include 'config.php';
$nimcheck = $_POST['nim_check'];

$sql = "select nim from tb_mhs where nim='$nimcheck'";
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
    if (isset($_POST['submit'])) {
        $nim = $_POST['nim_check'];
        $keluhan = $_POST['keluhan'];

        $result_record = mysqli_query($conn, "insert into tb_keluhan_mhs(nim,keluhan) values('$nim','$keluhan')");
        header("Location: complaint-page.php");
    }
} else {
    echo "<script>alert('test')</script>";
}
