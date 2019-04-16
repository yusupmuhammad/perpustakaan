<div class="page-header">
	<h3>Edit Buku</h3>
</div>
<?php foreach($buku as $b){ ?>
<form action="<?php echo base_url().'admin/update_buku' ?>" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Kategori</label>
		<select name="id_kategori" class="form-control">
			<option value="<?php echo $b->id_kategori; ?>"><?php echo $b->nama_kategori; ?></option>
			<?php foreach($kategori as $k){ ?>
			<option value="<?php echo $k->id_kategori; ?>"><?php echo $k->nama_kategori; ?></option>
			<?php } ?>
		</select>
		<?php echo form_error('id_kategori'); ?>
	</div>

	<div class="form-group">
		<label>Judul Buku</label>
		<input type="hidden" name="id" value="<?php echo $b->id_buku; ?>">
		<input class="form-control" type="text" name="judul_buku" value="<?php echo $b->judul_buku; ?>">
		<?php echo form_error('judul_buku'); ?>
	</div>

	<div class="form-group">
		<label>pengara</label>
		<input class="form-control" type="text" name="pengarang" value="<?php echo $b->pengarang; ?>">
		<?php echo form_error('pengarang'); ?>
	</div>

	<div class="form-group">
		<label>Penerbit</label>
		<input class="form-control" type="text" name="penerbit" value="<?php echo $b->penerbit; ?>">
		<?php echo form_error('penerbit'); ?>
	</div>

	<div class="form-group">
		<label>Tahun Terbit</label>
		<input class="form-control" type="text" name="thn_terbit" value="<?php echo $b->thn_terbit; ?>">
		<?php echo form_error('thn_terbit'); ?>
	</div>

	<div class="form-group">
		<label>ISBN</label>
		<input class="form-control" type="text" name="isbn" value="<?php echo $b->isbn; ?>" >
		<?php echo form_error('isbn'); ?>
	</div>

	<div class="form-group">
		<label>Jumlah Buku</label>
		<input class="form-control" type="text" name="jumlah_buku" value="<?php echo $b->jumlah_buku; ?>">
		<?php echo form_error('jumlah_buku'); ?>
	</div>

	<div class="form-group">
		<label>Lokasi</label>
		<input class="form-control" type="text" name="lokasi" value="<?php echo $b->lokasi; ?>">
		<?php echo form_error('lokasi'); ?>
	</div>

	<div class="form-group">
		<label>Status</label>
		<select name="status" class="form-control">
			<option <?php if($b->status_buku == "1"){echo "selected='selected'";} echo $b->status_buku; ?> value="1">Tersedia</option>
			<option <?php if($b->status_buku == "0"){echo "selected='selected'";} echo $b->status_buku; ?> value="0">Sedang Di Pinjam</option>
		</select>
		<?php echo form_error('status'); ?>
	</div>

	<dir class="form-group">
		<label>Gambar</label>
		<?php
			if(isset($b->gambar)){
				echo '<input type="hidden" name="old_pict" value="'.$b->gambar.'">';
				echo '<img src="'.base_url().'assets/upload/'.$b->gambar.'" width="30%">';
			}
		?>
		<input name="foto" type="file" class="form-control">
	</dir>

	<div class="form-group">
		<input type="submit" value="Update" class="btn btnprimary">
	</div>
</form>
<?php } ?>