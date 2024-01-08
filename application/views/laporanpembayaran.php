<html>
<head>
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
	<style>
		table {
			width: 100%;
		}
		td {
			text-align: center;
			padding: 10px;
		}
		thead tr td {
			font-weight: bold;
		}
	</style>
</head>
<body>
	<div class="container">		<h4 class="text-center"><strong>TAMAN KANAK - KANAK KRISTEN 1 YBPK</strong></h4>
		<h4 class="text-center"><strong>CABANG MOJOWARNO</strong></h4>
		<h5 class="text-center">NIS : 104 041 218 237</h5>
		<h5 class="text-center">Jln. Merdeka No.02 Mojowarno 61475</h5>
		<h5 class="text-center">Tlpn/Fax.0321 496039</h5>
		<h5 class="text-center">JOMBANG-JAWA TIMUR</h5>
		<hr>
		<h5 class="text-center">LAPORAN PEMBAYARAN</h5>
		<hr>
		<table border="1">
			<thead>
				<tr>
					<td>NAMA TAGIHAN</td>
					<td>ATAS NAMA</td>
					<td>TOTAL</td>
					<td>TANGGAL</td>
					<td>KETERANGAN</td>
					<td>STATUS</td>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($data_pembayaran as $pembayaran): ?>
					<tr>
						<td><?= $pembayaran->NAMA_TAGIHAN ?></td>
						<td><?= $pembayaran->ATAS_NAMA ?></td>
						<td><?= $pembayaran->TOTAL ?></td>
						<td><?= $pembayaran->TANGGAL ?></td>
						<td><?= $pembayaran->KETERANGAN ?></td>
						<td><?= $pembayaran->STATUS ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<br>
		<h2 style="color: green"><p>Jumlah Pembayaran</p>
			Rp <?= $total->TOTAL == null ? "0" : $total->TOTAL; ?></h2>
			<br>
			<div class="row text-center" style="margin-top: 100px;page-break-inside: avoid;">
				<div class="col-sm-4" style="margin-left:50%">
					<div class="row">
						<div class="col-xs-6">

							<h5>Mojowarno,</h5>
							<div>Kepala Sekolah</div><br>
						</div>
					</div>
					<div class="row" style="margin-top: 75px;">
						<div class="col-xs-6">
							<div><u><b><?= $kepsek->NAMA_LENGKAP_GURU ?></b></u></div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6">
							<div><?= $kepsek->NIP ?></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
	</html>
