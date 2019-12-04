<?php
	include "koneksi.php";
	$sel = "SELECT * FROM tbl_transaksi WHERE status='WAITING'";
	$data = $conn->query($sel);

	if(isset($_GET['aksi'])){
	  $no=$_GET['no'];
	  $upd = "UPDATE tbl_transaksi SET status='Selesai' WHERE id_transaksi='$no'";
	  $conn->query($upd);
	 }
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Pemesanan Makanan</title>
		<link href="css/style.css" rel="stylesheet"/>
		<link href="css/bootstrap.css" rel="stylesheet"/>
		<script src="js/jquery-1.8.3.min.js"></script>
		<script type="text/javascript" src="js/angular.min.js"></script>
		<script type="text/javascript">
		    var auto_refresh = setInterval(
		    function () {
					window.location = './tampil.php';
		      //  $('#load_content').load('tampil.php').fadeIn("slow");
		    }, 5000); // refresh setiap 5000 milliseconds atau 5 detik

		</script>
	</head>
	<body>
		<div id="load_content">
			<div class="header">
				<div class="col-md-1">
					<img src="img/logo.png" width="100px">
				</div>
				<div class="col-md-9">
					<h1>Sistem Pemesanan Makanan Zahra Kueh</h1>
				</div>
				<div class="col-md-2">
					<a href="logout.php"><button class="btn btn-danger glyphicon glyphicon-log-out">
						LOGOUT
					</button></a>
				</div>
			</div>
			<div id="wrapper">
				<div class="row">
					<?php
					$no=1;
					while($row = $data->fetch_array()){?>
					<form action="form" method="GET">
					  <div class="col-sm-3 col-md-3">
					    <div class="thumbnail">
					      <div class="caption">
					        <h3><?php echo $no;?></h3>
					        	<table class="table table-striped">
											<tr>
												<th><b>Menu</b></th>
												<th><b>Qty</b></th>
											</tr>
											<?php 
		$order=mysqli_query($conn,"SELECT * FROM tbl_pesanan where id_transaksi='$row[id_transaksi]'");
											while ($ro=mysqli_fetch_array($order)) {
		$item=mysqli_query($conn,"SELECT * FROM tbl_menu where id_menu='$ro[id_menu]'");
		$r=mysqli_fetch_array($item);
											 ?>
											<tr>
												<td><?php echo $r['nama_menu'];?></td>
												<td><?php echo $ro['qty'];?></td>
												<?php	};?>
											</tr>
											<tr>
												<td class="text-danger">Waiting</td>
												<td>
													<a class="btn btn-primary" href="tampil.php?aksi=selesai&no=<?php echo $row['id_transaksi']; ?>">Selesai</a>
												</td>
											</tr>
										</table>
					      </div>
					    </div>
					  </div>
						<?php $no++; } ?>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
