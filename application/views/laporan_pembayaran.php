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


		<?php foreach ($data_pembayaran as $pembayaran): ?>

			<h5 class="text-center"><strong>TAMAN KANAK - KANAK KRISTEN 1 YBPK</strong></h5>
			<h5 class="text-center"><strong>CABANG MOJOWARNO</strong></h5>
			<h5 class="text-center">NIS : 104 041 218 237</h5>
			<h5 class="text-center">Jln. Merdeka No.02 Mojowarno 61475</h5>
			<h5 class="text-center">Tlpn/Fax.0321 496039</h5>
			<h5 class="text-center">JOMBANG-JAWA TIMUR</h5>
			<hr>
			<h4 style="color : green"> KUITANSI PEMBAYARAN</h4>
			<h5>Shalom,<br>Bersama dengan ini, kami memberitahukan bahwa pembayaran anak bpk/ibu sebagai berikut :</h5>
			<br>
			<hr>
			<table border="1">
				<thead>
					<tr>
						<td>ID TAGIHAN</td>
						<td>ATAS NAMA</td>
						<td>TOTAL</td>
						<td>KETERANGAN</td>
						<td>STATUS</td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><?= $pembayaran->IDTAGIHAN ?></td>
						<td><?= $pembayaran->ATAS_NAMA ?></td>
						<td><?= $pembayaran->TOTAL ?></td>
						<td><?= $pembayaran->KETERANGAN ?></td>
						<td><?= $pembayaran->STATUS ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

		<h5>Tanggal Bayar <?= $pembayaran->TANGGAL ?> </h5>
		<br>
		<h5>Demikian pemberitahuan ini. Tuhan memberkati.</h5>
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
