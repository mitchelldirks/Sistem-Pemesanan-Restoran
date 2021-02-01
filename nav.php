                    <li class="<?php if($_GET['p']!=null){echo '';}else{echo 'active';} ?>">
                      <a class="nav-item" href="admin.php">
                        <span class="fa-home fa"></span>Dashboard 
                      </a>
                    </li>
                    <li class="<?php if($_GET['p']!='menu'){echo '';}else{echo 'active';} ?>"><a class="tree-toggle nav-header"><span class="fa fa-list"></span> Menu  <span class="fa-angle-down fa right-arrow text-right"></span> </a>
                      <ul class="nav nav-list tree">
                        <li class="<?php if($_GET['item']!='makanan'){echo '';}else{echo 'active-sub';} ?>"><a href="?p=menu&item=makanan"><span class="fa fa-cutlery"></span>Makanan</a></li>
                        <li class="<?php if($_GET['item']!='minuman'){echo '';}else{echo 'active-sub';} ?>"><a href="?p=menu&item=minuman"><span class="fa icon-cup"></span>Minuman</a></li>
                        <li class="<?php if($_GET['item']!='paket'){echo '';}else{echo 'active-sub';} ?>"><a href="?p=menu&item=paket"><span class="fa fa-cube"></span>Paket Porsi</a></li>
                        
                      </ul>
                    </li>
                    <li class="<?php if($_GET['p']!='karyawan'){echo '';}else{echo 'active';} ?>"><a class="tree-toggle nav-header" ><span class="fa fa-user"></span> Manajemen <span class="fa-angle-down fa right-arrow text-right"></span> </a>
                      <ul class="nav nav-list tree">
                        <li><a href="?p=karyawan">Karyawan</a></li>
                        
                      </ul>
                    </li>

                 <!-- <li class="<?php if($_GET['p']!='order'){echo '';}else{echo 'active';} ?>">
                      <a class="nav-item" href="?p=order">
                        <span class="fa-file fa"></span>Pesanan 
                      </a>
                    </li> -->
                    <li class="<?php if($_GET['p']!='report'){echo '';}else{echo 'active';} ?>">
                      <a class=" nav-item" href="?p=report">
                        <span class="fa-desktop fa"></span>Laporan 
                      </a>
                    </li>
                    <li >
                      <a class=" nav-item bg-danger" href="logout.php">
                        <i class="fa-close fa text-light" style="color: #fff;"></i> <span class="text-light" style="color: #fff;">Logout</span> 
                      </a>
                    </li>