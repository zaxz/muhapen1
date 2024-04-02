<?php
session_start();
include '../koneksi.php';
if (!isset ($_SESSION['status_login'])) {
	echo "<script>window.location = '../login.php?msg=Harap Login Terlebih Dahulu!'</script>";
}
date_default_timezone_set("Asia/Jakarta");


$identitas = mysqli_query($conn, "SELECT * FROM pengaturan ORDER BY id DESC LIMIT 1");
$d = mysqli_fetch_object($identitas);
?>
<!DOCTYPE html>
<html>

<head>
	<link rel="icon" href="../uploads/identitas/<?= $d->favicon ?>">
	<title>Panel Admin -
		<?= $d->nama ?>
	</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
		integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">

	<!-- <link href="https://cdn.jsdelivr.net/npm/quill@2.0.0-rc.2/dist/quill.snow.css" rel="stylesheet" />
	<link rel="stylesheet" href="../assets/quill/quill.css">
	<script src="../assets/quill/quill.js"></script> -->

	<link href="https://cdn.jsdelivr.net/npm/suneditor@latest/dist/css/suneditor.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/suneditor@latest/dist/suneditor.min.js"></script>
	<!-- <script src="https://cdn.jsdelivr.net/npm/suneditor@latest/src/lang/ko.js"></script> -->

	<!-- summernote -->
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
		integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
		crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

	<!-- ckeditor -->
	<!-- <script src="https://cdn.ckeditor.com/4.22.1/basic/ckeditor.js"></script> -->
	<!-- <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script> -->


</head>

<body class="bg-light">

	<!-- navbar -->
	<div class="navbar">

		<div class="container">

			<!-- navbar brand -->
			<h2 class="nav-brand float-left"><a href="index.php">
					<?= $d->nama ?>
				</a></h2>

			<!-- navbar menu -->
			<ul class="nav-menu float-right">


				<?php if ($_SESSION['ulevel'] == 'Super Admin') { ?>

					<li><a href="jurusan.php">Jurusan</a></li>
					<li><a href="galeri.php">Galeri</a></li>
					<li><a href="informasi.php">Postingan</a></li>
					<li>
						<a href="#">Pengaturan <i class="fa fa-caret-down"></i></a>

						<!-- sub menu -->
						<ul class="dropdown">
							<li><a href="identitas-sekolah.php">Identitas Sekolah</a></li>
							<li><a href="tentang-sekolah.php">Tentang Sekolah</a></li>
							<li><a href="kepala-sekolah.php">Kepala Sekolah</a></li>
						</ul>
					</li>
					<li>
						<a href="#">
							<?= $_SESSION['uname'] ?> (
							<?= $_SESSION['ulevel'] ?>) <i class="fa fa-caret-down"></i>
						</a>
							<ul class="dropdown">
								<li><a href="pengguna.php">Pengguna</a></li>
								<li><a href="ubah-password.php">Ubah Password</a></li>
								<li><a href="logout.php">Keluar</a></li>
							</ul>

						<!-- sub menu -->
					</li>


				<?php } elseif ($_SESSION['ulevel'] == 'Admin') { ?>

					<li><a href="jurusan.php">Jurusan</a></li>
					

					<li><a href="informasi.php">Postingan</a></li>
					<li>
						<a href="#">Upload <i class="fa fa-caret-down"></i></a>

						<!-- sub menu -->
						<ul class="dropdown">
							<li><a href="slider.php">Slider</a></li>
							<li><a href="galeri.php">Galeri</a></li>
						</ul>
					</li>
					<li>
						<a href="#">Pengaturan <i class="fa fa-caret-down"></i></a>

						<!-- sub menu -->
						<ul class="dropdown">
							<li><a href="identitas-sekolah.php">Identitas Sekolah</a></li>
							<li><a href="tentang-sekolah.php">Tentang Sekolah</a></li>
							<li><a href="kepala-sekolah.php">Kepala Sekolah</a></li>
						</ul>
					</li>
					<li>
						<a href="#">
							<?= $_SESSION['uname'] ?> (
							<?= $_SESSION['ulevel'] ?>) <i class="fa fa-caret-down"></i>
						</a>
							<ul class="dropdown">
								<li><a href="ubah-password.php">Ubah Password</a></li>
								<li><a href="logout.php">Keluar</a></li>
							</ul>

						<!-- sub menu -->
					</li>

				<?php } ?>

			</ul>

			<div class="clearfix"></div>
		</div>

	</div>

</body>