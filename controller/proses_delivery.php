<?php
include '../koneksi/koneksi.php';
$id_driver = $_POST['id_driver'];
$id_cust = $_POST['id_cust'];
$id_jalur = $_POST['jalur'];
$id_makanan = $_POST['makanan'];
$tanggal = $_POST['tanggal'];
$status = 'Fail';
$query = mysqli_query($conn, "INSERT INTO transaksi (id_transaksi, id_driver, id_cust, id_jalur, id_makanan, status_transaksi, tanggal) VALUES ('',$id_driver, $id_cust, $id_jalur, $id_makanan,  '$status', '$tanggal')");
$sql = mysqli_query($conn, "SELECT * FROM transaksi  ORDER BY id_transaksi DESC LIMIT 1;");
while ($data = mysqli_fetch_assoc($sql)) :
    $id_transaksi = $data['id_transaksi'];
endwhile;
if (isset($_POST['offline'])) {
    header("Location:../view/rating.php?id_transaksi=$id_transaksi");
} else {
    header("Location:../view/keranjangDO.php?id_transaksi=$id_transaksi");
}
