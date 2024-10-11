<?php
session_start();
include "../koneksi/koneksi.php";

$nim = $_POST['nim'];
$pass = $_POST['pass'];
$query = mysqli_query($conn, "SELECT * FROM akun WHERE nim='$nim' AND pass='$pass'");
$cek = mysqli_num_rows($query);
$data = mysqli_fetch_assoc($query);
if ($cek > 0) {
    if ($data['level'] == 'Admin') {
        $_SESSION["username"] = $nim;
        header("Location:../view/performa.php");
    } elseif ($data['level'] == 'Driver') {
        $_SESSION["username"] = $nim;
        header("Location:../view/detail_driver.php?nim=$nim");
    } else {
        $_SESSION["username"] = $nim;
        header("Location:../view/driver_on.php?nim=$nim");
    }
} else {
    header("Location:../view/login.php?alert=gagal");
}
