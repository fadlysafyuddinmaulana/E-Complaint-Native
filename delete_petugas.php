<?php
// include database connection file
include_once("db_connection.php");

// Get id from URL to delete that user
$id = $_GET['id_admin'];

// Delete user row from table based on given id
$result = mysqli_query($conn, "delete from tb_petugas where id_admin=$id");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:data_petugas.php");
