<div class="container">
  <div class="row justify-content-start">
    <div class="col-4">
      <a href="<?php echo base_url('jenisbukudanrak');?>" class="btn btn-dark">Kembali</a>
    </div>
    <div class="col-4">
      <h2 class="text-center">Tambah Rak</h2>
    </div>
  </div>
</div>
<br>
<br>

<div class="container">
<form method="post" action="<?php echo base_url('index.php/jenisbukudanrak/tambah_aksi_rak')?>">
  	<div class="form-group row">
		<label for="rak">Rak</label>
		<input type="text" class="form-control" id="rak_forminput" name="rak" placeholder="Silahkan isi rak" autocomplete="off">
	</div>
	<div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" id="btn-simpanFormRak" class="btn btn-primary">Simpan</button>
      <button type="reset" id="btn-resetFormRak" class="btn btn-danger">Reset</button>
    </div>
  </div>
</form>
</div>