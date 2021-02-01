<?php
if (isset($_POST['submit'])) {
	
	$id=$_POST['id'];
	$nama=$_POST['Nama'];
	$role=$_POST['Jenis'];
	$dom=$_POST['Domisili'];
	$contact=$_POST['Kontak'];


	if ($role=='AD') {
		$role='Admin';
		$level=0;
	}elseif ($role=='KO') {
		$role='Koki';
		$level=2;
	}elseif ($role=='KA') {
		$role='Kasir';
		$level=1;
	}

	$update=mysqli_query($conn,"UPDATE tbl_karyawan set nama_karyawan='$nama', alamat_karyawan='$dom', pekerjaan_karyawan='$role', tlp_karyawan='$contact' where id_karyawan='$id'");
//$insert=mysqli_query($conn,"INSERT INTO tbl_menu values ('$numerik','$nama','$harga','$gambar')");
	if ($update) {
		echo "<script>alert('$nama berhasil diubah');window.href.location=admin.php?p=karyawan;</script>";

	}else{
		echo "<script>alert('$nama gagal diubah');window.href.location=admin.php?p=karyawan;</script>";
	}

	header('location: admin.php?p=karyawan');
}
$em=mysqli_fetch_array(mysqli_query($conn,"SELECT * from tbl_karyawan where id_karyawan = '".$_GET['id']."'"));
?>

<div class="container">
	<div class="col-lg-12">
		<div class="box card" style="margin:10px;padding: 10px;background: white;border-top: lightblue solid 4px">
			<form method="POST" enctype="multipart/form-data">
				
				<div class="modal-header">						
					<h4 class="modal-title">Edit Karyawan <?php echo $em['nama_karyawan']; ?></h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">	
					<input type="text" name="id" value="<?php echo $em['id_karyawan']; ?>" hidden>				
					<div class="form-group">
						<label>Pekerjaan</label>
						<select class="form-control" name="Jenis">
							<option disabled selected>Pilih Pekerjaan</option>
							<option value="AD" <?php if ($em['pekerjaan_karyawan']!='Admin'){}else{echo "selected";}?>>Admin</option>
							<option value="KA" <?php if ($em['pekerjaan_karyawan']!='Kasir'){}else{echo "selected";}?>>Kasir</option>
							<option value="KO" <?php if ($em['pekerjaan_karyawan']!='Koki'){}else{echo "selected";}?>>Koki</option>
						</select>
					</div>			
					<div class="form-group">
						<label>Nama Karyawan</label>
						<input type="text" class="form-control" value="<?php echo $em['nama_karyawan']; ?>" name="Nama" required>
					</div>
					<div class="form-group">
						<label>Domisili</label>
						<input type="text" class="form-control" name="Domisili" value="<?php echo $em['alamat_karyawan']; ?>" required>
					</div>
					<div class="form-group">
						<label>Kontak</label>
						<input type="text" class="form-control" value="<?php echo $em['tlp_karyawan']; ?>" name="Kontak" required>
					</div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-info" name="submit" value="Save">
				</div>
			</form>
		</div>
	</div>
</div>