<?php include 'navbar.php'; ?>
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
                    <h3 class="fw-bold">Postingan</h3>
                    <hr class="mx-0">
                    <div class="container d-flex flex-row flex-wrap gap-3 justify-content-evenly">

                        <?php
                        $informasi = mysqli_query($conn, "SELECT * FROM informasi ORDER BY id desc");
                        if (mysqli_num_rows($informasi) > 0) {
                            while ($p = mysqli_fetch_array($informasi)) {
                                ?>
                                <a href="detail-postingan.php?id=<?= $p['id'] ?>" class="text-decoration-none  ">
                                    <div class="card" style="width: 18rem; height: 23rem;">
                                        <div class="w-100 h-100 d-flex justify-content-center align-items-center overflow-hidden border border-top-0 border-start-0 border-end-0" >
                                            <img src="uploads/informasi/<?= $p['gambar'] ?>" class="w-100 h-100 object-fit-cover" alt="...">
                                        </div>
                                        <div class="card-body d-flex flex-column justify-content-between ">
                                            <h6 class="card-title">
                                                <?= $p['judul'] ?>
                                            </h6>
                                            <p class="card-text"><small class="text-muted">Dibuat pada
                                                    <?= date('d/m/Y', strtotime($p['created_at'])); ?>
                                                </small></p>
                                        </div>
                                    </div>
                                </a>
                            <?php }
                        } else { ?>

                            Tidak ada data

                        <?php } ?>

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
                                    <div class="overflow-hidden w-50 h-100 d-flex justify-content-center align-items-center overflow-hidden rounded" >
                                        <img src="uploads/informasi/<?= $p['gambar'] ?>" class="w-100 h-100 object-fit-cover" alt="">
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