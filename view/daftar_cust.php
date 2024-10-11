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
            <img src="asset/img/jekma 2.png" alt="" width="90" class="d-inline-block align-text-top">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-3">
                        <a class="nav-link" aria-current="page" href="../index.php">HOME</a>
                    </li>
                    <div>
                        <a href="login.php" class="btn btn-danger ms-4">LOGIN</a>
                    </div>
            </div>
        </div>
    </nav>
    <!-- Daftar Akun Driver -->
    <div>
        <div class="container">
            <div class="row">
                <div class="row mt-5">
                    <div class="col-6 text-center">
                        <h3 style="font-size: 700;">DAFTAR AKUN CUSTOMER</h3>
                    </div>
                </div>
                <form action="../controller/proses_daftar.php" method="post">
                    <div class="row mt-5">
                        <div class="col-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text daftar-bg border-0" id="basic-addon1"> </span>
                                <input type="text" class="form-control rounded-0" name="nama" placeholder="Nama Driver" aria-label="nama-driver" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text daftar-bg border-0" id="basic-addon1"> </span>
                                <input type="text" class="form-control rounded-0" name="nim" placeholder="NIM Driver" aria-label="nim-driver" aria-describedby="basic-addon1">
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text daftar-bg border-0" id="basic-addon1"> </span>
                                <input type="text" class="form-control rounded-0" name="hp" placeholder="No Hp" aria-label="no-hp" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text daftar-bg border-0" id="basic-addon1"> </span>
                                <input type="text" class="form-control rounded-0" name="prodi" placeholder="Prodi" aria-label="prodi" aria-describedby="basic-addon1">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text daftar-bg border-0" id="basic-addon1"> </span>
                                <input type="text" class="form-control rounded-0" name="email" placeholder="Email" aria-label="email" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text daftar-bg border-0" id="basic-addon1"> </span>
                                <input type="file" class="form-control rounded-0" name="foto" placeholder="Foto" aria-label="email" aria-describedby="basic-addon1">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text daftar-bg border-0" id="basic-addon1"> </span>
                                <input type="text" class="form-control rounded-0" name="alamat" placeholder="Alamat" aria-label="alamat" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text daftar-bg border-0" id="basic-addon1"> </span>
                                <input type="password" class="form-control rounded-0" name="password" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6">
                            <input type="submit" class="btn daftar-bg w-100" value="DAFTAR">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div>
            <img src="../asset/img/banner-hero.png" alt="" class="position-absolute end-0 top-0 hero-img accent-img">
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="../asset/js/bootstrap.bundle.min.js"></script>
</body>

</html>