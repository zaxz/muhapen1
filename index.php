<?php include 'navbar.php';

$slider = mysqli_query($conn, "SELECT * FROM slider ORDER BY id DESC");
$i = 0;
$div = '';
        while ($s = mysqli_fetch_array($slider)) {
            if ($i==0) {
                $div .='
                <div class="carousel-item active ratio ratio-16x9" data-bs-interval="5000">
                        <img src="uploads/slider/'.$s['gambar'].'" class="d-block w-100" alt="...">
                    </div>
                ';
            } 
            else {
                $div .='
                <div class="carousel-item ratio ratio-16x9" data-bs-interval="5000">
                        <img src="uploads/slider/'.$s['gambar'].'" class="d-block w-100" alt="...">
                    </div>
                ';
            }

            // $div .='</div>';
            $i++;
        }



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/stylex.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>
    <!-- slider -->
    <div id="carouselExample" class="carousel slide container" data-bs-ride="carousel" data-aos="fade-down">
        <div class="carousel-inner ">

        <?= $div ?>
            <!-- <?php
            $slider = mysqli_query($conn, "SELECT * FROM slider ORDER BY id DESC");
            $i = 0;
            $div = "";
            if (mysqli_num_rows($slider) > 0) {
                while ($s = mysqli_fetch_array($slider)) {
                    ?>
                    <div class="carousel-item active ratio ratio-16x9" data-bs-interval="5000">
                        <img src="uploads/slider/<?= $s['gambar'] ?>" class="d-block w-100" alt="...">
                    </div>
                <?php }

            } else { ?>

                Tidak ada data

            <?php } ?> -->


            <!-- <div class="carousel-item ratio ratio-16x9" data-bs-interval="5000">
                <img src="https://dummyimage.com/hd500" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item active ratio ratio-16x9" data-bs-interval="5000">
                <img src="https://dummyimage.com/hd1080" class="d-block w-100" alt="...">
            </div> -->
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- akhir slider -->

    <!-- sambutan -->
    <section class="container text-center " >
        <h2 class="fw-bold fs-1" data-aos="fade-right">Sambutan Kepala Sekolah</h2>
        <hr>
        <img src="uploads/identitas/<?= $d->foto_kepsek ?>" style="width: 10rem;" data-aos="zoom-in">
        <h3 data-aos="fade-left">
            <?= $d->nama_kepsek ?>
        </h3>
        <p class="" data-aos="fade-down">
            <?= $d->sambutan_kepsek ?>
            <!-- Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia animi totam aperiam dignissimos,
                tempora dicta fugiat sint, possimus adipisci accusamus consequatur. Cum, nemo? Molestiae tenetur ex
                possimus excepturi voluptates! Ratione, dolorem dolor? Commodi sint porro laboriosam ratione, excepturi
                blanditiis ea quae possimus facilis sequi veniam. Quasi, tempore! Voluptas totam placeat omnis dolore
                ipsam molestias sequi quaerat dolor. Porro deserunt ullam cum quos at consequuntur exercitationem, enim
                deleniti reiciendis sequi eligendi ducimus voluptatum qui sunt similique nostrum officia. Facere
                nesciunt voluptatibus accusantium rem suscipit cupiditate ipsa voluptatem ut eos nulla officia, cumque
                nihil totam dolore laudantium atque doloremque neque, pariatur sint. -->
        </p>
    </section>
    <!-- akhir sambutan -->

    <!-- Jurusan -->
    <section class="container-fluid text-center bg-body-secondary py-4">
        <h2 class="fw-bold fs-1 " data-aos="fade-up">Jurusan</h2>
        <hr>
        <p class="">Daftar jurusan yang ada di SMK Muhammadiyah Pencongan</p>
        <div class="d-flex flex-row flex-wrap justify-content-center gap-3 my-2">
            <?php
            $jurusan = mysqli_query($conn, "SELECT * FROM jurusan ORDER BY id DESC");
            if (mysqli_num_rows($jurusan) > 0) {
                while ($j = mysqli_fetch_array($jurusan)) {
                    ?>
                    <a href="detail-jurusan.php?id=<?= $j['id'] ?>" class="text-center text-decoration-none text-black">
                        <img src="uploads/jurusan/<?= $j['gambar'] ?>" alt="" class="" style="width: 10rem; height:10rem;">
                        <h3>
                            <?= $j['singkat'] ?>
                        </h3>
                    </a>
                <?php }

            } else { ?>

                Tidak ada data

            <?php } ?>


            <!-- <a href="" class="text-center text-decoration-none text-black">
                <img src="https://dummyimage.com/hd500" alt="" class="" style="width: 10rem;">
                <h3>TBSM</h3>
            </a>
            <a href="" class="text-center text-decoration-none text-black">
                <img src="https://dummyimage.com/hd500" alt="" class="" style="width: 10rem;">
                <h3>TBKR</h3>
            </a>
            <a href="" class="text-center text-decoration-none text-black">
                <img src="https://dummyimage.com/hd500" alt="" class="" style="width: 10rem;">
                <h3>AKL</h3>
            </a> -->

        </div>
    </section>
    <!-- akhir Jurusan -->

    <!-- Postingan -->
    <section class="container">
        <h2 class="fw-bold text-center fs-1" data-aos="fade-up">Postingan Terbaru</h2>
        <hr>
        <div class="container d-flex flex-row  gap-3 overflow-scroll">

            <?php
            $informasi = mysqli_query($conn, "SELECT * FROM informasi ORDER BY id desc limit 5");
            if (mysqli_num_rows($informasi) > 0) {
                while ($p = mysqli_fetch_array($informasi)) {
                    ?>
                    <a href="detail-postingan.php?id=<?= $p['id'] ?>" class="text-decoration-none mb-3">
                        <div class="card" style="width: 18rem; height: 23rem;">
                            <div
                                class="w-100 h-100 d-flex justify-content-center align-items-center overflow-hidden border border-top-0 border-start-0 border-end-0">
                                <img src="uploads/informasi/<?= $p['gambar'] ?>" class="w-100 h-100 object-fit-cover" alt="...">
                            </div>
                            <div class="card-body d-flex flex-column justify-content-between " style="height:150px;">
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
    </section>
    <!-- akhir Postingan -->


    <?php include 'footer.php' ?>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
    AOS.init();
  </script>
</body>

</html>