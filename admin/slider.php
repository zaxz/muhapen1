<?php include 'header.php' ?>

<!-- content -->
<div class="content">

	<div class="container">

		<div class="box">

			<div class="box-header">
				Slider
			</div>

			<div class="box-body">

				<a href="tambah-slider.php" class="text-green"><i class="fa fa-plus"></i> Tambah</a>

				<?php
				if (isset ($_GET['success'])) {
					echo "<div class='alert alert-success'>" . $_GET['success'] . "</div>";
				}
				?>

				<form action="">
					<div class="input-group">
						<input type="text" name="key" placeholder="Pencarian">
						<button type="submit"><i class="fa fa-search"></i></button>
					</div>
				</form>


				<table class="table">
					<thead>
						<tr>
							<th>No</th>
							<th>Foto</th>
							<th>Aksi</th>
						</tr>
					</thead>

					<tbody>
						<?php
						$no = 1;
						$slider = mysqli_query($conn, "SELECT * FROM slider  ORDER BY id DESC");
						if (mysqli_num_rows($slider) > 0) {
							while ($p = mysqli_fetch_array($slider)) {
								?>

								<tr>
									<td>
										<?= $no++ ?>
									</td>
									<td><img src="../uploads/slider/<?= $p['gambar'] ?>" width="500px" height=""></td>
									<td>
										<a href="edit-slider.php?id=<?= $p['id'] ?>" title="Edit Data" class="text-orange"><i
												class="fa fa-edit"></i></a>
										<a href="hapus.php?idslider=<?= $p['id'] ?>"
											onclick="return confirm('Yakin ingin hapus ?')" title="Hapus Data"
											class="text-red"><i class="fa fa-times"></i></a>
									</td>
								</tr>

							<?php }
						} else { ?>
							<tr>
								<td colspan="4">Data tidak ada</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>

			</div>

		</div>

	</div>

</div>

<?php include 'footer.php' ?>