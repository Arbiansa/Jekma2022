<?php
$conn = mysqli_connect('localhost', 'root', '', 'db_jekma');
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
    <div class="container b">
        <!-- driver 1 -->
        <div class="row w-50 py-4">
            <section>
                <table>
                    <tr>
                        <?php
                        $nim = $_SESSION['username'];
                        $qu = mysqli_query($conn, "SELECT foto_driver, status_driver, nama_driver, ROUND(AVG(nilai),1) AS nilai, SUM(status_transaksi='Success') AS success, SUM(status_transaksi='Fail') AS fail FROM rating INNER JOIN transaksi USING(id_transaksi) INNER JOIN driver USING(id_driver) WHERE nim_driver = '$nim';");
                        $row = mysqli_fetch_assoc($qu);


                        ?>
                        <td rowspan="2">
                            <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($row['foto_driver']) . '" class="rounded-circle" alt="" width="70"/>'; ?>
                        </td>
                        <td style="padding: 0px 0px 0px 40px;">
                            <h4><?= $row["nama_driver"]; ?></h4>
                        </td>
                        <td rowspan="2" style="padding: 0px 0px 20px 80px;">
                            <?php
                            if ($row['status_driver'] == 'On') {
                            ?>
                                <div style="padding-top: 16px;">
                                    <a href="../controller/proses_on_off.php?nim=<?php echo $nim ?>"><button class="button-driver-on">DRIVER <?php echo $row['status_driver'] ?></button></a>
                                </div>
                            <?php
                            } else {
                            ?>
                                <div style="padding-top: 16px;">
                                    <a href="../controller/proses_on_off.php?nim=<?php echo $nim ?>"><button class="button-driver-on" style="background-color: #626262;">DRIVER <?php echo $row['status_driver'] ?></button></a>
                                </div>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 0px 0px 0px 40px;">
                            <div id="star">
                                <?php
                                $x = $row['nilai'];
                                for ($i = 0; $i < $x; $i++) :
                                ?>
                                    <label for="star1" class="fa-solid fa-star"></label>
                                <?php endfor; ?>
                            </div>
                            <span> Nilai Rating: <?php echo $row['nilai']; ?></span>
                        </td>
                    </tr>
                </table>
            </section>
        </div>
        <div class="row w-50 position-absolute end-0 pengguna top-0">
            <sections>
                <div class="col-9">
                    <h4>DRIVER</h4>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Pemesan</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Ulasan</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <?php
                        $query = "SELECT nim_driver, nama_cust, harga_jalur, tanggal, status_transaksi, ulasan FROM rating INNER JOIN transaksi USING (id_transaksi) INNER JOIN driver USING (id_driver) INNER JOIN customer USING (id_cust) INNER JOIN jalur USING (id_jalur) WHERE nim_driver='$nim'";
                        $query2 = "SELECT id_transaksi, id_makanan, harga_makanan FROM transaksi INNER JOIN makanan USING (id_makanan) WHERE id_driver = 3";
                        $cok = mysqli_query($conn, $query2);
                        $tol = mysqli_fetch_assoc($cok);
                        $jan = mysqli_query($conn, $query);
                        while ($bra = mysqli_fetch_array($jan)) : ?>
                            <tbody>
                                <tr>
                                    <th scope="row"><?= $bra["nama_cust"]; ?></th>
                                    <td><?= $bra["harga_jalur"] + $tol["harga_makanan"];; ?></td>
                                    <td><?= $bra["tanggal"] ?></td>
                                    <td><?= $bra["ulasan"]; ?></td>
                                    <td><?= $bra["status_transaksi"]; ?></td>
                                </tr>
                            </tbody>
                        <?php endwhile; ?>
                    </table>
                </div>
            </sections>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>