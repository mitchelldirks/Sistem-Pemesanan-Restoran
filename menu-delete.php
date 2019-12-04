<?php
include 'koneksi.php';
$id=$_GET['id'];
$delete=mysqli_query($conn,'DELETE from tbl_menu where id_menu="'.$id.'"');
header('location: admin.php?p=menu');
?>