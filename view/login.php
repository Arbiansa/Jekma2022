<!doctype html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="../asset/css/bootstrap.min.css">

   <!-- Font Google -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@100;300;400&family=Lato:wght@400;700;900&family=Roboto:wght@100;300&display=swap" rel="stylesheet">

   <!-- My Style -->
   <link rel="stylesheet" href="../asset/css/style.css">
   <link rel="icon" href="../asset/img/logo_jekma 1 (1).png" type="image/x-icon">
   <title>Ojek Mahasiswa</title>
</head>
<script src="https://kit.fontawesome.com/2bc309c78c.js" crossorigin="anonymous"></script>

<body>

   <?php
   if (isset($_GET['alert'])) {
      echo '<script type="text/JavaScript">alert("NIM dan PASSWORD SALAH!")</script>';
   }
   ?>
   <!-- Navbar -->
   <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4">
      <div class="container">
         <img src="../asset/img/jekma 2.png" alt="" width="90" class="d-inline-block align-text-top">
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
      </div>
   </nav>
   <!-- Daftar Akun Driver -->
   <div>
      <div class="container">
         <div class="row">
            <div class="row mt-5">
               <div class="col-6 mt-5">
                  <h1 style="font-size: 700;">LOGIN CUSTOMER</h1>
               </div>
            </div>
            <form class="form-horizontal m-t-20" id="form-login" action="../controller/proses_login.php" method="POST">
               <div class="row">
                  <div class="col-4 mt-2">
                     <div class="input-group mb-3">
                        <span class="input-group-text daftar-bg border-0" id="basic-addon1"> </span>
                        <input type="text" class="form-control rounded-0" placeholder="Masukkan NIM" name="nim" aria-label="nim" aria-describedby="basic-addon1">
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-4 mt-2">
                     <div class="input-group mb-3">
                        <span class="input-group-text daftar-bg border-0" id="basic-addon1"> </span>
                        <input type="password" class="form-control rounded-0" placeholder="Masukkan Password" name="pass" aria-label="pass" aria-describedby="basic-addon1">
                     </div>
                  </div>
               </div>
               <div class="row mt-2">
                  <div class="col-4">
                     <button class="btn daftar-bg w-100">Login</button>
                  </div>
               </div>
            </form>
            <div>
               <img src="../asset/img/banner-hero.png" alt="" class="position-absolute end-0 top-0 hero-img accent-img">
            </div>
         </div>
      </div>
   </div>

   <!-- Bootstrap JS -->
   <script src="../asset/js/bootstrap.bundle.min.js"></script>
</body>

</html>