<?php
include 'koneksi.php';

// if(isset($_POST['img'])){
// 	$gambar=$_POST['img'];
// 	$g=", foto_menu='$gambar'";
// }
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
?>