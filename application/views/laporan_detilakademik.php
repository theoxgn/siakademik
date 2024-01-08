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
		<h4 class="text-center"><strong>LAPORAN PENCAPAIAN PERKEMBANGAN ANAK</strong></h4>
		<h4 class="text-center"><strong><?= "SEMESTER ".$semester." TAHUN AJARAN ".$tahun_ajaran ?></strong></h4>
		<div class="row" style="margin-left: 25%; margin-top: 25px;">
			<div class="col-xs-2">NAMA</div>
			<div class="col-xs-3">:</div>
			<div class="col-xs-5"><?= $nama_siswa; ?></div>
		</div>
		<div class="row" style="margin-left: 25%;">
			<div class="col-xs-2">TANGGAL LAHIR</div>
			<div class="col-xs-3">:</div>
			<div class="col-xs-5"><?= $tanggal_lahir; ?></div>
		</div>
		<div class="row" style="margin-left: 25%;">
			<div class="col-xs-2">KELOMPOK</div>
			<div class="col-xs-3">:</div>
			<div class="col-xs-5"><?= $kelompok; ?></div>
		</div>
		<hr>
		<table border="1">
			<thead>
				<tr>
					<td>BIDANG</td>
					<td>NARASI</td>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($data_akademik as $akademik): ?>
					<tr>
						<td><?= $akademik->NAMA_BIDANG ?></td>
						<td><?= $akademik->NARASI ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<div class="row text-center" style="margin-top: 100px;page-break-inside: avoid;">
			<div class="col-sm-12">
				<div class="row">
					<div class="col-xs-3">
						<div>Wali Murid</div><br>
					</div>
					<div class="col-xs-3">
						<div>Kepala Sekolah</div><br>
					</div>
					<div class="col-xs-3">
						<span>Guru</span>
					</div>
				</div>
				<div class="row" style="margin-top: 75px;">
					<div class="col-xs-3">
						<div><u><b><?= $walimurid['nama'] ?></b></u></div>
					</div>
					<div class="col-xs-3">
						<div><u><b><?= $kepsek->NAMA_LENGKAP_GURU ?></b></u></div>
					</div>
					<div class="col-xs-3">
						<div><u><b><?= $guru['nama'] ?></b></u></div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-3">
					</div>
					<div class="col-xs-3">
						<div><?= $kepsek->NIP ?></div>
					</div>
					<div class="col-xs-3">
						<div id="anj"><?= $guru['nip'] ?></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
