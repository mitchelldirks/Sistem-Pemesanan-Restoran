<div class="col-md-12" style="padding:20px;">
  <?php $tra=mysqli_query($conn,"SELECT * from tbl_transaksi");
  $kar=mysqli_query($conn,"SELECT * from tbl_karyawan");
  ?>
  <div class="col-md-12 padding-0">
    <div class="col-md-6">
      <div class="panel box-v1">
        <div class="panel-heading bg-white border-none">
          <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
            <h4 class="text-left">Karyawan</h4>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-6 text-right">
           <h4>
             <span class="icon-user icons icon text-right"></span>
           </h4>
         </div>
       </div>
       <div class="panel-body text-center">
        <h1><?php echo mysqli_num_rows($kar); ?></h1>
        <p>Karyawan Aktif</p>
        <hr/>
      </div>
    </div>
    <div class="panel box-v1">
      <div class="panel-heading bg-white border-none">
        <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
          <h4 class="text-left">Transaksi</h4>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6 text-right">
          <h4>
           <span class="icon-basket-loaded icons icon text-right"></span>
         </h4>
       </div>
     </div>
     <div class="panel-body text-center">
      <h1><?php echo mysqli_num_rows($tra); ?></h1>
      <p>Transaksi Pemesanan</p>
      <hr/>
    </div>
  </div>
</div>
<div class="col-md-6">
 <div class="panel">
  <div class="panel-heading bg-white border-none" style="padding:20px;">
    <div class="col-md-6 col-sm-6 col-sm-12 text-left">
      <h4>Pemasukan</h4>
    </div>
  </div>
  <div class="panel-body" style="padding-bottom:50px;">
    <div class="col-md-12" style="padding-top:20px;">
      <div class="col-md-4 col-sm-4 col-xs-6 text-center">
        <h2 style="line-height:.4;">$100.21</h2>
        <small>Total Laba</small>
      </div>
      <div class="col-md-4 col-sm-4 col-xs-6 text-center">
        <h2 style="line-height:.4;">2000</h2>
        <small>Total Pesanan</small>
      </div>
      <div class="col-md-4 col-sm-4 col-xs-12 text-center">
        <h2 style="line-height:.4;">$291.1</h2>
        <small>Total Pengeluaran</small>
      </div>
    </div>
  </div>
</div>
</div>
</div>

