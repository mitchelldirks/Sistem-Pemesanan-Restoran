<?php
include 'koneksi.php';

if(isset($_POST['img'])){
	$gambar=$_POST['img'];
	$g=", foto_menu='$gambar'";
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
?>