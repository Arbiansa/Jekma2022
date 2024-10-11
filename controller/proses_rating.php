<?php
include '../koneksi/koneksi.php';
$nilai = COUNT($_POST['rating-driver']);
$ulasan = $_POST['ulasan'];
$id_transaksi = $_POST['id_transaksi'];
if (isset($_POST['succes'])) {
    $query = mysqli_query($conn, "INSERT INTO rating (id_rating, id_transaksi, nilai, ulasan) VALUES ('', $id_transaksi, $nilai, '$ulasan')");
    header("Location:../controller/update_status_transaksi.php?id_transaksi=$id_transaksi");
} else {
    $query = mysqli_query($conn, "INSERT INTO rating (id_rating, id_transaksi, nilai, ulasan) VALUES ('', $id_transaksi, $nilai, '$ulasan')");
    header("Location:../view/dashboard.php");
}
