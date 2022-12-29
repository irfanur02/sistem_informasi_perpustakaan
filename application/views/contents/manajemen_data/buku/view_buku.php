<div class="container">
    <div class="row justify-content-start">
		<div class="col-4">
			<a href="<?php echo base_url('index.php/buku/tambah');?>" class="btn btn-primary">Tambah Data Buku</a>
		</div>
		<div class="col-4 text-center">
			<h2 class="text-center">Manajemen Buku</h2>
		</div>
    </div>
</div>
<br>
<br>

<table class="table table-hover table-striped table-sm table-bordered" id="tableId">
	<thead class="text-center">
		<tr class="bg-info text-center" style="color:white; font-size:16px; font-weight: bold;">
			<td>Judul Buku</td>
			<td>No.Inventaris</td>
			<td>Jenis Buku</td>
			<td>Rak</td>
			<td>Pengarang</td>
			<td>Penerbit</td>
			<td>Jumlah</td>
			<td style="width:100px">Aksi</td>
		</tr>
	</thead>

	<tbody style="color:#000000;">
		<?php
		foreach ($databuku as $data) :
		?>
		<tr>
			<td><?php echo $data->judul_buku; ?></td>
			<td><?php echo $data->no_inventaris; ?></td>
			<td><?php echo $data->jenis_buku; ?></td>
			<td><?php echo $data->rak; ?></td>
			<td><?php echo $data->pengarang; ?></td>
			<td><?php echo $data->penerbit; ?></td>
			<td><?php echo $data->jumlah; ?></td>
			<td class="text-center">
				<a href="<?php echo base_url ('buku/edit/') . $data->id_buku ?>" title="Edit"><i class="fas fa-fw fa-edit"></i></a>
				&nbsp;&nbsp;
				<a href="javascript:void()" class="btn-hapusbuku" data-idbuku="<?php echo $data->id_buku; ?>" data-judulbuku="<?php echo $data->judul_buku; ?>"title="Hapus"><i class="fas fa-fw fa-eraser"></i></a>
			</td>
		</tr>
		<?php endforeach ?>
	</tbody>
</table>