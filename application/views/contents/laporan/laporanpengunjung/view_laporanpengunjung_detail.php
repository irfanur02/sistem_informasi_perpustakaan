<div class="container">
  <div class="row justify-content-start">
    <div class="col-4">
      <a href="<?php echo base_url('laporanpengunjung');?>" class="btn btn-dark">Kembali</a>
    </div>
    <div class="col-4">
      <h2 class="text-center">Detail Laporan Pengunjung</h2>
    </div>
  </div>
</div>
<br>
<br>

<table class="table table-hover table-striped table-sm table-bordered" id="tableId">
	<thead>
		<tr class="bg-info text-center" style="color:white; font-size:16px; font-weight: bold;">
			<td style="width:60px">No</td>
			<td style="width:110px">Tanggal</td>
			<td style="width:220px">Nama</td>
			<td>Bidang / Alamat / Instansi</td>
			<td style="width:110px">Keperluan</td>
			<td>Keterangan</td>
		</tr>
	</thead>

	<tbody style="color:#000000;">
		<?php 
		$no=0;
		foreach($detaillaporan as $datadetail){ 
		$no++; ?>
		<tr>
			<td class="text-center"><?php echo $no . "."; ?></td>
			<td class="text-center"><?php echo $datadetail->tanggal; ?></td>
			<td><?php echo $datadetail->nama; ?></td>
			<td>
				<?php 
					if ($datadetail->status == "0") {
						echo $datadetail->unit_kerja;
					} elseif ($datadetail->status == "1") {
						echo $datadetail->alamat;
					}
				?>
			</td>
			<td class="text-center"><?php echo $datadetail->keperluan; ?></td>
			<td><?php echo $datadetail->keterangan; ?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
<a href="<?php echo base_url('index.php/laporanpengunjung');?>" class="btn btn-danger">Kembali</a>