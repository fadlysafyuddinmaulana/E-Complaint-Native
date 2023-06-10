
<?php
include 'config.php';
$nimcheck = $_POST['nim_check'];

$sql = "select nim from tb_mhs where nim='$nimcheck'";
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
    if (isset($_POST['submit'])) {
        $nim            = $_POST['nim_check'];
        $keluhan        = $_POST['keluhan'];
        $saran          = $_POST['saran'];
        $bk_file        = $_FILES['foto']['name'];
        if ($bk_file != "") {
            $file_allowed = array('png', 'jpeg', 'jpg');
            $x = explode('.', $bk_file);
            $extension = strtolower(end($x));

            $file_temp = $_FILES['foto']['tmp_name'];

            date_default_timezone_set('Asia/Jakarta');
            $Date = date('dmY');
            $Time = date('His');
            $new_file   = 'Bukti Keluhan Oleh ' . $nim . '-' . $Date . '-' . $Time . '-' . $bk_file;
            if (in_array($extension, $file_allowed) == true) {
                move_uploaded_file($file_temp, 'file-upload/' . $new_file);
                $result_record = mysqli_query($conn, "insert into tb_keluhan_mhs(nim,keluhan,saran,file) values('$nim','$keluhan','$saran','$new_file')");
                header("Location: index.php");
            }
        } else {
            header("Location: message_error.php", $flash_error);
        }
    }
} else {
    header("Location: message_error.php");
}
