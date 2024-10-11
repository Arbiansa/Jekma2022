<?php
include("../controller/session_login.php");
?>

<!doctype html>
<?php
include("../koneksi/koneksi.php");
$id = $_GET['id_transaksi'];
$query = "SELECT driver.nama_driver, customer.nama_cust, customer.email_cust, customer.no_cust, jalur.awal, jalur.akhir, jalur.harga_jalur AS Harga_do, tanggal FROM transaksi INNER JOIN driver USING (id_driver) INNER JOIN customer USING (id_cust) INNER JOIN jalur USING (id_jalur) WHERE id_transaksi = $id";
$sql = mysqli_query($conn, $query);  // Eksekusi/Jalankan query dari variabel $query
while ($data = mysqli_fetch_assoc($sql)) {
  $driver = $data['nama_driver'];
  $customer = $data['nama_cust'];
  $email = $data['email_cust'];
  $hp = $data['no_cust'];
  $tujuanawal = $data['awal'];
  $tujuanakhir = $data['akhir'];
  $ongkir = $data['Harga_do'];
  $tanggal = $data['tanggal'];
}
?>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- Font Google -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@100;300;400&family=Lato:wght@400;700;900&family=Roboto:wght@100;300&display=swap" rel="stylesheet">

  <!-- My Style -->
  <link rel="stylesheet" href="css/style.css">
  <!-- Logo Title -->
  <link rel="icon" href="../asset/img/logo_jekma 1 (1).png" type="image/x-icon">
  <title>Ojek Mahasiswa</title>
  <!-- icon -->
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
            <a class="nav-link" href="driver_on.php">DRIVER ON</a>
          </li>
        </ul>
        <div>
          <a href="../controller/logout.php" class="btn btn-danger ms-4">LOGOUT</a>
        </div>
      </div>
    </div>
  </nav>

  <!-- Form Card -->

  <div class="container">
    <div class="row">
      <div class="card col-3">
        <img src="../asset/img/delivert-order.png" class="card-img-top" alt="..." style="background-color: #FF5E60;">
        <div>
          <p class="p"><?php echo $driver ?></p>
          <div>
            <p class="p"><?php echo $customer ?></p>
          </div>
          <div>
            <p class="p"><?php echo $hp ?></p>
          </div>
          <div>
            <p class="p"><?php echo $tujuanakhir ?></p>
          </div>
        </div>
      </div>
      <!-- ulasan -->
      <div class="col-8 offset-1">
        <form class="box3" action="../pembayaran/examples/snap-redirect/checkout-process.php?id_transaksi=<?php echo $id ?>">
          <div class="data">
            <h2><b>Detail Pesanan</b></h2>
            <div class="col-md-10 offset-1 align-self-center">
              <table width="100%">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tujuan Awal</th>
                    <th scope="col">Tujuan AKhir</th>
                    <th scope="col" style="text-align: right;">Harga</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td><?php echo $tujuanawal ?></td>
                    <td center><?php echo $tujuanakhir ?> </td>
                    <td style="text-align: right;"><?php echo $ongkir ?></td>
                  </tr>
                  <tr>
                    <td colspan="4" style="text-align: right;">-----------------------------------------------------------------------------------------------</td>
                  </tr>
                  <tr>
                    <td colspan="3" style="font-weight: bold;">Total Tagihan</td>
                    <td style="text-align: right;"><?php echo $ongkir ?></td>
                  </tr>
                  <tr>

                    <td><button id="pay-button" class="btn btn-primary">bayar</button></td>

                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </form>
      </div>
    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>

<!-- <div class="col-1 offset-md-2 offset-lg-0 offset-sm-1">
    <img src="../image/img-driver1.png" class="rounded-circle" alt="" width="70">
</div>
<div class="col-6 col-md-4 offset-1">
  <h4>M. Auliyaul Umam</h4>
</div>
<div class="col-3">
  <a href="form-boking.html"><button type="button" class="btn btn-danger">Driver On</button></a>
</div> -->

<!-- <div class="rating">
    <input type="radio" name="star1" id="star1"><label for="star1" class="fa-solid fa-star"></label>
    <input type="radio" name="star2" id="star1"><label for="star2" class="fa-solid fa-star"></label>
    <input type="radio" name="star3" id="star1"><label for="star3" class="fa-solid fa-star"></label>
    <input type="radio" name="star4" id="star1"><label for="star4" class="fa-solid fa-star"></label>
    <input type="radio" name="star5" id="star1"><label for="star5" class="fa-solid fa-star"></label>
</div> -->