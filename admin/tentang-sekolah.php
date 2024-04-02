<?php include 'header.php' ?>

<!-- content -->
<div class="content">

	<div class="container">

		<div class="box">

			<div class="box-header">
				Tentang Sekolah
			</div>

			<div class="box-body">

				<?php
				if (isset ($_GET['success'])) {
					echo "<div class='alert alert-success'>" . $_GET['success'] . "</div>";
				}
				?>

				<form action="" method="POST" enctype="multipart/form-data">

					<div class="form-group">
						<label>Tentang Sekolah</label>
						<textarea name="tentang" class="input-control" placeholder="Tentang Sekolah"
							id="keterangan"><?= $d->tentang_sekolah ?></textarea>
						<script>
							$('#keterangan').summernote({
								tabsize: 2,
								height: 120,
								toolbar: [
									['style', ['style']],
									['font', ['bold', 'underline', 'clear']],
									['color', ['color']],
									['para', ['ul', 'ol', 'paragraph']],
									['view', ['fullscreen', 'codeview', 'help']]
								]
							});
						</script>
					</div>

					<div class="form-group">
						<label>Foto Sekolah</label>
						<img src="../uploads/identitas/<?= $d->foto_sekolah ?>" width="200px" class="image">
						<input type="hidden" name="foto_lama" value="<?= $d->foto_sekolah ?>">
						<input type="file" name="foto_baru[]" class="input-control" multiple>
					</div>

					<input type="submit" name="submit" value="Simpan Perubahan" class="btn btn-blue">

				</form>

				<?php

				if (isset ($_POST['submit'])) {

					$tentang = addslashes($_POST['tentang']);
					$currdate = date('Y-m-d H:i:s');
					$uploaded_files = array();

					// menampung dan validasi data foto sekolah
					foreach ($_FILES['foto_baru']['name'] as $key => $value) {

						$filename = $_FILES['foto_baru']['name'][$key];
						$tmpname = $_FILES['foto_baru']['tmp_name'][$key];
						$filesize = $_FILES['foto_baru']['size'][$key];
						$formatfile = pathinfo($filename, PATHINFO_EXTENSION);
						$rename = 'sekolah' . time() . '_' . $key . '.' . $formatfile;

						$allowedtype = array('png', 'jpg', 'jpeg', 'gif');

						if (!in_array($formatfile, $allowedtype)) {

							echo '<div class="alert alert-error">Format file foto sekolah tidak diizinkan.</div>';

							return false;

						} elseif ($filesize > 10000000) {

							echo '<div class="alert alert-error">Ukuran file foto sekolah tidak boleh lebih dari 10 MB.</div>';

							return false;

						} else {

							if (file_exists("../uploads/identitas/" . $_POST['foto_lama'])) {

								unlink("../uploads/identitas/" . $_POST['foto_lama']);

							}

							move_uploaded_file($tmpname, "../uploads/identitas/" . $rename);
							$uploaded_files[] = $rename;

						}

					}

					
					$foto_sekolah = implode(',', $uploaded_files);

				$update = mysqli_query($conn, "UPDATE pengaturan SET
										tentang_sekolah = '" . $tentang . "',
										foto_sekolah = '" . $foto_sekolah . "',
										updated_at = '" . $currdate . "'
										WHERE id = '" . $d->id . "'
									");


				if ($update) {
					echo "<script>window.location='tentang-sekolah.php?success=Edit Data Berhasil'</script>";
				} else {
					echo 'gagal edit ' . mysqli_error($conn);
				}
			}

				?>

			</div>

		</div>

	</div>

</div>

<?php include 'footer.php' ?>