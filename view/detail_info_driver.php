<?php
include("../controller/session_login.php");
?>
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
   <!-- Navbar -->
   <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4">
      <div class="container">
         <img src="../asset/img/jekma 2.png" alt="" width="90" class="d-inline-block align-text-top">
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
               <li class="nav-item mx-3">
                  <a class="nav-link" aria-current="page" href="dashboard.php">HOME</a>
               </li>
               <li class="nav-item mx-3">
                  <a class="nav-link active" href="driver-on.php">DRIVER ON</a>
               </li>
            </ul>
            <div>
               <a href="../controller/logout.php" class="btn btn-danger ms-4">LOGOUT</a>
            </div>
         </div>
      </div>
   </nav>

   <!-- Driver On -->
   <section id="driver-on">
      <div class="container-fluid">
         <div class="container d-lg-flex d-md-block">
            <div class="driveron w-100">
               <!-- Driver On 1 -->
               <?php
               include('../koneksi/koneksi.php');
               $id = $_GET['id_driver'];
               $query = mysqli_query($conn, "SELECT foto_driver, nama_driver, ROUND(AVG(nilai),1) AS nilai, SUM(status_transaksi='Success') AS success, SUM(status_transaksi='Fail') AS fail FROM rating INNER JOIN transaksi USING(id_transaksi) INNER JOIN driver USING(id_driver) WHERE id_driver=$id GROUP BY nama_driver ");
               while ($data = mysqli_fetch_assoc($query)) :
               ?>
                  <div class="col-16" style="padding-bottom: 50px;">
                     <div class="row">
                        <div class="col-1 py-1">
                           <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($data['foto_driver']) . '" class="rounded-circle" alt="" width="70"/>'; ?>
                        </div>
                        <div class="col-3">
                           <h4><?php echo $data['nama_driver']; ?></h4>
                           <div id="star">
                              <?php
                              $x = $data['nilai'];
                              for ($i = 0; $i < $x; $i++) :
                              ?>
                                 <label for="star1" class="fa-solid fa-star"></label>
                              <?php endfor; ?>
                           </div>
                           <span> Nilai Rating: <?php echo $data['nilai']; ?></span>
                        </div>
                        <div class="col-2">
                           <div>
                              <p class="button-cancel-driver"><?php echo $data['fail']; ?> CANCEL</p>
                           </div>
                           <div>
                              <p class="button-driver-sukses"><?php echo $data['success']; ?> SELESAI</p>
                           </div>
                        </div>
                     </div>
                  </div>
               <?php endwhile; ?>
            </div>
         </div>
         <div class="container d-lg-flex d-md-block">
            <div class="col-6" style="padding-bottom: 50px;">
               <?php
               $query = mysqli_query($conn, "SELECT * FROM driver WHERE id_driver = '$id'");
               $data = mysqli_fetch_assoc($query);
               ?>
               <table class="table">
                  <thead>
                     <tr>
                        <th scope="col">Nama</th>
                        <th scope="col"><?php echo $data['nama_driver'] ?></th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <th>NIM</th>
                        <th><?php echo $data['nim_driver'] ?></th>
                     </tr>
                     <tr>
                        <th>Program Studi</th>
                        <th><?php echo $data['prodi_driver'] ?></th>
                     </tr>
                     <tr>
                        <th>Nomor Hp</th>
                        <th><?php echo $data['no_driver'] ?></th>
                     </tr>
                     <tr>
                        <th>Email</th>
                        <th><?php echo $data['email_driver'] ?></th>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </div>

      <img src="../asset/img/banner-hero.png" alt="" class="position-absolute end-0 top-0 hero-img accent-img">
      </div>
   </section>
</body>

</html>