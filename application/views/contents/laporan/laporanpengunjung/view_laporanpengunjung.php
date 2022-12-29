<div class="container mb-4 pr-0 pl-0">
	<div class="row">
		<div class="col-4 text-left">
            <select id="pilihbulan" class="custom-select" style="width:40%;">
                <option selected="selected">Pilih Bulan</option>
                <option value="01">Januari</option>
                <option value="02">Februari</option>
                <option value="03">Maret</option>
                <option value="04">April</option>
                <option value="05">Mei</option>
                <option value="06">Juni</option>
                <option value="07">Juli</option>
                <option value="08">Agustus</option>
                <option value="09">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>
            <select id="pilihtahun" class="custom-select" style="width:40%;">
            	<option selected="selected">Pilih Tahun</option>
				<?php 
				foreach ($gettahun as $data) : 
					$baris = explode("-", $data->tanggal); 
					$tahun = $baris[0];
				?>
					<option value="<?php echo $tahun; ?>">
						<?php echo $tahun; ?>
					</option>
				<?php endforeach ?>
            </select>
			<br>
			<div class="ml-1 mt-2">
				<button type="button" class="btn btn-primary" id="btn-cariLaporanPengunjung" style="width:80%;">Cari</button></td>
			</div>
		</div>
		<div class="col-4 text-center">
			<h2>Laporan Pengunjung</h2>
		</div>
		<div class="col-4 text-center">
			<a target="_blank" id="btn-cetakLaporanPengunjung" class="btn btn-danger" style="width:80%; display:none">Preview Laporan</a>
			<!-- <button type="button" class="btn btn-danger" target="_blank" id="btn-cetakLaporanPengunjung" style="width:80%; display:none">Cetak Laporan</button></td> -->
		</div>
	</div>
</div>

<div id="view_tabel_laporan_pengunjung" style="display:none">
  <?php $this->load->view('contents/laporan/laporanpengunjung/view_tabel_laporan_pengunjung', array('laporanjumlah'=>$laporanjumlah)); // Load file view.php dan kirim data siswanya ?>
</div>