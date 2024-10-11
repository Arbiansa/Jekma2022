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

$query = mysqli_query($conn, "INSERT INTO akun (nim, pass, level) VALUES ('$nim', '$password', 'Customer')");

$query = mysqli_query($conn, "INSERT INTO customer (id_cust, nim_cust, nama_cust, prodi_cust, no_cust, foto_cust, email_cust) VALUES ('', '$nim', '$nama', '$prodi', '$hp', '$foto', '$email')");

header("Location:../index.php");
