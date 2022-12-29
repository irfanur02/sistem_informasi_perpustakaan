<div class="container mb-4">
	<div class="row">
		<div class="col-sm-4">
			<a href="<?php base_url('bukutamu')?>" id="kembali" class="btn btn-dark" style="font-size:18px; width:30%; display:none;"><span>Kembali</span></a>
			<a href="#" id="daftartamu" class="btn btn-primary" data-toggle="modal" data-target="#daftarModal"><span style="font-size:18px; display:block;">Isi Buku Tamu</span></a>
			<a href="#" id="rekap" class="btn btn-warning"><span style="font-size:18px; color:black; display:block;">Rekap</span></a>
		</div>
		<div class="col-sm-4">
			<p class="h2 text-center mx-0">Buku Tamu</p>	
		</div>
		<div class="col-sm-4 text-right">	
		<a href="#" id="btn-daftarpengunjung" class="btn btn-success" data-toggle="modal" data-target="#daftarPengunjungModal"><span style="font-size:18px;">Daftarkan Tamu</span></a>
		</div>
	</div>
</div>

<div id="pesan-sukses" class="alert alert-success" style="margin: 10px 20px;"></div>
<div id="pesan-sukses1" class="alert alert-success" style="margin: 10px 20px;"></div>

<div id="pesan-sukses-daftar" class="alert alert-success" style="margin: 10px 20px;"></div>

<div id="rekap_buku">
	<form id="form_rekapbuku" style="display:none">
		<input type="hidden" name="id_pengunjung" id="bukutamu_Idpengunjung1">
		<div class="form-group row">
			<label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
			<div class="col-sm-10">
				<input type="text" style="width: 166px" class="form-control form-rounded" id="datepicker" name="tanggal" placeholder="Pilih Tanggal">
			</div>		
		</div>
		<div class="form-group row">
			<label for="namaSimpan" class="col-sm-2 col-form-label">Nama</label>
			<div class="col-sm-10">
				<input type="text" style="width: 466px" class="form-control form-rounded" id="namaSimpan1" name="namaSimpan">
			</div>		
		</div>
		<div class="form-group row">
			<label for="alamatSimpan" class="col-sm-2 col-form-label">Bidang / Alamat / Instansi</label>
			<div class="col-sm-10">
				<textarea type="text" class="form-control form-rounded" rows="2" id="alamatSimpan1" name="alamatSimpan" disabled></textarea>
			</div>		
		</div>
		<div class="form-group row">
			<label for="keperluan" class="col-sm-2 col-form-label">Keperluan</label>
			<div class="col-sm-10">
			<div id="pesan-error-keperluan1" class="alert-danger">Pilih Keperluan</div>
				<select id="keperluan1" name="keperluan" class="custom-select">
					<option selected>Pilih Keperluan</option>
					<option value="baca">Baca Buku</option>
					<option value="lainnya">Lainnya</option>
				</select>
			</div>		
		</div>
		<div style="display:none" id="keteranganbaca1">
			<div class="form-group row">
				<label for="buku[]" class="col-sm-2 col-form-label">Baca Buku</label>
				<div class="col-sm-10">
					<select class="js-example-basic-multiple" name="buku[]" multiple="multiple" style="width:100%">
						<?php foreach ($judulbuku as $data) : ?>
							<option value="<?php echo $data->judul_buku?>"><?php echo $data->judul_buku?><option>
						<?php endforeach ?>
					</select>
				</div>		
			</div>
		</div>
		<div style="display:none" id="keterangan1">
			<div class="form-group row">
				<label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
				<div class="col-sm-10">
					<textarea class="form-control form-rounded" name="keterangan" rows="3" autocomplete="off"></textarea>
				</div>		
			</div>
		</div>
		<div class="form-group row">
		<div class="col-sm-10">
		<button type="button" id="btn-simpanrekapbuku" class="btn btn-primary" style="font-size:18px;">Simpan</button>
		<button type="button" id="btn-resetrekapbuku" class="btn btn-danger" style="font-size:18px;">Reset</button>
		</div>
	</div>
	</form>
</div>

