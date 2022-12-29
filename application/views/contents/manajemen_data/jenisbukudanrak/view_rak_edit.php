<div class="container">
  <div class="row justify-content-start">
    <div class="col-4">
      <a href="<?php echo base_url('jenisbukudanrak');?>" class="btn btn-dark">Kembali</a>
    </div>
    <div class="col-4">
      <h2 class="text-center">Edit Rak</h2>
    </div>
  </div>
</div>
<br>
<br>

<?php foreach($trak as $datarak){ 
  $id_rak=$datarak->id_rak;
  ?>

<form method="post" action="<?php echo base_url('index.php/jenisbukudanrak/updaterak')?>">
<input type="hidden" id="id" name="id" value="<?php echo $datarak->id_rak; ?>">
  <div class="form-group row">
    <label for="rak" class="col-sm-2 col-form-label">Jenis Buku</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" autocomplete="off" id="rak" name="rak" placeholder="Silahkan isi rak" value="<?php echo $datarak->rak; ?>">
    </div>
  </div>

  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Simpan</button>
      <button type="reset" class="btn btn-danger">Batal</button>
    </div>
  </div>
</form>
<?php } ?>