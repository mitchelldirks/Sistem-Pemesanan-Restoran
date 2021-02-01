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