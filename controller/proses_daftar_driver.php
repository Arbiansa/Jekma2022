<?php
include("../koneksi/koneksi.php");

$nama = $_POST['nama'];
$nim = $_POST['nim'];
$hp = $_POST['hp'];
$prodi = $_POST['prodi'];
$email = $_POST['email'];
$foto = $_POST['foto'];
$alamat = $_POST['alamat'];
$password = $_POST['password'];

$query = mysqli_query($conn, "INSERT INTO akun (nim, pass, level) VALUES ('$nim', '$password', 'Driver')");

$query = mysqli_query($conn, "INSERT INTO driver (id_driver, nim_driver, nama_driver, prodi_driver, no_driver, foto_driver, email_driver, status_driver) VALUES ('', '$nim', '$nama', '$prodi', '$hp', '$foto', '$email', 'On')");

header("Location:../view/performa.php");
