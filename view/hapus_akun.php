<?php

$conn = mysqli_connect('localhost', 'root', '', 'db_jekma');

$result = mysqli_query($conn, "SELECT * FROM driver");
$result2 = mysqli_query($conn, "SELECT * FROM customer");
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
            <a class="nav-link" href="daftar_driver.php">DAFTAR AKUN DRIVER</a>
          </li>
          <li class="nav-item mx-3">
            <a class="nav-link" href="performa.php">PERFORMA AKUN</a>
          </li>
          <li class="nav-item mx-3">
            <a class="nav-link active" href="hapus_akun.php">BANNED AKUN</a>
          </li>
        </ul>
        <div>
          <a href="../index.php" class="btn btn-danger ms-4">LOGOUT</a>
        </div>
      </div>
    </div>
  </nav>
  <div>

    <div class="container">
      <div class="row w-50">
        <section>
          <div class="col-16" style="padding-bottom: 50px;">
            <h4>AKUN DRIVER</h4>
            <table>
              <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                  <td style="padding-bottom: 30px"><img src="../asset/img/foto-profil.png" class="rounded-circle" alt="" width="70"> </td>
                  <td style="padding-left: 30px; padding-bottom: 30px;">
                    <h4><?= $row["nama_driver"] ?></h4>
                  </td>
                  <td style="padding-left: 30px; padding-bottom: 30px;">
                    <form action="../controller/proses_hapus.php" method="post">
                      <input type="hidden" name="id" value="<?php echo $row["id_driver"] ?>">
                      <button type="submit" class="button-cancel-driver" name="banned">BANNED</button>
                    </form>
                  </td>
                </tr>
              <?php endwhile; ?>
            </table>
          </div>
      </div>
      </section>
    </div>
    <div class="row w-50 position-absolute end-0 pengguna top-0">
      <section>
        <div class="col-16 offset-1" style="padding-bottom:20px;">
          <h4>AKUN PENGGUNA</h4>
          <table>
            <?php while ($row2 = mysqli_fetch_assoc($result2)) : ?>
              <tr>
                <td style="padding-bottom: 30px"><img src="../asset/img/foto-profil.png" class="rounded-circle" alt="" width="70"> </td>
                <td style="padding-left: 30px; padding-bottom: 30px;">
                  <h4><?= $row2["nama_cust"] ?></h4>
                </td>
                <td style="padding-left: 30px; padding-bottom: 30px;"><a href="">
                    <form action="../controller/proses_hapus.php" method="post">
                      <input type="hidden" name="id2" value="<?php echo $row2["id_cust"] ?>">
                      <button type="submit" class="button-cancel-driver" name="banned2">BANNED</button>
                    </form>
                </td>
              </tr>
            <?php endwhile; ?>
          </table>
        </div>
      </section>
    </div>
  </div>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>