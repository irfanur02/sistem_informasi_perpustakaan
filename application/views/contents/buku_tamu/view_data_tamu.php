<table class="table table-hover table-striped table-sm table-bordered" id="tableId">
	<thead>
		<tr class="bg-info text-center" style="color:white; font-size:16px; font-weight: bold;">
			<td style="width:1px;">No</td>
			<td style="width:135px;">Tanggal</td>
			<td>Nama</td>
			<td>Bidang / Alamat / Instansi</td>
			<td>Keperluan</td>
			<td>Keterangan</td>
		</tr>
	</thead>

	<tbody style="color:#000000;">
		<?php $no=0; 
		foreach ($tamu as $data) :
		$no++;
		?>
		<tr>
			<td class="text-center" style="width:45px;"><?php echo $no . "."; ?></td>
			<td><?php echo $data->tanggal; ?></td>
			<td><?php echo $data->nama; ?></td>
			<td style="width:350px;">
				<?php 
				if ($data->status == 0) {
					echo $data->unit_kerja;
				} elseif ($data->status == 1) {
					echo $data->alamat;
				}
				?>
			</td>
			<td><?php echo $data->keperluan; ?></td>
			<td style="width:300px;"><?php echo $data->keterangan; ?></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>