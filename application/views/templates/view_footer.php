</div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  
  <!-- Ubah Profil Modal -->
  <div class="modal fade" id="ubahProfilModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Ubah Profil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="row mb-3">
        <div class="col text-center">
          <button class="btn btn-primary text-center mr-3" id="btn-editprofil"><i class="fas fa-fw fa-user-edit text-white"></i>Edit</button>
          <button class="btn btn-danger text-center" id="btn-reseteditprofil">Reset</button>
        </div>
      </div>
      <form>
      <div class="form-group row">
        <input type="hidden" id="iduseradmin" name="iduseradmin">
        <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
        <div class="col-sm-10">
          <div id="pesan-error-ubahprofilnama" class="alert-danger">Nama Harus diisi</div>
          <input type="text" class="form-control" id="namaadmin" name="namaadmin" placeholder="Masukkan Nama" readonly>
        </div>
      </div>
      <div class="form-group row">
        <label for="username" class="col-sm-2 col-form-label">Username</label>
        <div class="col-sm-10">
          <div id="pesan-error-ubahprofilusername" class="alert-danger">Username Harus diisi</div>
          <input type="text" class="form-control" id="usernameadmin" name="usernameadmin" placeholder="Masukkan Username" readonly>
        </div>
      </div>
      <div class="form-group row">
        <label for="password" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
          <div id="pesan-error-ubahprofilpassword" class="alert-danger">Password Harus berisi huruf / angka</div>
          <input type="password" class="form-control" id="passwordadmin" name="passwordadmin" placeholder="Masukkan Password" value="•••••" readonly>
        </div>
      </div>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="button" id="btn-simpanprofil" class="btn btn-success">Simpan</button>
      </div>
    </div>
  </div>
</div>

  <!-- Tambah Profil Modal -->
  <div class="modal fade" id="tambahProfilModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Akun</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
      <div class="form-group row">
        <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
        <div class="col-sm-10">
          <div id="pesan-error-tambahprofilnama" class="alert-danger">Nama Harus diisi</div>
          <input type="text" class="form-control" id="namaadminsimpan" name="namaadminsimpan" placeholder="Masukkan Nama">
        </div>
      </div>
      <div class="form-group row">
        <label for="username" class="col-sm-2 col-form-label">Username</label>
        <div class="col-sm-10">
          <div id="pesan-error-tambahprofilusername" class="alert-danger">Username Harus diisi</div>
          <input type="text" class="form-control" id="usernameadminsimpan" name="usernameadminsimpan" placeholder="Masukkan Username">
        </div>
      </div>
      <div class="form-group row">
        <label for="password" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
          <div id="pesan-error-tambahprofilpassword" class="alert-danger">Password Harus berisi huruf / angka</div>
          <input type="password" class="form-control" id="passwordadminsimpan" name="passwordadminsimpan" placeholder="Masukkan Password">
        </div>
      </div>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="button" id="btn-simpantambahprofil" class="btn btn-success">Simpan</button>
      </div>
    </div>
  </div>
</div>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Apakah Anda ingin Keluar ?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <a class="btn btn-primary" href="<?php echo base_url('login/logout') ?>">Keluar</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <!-- <script src="<?php echo base_url('assets/');?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

  <!-- Core plugin JavaScript-->
  <!-- <script src="<?php echo base_url('assets/');?>vendor/jquery-easing/jquery.easing.min.js"></script> -->

  <script type="text/javascript" src="<?php echo base_url('assets/'); ?>js/jquery-3.3.1.min.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('assets/');?>js/sb-admin-2.min.js"></script>
  <!-- <script src="<?php echo base_url('assets/');?>js/sb-admin.min.js"></script> -->

  <script type="text/javascript" src="<?php echo base_url('assets/'); ?>js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/'); ?>js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/'); ?>js/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/'); ?>js/select2.js"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/'); ?>js/jquery.easy-autocomplete.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/'); ?>js/sweetalert2.all.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/'); ?>js/jquery.ui.datepicker.js"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/'); ?>js/jquery.ui.core.js"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/'); ?>js/jquery.ui.widget.js"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/'); ?>js/jquery-ui.js"></script>
  <!-- <script type="text/javascript" src="<?php echo base_url('assets/'); ?>js/jquery.auto-complete.js"></script> -->

  <script src="<?= base_url('assets/js/custom.js') ?>"></script>
  
  <script type="text/javascript">
  $(document).ready( function () {
    $('#tableDataPeminjaman').DataTable({
      "language":{
        "sEmptyTable":   "Tidak ada data yang tersedia pada tabel ini",
        "sProcessing":   "Sedang memproses...",
        "sLengthMenu":   "Tampilkan _MENU_ entri",
        "sZeroRecords":  "Tidak ditemukan data yang sesuai",
        "sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
        "sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
        "sInfoPostFix":  "",
        "sSearch":       "Cari:",
        "sUrl":          "",
        "oPaginate": {
          "sFirst":    "Pertama",
          "sPrevious": "Sebelumnya",
          "sNext":     "Selanjutnya",
          "sLast":     "Terakhir"
        }
      }
    })

    $('#tableDataPengembalian').DataTable({
      "language":{
        "sEmptyTable":   "Tidak ada data yang tersedia pada tabel ini",
        "sProcessing":   "Sedang memproses...",
        "sLengthMenu":   "Tampilkan _MENU_ entri",
        "sZeroRecords":  "Tidak ditemukan data yang sesuai",
        "sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
        "sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
        "sInfoPostFix":  "",
        "sSearch":       "Cari:",
        "sUrl":          "",
        "oPaginate": {
          "sFirst":    "Pertama",
          "sPrevious": "Sebelumnya",
          "sNext":     "Selanjutnya",
          "sLast":     "Terakhir"
        }
      }
    })

    $('#tableId, #tableDetailPengembalian, #tableJenisBuku, #tableRak, #tableBukuPeminjaman').DataTable({
      "language":{
        "sEmptyTable":   "Tidak ada data yang tersedia pada tabel ini",
        "sProcessing":   "Sedang memproses...",
        "sLengthMenu":   "Tampilkan _MENU_ entri",
        "sZeroRecords":  "Tidak ditemukan data yang sesuai",
        "sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
        "sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
        "sInfoPostFix":  "",
        "sSearch":       "Cari:",
        "sUrl":          "",
        "oPaginate": {
          "sFirst":    "Pertama",
          "sPrevious": "Sebelumnya",
          "sNext":     "Selanjutnya",
          "sLast":     "Terakhir"
        }
      }
    })
  });
  </script>

</body>

</html>