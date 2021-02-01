<?php 
function bulan($bln)
{
	if ($bln==1) {$string = "Januari";}
	elseif ($bln==2) {$string = "Februari";}
	elseif ($bln==3) {$string = "Maret";}
	elseif ($bln==4) {$string = "April";}
	elseif ($bln==5) {$string = "Mei";}
	elseif ($bln==6) {$string = "Juni";}
	elseif ($bln==7) {$string = "Juli";}
	elseif ($bln==8) {$string = "Agustus";}
	elseif ($bln==9) {$string = "September";}
	elseif ($bln==10) {$string = "Oktober";}
	elseif ($bln==11) {$string = "November";}
	elseif ($bln==12) {$string = "Desember";}
	return $string;
}
?>
<div class="container">
	<div class="col-lg-12">
		<div class="box card" style="padding: 10px;background: white;border-top: lightblue solid 4px">
			<?php if (!isset($_GET['bulan'])): ?>
				<form>
					<input type="hidden" name="p" value="report">
					<div class="form-group">
						<label>Tahun</label>
						<select class="form-control" name="tahun">
							<?php $tahun=mysqli_query($conn,"SELECT distinct year(tanggal_transaksi) as tahun from tbl_transaksi order by tanggal_transaksi desc"); ?>
							<?php foreach ($tahun as $row): ?>
								<option value="<?php echo $row['tahun'] ?>"><?php echo $row['tahun'] ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="form-group">
						<label>Bulan</label>
						<select class="form-control" name="bulan">

							<?php for ($i=1;$i<=12;$i++): ?>
								<option value="<?php echo $i ?>" <?php if ($i==date('m')){echo "selected";} ?>><?php echo bulan($i) ?></option>
							<?php endfor ?>
						</select>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Cari</button>
					</div>

				</form>
				<?php else: ?>
					<span class="float-right"><a href="reports-print.php?tahun=<?php echo $_GET['tahun'] ?>&bulan=<?php echo $_GET['bulan'] ?>" target="_blank"><i class="fa fa-print"></i></a></span>
					<div class="table-responsive-lg">
						<table class="table table-hover">
							<thead>
								<th>Tanggal</th>
								<th>Transaksi</th>
								<th>Total</th>
							</thead>
							<tbody>
								<?php $sql="SELECT * from tbl_transaksi where tanggal_transaksi like '".$_GET['tahun']."-".$_GET['bulan']."%' order by tanggal_transaksi desc"; ?>
								<?php $transaksi = mysqli_query($conn,$sql) ?>
								<?php foreach ($transaksi as $row): ?>
									<tr>
										<td>
											<?php echo dateIndonesian($row['tanggal_transaksi']); ?>
										</td>
										<td>
											<?php echo $row['id_transaksi'] ?>
											<br>
											<small>
												<?php 
												$item=mysqli_query($conn,"SELECT * from tbl_pesanan join tbl_menu on tbl_menu.id_menu=tbl_pesanan.id_menu where id_transaksi = '$row[id_transaksi]'");
												$itm=0;
												foreach ($item as $it) {
													echo $itm!=0 ? ", ": "";
													echo $it['nama_menu']."(".$it['qty'].")";
													$itm++;
												}
												?>
												
											</small>
										</td>
										<td>
											<?php echo "Rp. ".number_format($row['total']) ?>
										</td>
									</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
				<?php endif ?>
			</div>
		</div>
	</div>