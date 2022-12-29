<div class="container">
	<div class="row">
		<div class="col">
			<p class="h2 text-center mx-0">Detail Laporan Peminjaman</p>
		</div>
	</div>
	<div class="row">
		<div class="col text-center">
			<div style="font-size:18px;"><?php echo $pengunjung['nama']; ?></div>
			<?php 
			if ($pengunjung['status'] == "0") {
				echo $pengunjung['unit_kerja'];
			} elseif ($pengunjung['status'] == "1") {
				echo $pengunjung['alamat'];	
			}
			?>
		</div>
	</div>
	<br>
	<br>
</div>

<table class="table table-hover table-striped table-sm table-bordered" id="tableId">
	<thead>
		<tr class="bg-info text-center" style="color:white; font-size:16px; font-weight: bold;">
			<td style="width:6px;">No</td>
			<td>Judul Buku</td>
			<td>Nama Petugas</td>
			<td>Tanggal Pinjam</td>
			<td>Tanggal Kembali</td>
			<td>Lama Pinjam</td>
		</tr>
	</thead>

	<tbody style="color:#000000;">
		<?php 
		$no = 0;
		foreach($detaillaporan as $data):
		//$selisih = $row['selisih'];
		//$tgl_kembali = $row['tgl_kembali'];
		//$tgl_pinjam = $row['tgl_pinjam'];
		//$judul_buku = $row['judul_buku'];
		//$nama_user = $row['nama_user'];
		$no++;
		?>
		<tr>
			<td class="text-center"><?php echo $no . "."; ?></td>
			<td><?php echo $data->judul_buku;?></td>
			<td class="text-center"><?php echo $data->nama_user;?></td>
			<td class="text-center"><?php echo $data->tgl_pinjam;?></td>
			<td class="text-center"><?php echo $data->tgl_kembali;?></td>
			<td class="text-center"><?php echo $data->lama;?> Hari</td>
		</tr>
		<?php endforeach; ?>
<!-- 		<?//php foreach ($lamapinjam as $data) : ?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?//php echo htmlentities($ , ENT_QUOTES, 'UTF-8');?>1</td>
			<td><?//php echo $datadetail->nama_user ?>1</td>
			<td><?//php echo $datadetail->tgl_pinjam ?>1</td>
			<td><?//php echo $datadetail->tgl_kembali ?>1</td>
			<td id="lamapinjam">$data->interval</td>
		</tr>
	<?//php endforeach ?> -->
	</tbody>
</table>
<a href="<?php echo base_url('index.php/laporanpeminjaman');?>" class="btn btn-danger">Kembali</a>