<div class="page-header">
	<h3>Data Anggota</h3>
</div>
<a href="<?php echo base_url().'admin/tambah_anggota'; ?>" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-plus"></span> Anggota Baru</a>
<br/><br/>
<div class="table-responsive">
	<table class="table table-bordered table-striped table-hover" id="table-datatable">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Anggota</th>
				<th>Jenis Kelamin</th>
				<th>No. Telp</th>
				<th>Alamat</th>
				<th>Email</th>
				<th>Pilihan</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$no = 1;
				foreach($anggota as $b){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $b->nama_anggota ?></td>
				<td><?php echo $b->gender ?></td>
				<td><?php echo $b->no_telp ?></td>
				<td><?php echo $b->alamat ?></td>
				<td><?php echo $b->email ?></td>
				<td nowrap="nowrap" align="center">
					<a class="btn btn-primary btn-sm" href="<?php echo base_url().'admin/edit_anggota/'.$b->id_anggota; ?>"><span class="glyphicon glyphicon-zoom-in"> </span></a>
					<a class="btn btn-warning btn-sm" href="<?php echo base_url().'admin/hapus_anggota/'.$b->id_anggota; ?>"><span class="glyphicon glyphicon-remove"></span></a>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>