<div class="container">
  <div class="row justify-content-start">
    <div class="col-4">
      <a href="<?php echo base_url('jenisbukudanrak');?>" class="btn btn-dark">Kembali</a>
    </div>
    <div class="col-4">
      <h2 class="text-center">Edit Jenis Buku</h2>
    </div>
  </div>
</div>
<br>
<br>

<?php foreach($tjenisbuku as $datajenisbuku){ 
  $id_jenis_buku=$datajenisbuku->id_jenis_buku;
  ?>

<form method="post" action="<?php echo base_url('index.php/jenisbukudanrak/updatejenisbuku')?>">
<input type="hidden" id="id" name="id" value="<?php echo $datajenisbuku->id_jenis_buku; ?>">
  <div class="form-group row">
    <label for="jenis_buku" class="col-sm-2 col-form-label">Jenis Buku</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" autocomplete="off" id="jenis_buku" name="jenis_buku" placeholder="Jenis Buku" value="<?php echo $datajenisbuku->jenis_buku; ?>">
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