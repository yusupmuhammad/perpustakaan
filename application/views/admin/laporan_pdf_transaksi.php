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
			<td><?php echo date('d/m/Y',strtotime($this->input->get('dari'))) ?></td>
		</tr>
		<tr>
			<td>Sampai Tgl</td>
			<td>:</td>
			<td><?php echo date('d/m/Y',strtotime($this->input->get('sampai'))) ?></td>
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
			foreach ($laporan as $p) {	?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo gmdate('d/m/Y',strtotime($p->tgl_pencatatan)); ?></td>
				<td><?php echo $p->nama_anggota; ?></td>
				<td><?php echo $p->judul_buku; ?></td>
				<td><?php echo gmdate('d/m/Y',strtotime($p->tgl_pinjam)); ?></td>
				<td><?php echo gmdate('d/m/Y',strtotime($p->tgl_kembali)); ?></td>
				<td><?php echo "Rp. ".number_format($p->denda); ?></td>
				<td><?php 
				if ($p->tgl_pengembalian =="000000-00") {
					echo "-";
				}else{
					echo gmdate('d/m/Y',strtotime($p->tgl_pengembalian));
				}
				?></td>
				<td><?php echo "Rp. ".number_format($p->total_denda).",-"; ?></td>
				<td><?php 
				if ($p->status_peminjaman == "1") {
					echo "Selesai";
				}else{
					echo "-";
				}
				?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</body>
</html>