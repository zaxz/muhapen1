<?php include 'navbar.php'; 
$wa = $d->whatsapp;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="bg-body-secondary">
        <div class="container">
            <div class="row justify-content-around">
                <div class="col-12 col-md-7  bg-white my-3 rounded p-4" style="height:fit-content;">
                    <h3 class="fw-bold">Hubungi Kami</h3>
                    <hr class="mx-0">
                    <div class="row gy-3 align-content-center justify-content-center mx-auto ">
                        <div class="col-md-12">
                            <h4 class="fw-bold">Informasi</h4>
                            <div class="d-flex flex-column container">
                                <div class=" text-black d-flex flex-row mb-3 ">
                                    <i class="fa-solid fa-envelope me-2 my-auto fs-5"></i>
                                    <h5 class="my-auto"><?= $d->email ?></h5>
                                </div>
                                <div class=" text-black d-flex flex-row mb-3 ">
                                    <i class="fa-solid fa-phone me-2 my-auto fs-5"></i>
                                    <h5 class="my-auto"><?= $d->telepon ?></h5>
                                </div>
                                <a href="https://wa.me/62<?= substr($wa,1) ?>" class="text-decoration-none text-black d-flex flex-row mb-3 link">
                                    <i class="fa-brands fa-whatsapp me-2 my-auto fs-4"></i>
                                    <h5 class="my-auto"><?= $d->whatsapp ?></h5>
                                </a>
                                <a href="https://facebook.com/<?= $d->facebook ?>" class="text-decoration-none text-black d-flex flex-row mb-3  link">
                                    <i class="fa-brands fa-square-facebook me-2 my-auto fs-4  "></i>
                                    <h5 class="my-auto "><?= $d->facebook ?></h5>
                                </a>
                                <a href="https://instagram.com/<?= $d->instagram ?>" class="text-decoration-none text-black d-flex flex-row mb-3 link">
                                    <i class="fa-brands fa-instagram me-2 my-auto fs-4"></i>
                                    <h5 class="my-auto fs-"><?= $d->instagram ?></h5>
                                </a>
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <h4 class="fw-bold">Lokasi Sekolah</h4>
                            <div class="container">

                                <div href="" class="text-decoration-none text-black d-flex flex-row mb-3 ">
                                    <i class="fa-solid fa-location-dot me-2 my-auto fs-4"></i>
                                    <p class="my-auto fw-normal">Jl. A. Yani No.277b, Bener Dua, Bener, Kec. Wiradesa, Kabupaten Pekalongan, Jawa Tengah 51152</p>
                                </div>
                                <iframe id="map"
                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15843.99159066309!2d109.6331144!3d-6.8908535!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70271f9e725b67%3A0x46db7984fcf7e384!2sSMK%20Muhammadiyah%20Pencongan!5e0!3m2!1sid!2sid!4v1710680901694!5m2!1sid!2sid"
                                style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                                <!-- width="600" height="450"  -->
                            </div>
                        </div>

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
                                    <div
                                        class="overflow-hidden w-50 h-100 d-flex justify-content-center align-items-center overflow-hidden rounded">
                                        <img src="uploads/informasi/<?= $p['gambar'] ?>" class="img-fluid" alt="">
                                    </div>
                                    <div class="ms-1 d-flex flex-column justify-content-between"
                                        style="width: 55%; height: auto;">
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