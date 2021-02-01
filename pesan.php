<?php
include "koneksi.php";
$mak = "SELECT * FROM tbl_menu where id_menu like 'F%'";
$min = "SELECT * FROM tbl_menu where id_menu like 'D%'";
$pak = "SELECT * FROM tbl_menu where id_menu like 'P%'";
$sql = "SELECT * FROM tbl_menu";
$data = $conn->query($sql);
$minum = $conn->query($min);
$makan = $conn->query($mak);
$paket = $conn->query($pak);
?>
<!DOCTYPE html>
<html ng-app>
<head>
	<title>Pemesanan Makanan</title>
	<link href="css/style.css" rel="stylesheet"/>
	<link href="css/bootstrap.css" rel="stylesheet"/>
	<script src="js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="js/angular.min.js"></script>
	<style type="text/css">
		a{
			text-decoration: none;
			color: #666;
		}
		a:hover{
			text-decoration: none;
			color: black;
		}
		.listt li:hover{
			background-color: #eee;
		}
		.thumbnail:hover{
			background-color: #eee;
		}
		h4{

			color: #666;
		}

	</style>
</head>
<body>
	<div class="header">
		<div class="col-md-1">
			<img src="img/logo.png" width="100px">
		</div>
		<div class="col-md-9">
			<h1>Sistem Pemesanan Makanan Zahra Kueh</h1>
		</div>
		<div class="col-md-2">
			<button class="btn btn-danger glyphicon glyphicon-log-out">
				<a href="logout.php">LOGOUT</a>
			</button>
		</div>
	</div>
	<div class="container">
		<form action="aksi.php?aksi=insert" method="post">
			<div class="row">
				<div class="col-md-9">
					<div class="row">
						<div class="col-lg-12">
							<h2>Porsi Paket</h2>
							<?php
							while($row = $paket->fetch_array()){?>
								<div class="col-sm-6 col-md-3">
									<div class="thumbnail">
										<img src="img/menu/<?php echo $row['foto_menu'];?>" alt="...">
										<div class="caption">
											<input type="text" name="kode" value="<?php echo $row['id_menu'];?>" hidden>
											<h3><?php echo $row['nama_menu'];?></h3>
											<p>Rp. <?php echo $row['harga_menu'];?></p>
											<input min="0" type="number" name="<?php echo $row['foto_menu'];?>" class="qty" data-qty="<?=$row['foto_menu']?>" ng-model="<?php echo $row['id_menu'];?>" ng-init="<?php echo $row['id_menu'];?>=0"/>
										</div>
									</div>
								</div>
							<?php } ?>
						</div>

						<div class="col-lg-12">
							<h2>Makanan</h2>
							<?php
							while($row = $makan->fetch_array()){?>
								<div class="col-sm-6 col-md-3">
									<div class="thumbnail">
										<img src="img/menu/<?php echo $row['foto_menu'];?>" alt="...">
										<div class="caption">
											<input type="text" name="kode" value="<?php echo $row['id_menu'];?>" hidden>
											<h3><?php echo $row['nama_menu'];?></h3>
											<p>Rp. <?php echo $row['harga_menu'];?></p>
											<input min="0" type="number" name="<?php echo $row['foto_menu'];?>" class="qty" data-qty="<?=$row['foto_menu']?>" ng-model="<?php echo $row['id_menu'];?>" ng-init="<?php echo $row['id_menu'];?>=0"/>
										</div>
									</div>
								</div>
							<?php } ?>
						</div>
						<div class="col-lg-12">
							<h2>Minuman</h2>
							
							<?php
							while($row = $minum->fetch_array()){?>
								<div class="col-sm-6 col-md-3">
									<div class="thumbnail">
										<img src="img/menu/<?php echo $row['foto_menu'];?>" alt="...">
										<div class="caption">
											<input type="text" name="kode" value="<?php echo $row['id_menu'];?>" hidden>
											<h3><?php echo $row['nama_menu'];?></h3>
											<p>Rp. <?php echo $row['harga_menu'];?></p>
											<input min="0" type="number" name="<?php echo $row['foto_menu'];?>" class="qty" data-qty="<?=$row['foto_menu']?>" ng-model="<?php echo $row['id_menu'];?>" ng-init="<?php echo $row['id_menu'];?>=0"/>
										</div>
									</div>
								</div>
							<?php } ?>
						</div>
						
					</div>
				</div>
				<div class="col-md-3">
					<div class="col-md-12">
						<table class="table table-striped">
							<form action="">
								<input type="text" name="id_transaksi" value="<?php 
								$id_t=mysqli_query($conn,'SELECT * FROM tbl_Pesanan order by id_transaksi DESC');
								$r=mysqli_fetch_array($id_t);
								$bon=$r['id_transaksi']; $bon++;
								echo $bon;
								?>" hidden>
								<label> Tax are </label>
								{{total=0}}
								<?php
								$n=0;
								//$data = $conn->query($sel);
								while($row = $data->fetch_array()){ $n++; ?>
									
									
									<tr ng-show="<?=$row['id_menu']?> > 0">
										<td><?=$row['nama_menu']?></td>
										<td>{{ <?=$row['id_menu']?>}}</td>
										<td>{{ <?=$row['id_menu']?>*<?=$row['harga_menu']?> }}</td>
										<td hidden>{{ total = total + <?=$row['harga_menu']?>*<?=$row['id_menu']?>}}</td>
										<td>

											<input type="text" name="id_<?php echo $row['id_menu']; ?>" value="<?php echo $row['id_menu']; ?>" hidden>
											<input type="text" name="qty_<?php echo $row['id_menu']; ?>" value="{{<?=$row['id_menu']?>}}" hidden>

											<input type="text" name="total_<?php echo $row['id_menu']; ?>" value="{{<?=$row['harga_menu']?>*<?=$row['id_menu']?>}}" hidden>
										</td>

									</tr>
								<?php } ?>


								<tr>
									<td>Total</td>
									<td colspan="2" align="center">
										<!-- {{0<?php while($row = $data->fetch_array()){echo "+"."(".$row[harga_menu]."*".$row[id_menu].")";}?>}} -->

										<!-- {{(9000*D01)+(9000*D02)+(9000*D03)+(8000*D04)+(16500*F01)+(10000*F02)+(13000*F03)+(14000*F04)}} -->

										{{total}}
									</td>
								</tr>
								<tr>
									<td colspan="3" align="right">
										<button type="submit" class="btn btn-primary">Pesan</button>
									</td>
								</tr>
							</form>
							<?php
							$tr=mysqli_query($conn,"SELECT * from tbl_transaksi order by id_transaksi DESC limit 5");
							if (mysqli_num_rows($tr)>0) {?>
								<tr>
									<td colspan="4"><h4>Transaksi Terakhir</h4>
										<ul class="list-group">
											<?php 
											while($row=mysqli_fetch_array($tr)){
												$id_t=$row['id_transaksi'];
												$itm=mysqli_query($conn,"SELECT * from tbl_pesanan where id_transaksi='$id_t'");
												$qty=0;
												while ($item=mysqli_fetch_array($itm)) {
													$qty=$qty+$item['qty'];
												}
											//$tgl=date("F d H:i:s",$row['tanggal_transaksi']);
												?>
												<a class="listt" href="struk.php?id=<?php echo $id_t;?>">
													<li class="list-group-item"><?php echo mysqli_num_rows($itm);?> menu, <?=$qty?> item.
														<span class="pull-right"><?=$row['total']?></span>
														<br>
														<small><?php echo $row['tanggal_transaksi']; ?></small>
														<span class="pull-right"><?=$row['status']?></span>
													</li>
												</a>
											<?php } ?>
										</ul>
									</td>
								</tr>
							<?php } ?>
						</table>
					</div>
				</div>
			</div>
		</form>
	</div>
</body>
</html>
