<?php include 'header.php' ?>

		<!-- content -->
		<div class="content">

			<div class="container">

				<div class="box">

					<div class="box-header">
						Identitas Sekolah
					</div>

					<div class="box-body">

						<?php
							if(isset($_GET['success'])){
								echo "<div class='alert alert-success'>".$_GET['success']."</div>";
							}
						?>
						
						<form action="" method="POST" enctype="multipart/form-data">
							
							<div class="form-group">
								<label>Nama</label>
								<input type="text" name="nama" placeholder="Nama Sekolah" value="<?= $d->nama ?>" class="input-control" required>
							</div>

							<div class="form-group">
								<label>Email</label>
								<input type="email" name="email" placeholder="Email Sekolah" value="<?= $d->email ?>" class="input-control" required>
							</div>

							<div class="form-group">
								<label>Telepon</label>
								<input type="text" name="telp" placeholder="Telepon Sekolah" value="<?= $d->telepon ?>" class="input-control" required>
							</div>
							<div class="form-group">
								<label>Whatsapp</label>
								<input type="text" name="wa" placeholder="Whatsapp" value="<?= $d->whatsapp ?>" class="input-control" required>
							</div>
							<div class="form-group">
								<label>Facebook</label>
								<input type="text" name="fb" placeholder="Facebook" value="<?= $d->facebook ?>" class="input-control" required>
							</div>
							<div class="form-group">
								<label>Instagram</label>
								<input type="text" name="ig" placeholder="Instagram" value="<?= $d->instagram ?>" class="input-control" required>
							</div>

							

							<input type="submit" name="submit" value="Simpan Perubahan" class="btn btn-blue">

						</form>

						<?php

							if(isset($_POST['submit'])){

								$nama 	= addslashes(ucwords($_POST['nama']));
								$email 	= addslashes($_POST['email']);
								$telp 	= addslashes($_POST['telp']);
								$wa 	= addslashes($_POST['wa']);
								$fb 	= addslashes($_POST['fb']);
								$ig 	= addslashes($_POST['ig']);
								$alamat	= addslashes($_POST['alamat']);
								$gmaps 	= addslashes($_POST['gmaps']);
								$currdate = date('Y-m-d H:i:s');

								$update = mysqli_query($conn, "UPDATE pengaturan SET
										nama = '".$nama."',
										email = '".$email."',
										telepon = '".$telp."',
										whatsapp = '".$wa."',
										facebook = '".$fb."',
										instagram = '".$ig."',
										alamat = '".$alamat."',
										google_maps = '".$gmaps."',
										updated_at = '".$currdate."'
										WHERE id = '".$d->id."'
									");


								if($update){
									echo "<script>window.location='identitas-sekolah.php?success=Edit Data Berhasil'</script>";
								}else{
									echo 'gagal edit '.mysqli_error($conn);
								}

							}

						?>

					</div>

				</div>

			</div>

		</div>

<?php include 'footer.php' ?>