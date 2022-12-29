<div id="loading">
	<div class="container">
	    <div class="row">
	        <div class="col">
	            <p class="h2 text-center">Peminjaman Buku</p>
	        </div>
	    </div>
	</div>
	<table class="table table-hover table-striped table-bordered" id="tableBukuPeminjaman">
		<thead class="text-center" cellpadding="2">
			<tr class="bg-info text-center" style="color:white; font-size:16px; font-weight: bold;">
	            <td>Tambah ke list</td>
				<td style="width:360px">Judul Buku</td>
				<td>No.Inventaris</td>
				<td>Pengarang</td>
				<td>Penerbit</td>
				<td>Jumlah</td>
				<!-- <td>Rak</td> -->
			</tr>
		</thead>

		<tbody style="color:#000000;">
			<?php foreach ($databuku as $data) :
			?>
	        <tr>
				<td class="text-center"><a href="javascript:void();" class="btn-rekam" data-idbuku="<?php echo $data->id_buku; ?>" data-judulbuku="<?php echo $data->judul_buku; ?>" data-noinventaris="<?php echo $data->no_inventaris; ?>" data-pengarang="<?php echo $data->pengarang; ?>" data-penerbit="<?php echo $data->penerbit; ?>" data-jumlah="<?php echo $data->jumlah; ?>" title="Masuk list"><i class="fas fa-fw fa-plus-circle"></i></a></td>
				<td><?php echo $data->judul_buku; ?></td>
				<td><?php echo $data->no_inventaris; ?></td>
				<td><?php echo $data->pengarang; ?></td>
				<td><?php echo $data->penerbit; ?></td>
				<td class="text-center;"><?php echo $data->jumlah; ?></td>
	        </tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>

<!-- DETAIL PEMINJAMAN -->
<div class="container">
	<div id="detail_peminjaman">
		<div class="container">
			<div class="row">
				<div class="col">
					<p class="h2 text-center">Detail Peminjaman</p>
				</div>
			</div>
		</div>
		<div id="view_detail_peminjaman" style="overflow-x:scroll; overflow-y:none; height:180px;">
			<table style="border:1px solid" class="table table-hover table-striped table-bordered" id="tabel_detailrekam">
				<tr class="text-center" style="color:#000000;">
					<th style="width:33px;">Aksi</th>
					<th style="width:400px;">Judul Buku</th>
					<th>No.Inventaris</th>
					<th>Pengarang</th>
					<th>Penerbit</th>
				</tr>
			</table>
		</div>
		<div class="container" style="margin-top:10px; margin-bottom:10px;">
			<div class="row justify-content-center">
				<div class="col text-right">
					<button class="btn btn-primary" data-toggle="modal" data-target="#simpantransaksiModal"><span style="font-size:18px;">Simpan</span></button>
				</div>
				<div class="col text-left">
					<button id="btn-batal-transaksi" class="btn btn-dark"><span style="font-size:18px;">Batal</span></button>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="simpantransaksiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      	<div class="modal-content">
        	<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Peminjaman Buku</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
        	</div>
        	<div class="modal-body">
					<div id="pesan-error" class="alert alert-danger"></div>
					<form id="formDaftar">
					<input type="hidden" name="id_pengunjung" id="peminjaman_Idpengunjung">
					<input type="hidden" name="status" id="peminjaman_status">
					<div class="form-group">
						<label for="nama">Nama</label>
						<input type="text" class="form-control" style="width: 466px" id="namaPeminjam" name="namaPeminjam" placeholder="Nama" autocomplete="off" required>
					</div>
					<div class="form-group">
						<label for="alamat">Bidang / Alamat / Instansi</label>
						<textarea type="text" class="form-control form-rounded" rows="3" id="alamatPeminjam" name="alamatPeminjam" disabled></textarea>
					</div>
					<div class="modal-footer">
						<!-- Beri id "loading-simpan" untuk loading ketika klik tombol simpan -->
						<div id="loading-simpan" class="pull-left">
							<b>Sedang menyimpan...</b>
						</div>
						<button type="button" class="btn btn-primary" id="btn-simpan-transaksi">Simpan</button>
						<button type="button" class="btn btn-secondary" id="btn-batal-prosesTransaksi" data-dismiss="modal">Batal</button>
					</div>
					</form>
			</div>
		</div>
    </div>
</div>