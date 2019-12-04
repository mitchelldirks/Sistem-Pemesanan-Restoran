<div class="col-md-12" style="padding:20px;">
    <?php $tra=mysqli_query($conn,"SELECT * from tbl_transaksi");
          $kar=mysqli_query($conn,"SELECT * from tbl_karyawan");
     ?>
                    <div class="col-md-12 padding-0">
                        <div class="col-md-8 padding-0">
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
                                </div>
                                <div class="col-md-6">
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
                            </div>
                            <div class="col-md-12">
                                
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-12 padding-0">
                              <div class="panel box-v2">
                                  <div class="panel-heading padding-0">
                                    <img src="asset/img/bg2.jpg" class="box-v2-cover img-responsive"/>
                                    <div class="box-v2-detail">
                                      <img src="asset/img/avatar.jpg" class="img-responsive"/>
                                      <h4>@zahra_kueh</h4>
                                    </div>
                                  </div>
                                  <div class="panel-body">
                                    <div class="col-md-12 padding-0 text-center">
                                      <div class="col-md-4 col-sm-4 col-xs-6 padding-0">
                                          <h3>2.000</h3>
                                          <p>Post</p>
                                      </div>
                                      <div class="col-md-4 col-sm-4 col-xs-6 padding-0">
                                          <h3>2.232</h3>
                                          <p>share</p>
                                      </div>
                                      <div class="col-md-4 col-sm-4 col-xs-12 padding-0">
                                          <h3>4.320</h3>
                                          <p>photos</p>
                                      </div>
                                    </div>
                                  </div>
                              </div>
                            </div>
                        </div>
                    </div>

                  <div class="col-md-12 card-wrap padding-0">
                    <div class="col-md-6">
                        <div class="panel">
                          <div class="panel-heading bg-white border-none" style="padding:20px;">
                            <div class="col-md-6 col-sm-6 col-sm-12 text-left">
                              <h4>Pemasukan</h4>
                            </div>
                          </div>
                          <div class="panel-body" style="padding-bottom:50px;">
                              <div id="canvas-holder1">
                                    <canvas class="line-chart" style="margin-top:30px;height:200px;"></canvas>
                              </div>
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

                    <div class="col-md-6">
                        <div class="panel">
                          <div class="panel-heading bg-white border-none" style="padding:20px;">
                            <div class="col-md-6 col-sm-6 col-sm-12 text-left">
                              <h4>Orders</h4>
                            </div>
                          </div>
                          <div class="panel-body" style="padding-bottom:50px;">
                              <div id="canvas-holder1">
                                <canvas class="bar-chart"></canvas>
                              </div>
                              <div class="col-md-12 padding-0" >
                                <div class="col-md-4 col-sm-4 hidden-xs" style="padding-top:20px;">
                                  <canvas class="doughnut-chart2"></canvas>
                                </div>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <h4>Penjualan Hari ini</h4>
                                    <p>Sparasi antara penjualan makanan dan minuman</p>
                                    <div class="progress progress-mini">
                                    	<?php 	$Hour=date("H");
                                    			$jam=100*($Hour/24);
                                    	 ?>						
                                      <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $jam;?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $jam;?>%;">
                                        <span class="sr-only"><?php echo $jam;?>% Complete</span>
                                      </div>
                                    </div>
                                </div>
                              </div>
                          </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-12">
                        <div class="panel bg-green text-white">
                            <div class="panel-body">
                              <div class="col-md-8 col-sm-8 col-xs-12">
                                <div class="maps" style="height:300px;">
                                </div>
                              </div>
                              <div class="col-md-4 col-sm-4 col-xs-12">
                                  <canvas class="doughnut-chart hidden-xs"></canvas>
                                  <div class="col-md-12">
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                      <h1>72.993</h1>
                                      <p>People</p>
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                       <h1>12.000</h1>
                                       <p>Active</p>
                                    </div>
                                  </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>