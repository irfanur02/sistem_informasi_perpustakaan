<h2 class="text-center">Manajemen Jenis Buku & Rak</h2>
<br>
<br>
<div class="container mb-4">
    <div class="row justify-content-start">
		<div class="col-6 text-center">
			<a href="<?php echo base_url('index.php/jenisbukudanrak/tambahjenisbuku');?>" class="btn btn-primary">Tambah Data Jenis Buku</a>
		</div>
				<div class="col-6 text-center">
			<a href="<?php echo base_url('index.php/jenisbukudanrak/tambahrak');?>" class="btn btn-primary">Tambah Data Rak</a>
		</div>
    </div>
</div>

<div class="container">
<div class="row">
<div class="col">
<table style="width:500px" class="table table-hover table-striped table-sm table-bordered" id="tableJenisBuku">
	<thead class="text-center">
		<tr class="bg-info text-center" style="color:white; font-size:16px; font-weight: bold;">
			<td style="width:100px">No</td>
			<td>Jenis Buku</td>
			<td style="width:100px">Aksi</td>
		</tr>
	</thead>

	<tbody class="text-center" style="color:#000000;">
		<?php 
		$no=0;
		foreach($datajenisbuku as $data){ 
		$no++; ?>

		<tr>
			<td class="text-center"><?php echo $no . "."; ?></td>
			<td><?php echo $data->jenis_buku; ?></td>
			<td>
				<a href="<?php echo base_url ('jenisbukudanrak/editjenisbuku/') . $data->id_jenis_buku ?>" title="Edit"><i class="fas fa-fw fa-edit"></i></a>
				&nbsp;&nbsp;
				<a href="javascript:void()" class="btn-hapusIdJenisBuku" data-idjenisbuku="<?php echo $data->id_jenis_buku; ?>" data-jenisbuku="<?php echo $data->jenis_buku; ?>" title="Hapus"><i class="fas fa-fw fa-eraser"></i></a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
</div>

<div class="col">
<table style="width:500px; float: right;" class="table table-hover table-striped table-sm table-bordered" id="tableRak">
	<thead class="text-center">
		<tr class="bg-info text-center" style="color:white; font-size:16px; font-weight: bold;">
			<td style="width:100px">No</td>
			<td>Rak</td>
			<td style="width:100px">Aksi</td>
		</tr>
	</thead>

	<tbody class="text-center" style="color:#000000;">
		<?php 
		$no=0;
		foreach($datajenisrak as $data){ 
		$no++; ?>

		<tr>
			<td class="text-center"><?php echo $no; ?>.</td>
			<td><?php echo $data->rak; ?></td>
			<td>
				<a href="<?php echo base_url ('jenisbukudanrak/editrak/') . $data->id_rak ?>" title="Edit"><i class="fas fa-fw fa-edit"></i></a>
				&nbsp;&nbsp;
				<a href="javascript:void();" class="btn-hapusIdRak" data-idrak="<?php echo $data->id_rak; ?>" data-rak="<?php echo $data->rak; ?>" title="Hapus"><i class="fas fa-fw fa-eraser"></i></a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
</div>
</div>
</div>