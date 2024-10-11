<?php
include '../koneksi/koneksi.php';
$id_driver = $_POST['id_driver'];
$id_cust = $_POST['id_cust'];
$id_jalur = $_POST['jalur'];
$tanggal = $_POST['tanggal'];
$status = 'Success';

$query = mysqli_query($conn, "INSERT INTO transaksi (id_transaksi, id_driver, id_cust, id_jalur, status_transaksi, tanggal) VALUES ('',$id_driver, $id_cust, $id_jalur, '$status', '$tanggal')");
$sql = mysqli_query($conn, "SELECT * FROM transaksi  ORDER BY id_transaksi DESC LIMIT 1;");
while ($data = mysqli_fetch_assoc($sql)) :
    $id_transaksi = $data['id_transaksi'];
endwhile;
if (isset($_POST['offline'])) {
    header("Location:../view/rating_ojek.php?id_transaksi=$id_transaksi");
} else {
    header("Location:../view/keranjangOjek.php?id_transaksi=$id_transaksi");
}
