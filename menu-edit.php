<?php
include 'koneksi.php';
if (isset($_POST['submit'])) {
	
	if(strlen($_FILES["img"]["name"])>0){

		$vdir_upload = "img/menu/";
		$vfile_upload = $vdir_upload . $_FILES["img"]["name"];
		move_uploaded_file($_FILES["img"]["tmp_name"], $vfile_upload);
		$gambar=$_FILES["img"]["name"];
		$g=", foto_menu='$gambar'";
	}else{
		$g="";
	}
//$jenis=$_POST['Jenis'];
	$id=$_POST['id'];
	$nama=$_POST['Nama'];
	$harga=$_POST['Harga'];

	$update=mysqli_query($conn,"UPDATE tbl_menu set nama_menu='$nama', harga_menu='$harga' $g where id_menu='$id'");
//$insert=mysqli_query($conn,"INSERT INTO tbl_menu values ('$numerik','$nama','$harga','$gambar')");
	if ($update) {
		echo "<script>alert('$nama berhasil diubah');window.href.location=admin.php?p=menu;</script>";

	}else{
		echo "<script>alert('$nama gagal diubah');window.href.location=admin.php?p=menu;</script>";
	}

	header('location: admin.php?p=menu');
}
$em=mysqli_fetch_array(mysqli_query($conn,"SELECT * from tbl_menu where id_menu = '".$_GET['id']."'"));
?>

<div class="container">
	<div class="col-lg-12">
		<div class="box card" style="margin:10px;padding: 10px;background: white;border-top: lightblue solid 4px">
			<form method="POST" enctype="multipart/form-data">
				<div class="modal-header">						
					<h4 class="modal-title">Edit Menu <?php echo $em['nama_menu']; ?></h4>
				</div>
				<div class="modal-body">	
					<input type="text" name="id" value="<?php echo $em['id_menu']; ?>" hidden>			
					<div class="form-group">
						<img width="100px" src="img/menu/<?php echo $em['foto_menu'] ?>">
					</div>	
					<div class="form-group">
						<label>Gambar *</label>
						<input type="file" class="form-control" name="img">
						<small style="color: red">*) Abaikan jika tidak ada perubahan gambar</small>
					</div>	
					<div class="form-group">
						<label>Nama Menu</label>
						<input type="text" class="form-control" name="Nama" value="<?php echo $em['nama_menu'];?>" required>
					</div>
					<div class="form-group">
						<label>Harga</label>	
						<input type="number" class="form-control" name="Harga" value="<?php echo $em['harga_menu'];?>" min="0" required>
					</div>	
				</div>
				<input type="text" name="id" value="<?php echo $em['id_menu']; ?>" hidden>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-info"  name="submit" value="Save">
				</div>
			</form>
		</div>
	</div>
</div>