<div class="container">
    <div class="row">
        <div class="col">
            <p class="h2 text-center">Pengembalian Buku</p>
        </div>
    </div>
</div>
<table class="table table-hover table-striped table-sm table-bordered" style="width:100%;" id="tableId">
	<thead>
		<tr class="bg-info text-center" style="color:white; font-size:16px; font-weight: bold;">
			<td>No</td>
			<td>Nama</td>
			<td>Bidang / UPT / Instansi</td>
            <td>Aksi</td>
			<!-- <td>Rak</td> -->
		</tr>
	</thead>

	<tbody style="color:#000000;">
		<?php 
		$no = 0;
		foreach ($datapeminjaman as $data) :
		$no++;
		?>
        <tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $data->nama; ?></td>
			<td>
				<?php 
				if ($data->status == 0) {
					echo $data->unit_kerja;
				} elseif ($data->status == 1) {
					echo $data->alamat;
				}
				?>
			</td>
			<td class="text-center"><a href="<?php echo base_url('pengembalian/detailPengembalian/') . $data->id_pengunjung;?>" id="btn-rekam" class="btn btn-primary" title="Kembalikan Buku"><span style="font-size:18px;">Detail Peminjaman</span></a></td>
        </tr>
		<?php endforeach ?>
	</tbody>
</table>