<div id="view_data_bukutamu" style="display:block">
  <?php $this->load->view('contents/buku_tamu/view_data_tamu', array('tamu'=>$tamu)); // Load file view.php dan kirim data siswanya ?>
</div>

<!-- modal tambah tamu -->
<div class="modal fade" id="daftarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      	<div class="modal-content">
        	<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Buku Tamu</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
        	</div>
			<div class="modal-body">
				<div id="pesan-error" class="alert-danger"></div>
				<form id="formDaftar">
				<input type="hidden" name="id_pengunjung" id="bukutamu_Idpengunjung">
				<div class="form-group">
					<label for="nama">Nama</label>
					<input type="text" style="width: 466px" class="form-control form-rounded" id="namaSimpan" name="namaSimpan">
				</div>
				<div class="form-group">
					<label for="alamat">Bidang / Alamat / Instansi</label>
					<textarea type="text" class="form-control form-rounded" rows="3" id="alamatSimpan" name="alamatSimpan" disabled></textarea>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col">
							<label for="keperluan">Keperluan :</label>
						</div>
					</div>
					<div id="pesan-error-keperluan" class="alert-danger">Pilih Keperluan</div>
					<div class="row">
						<div class="col">
							<select id="keperluan" name="keperluan" class="custom-select">
								<option selected>Pilih Keperluan</option>
								<option value="baca">Baca Buku</option>
								<option value="lainnya">Lainnya</option>
							</select>
						</div>
					</div>
				</div>
				<div class="form-group" style="display:none" id="keteranganbaca">
					<label for="keterangan">Keterangan</label>
					<select class="js-example-basic-multiple" name="buku[]" multiple="multiple" style="width:100%">
						<?php foreach ($judulbuku as $data) : ?>
							<option value="<?php echo $data->judul_buku?>"><?php echo $data->judul_buku?><option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="form-group" style="display:none" id="keterangan">
					<label for="keterangan">Keterangan</label>
					<textarea class="form-control form-rounded" name="keterangan" rows="3" autocomplete="off"></textarea>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" id="btn-simpanbukutamu">Simpan</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
				</div>
				</form>
			</div>
		</div>
    </div>
</div>

<!-- modal daftar tamu -->
<div class="modal fade" id="daftarPengunjungModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      	<div class="modal-content">
        	<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Daftarkan Tamu</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
        	</div>
			<div class="modal-body">
				<div id="pesan-error-daftar" class="alert-danger"></div>
				<form id="formDaftarPengunjung">
					<div class="form-group">
						<label for="nama">Nama</label>
						<input type="text" class="form-control" id="namaDaftar" name="namaDaftar" placeholder="Nama" autocomplete="off">
					</div>
					<fieldset id="fieldset">
						<legend id="legend">Status Pengunjung</legend>
						<div class="row text-center">
							<div class="col">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" id="rbPegawai" name="status" class="custom-control-input" value="pegawai">
									<label class="custom-control-label" for="rbPegawai">Pegawai</label>
								</div>
							</div>
							<div class="col">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" id="rbNonPegawai" name="status" class="custom-control-input" value="nonpegawai">
									<label class="custom-control-label" for="rbNonPegawai">Non Pegawai</label>
								</div>
							</div>
						</div>
					</fieldset>
					<small class="text-danger pl-3" id="pesan-errorstatus">Status Pengunjung harus diisi</small>
					<div class="form-group" style="display:none;" id="inputalamat">
						<label for="alamat">Bidang / Alamat / Instansi</label>
						<input type="text" class="form-control" id="alamatDaftar" name="alamatDaftar" placeholder="Bidang / Alamat / Instansi" autocomplete="off">
					</div>
					<div class="form-group" style="display:none;" id="inputunitkerja">
						<label for="unitkerja">Unit Kerja</label>
						<input type="text" class="form-control" id="unitkerja" name="unitkerja" placeholder="Unit Kerja" autocomplete="off">
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary" id="btn-simpandaftarpengunjung">Daftar</button>
						<button type="submit" class="btn btn-secondary" id="btn-bataldaftarpengunjung" data-dismiss="modal">Batal</button>
					</div>
				</form>
			</div>
		</div>
    </div>
</div>