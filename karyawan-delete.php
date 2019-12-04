<?php
include 'koneksi.php';
$id=$_GET['id'];
$delete=mysqli_query($conn,'DELETE from tbl_karyawan where id_karyawan="'.$id.'"');
$delete=mysqli_query($conn,'DELETE from tbl_user where username="'.$id.'"');
header('location: admin.php?p=karyawan');
?>