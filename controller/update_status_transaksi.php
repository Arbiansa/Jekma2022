<?php
include "../koneksi/koneksi.php";
$id_transaksi = $_GET['id_transaksi'];
$query = mysqli_query($conn, "UPDATE transaksi SET status_transaksi='Success' WHERE id_transaksi=$id_transaksi");
header("Location:../view/dashboard.php");
