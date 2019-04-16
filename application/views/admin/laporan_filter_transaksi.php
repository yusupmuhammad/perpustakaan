<div class="page-header">
	<h3>Laporan</h3>
</div>

<form method="post" action="<?php echo base_url().'admin/laporan' ?>">
	<div class="form-group">
		<label>Dari Tanggal</label>
		<input type="date" name="dari" value="<?php echo set_value('dari') ?>" class="form-control">
		<?php echo form_error('dari'); ?>
	</div>
	<div class="form-group">
		<label>Sampai Tanggal</label>
		<input type="date" name="sampai" value="<?php echo set_value('sampai') ?>" class="form-control">
		<?php echo form_error('sampai'); ?>
	</div>
	<div class="form-group">
		<input type="submit" value="CARI" name="cari" class="btn btn-sm btn-primary">
	</div>
</form>

<div class="btn-group">
	<a class="btn btn-warning btn-sm" href="<?php echo base_url().'admin/laporan_pdf_transaksi/?dari='.set_value('dari').'&sampai='.set_value('sampai') ?>"><span class="glyphicon glyphicon-print"></span>
	Cetak PDF</a>
	<a class="btn btn-default btn-md" href="<?php echo base_url().'admin/laporan_print_transaksi/?dari='.set_value('dari').'&sampai='.set_value('sampai') ?>"><span class="glyphicon glyphicon-print"></span>
	Print</a>
</div>
<br><br>
<div class="table-responsive">
	<table border="1" class="table table-striped table-hover tablebordered" id="table-datatable">
		<thead>
			<tr>
				<th>No</th>
				<th>Tanggal</th>
				<th>Nama Anggota</th>
				<th>Judul Buku</th>
				<th>Tgl. Pinjam</th>
				<th>Tgl. Kembali</th>
				<th>Denda / Hari</th>
				<th>Tgl. Dikembalikan</th>
				<th>Total Denda</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$no = 1;
			foreach($laporan as $d){ ?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo gmdate('d/m/Y',strtotime($d->tgl_pencatatan)); ?></td>
				<td><?php echo $d->nama_anggota; ?></td>
				<td><?php echo $d->judul_buku; ?></td>
				<td><?php echo gmdate('d/m/Y',strtotime($d->tgl_pinjam)); ?></td>
				<td><?php echo gmdate('d/m/Y',strtotime($d->tgl_kembali)); ?></td>
				<td><?php echo "Rp. ".number_format($d->denda); ?></td>
				<td>
					<?php 
					if($d->tgl_pengembalian =="000000-00"){
						echo "-";
					}else{
						echo gmdate('d/m/Y',strtotime($d->tgl_pengembalian));
					} ?>
				</td>
				<td><?php echo "Rp. ".number_format($d->total_denda).",-"; ?></td>
				<td>
					<?php 
					if ($d->status_peminjaman == "1") {
						echo "selesai";
					}else{
						echo "-";
					}?>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>