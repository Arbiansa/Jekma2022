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
    include("../controller/session_login.php");
    ?>
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
                        <a class="nav-link active" aria-current="page" href="dashboard.php">HOME</a>
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

    <!-- Hero section -->
    <section id="hero">
        <div class="container">
            <div class="row h-100">
                <div class="col-md-6 hero-tagline kotak-hero">
                    <h1>SIAP MENGANTAR ANDA
                        SAMPAI TUJUAN</h1>
                    <p><span class="fw-bold">Jekma</span> adalah layanan ojek mahasiswa yang ada di Universitas
                        Trunojoyo Madura (UTM). Website ini akan membantu mahasiswa/i yang membutuhkan jemputan maupun
                        delivery oreder makanan.</p>
                    <a href="driver_on.php"><button class="btn btn-danger py-2 px-4 me-4">DRIVER ON</button></a>
                </div>
            </div>
            <div>
                <img src="../asset/img/banner-hero.png" alt="" class="position-absolute end-0 top-0 hero-img accent-img">
            </div>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="../asset/js/bootstrap.bundle.min.js"></script>
</body>

</html>