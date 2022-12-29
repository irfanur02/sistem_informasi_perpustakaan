<div class="container">
  <div class="row justify-content-start">
    <div class="col-4">
      <a href="<?php echo base_url('buku');?>" class="btn btn-dark">Kembali</a>
    </div>
    <div class="col-4">
      <h2 class="text-center">Edit Buku</h2>
    </div>
  </div>
</div>
<br>
<br>

<?php foreach($tbuku as $databuku){ 
  $id_jenis_buku=$databuku->id_jenis_buku;
  $id_rak=$databuku->id_rak; 
  ?>

<form method="post" action="<?php echo base_url('index.php/buku/update')?>">
<input type="hidden" id="id" name="id" value="<?php echo $databuku->id_buku; ?>">

  <div class="form-group row">
    <label for="isbn" class="col-sm-2 col-form-label">ISBN</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" autocomplete="off" id="isbn" name="isbn" placeholder="ISBN" value="<?php echo $databuku->isbn; ?>">
    </div>
  </div>

  <div class="form-group row">
    <label for="judul_buku" class="col-sm-2 col-form-label">Judul Buku</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" autocomplete="off" id="judul_buku" name="judul_buku" placeholder="Judul Buku" value="<?php echo $databuku->judul_buku; ?>">
    </div>
  </div>

  <div class="form-group row">
    <label for="no_inventaris" class="col-sm-2 col-form-label">No Inventaris</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" autocomplete="off" id="no_inventaris" name="no_inventaris" placeholder="No Inventaris" value="<?php echo $databuku->no_inventaris; ?>">
    </div>
  </div>

  <div class="form-group row">
    <label for="id_jenis_buku" class="col-sm-2 col-form-label">Jenis Buku</label>
    <div class="col-sm-10">
      <select class="custom-select mr-sm-2" autocomplete="off" id="id_jenis_buku" name="id_jenis_buku" required="required">
        <option selected value="">Pilih Jenis Buku</option>
        <?php
            foreach ($datajenisbuku as $data) {
                if( $id_jenis_buku == $data->id_jenis_buku ){
                    echo "<option value='". $data->id_jenis_buku . "' selected>" . $data->jenis_buku . "</option>";
                }else{
                    echo "<option value='". $data->id_jenis_buku . "'>" . $data->jenis_buku . "</option>";
                }
            }
        ?>
      </select>
    </div>
  </div>

  <div class="form-group row">
    <label for="id_rak" class="col-sm-2 col-form-label">Rak Buku</label>
    <div class="col-sm-10">
      <select class="custom-select mr-sm-2" autocomplete="off" id="id_rak" name="id_rak" required="required">
        <option selected value="">Pilih Rak Buku</option>
        <?php
            foreach ($datarak as $data) {
                if( $id_rak== $data->id_rak ){
                    echo "<option value='". $data->id_rak . "' selected>" . $data->rak . "</option>";
                }else{
                    echo "<option value='". $data->id_rak . "'>" . $data->rak . "</option>";
                }
            }
        ?>
      </select>
    </div>
  </div>

  <div class="form-group row">
    <label for="pengarang" class="col-sm-2 col-form-label">Pengarang</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" autocomplete="off" id="pengarang" name="pengarang" placeholder="Pengarang" value="<?php echo $databuku->pengarang; ?>">
    </div>
  </div>

  <div class="form-group row">
    <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" autocomplete="off" id="penerbit" name="penerbit" placeholder="Penerbit" value="<?php echo $databuku->penerbit; ?>">
    </div>
  </div>

  <div class="form-group row">
    <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" autocomplete="off" id="jumlah" name="jumlah" placeholder="Jumlah" value="<?php echo $databuku->jumlah; ?>">
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