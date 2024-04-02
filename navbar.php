<?php
include 'koneksi.php';
date_default_timezone_set("Asia/Jakarta");

$identitas = mysqli_query($conn, "SELECT * FROM pengaturan ORDER BY id DESC");
$d = mysqli_fetch_object($identitas);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMK Muhammadiyah Pencongan</title>
    <link rel="icon" type="image/x-icon" href="assets/img/Logo SMK Muhapen.png">
    <link rel="stylesheet" href="assets/css/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome-free-6.5.1-web/css/all.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-white" >
        <div class="container">
            <a class="navbar-brand d-flex" href="index.php">
                <img src="./assets/img/logo muhapen.svg" alt="" width="300">
            </a>
            <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item my-auto px-2">
                        <a class="nav-link active" aria-current="page" href="index.php">Beranda</a>
                    </li>
                    <li class="nav-item dropdown my-auto px-2">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Profil
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="visimisi.php">Visi Misi Sekolah</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown my-auto px-2">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Jurusan
                        </a>
                        <ul class="dropdown-menu">
                            <?php
                            $jurusan = mysqli_query($conn, "SELECT * FROM jurusan ORDER BY id DESC");
                            if (mysqli_num_rows($jurusan) > 0) {
                                while ($j = mysqli_fetch_array($jurusan)) {
                                    ?>
                            <li><a class="dropdown-item" href="detail-jurusan.php?id=<?= $j['id'] ?>"><?= $j['nama'] ?></a></li>
                            <?php }

                            } else { ?>

                                Tidak ada data

                            <?php } ?>
                            </ul>
                    </li>
                    <li class="nav-item my-auto px-2">
                        <a class="nav-link" href="galeri.php">Galeri</a>
                    </li>
                    <li class="nav-item my-auto px-2">
                        <a class="nav-link" href="postingan.php">Postingan</a>
                    </li>
                    <li class="nav-item my-auto px-2">
                        <a class="nav-link" href="kontak.php">Kontak</a>
                    </li>
                    <li class="nav-item my-auto">
                        <a class="nav-link" href="login.php"><button class="btn btn-primary">Login</button></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <script src="assets/css/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>