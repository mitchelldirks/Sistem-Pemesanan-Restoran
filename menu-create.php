<?php
// include 'koneksi.php';
if (isset($_POST['submit'])) {
	// print_r($_FILES["img"]);exit;
	$vdir_upload = "img/menu/";
	$vfile_upload = $vdir_upload . $_FILES["img"]["name"];
	move_uploaded_file($_FILES["img"]["tmp_name"], $vfile_upload);
	$gambar=$_FILES["img"]["name"];
	$jenis=$_POST['Jenis'];
	$nama=$_POST['Nama'];
	$harga=$_POST['Harga'];
	if ($jenis=='F') {
		$numerik=mysqli_query($conn,"SELECT * FROM tbl_menu where id_menu like 'F%' order by id_menu DESC");
		$n=mysqli_fetch_array($numerik);
		$numerik=$n['id_menu'];
	}elseif ($jenis=='D') {
		$numerik=mysqli_query($conn,"SELECT * FROM tbl_menu where id_menu like 'D%' order by id_menu DESC");
		$n=mysqli_fetch_array($numerik);
		$numerik=$n['id_menu'];
	}elseif ($jenis=='P') {
		$numerik=mysqli_query($conn,"SELECT * FROM tbl_menu where id_menu like 'P%' order by id_menu DESC");
		$n=mysqli_fetch_array($numerik);
		$numerik=$n['id_menu'];
	}
	$numerik++;
	$insert=mysqli_query($conn,"INSERT INTO tbl_menu values ('$numerik','$nama','$harga','$gambar')");
	// if ($insert) {
	echo "<script>alert('$nama berhasil ditambahkan');window.href.location=admin.php?p=menu;</script>";
	echo "<script>window.href.location=admin.php?p=menu;</script>";
	// }else{
		// echo "<script>alert('$nama gagal ditambahkan');window.href.location=admin.php?p=menu;</script>";
	// }
	header('location: admin.php?p=menu');
}
?>
<div class="container">
	<div class="col-lg-12">
		<div class="box card" style="margin:10px;padding: 10px;background: white;border-top: lightblue solid 4px">
			<form method="POST" enctype="multipart/form-data">
				<div class="card-header">						
					<h4 class="card-title">Tambah Menu</h4>
				</div>
				<div class="card-body">	
					<div class="form-group">
						<label>Gambar</label>
						<input type="file" class="form-control" name="img" required>
					</div>	
					<div class="form-group">
						<label>Jenis</label>
						<select class="form-control" name="Jenis">
							<option disabled selected>Pilih Jenis</option>
							<option value="F" <?php if (@$_GET["item"]!="makanan"){echo "";}else{echo "selected";} ?>>Makanan</option>
							<option value="D"  <?php if (@$_GET["item"]!="minuman"){echo "";}else{echo "selected";} ?>>Minuman</option>
							<option value="P"  <?php if (@$_GET["item"]!="paket"){echo "";}else{echo "selected";} ?>>Paket</option>
						</select>
					</div>			
					<div class="form-group">
						<label>Nama Menu</label>
						<input type="text" class="form-control" name="Nama" required>
					</div>
					<div class="form-group">
						<label>Harga</label>	
						<input type="number" class="form-control" name="Harga" min="0" required>
					</div>
				</div>
				<div class="card-footer">
					<button type="submit" class="btn btn-success" name="submit">Tambah</button>
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
				</div>
			</form>
		</div>
	</div>
</div>