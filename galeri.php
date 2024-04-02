<?php include 'navbar.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/stylex.css">
</head>

<body>
    <div class="bg-body-secondary">
        <div class="container">
            <div class="row justify-content-around">
                <div class="col-12 col-md-7  bg-white my-3 rounded p-4" style="height:fit-content;">
                    <h3 class="fw-bold">Galeri</h3>
                    <hr class="mx-0">
                    <div class=" row gy-3 ">
                        <?php
                        $galeri = mysqli_query($conn, "SELECT * FROM galeri ORDER BY id desc");
                        if (mysqli_num_rows($galeri) > 0) {
                            while ($g = mysqli_fetch_array($galeri)) {
                        ?>

                                <div class="col-md-6">
                                    <div class="border w-100 h-100 " id="parent">
                                        <img src="uploads/galeri/<?= $g['foto'] ?>" class="rounded w-100 h-100 object-fit-cover">
                                        <div class="rounded" id="overlay">
                                            <h4 class="container" id="text"><?= $g['keterangan'] ?></h4>
                                        </div>
                                    </div>
                                </div>

                            <?php }
                        } else { ?>

                            Tidak ada data

                        <?php } ?>
                        <!-- <div class="col-md-6"><img src="https://dummyimage.com/hd1080" class="rounded w-100"></div>
                        <div class="col-md-6"><img src="https://dummyimage.com/hd1080" class="rounded w-100"></div>
                        <div class="col-md-6"><img src="https://dummyimage.com/hd1080" class="rounded w-100"></div>
                        <div class="col-md-6"><img src="https://dummyimage.com/hd1080" class="rounded w-100"></div> -->
                    </div>
                </div>
                <!-- postingan terbaru -->
                <div class="col-12 col-md-4  bg-white my-3 rounded p-4" style="height:fit-content;">
                    <h4>Postingan Terbaru</h4>
                    <hr class="mx-0">
                    <?php
                    $informasi = mysqli_query($conn, "SELECT * FROM informasi ORDER BY id DESC LIMIT 5");
                    if (mysqli_num_rows($informasi) > 0) {
                        while ($p = mysqli_fetch_array($informasi)) {
                    ?>
                            <a href="detail-postingan.php?id=<?= $p['id'] ?>" class="text-decoration-none ">
                                <div class="d-flex mb-2 border rounded kartu" style="width: 100%; height: 5.5rem;">
                                    <div class="overflow-hidden w-50 h-100 d-flex justify-content-center align-items-center overflow-hidden rounded">
                                        <img src="uploads/informasi/<?= $p['gambar'] ?>" class="w-100 h-100 object-fit-cover" alt="">
                                    </div>
                                    <div class="ms-1 d-flex flex-column justify-content-between" style="width: 55%; height: auto;">
                                        <h6 class="card-title text-black">
                                            <?= $p['judul'] ?>
                                        </h6>
                                        <small class="text-muted">Dibuat pada
                                            <?= date('d/m/Y', strtotime($p['created_at'])); ?>
                                        </small>
                                    </div>
                                </div>
                            </a>
                        <?php }
                    } else { ?>

                        Tidak ada data

                    <?php } ?>
                </div>
                <!-- akhir postinigan terbaru -->
            </div>
        </div>
    </div>
    </div>
    <?php include 'footer.php' ?>
</body>

</html>