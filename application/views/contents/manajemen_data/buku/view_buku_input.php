<div class="container">
  <div class="row">
    <div class="col-12">
      <h2 class="text-center">Tambah Buku</h2>
    </div>
  </div>
</div>
<br>
<br>

<form id="form_inputbuku">
  	<div class="form-group row">
		<label for="judul_buku" class="col-sm-2 col-form-label">Judul Buku</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="judul_buku" name="judul_buku" placeholder="Silahkan isi Judul Buku" autocomplete="off">
			<div id="pesan-error-judulbuku" class="alert-danger">Judul Buku harus diisi</div>
		</div>		
	</div>

	<div class="form-group row">
		<label for="no_inventaris" class="col-sm-2 col-form-label">No Inventaris</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="no_inventaris" name="no_inventaris" placeholder="Silahkan isi No Inventaris" autocomplete="off">
		</div>
	</div>

	<div class="form-group row">
		<label for="isbn" class="col-sm-2 col-form-label">ISBN</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="isbn" name="isbn" placeholder="Silahkan isi ISBN" autocomplete="off">
		</div>
	</div>

	<div class="form-group row">
		<label for="pengarang" class="col-sm-2 col-form-label">Pengarang</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="pengarang" name="pengarang" placeholder="Silahkan isi Pengarang" autocomplete="off">
		</div>
	</div>

	<div class="form-group row">
		<label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
		<div class="col-sm-10">		
			<input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="Silahkan isi Penerbit" autocomplete="off">
		</div>
	</div>

	<div class="form-group row">
		<label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Silahkan isi Jumlah" autocomplete="off">
			<div id="pesan-error-jumlah" class="alert-danger">Jumlah harus bernilai positif dan tidak boleh kurang dari 0</div>
		</div>		
	</div>

	<div class="form-group row">
		<label for="id_jenis_buku" class="col-sm-2 col-form-label">Jenis Buku</label>
		<div class="col-sm-10">
			<select id="jenis_buku" name="id_jenis_buku" class="custom-select">
				<option selected>Pilih Jenis Buku</option>
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
			<div id="pesan-error-jenisbuku" class="alert-danger">Pilih Jenis Buku</div>
		</div>
	</div>

	<div class="form-group row">
		<label for="id_rak" class="col-sm-2 col-form-label">Rak</label>
		<div class="col-sm-10">
			<select class="custom-select" id="rak" name="id_rak">
			<option selected>Pilih Rak</option>
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
			<div id="pesan-error-rak" class="alert-danger">Pilih Rak</div>
		</div>
	</div>

	<div class="form-group row">
    <div class="col-sm-10">
      <button type="button" id="btn-simpantambahbuku" class="btn btn-primary">Simpan</button>
      <button type="reset" id="btn-resetambahbuku" class="btn btn-danger">Reset</button>
	  <a href="<?php echo base_url('buku');?>" class="btn btn-dark">Kembali</a>
    </div>
  </div>
</form>