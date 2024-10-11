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
                        <a class="nav-link active" href="driver_on.php">DRIVER ON</a>
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
        <div class="container py-5">
            <!-- driver 1 -->
            <?php
            include '../koneksi/koneksi.php';
            $cust = $_SESSION['username'];
            $sql = mysqli_query($conn, "SELECT * FROM customer WHERE nim_cust='$cust'");
            while ($data = mysqli_fetch_assoc($sql)) :
                $id_cust = $data['id_cust'];
            endwhile;
            $query = mysqli_query($conn, "SELECT id_driver, foto_driver, nama_driver, ROUND(AVG(nilai),1) AS nilai, status_driver FROM rating INNER JOIN transaksi USING(id_transaksi) INNER JOIN driver USING(id_driver) GROUP BY nama_driver;");
            while ($data = mysqli_fetch_assoc($query)) :
                $id = $data['id_driver'];
            ?>
                <div class="row">
                    <div class="col-1">
                        <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($data['foto_driver']) . '" class="rounded-circle" alt="" width="70"/>'; ?>
                        <a href="detail_info_driver.php?id_driver=<?php echo $id; ?>">
                            <h5 style="font-size:14px; color: #67B443;" class="ps-1 pt-2">Detail Info</h5>
                        </a>
                    </div>
                    <div class="col-3 py-3">
                        <h3><?php echo $data['nama_driver'] ?></h3>
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
                        <a href="gojek.php?id_driver=<?php echo $id; ?> & id_cust=<?php echo $id_cust; ?>"><button class="button-driver-on">DRIVER ON</button></a>
                        <a href="delivery.php?id_driver=<?php echo $id; ?> & id_cust=<?php echo $id_cust; ?>"><button class="button-delivery bg-danger">DELIVERY</button></a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
        <img src="../asset/img/banner-hero.png" alt="" class="position-absolute end-0 top-0 hero-img accent-img"></div>
    </section>

    <!-- Bootstrap JS -->
    <script src="../asset/js/bootstrap.bundle.min.js"></script>
</body>

</html>