<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">

  <!-- Topbar -->
  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
      <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->
    <div class="d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100">
        <div class="container">
        <div class="row">
            <div class="col-lg">
            <h5 class="h5"><div class="tanggal"></div></h5>
            </div>
            <div class="col-lg">
            <div id="output" class="jam" ></div>
            </div>
        </div>
        </div>
    </div>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav">

      <div class="topbar-divider d-none d-sm-block"></div>

      <!-- Nav Item - User Information -->
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span id="namauser" class="mr-2 d-none d-lg-inline text-gray-600 small" style="font-size:17px"><?php echo $datauser['nama_user']; ?></span>
          <input type="hidden" id="iduser" value="<?php echo $datauser['id_user']; ?>">
          <img class="img-profile rounded-circle" 
          src="<?php 
                $folder = base_url('assets/alfabet/');
                $foto_profil = $datauser['foto_profil'];
                
                switch ($foto_profil) {
                  case 'a.png':
                    echo $folder . 'a.png';
                    break;
                  case 'b.png':
                    echo $folder . 'b.png';
                    break;
                  case 'c.png':
                    echo $folder . 'c.png';
                    break;
                  case 'd.png':
                    echo $folder . 'd.png';
                    break;
                  case 'e.png':
                    echo $folder . 'e.png';
                    break;
                  case 'f.png':
                    echo $folder . 'f.png';
                    break;
                  case 'g.png':
                    echo $folder . 'g.png';
                    break;
                  case 'h.png':
                    echo $folder . 'h.png';
                    break;
                  case 'i.png':
                    echo $folder . 'i.png';
                    break;
                  case 'j.png':
                    echo $folder . 'j.png';
                    break;
                  case 'k.png':
                    echo $folder . 'k.png';
                    break;
                  case 'l.png':
                    echo $folder . 'l.png';
                    break;
                  case 'm.png':
                    echo $folder . 'm.png';
                    break;
                  case 'n.png':
                    echo $folder . 'n.png';
                    break;
                  case 'o.png':
                    echo $folder . 'o.png';
                    break;
                  case 'p.png':
                    echo $folder . 'p.png';
                    break;
                  case 'q.png':
                    echo $folder . 'q.png';
                    break;
                  case 'r.png':
                    echo $folder . 'r.png';
                    break;
                  case 's.png':
                    echo $folder . 's.png';
                    break;
                  case 't.png':
                    echo $folder . 't.png';
                    break;
                  case 'u.png':
                    echo $folder . 'u.png';
                    break;
                  case 'v.png':
                    echo $folder . 'v.png';
                    break;
                  case 'w.png':
                    echo $folder . 'w.png';
                    break;
                  case 'x.png':
                    echo $folder . 'x.png';
                    break;
                  case 'y.png':
                    echo $folder . 'y.png';
                    break;
                  case 'z.png':
                    echo $folder . 'z.png';
                    break;
                }
              ?>
            ">
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#" id="btn-ubahprofil" data-toggle="modal" data-iduser="<?php echo $datauser['id_user']?>" data-namauser="<?php echo $datauser['nama_user']?>" data-username="<?php echo $datauser['username']?>" data-target="#ubahProfilModal">
            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
            Ubah Akun
          </a>
          <a class="dropdown-item" href="#" id="btn-tambahprofil" data-toggle="modal" data-target="#tambahProfilModal">
            <i class="fas fa-user-plus fa-sm fa-fw mr-2 text-gray-400"></i>
            Tambah Akun
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            Keluar
          </a>
        </div>
      </li>

    </ul>

  </nav>
  <!-- End of Topbar -->

  <!-- Begin Page Content -->
  <div class="container-fluid">