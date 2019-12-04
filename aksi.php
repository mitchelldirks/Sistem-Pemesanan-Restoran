<?php
session_start();
include "koneksi.php";
if($_GET['aksi']=="login"){
  $user = $_POST['username'];
  $pass = md5($_POST['password']);

  $cek = "SELECT * FROM tbl_user WHERE username='$user' AND password='$pass'";
  $data = $conn->query($cek);
  $jml = mysqli_num_rows($data);
  if($jml==0){
    echo '<script language="javascript">alert("Invalid username or password!"); document.location="index.php";</script>';
  }else{
    $row = $data->fetch_array();
        if($row['level']==0){
          $_SESSION['user']=$user;
          $_SESSION['level']=0;
          echo '<script language="javascript">alert("Anda berhasil Login Sebagai Admin!"); document.location="admin.php";</script>';
        }elseif($row['level']==1){
          $_SESSION['user']=$user;
          $_SESSION['level']=1;
          echo '<script language="javascript">alert("Anda berhasil Login Sebagai Kasir!"); document.location="pesan.php";</script>';
        }else{
          $_SESSION['user']=$user;
          $_SESSION['level']=2;
  				echo '<script language="javascript">alert("Anda berhasil Login Sebagai Koki!"); document.location="tampil.php";</script>';
        
    }
  }
}elseif ($_GET['aksi']=="insert") {
  //$ins = "INSERT INTO tbl_transaksi (fanta, coca_cola, pepsi, ice_cream, fried_chicken, burger, french_fries, spaghetti, status) VALUES ('$_POST[fanta]', '$_POST[cocacola]', '$_POST[pepsi]', '$_POST[icecream]', '$_POST[friedchicken]', '$_POST[burger]', '$_POST[frenchfries]', '$_POST[spaghetti]', 'Waiting')";
  //$ins="";
  $id_t=$_POST['id_transaksi'];
  $inp=mysqli_query($conn,"SELECT * from tbl_menu");
  $totalinajadah=0;
  while ($row=mysqli_fetch_array($inp)) {
  $id_menu=$row['id_menu'];
   $id=$_POST['id_'.$id_menu];
   $qty=$_POST['qty_'.$id_menu];
   $total=$_POST['total_'.$id_menu];
   $totalinajadah=$totalinajadah+$total;
   if ($qty > 0) {
     $ins="INSERT INTO tbl_pesanan VALUES (null, '$id_t','$id_menu','$qty','$total')";
     echo $ins;
     $conn->query($ins);
   }
  }
  if ($totalinajadah<1) {
    echo "<script>alert('Pesanan belum diisi!');window.location.href='pesan.php'</script>";
  }else{
  $sum=mysqli_query($conn,"INSERT INTO tbl_transaksi VALUES ('$id_t','WAITING','$totalinajadah',null)");
  header("location: struk.php?id=$id_t");
  }

}elseif ($_GET['aksi']=="selesai") {
  $no=$_GET['no'];
  $upd = "UPDATE tbl_transaksi SET status='Selesai' WHERE id_transaksi=$no";
  $conn->query($upd);
  header("location: tampil.php");

}

?>
