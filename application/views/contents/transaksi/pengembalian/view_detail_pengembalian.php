<div class="container">
    <div class="row">
    <div class="col-sm-1" style="text-align:left;">
			<a href="<?php echo base_url('pengembalian'); ?>" class="btn btn-dark"><span style="font-size:18px;">Kembali</span></a>
		</div>
        <div class="col-sm">
            <p class="h2 text-center">Detail Peminjaman</p>
        </div>
        <div class="col-sm">
            <h5 style="color:#000000;"><?php echo $datanama['nama']; ?></h5>
            <h6 style="color:#000000;">
            <?php 
				if ($datanama['status'] == 0) {
					echo $datanama['unit_kerja'];
				} elseif ($datanama['status'] == 1) {
					echo $datanama['alamat'];
				}
				?>
            </h6>
        </div>
    </div>
</div>
<table class="table table-hover table-striped table-sm table-bordered" style="width:100%;" id="tableDetailPengembalian">
	<thead>
		<tr class="bg-info text-center" style="color:white; font-size:16px; font-weight: bold;">
			<td>Judul Buku</td>
			<td>Tanggal Pinjam</td>
			<td>Tanggal Harus Kembali</td>
			<!-- <td>Lama Pinjam</td> -->
            <td>Aksi</td>
		</tr>
	</thead>

	<tbody style="color:#000000;">
        <?php foreach ($detailpeminjaman as $data) : ?>
        <?php if ($data->status == 0) : ?>
        <tr>
			<td><?php echo $data->judul_buku; ?></td>
			<td class="text-center"><?php echo $data->tgl_pinjam; ?></td>
			<td class="text-center"><?php echo $data->tgl_harus_kembali;?></td>
			<!-- <td><?//php echo lama pinjam; ?></td> -->
			<td class="text-center"><a href="<?php echo base_url('pengembalian/bukuKembali/') . $data->id_detail_transaksi ."/". $data->id_buku ."/". $datanama['id_pengunjung'];?>" id="btn-kembalikanbuku" class="btn btn-primary" title="Kembalikan Buku"><span style="font-size:18px;">Kembalikan</span></a></td>
        </tr>
        <?php endif ?>
		<?php endforeach ?>
	</tbody>
</table>