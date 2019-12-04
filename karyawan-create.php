<?php
include 'koneksi.php';

$role=$_POST['Jenis'];
$nama=$_POST['Nama'];
$dom=$_POST['Domisili'];
$contact=$_POST['Kontak'];

$cek="SELECT * from tbl_karyawan where id_karyawan like '$role%' order by id_karyawan desc";
echo $cek;
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

	echo '<br>'.$role;
	echo '<br>'.$level;
	echo "<br>".$c;
$insert=mysqli_query($conn,"INSERT INTO tbl_karyawan values ('$c','$nama','$dom','$role','$contact')");
echo '<br>'.$insert;
$pass=md5($c);
$acc=mysqli_query($conn,"INSERT INTO tbl_user values ('$c','$pass','$level')");
echo '<br>'.$acc;

if ($insert and $acc) {
	echo "<script>alert('$nama berhasil ditambahkan dengan kode $c');window.href.location=admin.php?p=karyawan;</script>";
}else{
	echo "<script>alert('$nama gagal ditambahkan');window.href.location=admin.php?p=karyawan;</script>";
}

header('location: admin.php?p=karyawan');

?>