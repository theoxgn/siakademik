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
	<div class="container">

		<?php foreach ($data_tagihan as $tagihan): ?>
			<h5 class="text-left"><?= $tagihan->TGL_DIBUAT ?> </h5>
			<h4 class="text-center"><strong>TAMAN KANAK - KANAK KRISTEN 1 YBPK</strong></h4>
			<h4 class="text-center"><strong>CABANG MOJOWARNO</strong></h4>
			<h5 class="text-center">NIS : 104 041 218 237</h5>
			<h5 class="text-center">Jln. Merdeka No.02 Mojowarno 61475</h5>
			<h5 class="text-center">Tlpn/Fax.0321 496039</h5>
			<h5 class="text-center">JOMBANG-JAWA TIMUR</h5>
			<hr>
			<h5>Shalom,<br>Bersama dengan ini, kami memberitahukan bahwa tagihan anak bpk/ibu sebagai berikut :</h5>
			<br>
			<table border="1">
				<thead>
					<tr>
						<td>NAMA SISWA</td>
						<td>JENIS TAGIHAN</td>
						<td>NAMA TAGIHAN</td>
						<td>NOMINAL</td>
						<td>TANGGAL TAGIHAN</td>
						<td>TANGGAL TERAKHIR PEMBAYARAN</td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><?= $tagihan->NAMA_LENGKAP_SISWA ?></td>
						<td><?= $tagihan->NAMA_JENIS ?></td>
						<td><?= $tagihan->NAMA_TAGIHAN ?></td>
						<td><?= $tagihan->NOMINAL ?></td>
						<td><?= $tagihan->TANGGAL_TAGIHAN ?></td>
						<td><?= $tagihan->TANGGAL_TERAKHIR_PEMBAYARAN ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<br>
		<h5>Demikian pemberitahuan ini kami, mohon dengan hormat untuk segera diselesaikan. Tuhan memberkati.</h5>
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
