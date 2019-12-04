<?php
include 'koneksi.php';

//if(isset($_POST['img'])){
$gambar=$_POST['img'];
//}
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
//echo $numerik;
//$numerik=$jenis+'00'+5;	

$insert=mysqli_query($conn,"INSERT INTO tbl_menu values ('$numerik','$nama','$harga','$gambar')");
if ($insert) {
	echo "<script>alert('$nama berhasil ditambahkan');window.href.location=admin.php?p=menu;</script>";

}else{
	echo "<script>alert('$nama gagal ditambahkan');window.href.location=admin.php?p=menu;</script>";
}

header('location: admin.php?p=menu');
?>