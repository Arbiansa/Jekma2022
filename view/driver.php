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
                        <a class="nav-link active" href="driver.php">DRIVER ON</a>
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
            <div class="row">
                <div class="col-1">
                    <img src="../asset/img/foto-profil.png" class="rounded-circle" alt="" width="70">
                </div>
                <div class="col-3">
                    <h3>M. Auliyaul Umam</h3>
                    <div id="star">
                        <label for="star1" class="fa-solid fa-star"></label>
                        <label for="star1" class="fa-solid fa-star"></label>
                        <label for="star1" class="fa-solid fa-star"></label>
                        <label for="star1" class="fa-solid fa-star"></label>
                        <label for="star1" class="fa-solid fa-star"></label>
                    </div>
                </div>
                <div class="col-2 py-2">
                    <button class="button-driver-on">DRIVER ON</button>
                </div>
            </div>
        </div>
        <img src="../asset/img/banner-hero.png" alt="" class="position-absolute end-0 top-0 hero-img accent-img"></div>

    </section>

    <!-- Bootstrap JS -->
    <script src="../asset/js/bootstrap.bundle.min.js"></script>
</body>

</html>