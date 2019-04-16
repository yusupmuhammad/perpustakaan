<div class="x_panel" align="center">
	<div class="x_title">
		<h2><i class="fa fa-book"></i> Detail Buku</h2>
		<div class="clearfix"></div>
	</div>
	<div class="x_content">
		<div class="row" >
			<div class="col-sm-3 col-md-3">
				<div class="thumbnail" style="height: auto; position: relative; left:
				165%; width: auto;">
				<img src="<?php echo base_url();?>assets/upload/<?php echo $item_detail['gambar'];?>"
				style="max-width:100%; max-height: 100%; height: 150px; width: 120px">
				<div class="caption">
					<h4 style="min-height:40px;" align="center"><?=$item_detail['pengarang'];?></h4>
					<table class="table table-triped">
						<tr>
							<td>Judul Buku: </td><td><?=substr($item_detail['judul_buku'],0,30).'..'?></td>
						</tr>
						<tr>
							<td>Penerbit: </td><td><?=$item_detail['penerbit']?></td>
						</tr>

						echo "lallaa";
						<tr>
							<td>Tahun Terbit: </td><td><?=substr($item_detail['thn_terbit'],0,4)?></td>
						</tr>
						<tr>
							<td>ISBN: </td><td><?=$item_detail['isbn']?></td>
						</tr>
						<tr>
							<td>Kategori: </td><td><?=$item_detail['nama_kategori']?></td>
						</tr>
					</table>
					<p>
						<a href="#" class="btn btn-primary" onclick="window.history.go(-
						1)"> Kembali</a>
						<?=anchor('peminjaman/tambah_pinjam/' . $item_detail['id_buku'], ' Booking' , [
							'class' => 'btn btn-success',
							'role' => 'button'
							])?>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>