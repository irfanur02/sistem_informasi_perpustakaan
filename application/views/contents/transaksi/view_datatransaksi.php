<div class="container mb-4">
	<div class="row justify-content-center">
		<div class="col-md-4 text-center">
			<fieldset>
				<legend class="h2">Riwayat Transaksi</legend>
				<div class="row text-center">
					<div class="col">
						<button class="btn btn-outline-secondary" type="button" id="btn-historiPemijaman"><span style="font-size:18px;">Peminjaman</span></button>
					</div>
					<div class="col">
						<button class="btn btn-outline-secondary" type="button" id="btn-historiPengembalian"><span style="font-size:18px;">Pengembalian</span></button>
					</div>
				</div>
			</fieldset>
		</div>
	</div>
</div>

<!-- tabel data peminjaman -->
<div id="divTableDataPeminjaman" style="display:none;">
		<table class="table table-hover table-striped table-sm table-bordered" style="width:100%;" id="tableDataPeminjaman">
			<thead>
				<tr class="bg-info text-center" style="color:white; font-size:16px; font-weight: bold;">
					<td style="width:6px;">No</td>
					<td style="width:200px">Nama</td>
					<td style="width:140px">Bidang / Alamat / UPT / Instansi</td>
					<td style="width:300px">Buku</td>
					<td style="width:140px">Tanggal Pinjam</td>
				</tr>
			</thead>
		
			<tbody style="color:#000000;">
				<?php $no=0; 
				foreach ($datapeminjaman as $data) :
				$no++;
				?>
				<tr>
					<td class="text-center"><?php echo $no . "."; ?></td>
					<td><?php echo $data->nama; ?></td>
					<td>
						<?php 
						if ($data->status == "0") {
							echo $data->unit_kerja;
						} elseif ($data->status == "1") {
							echo $data->alamat;
						}
						?>
					</td>
					<td><?php echo $data->judul_buku; ?></td>
					<td class="text-center"><?php echo $data->tgl_pinjam; ?></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
</div>

<!-- tabel data pengembalian -->
<div id="divTableDataPengembalian" style="display:none;">
	<table class="table table-hover table-striped table-sm table-bordered" style="width:100%;" id="tableDataPengembalian">
		<thead>
			<tr class="bg-info text-center" style="color:white; font-size:16px; font-weight: bold;">
				<td class="text-center">No</td>
				<td style="width:200px">Nama</td>
				<td>Bidang / Alamat / UPT / Instansi</td>
				<td style="width:300px">Buku</td>
				<td style="width:140px">Tanggal kembali</td>
			</tr>
		</thead>
	
		<tbody style="color:#000000;">
			<?php $no=0; 
			foreach ($datapengembalian as $data) :
			$no++;
			?>
			<tr>
				<td class="text-center"><?php echo $no . "."; ?></td>
				<td><?php echo $data->nama; ?></td>
				<td>
					<?php 
					if ($data->status == "0") {
						echo $data->unit_kerja;
					} elseif ($data->status == "1") {
						echo $data->alamat;
					}
					?>
				</td>
				<td><?php echo $data->judul_buku; ?></td>
				<td class="text-center"><?php echo $data->tgl_kembali; ?></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
