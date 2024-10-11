<?php 

$conn = mysqli_connect("localhost","root","","db_jekma");

if (isset($_POST["banned2"])) {
	$id = $_POST["id2"];

	$query2 = "DELETE FROM customer WHERE id_cust = '$id'" ;
	$query2_run = mysqli_query($conn, $query2);

	if ($query2_run) {
		echo "<script>Berhasil</script>";
		header("Location: hapus_akun.php");
	} else {
		echo "<script>Gagal</script>";
	}
}

if (isset($_POST["banned"])) {
	$id2 = $_POST["id"];

	$query = "DELETE FROM driver WHERE id_driver = '$id2'";
	$query_run = mysqli_query($conn, $query);

	if ($query_run) {
		header("Location: ../view/hapus_akun.php");
	} else {
		echo "<script>Gagal</script>";
	}
}
