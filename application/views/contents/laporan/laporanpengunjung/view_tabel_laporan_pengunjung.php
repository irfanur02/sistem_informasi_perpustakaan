<div id="view_tabelLaporanPengunjung">
<table class="table table-hover table-striped table-sm table-bordered" id="tableId">
	<thead>
		<tr class="bg-info text-center" style="color:white; font-size:16px; font-weight: bold;">
			<td style="width:60px">No</td>
			<td style="width:110px">Tanggal</td>
			<td>Detail Kegiatan</td>
			<td>Jumlah</td>
			<td>Satuan</td>
			<td>Keterangan</td>
		</tr>
	</thead>

	<tbody class="text-center" style="color:#000000;">
		<?php 
		$no = 0;
		foreach($laporanjumlah as $row) :
 		// $tanggal = $row['tanggal'];
		// $total = $row['total'];
		$no++;
		?>

		<tr>
			<!-- <td><?//php echo htmlentities($tanggal , ENT_QUOTES, 'UTF-8');?></td> -->
			<!-- <td><?//php echo htmlentities($total , ENT_QUOTES, 'UTF-8');?></td> -->
			<td><?php echo $no . "."; ?></td>
			<td><?php echo $row->tanggal;?></td>
			<td>Pengunjung</td>
			<td><?php echo $row->total;?></td>
			<td>Orang</td>
			<td><a href="<?php echo base_url('index.php/laporanpengunjung/detail/').$row->tanggal; ?>" class="btn btn-success"><span style="font-size:18px;">Lihat</span></a></td>
		</tr>

		<?php endforeach; ?>
		
	</tbody>
</table>
</div>