<!-- Sidebar -->
<ul class="row navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center mb-4 mt-4" href="">
        <div style="margin-top: 70%" class="align-items-center">
            <div style="font-size: 21px; color: #FDF5E6;">perpustakaan</div>
                <img style="width:150px;height:auto;" src="<?php echo base_url('assets/')?>img/6.png">

                <div  style="font-size: 14px; color: #FDF5E6">
                    Dinas kelautan dan Perikanan Provinsi<br>Jawa Timur
                </div>
        </div>
          
          <!-- <div class="sidebar-brand-icon rotate-n-15">
          </div>
          <div class="sidebar-brand-text mx-3" style="font-size:18px;">Perpustakaan</div> -->
    </a>

    <div style="margin-top:37%" ></div>
    <!-- Divider -->
    <hr class="sidebar-divider my-0 mt-5">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url('bukutamu'); ?>">
        <i class="fas fa-fw fa-address-book" style="font-size:15px; color:#ffffff;"></i>
        <span style="font-size:16px; color:#ffffff;">Buku Tamu</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link pt-0" href="#" data-toggle="collapse" data-target="#collapseTransaksi" aria-expanded="true" aria-controls="collapseTransaksi">
            <i class="fas fa-fw fa-tachometer-alt" style="font-size:15px; color:#ffffff;"></i>
          <span style="font-size:16px; color:#ffffff;">Transaksi</span>
        </a>
        <div id="collapseTransaksi" class="collapse" aria-labelledby="headingTransaksi" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded" style="font-size:15px;">
            <a class="collapse-item" href="<?php echo base_url('datatransaksi')?>">Riwayat Transaksi</a>
            <a class="collapse-item" href="<?php echo base_url('peminjaman')?>">Peminjaman</a>
            <a class="collapse-item" href="<?php echo base_url('pengembalian')?>">Pengembalian</a>
          </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link pt-0" href="#" data-toggle="collapse" data-target="#collapseManajemenData" aria-expanded="true" aria-controls="collapseManajemenData">
            <i class="fas fa-fw fa-book" style="font-size:15px; color:#ffffff;"></i>
          <span style="font-size:16px; color:#ffffff;">Manajemen Data</span>
        </a>
        <div id="collapseManajemenData" class="collapse" aria-labelledby="headingManajemenData" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded" style="font-size:15px;">
            <a class="collapse-item" href="<?php echo base_url('buku')?>">Data Buku</a>
            <a class="collapse-item" href="<?php echo base_url('jenisbukudanrak')?>">Data Jenis Buku & Rak</a>
          </div>
        </div>
    </li>

    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link pt-0" href="<?php echo base_url('index.php/buku/tambah');?>"  data-target="#collapsePengadaan" aria-expanded="true" aria-controls="collapsePengadaan">
            <i class="fas fa-fw fa-book-medical" style="font-size:15px; color:#ffffff;"></i>
          <span style="font-size:16px; color:#ffffff;">Pengadaan Buku</span>
        </a>

    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link pt-0" href="#" data-toggle="collapse" data-target="#collapseLaporan" aria-expanded="true" aria-controls="collapseLaporan">
             <i class="fas fa-fw fa-file-invoice" style="font-size:15px; color:#ffffff;"></i>
            <span style="font-size:16px; color:#ffffff;">Laporan</span>
        </a>
        <div id="collapseLaporan" class="collapse" aria-labelledby="headingLaporan" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded" style="font-size:15px;">
            <a class="collapse-item" href="<?php echo base_url('laporanpengunjung')?>">Laporan Pengunjung</a>
            <a class="collapse-item" href="<?php echo base_url('laporanpeminjaman')?>">Laporan Peminjaman</a>
          </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
    
    </div>

</ul>
<!-- End of Sidebar -->