<?php
if (isset($_POST['submit'])) {
	
	$role=$_POST['Jenis'];
	$nama=$_POST['Nama'];
	$dom=$_POST['Domisili'];
	$contact=$_POST['Kontak'];

	$cek="SELECT * from tbl_karyawan where id_karyawan like '$role%' order by id_karyawan desc";
	// echo $cek;
	$cek_id=mysqli_query($conn,$cek);
	if (mysqli_num_rows($cek_id) > 0) {
		$c=mysqli_fetch_array($cek_id);
		$c=$c['id_karyawan'];
		$c++;
	}else{
		$c=$role.'000';
		$c++;
	}

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

	// echo '<br>'.$role;
	// echo '<br>'.$level;
	// echo "<br>".$c;
	$insert=mysqli_query($conn,"INSERT INTO tbl_karyawan values ('$c','$nama','$dom','$role','$contact')");
	// echo '<br>'.$insert;
	$pass=md5($c);
	$acc=mysqli_query($conn,"INSERT INTO tbl_user values ('$c','$pass','$level')");
	// echo '<br>'.$acc;

	if ($insert and $acc) {
		echo "<script>alert('$nama berhasil ditambahkan dengan kode $c');window.href.location=admin.php?p=karyawan;</script>";
	}else{
		echo "<script>alert('$nama gagal ditambahkan');window.href.location=admin.php?p=karyawan;</script>";
	}

	header('location: admin.php?p=karyawan');

}
?>

<div class="container">
	<div class="col-lg-12">
		<div class="box card" style="margin:10px;padding: 10px;background: white;border-top: lightblue solid 4px">
			<form method="POST" enctype="multipart/form-data">
				
				<div class="modal-header">						
					<h4 class="modal-title">Tambah Data Karyawan</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">	
					<div class="form-group">
						<label>Pekerjaan</label>
						<select class="form-control" name="Jenis">
							<option disabled selected>Pilih Jenis Pekerjaan</option>
							<option value="AD">Admin</option>
							<option value="KA">Kasir</option>
							<option value="KO">Koki</option>
						</select>
					</div>			
					<div class="form-group">
						<label>Nama Karyawan</label>
						<input type="text" class="form-control" name="Nama" required>
					</div>
					<div class="form-group">
						<label>Domisili</label>
						<input type="text" class="form-control" name="Domisili" required>
					</div>
					<div class="form-group">
						<label>Kontak</label>
						<input type="number" class="form-control" name="Kontak" required>
					</div>
					
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success" name="submit" value="Add">
				</div>
			</form>
		</div>
	</div>
</div>