<?php
include("../koneksi/koneksi.php");
$nim = $_GET['nim'];

$query = mysqli_query($conn, "SELECT * FROM driver WHERE nim_driver = '$nim'");
$data = mysqli_fetch_assoc($query);
$status = $data['status_driver'];


if ($status == 'On') {
    mysqli_query($conn, "UPDATE driver SET status_driver = 'Off' WHERE nim_driver = '$nim'");
    header("location:../view/detail_driver.php");
} else {
    mysqli_query($conn, "UPDATE driver SET status_driver = 'On' WHERE nim_driver = '$nim'");
    header("location:../view/detail_driver.php");
}
