<?php
// include database connection file
include_once("db_connection.php");

// Get id from URL to delete that user
$id = $_GET['id_prodi'];

// Delete user row from table based on given id
$result = mysqli_query($conn, "delete from tb_prodi where id_prodi=$id");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:data_prodi.php");
