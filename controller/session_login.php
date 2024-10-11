<?php
// digunakan untuk sesi setelah login agar tidak bisa kembali ke menu login
session_start();
if (!isset($_SESSION["username"])) { //jika tidak di temukan session login
?>
    <script>
        alert('Anda harus Log in dahulu');
        location = 'login.php';
    </script>

    <!-- header("location: page/login.php"); -->
<?php
    exit;
}
?>