<div class="page-header">
	<h3>Transaksi Selesai</h3>
</div>
<?php foreach($peminjaman as $p){ ?>
<form action="<?php echo base_url().'admin/transaksi_selesai_act' ?>" method="post">
	<input type="hidden" name="id" value="<?php echo $p->id_pinjam ?>">
	<input type="hidden" name="buku" value="<?php echo $p->id_buku ?>">
	<input type="hidden" name="tgl_kembali" value="<?php echo $p->tgl_kembali ?>">
	<input type="hidden" name="denda" value="<?php echo $p->denda ?>">
	<div class="form-group">
		<label>Anggota</label>
		<select class="form-control" name="anggota" disabled>
			<option value="">-Pilih Anggota-</option>
			<?php foreach($anggota as $k){ ?>
				<option <?php if($p->id_anggota == $k->id_anggota){echo "selected='selected'";} ?> value="<?php echo $k->id_anggota; ?>"><?php echo $k->nama_anggota; ?></option>
			<?php } ?>
		</select>
	</div>

	<div class="form-group">
		<label>Buku</label>
		<select class="form-control" name="buku" disabled>
			<option value="">-Pilih Buku-</option>
			<?php foreach($buku as $m){ ?>
			<option <?php if($p->id_buku == $m->id_buku){echo "selected='selected'";} ?> value="<?php echo $m->id_buku; ?>"><?php echo $m->judul_buku; ?></option>
			<?php } ?>
		</select>
	</div>

	<div class="form-group">
		<label>Tanggal Pinjam</label>
		<input class="form-control" type="date" name="tgl_pinjam" value="<?php echo $p->tgl_pinjam ?>" 
		disabled>
	</div>

	<div class="form-group">
		<label>Tanggal Kembali</label>
		<input class="form-control" type="date" name="tgl_kembali" value="<?php echo $p->tgl_kembali ?>"disabled>
	</div>

	<div class="form-group">
		<label>Harga Denda / Hari</label>
			<input class="form-control" type="text" name="denda" value="<?php echo $p->denda ?>" disabled>
	</div>

	<div class="form-group">
		<label>Tanggal Dikembalikan Oleh Anggota</label>
		<input class="form-control" type="date" name="tgl_dikembalikan">
		<?php echo form_error('tgl_dikembalikan'); ?>
	</div>
	<div class="form-group">
		<input type="submit" value="Simpan" class="btn btnprimary btn-sm">
	</div>
</form>
<?php } ?>