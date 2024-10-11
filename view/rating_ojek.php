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

    <style>
        .bintang-rating input {
            display: none;
        }

        .bintang-rating label {
            padding-top: 18px;
            padding-right: 10px;
            color: #838383;
        }

        .bintang-rating input+label {
            cursor: pointer;
            text-shadow: 1px 1px 0 #ffe400;
            font-size: 50px;
        }

        .bintang-rating input[type="checkbox"]:checked+label {
            color: #ffe400;
        }

        .bintang-rating label:active {
            transform: scale(0.8);
            transition: 0.3s ease;
        }
    </style>
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
                    <?php
                    include "../koneksi/koneksi.php";
                    $id_transaksi = $_GET['id_transaksi'];
                    $query = mysqli_query($conn, "SELECT nim_driver, nama_driver,no_driver, nama_cust, no_cust, CONCAT(awal,' - ', akhir) AS jalur, harga_jalur AS Total FROM transaksi INNER JOIN driver USING(id_driver) INNER JOIN customer USING(id_cust) INNER JOIN jalur USING(id_jalur) WHERE id_transaksi='$id_transaksi';");
                    while ($data = mysqli_fetch_assoc($query)) :
                    ?>
                        <p class="p"><?php echo $data['nama_driver'] ?></p>
                        <div>
                            <p class="p"><?php echo $data['nama_cust'] ?></p>
                        </div>
                        <div>
                            <p class="p"><?php echo $data['no_driver'] ?></p>
                        </div>
                        <div>
                            <p class="p"><?php echo $data['jalur'] ?></p>
                        </div>
                        <div>
                            <p class="p"><?php echo $data['Total'] ?></p>
                        </div>
                        <div>
                            <a href="whatsapp://send?text=Nama Pemesan %20: <?php echo $data['nama_cust']; ?>%0ALokasi %20: <?php echo $data['jalur']; ?> %0ATotal %20: <?php echo $data['Total']; ?>&phone=<?php echo $data['no_driver']; ?>"> <button class="btn bg-success" style="color: white; margin-left: 70px;">HUBUNGI DRIVER</button> </a>
                        </div>
                    <?php endwhile; ?>
                </div>

            </div>
            <!-- ulasan -->
            <div class="col-8 offset-1">
                <h4>Beri rating Driver</h4>
                <form action="../controller/proses_rating.php" method="post">
                    <div class="bintang-rating">
                        <input type="checkbox" name="rating-driver[]" id="rating-driver1">
                        <label for="rating-driver1" class="fa-solid fa-star"></label>
                        <input type="checkbox" name="rating-driver[]" id="rating-driver2">
                        <label for="rating-driver2" class="fa-solid fa-star"></label>
                        <input type="checkbox" name="rating-driver[]" id="rating-driver3">
                        <label for="rating-driver3" class="fa-solid fa-star"></label>
                        <input type="checkbox" name="rating-driver[]" id="rating-driver4">
                        <label for="rating-driver4" class="fa-solid fa-star"></label>
                        <input type="checkbox" name="rating-driver[]" id="rating-driver5">
                        <label for="rating-driver5" class="fa-solid fa-star"></label>
                    </div>
                    <div class="ulasan">
                        <h5 style="color:white;">Ulasan</h5>
                        <input type="text" id="ulasan" name="ulasan" class="ulasan-input">
                        <input type="hidden" name="id_transaksi" value="<?php echo $id_transaksi; ?>">
                    </div>
                    <div class="row">
                        <div class="col-1">
                            <input class="btn bg-danger button-sudah" style="margin-right: 20px;" type="submit" name="fail" value="CANCEL">
                        </div>
                        <div class="col-3">
                            <input class="btn bg-success button-sudah" style="margin-left: 20px;" type="submit" name="succes" value="SELESAI DIANTAR">
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="../asset/js/bootstrap.bundle.min.js"></script>
</body>

</html>