<?php 
session_start();
session_destroy();
?>
<script>
 alert('Logout berhasil');
 location='../index.php';
</script>