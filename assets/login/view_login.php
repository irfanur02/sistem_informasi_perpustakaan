<body background="<?php echo base_url('assets/'); ?>img/4.jpg">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5" style="color: #FFF8DC">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <img src="<?php echo base_url('assets/'); ?>img/6.png" class="col-lg-7 container"> 

                
              </img>
              <div class="col-lg-5">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h2 text-gray-900 mb-4">
                        Selamat Datang di
                        <br>
                        <span class="h4">Perpustakaan Dinas <br> Kelautan dan Perikanan</span>
                    </h1>
                  </div>
                  <?php echo $this->session->flashdata('message'); ?>
                  <form method="post" action="<?php echo base_url('login'); ?>" class="user">
                    <div class="form-group">
                      <?php echo form_error('user', '<small class="text-danger pl-3">', '</small>') ?>
                      <input type="text" class="form-control form-control-user" name="user" id="user" placeholder="Masukkan Username">
                    </div>
                    <div class="form-group">
                      <?php echo form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
                      <input type="password" class="form-control form-control-user" name="password" id="Password" placeholder="Masukkan Kata Sandi">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="ceklihatpass">
                        <label class="custom-control-label" for="ceklihatpass">Lihat password</label>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Masuk
                    </button>
                  </form>
                  <hr>
                  <!-- <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.html">Create an Account!</a>
                  </div> -->
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>