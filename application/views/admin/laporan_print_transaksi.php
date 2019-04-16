<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<style type="text/css">
		.table-data{
			width: 100%;
			border-collapse: collapse;
		}

		.table-data tr th,
		.table-data tr td{
			border:1px solid black;
			font-size:10pt;
		}
	</style>
	<h3>Laporan Transaksi Rental Buku</h3><br>
	<table>
		<tr>
			<td>Dari Tgl</td>
			<td>:</td>
			<td><?php echo gmdate('d/m/Y',strtotime($this->input->get('dari'))) ?></td>
		</tr>
		<tr>
			<td>Sampai Tgl</td>
			<td>:</td>
			<td><?php echo gmdate('d/m/Y',strtotime($this->input->get('sampai'))) ?></td>
		</tr>
	</table>

	<br>
	<table class="table-data">
		<thead>
			<tr>
				<th>No</th>
				<th>Tanggal</th>
				<th>Nama Anggota</th>
				<th>Judul Buku</th>
				<th>Tgl. Pinjam</th>
				<th>Tgl. Kembali</th>
				<th>Denda / hari</th>
				<th>Tgl. Dikembalikan</th>
				<th>Total Denda</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<?php  
			$no = 1;
			foreach ($laporan as $d) {	?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo date('d/m/Y',strtotime($d->tgl_pencatatan)); ?></td>
				<td><?php echo $d->nama_anggota; ?></td>
				<td><?php echo $d->judul_buku; ?></td>
				<td><?php echo date('d/m/Y',strtotime($d->tgl_pinjam)); ?></td>
				<td><?php echo date('d/m/Y',strtotime($d->tgl_kembali)); ?></td>
				<td><?php echo "Rp. ".number_format($d->denda); ?></td>
				<td><?php 
				if ($d->tgl_pengembalian == "000000-00") {
					echo "-";
				}else{
					echo date('d/m/Y',strtotime($d->tgl_pengembalian));
				}
				?></td>
				<td><?php echo "Rp. ".number_format($d->total_denda).",-"; ?></td>
				<td><?php 
				if ($d->status_peminjaman == "1") {
					echo "Selesai";
				}else{
					echo "-";
				}
				?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>

	<script type="text/javascript">
		window.print();
	</script>
</body>
</html>