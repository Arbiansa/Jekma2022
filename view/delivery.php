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
        <div class="card" style="width: 26rem;">
            <img src="../asset/img/delivert-order.png" class="card-img-top" alt="..." style="background-color: #FF5E60;">
            <?php
            include '../koneksi/koneksi.php';
            $id_driver = $_GET['id_driver'];
            $id_cust = $_GET['id_cust'];
            $query = mysqli_query($conn, "SELECT * FROM customer WHERE id_cust='$id_cust'");
            while ($data = mysqli_fetch_assoc($query)) :
                $nama_cust = $data['nama_cust'];
                $no_cust = $data['no_cust'];
            endwhile;
            $query = mysqli_query($conn, "SELECT * FROM driver WHERE id_driver='$id_driver'");
            while ($data = mysqli_fetch_assoc($query)) :
                $nama_driver = $data['nama_driver'];
            endwhile;
            ?>
            <form action="../controller/proses_delivery.php" method="post">
                <div>
                    <input type="hidden" name="id_cust" value="<?php echo $id_cust; ?>">
                    <input type="hidden" name="id_driver" value="<?php echo $id_driver; ?>">
                    <p style="padding-left: 10px; padding-top: 10px;"><?php echo $nama_driver ?></p>
                </div>
                <div class="input-group mb-3">
                    <input class="card-booking" type="text" class="form-control" placeholder="Nama Pemesan" aria-label="nama-pemesan" aria-describedby="basic-addon1" value="<?php echo $nama_cust ?>">
                </div>
                <div class="input-group mb-3">
                    <input class="card-booking" type="text" class="form-control" placeholder="No.Hp.Pemesan" aria-label="no-hp-pemesan" aria-describedby="basic-addon1" value="<?php echo $no_cust ?>">
                </div>
                <div>
                    <select name="makanan" class="form-select card-booking" aria-label="Default select example" style="margin-bottom: 20px;">
                        <option selected>Pilih Menu Makanan</option>
                        <option value="1">Nasi Goreng</option>
                        <option value="2">Soto Ayam</option>
                        <option value="3">Ayam Geprek</option>
                        <option value="4">Ayam Chiclin</option>
                    </select>
                </div>
                <div>
                    <select name="jalur" class="form-select card-booking" aria-label="Default select example" style="margin-bottom: 20px;">
                        <option selected>Lokasi Antar</option>
                        <option value="7">Telang - Telang</option>
                        <option value="1">Telang - Graha Kamal</option>
                        <option value="2">Telang - Pelabuhan</option>
                        <option value="3">Graha Kamal - Telang</option>
                        <option value="4">Graha Kamal - Pelabuhan</option>
                        <option value="5">Pelabuhan - Telang</option>
                        <option value="6">Pelabuhan - Graha Kamal</option>
                    </select>
                    <input type="hidden" name="tanggal" value="<?php echo date('Y-m-d'); ?>">
                </div>
                <div class="row">
                    <div class="col-6 py-3">
                        <button name='online' class="button-bayar btn bg-success">BAYAR ONLINE</button>
                    </div>
                    <div class="col-6 py-3">
                        <button name='offline' class="button-bayar btn bg-danger">KIRIM PESAN</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
    <img src="../asset/img/menu.png" alt="" class="position-absolute end-0 top-0 map-img">
    </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="../asset/js/bootstrap.bundle.min.js"></script>
</body>

</html>