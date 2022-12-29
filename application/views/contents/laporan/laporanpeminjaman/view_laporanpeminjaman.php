<h2 class="text-center">Laporan Peminjaman</h2>
<br>
<br>

<table class="table table-hover table-striped table-sm table-bordered" id="tableId">
	<thead>
		<tr class="bg-info text-center" style="color:white; font-size:16px; font-weight: bold;">
			<td style="width:6px;">No</td>
			<td style="width:220px;">Nama</td>
			<td>Bidang / Alamat / UPT / Instansi</td>
			<td>Keterangan</td>
		</tr>
	</thead>

	<tbody style="color:#000000;">

		<?php 
		$no=0;
		foreach($laporan as $datalaporan){ 
		$no++; ?>

		<tr>
			<td class="text-center"><?php echo $no . "."; ?></td>
			<td><?php echo $datalaporan->nama ?></td>
			<td>
				<?php
				if ($datalaporan->status == 0) {
					echo $datalaporan->unit_kerja;
				} elseif ($datalaporan->status == 1) {
					echo $datalaporan->alamat;
				}
				?>	
			</td>
			<td class="text-center"><a id="btn-detaillaporanpeminjaman" href="<?php echo base_url('index.php/laporanpeminjaman/detail/').$datalaporan->id_pengunjung; ?>" class="btn btn-success"><span style="font-size:18px;">Lihat</span></a></td>
		</tr>

		<?php } ?>
		
	</tbody>
</table>