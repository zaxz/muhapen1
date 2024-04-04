<?php include 'navbar.php';
$informasi = mysqli_query($conn, "SELECT * FROM informasi LEFT JOIN pengguna ON pengguna.id = informasi.created_by WHERE informasi.id = '" . $_GET['id'] . "'"); 
$j = mysqli_fetch_object($informasi);
$timestamp = strtotime($j->created_at);
$monthNumber = date('n', $timestamp);
$monthNames = array(
    1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
    5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
    9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
);

$monthName = $monthNames[$monthNumber];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container-fluid bg-body-secondary">
        <div class="container">
            <div class="row justify-content-around">
                <div class=" col-12 col-md-7  bg-white my-3  p-4" style="height:fit-content;">
                    <h3 class="fw-bold ">
                        <?= $j->judul ?>
                    </h3>
                    <small class="text-muted">Dibuat pada <?= date('d', $timestamp) . " " . $monthName . " " . date('Y', $timestamp); ?>, oleh <?= $j->nama ?></small>
                    <!-- <?= date('d', $timestamp) . " " . $monthName . " " . date('Y', $timestamp); ?>, oleh <?= $j->nama ?> -->
                    <div class="d-flex justify-content-center">
                        <img src="uploads/informasi/<?= $j->gambar ?>" class="img-fluid" alt="">
                    </div>
                    <div class="">
                        <?= $j->keterangan ?>
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
                                    <div class="overflow-hidden w-50 h-100 d-flex justify-content-center align-items-center overflow-hidden rounded ">
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
                <!-- akhir postingan terbaru -->
            </div>
        </div>
    </div>
    </div>
    <?php include 'footer.php' ?>
</body>

</html>