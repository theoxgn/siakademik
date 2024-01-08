<div class="container">
	<div class="widget-list">
		<div class="row">
			<div class="col-md-12 widget-holder">
				<div class="widget-bg">
					<div class="widget-heading clearfix">
						<h5>Data Prestasi Siswa</h5>
						<div class="flex-1"></div>
					</div>
					<!-- /.widget-heading -->
					<div class="widget-body clearfix">
						<table class="table table-striped" data-toggle="datatables">
							<thead>
							<tr>
								<th data-field="NIS" data-sortable="true">SISWA</th>
								<th data-field="NAMA_PRESTASI" data-sortable="true">NAMA PRESTASI</th>
								<th data-field="TINGKAT_PRESTASI" data-sortable="true">TINGKAT PRESTASI</th>
								<th data-field="TANGGAL_PRESTASI" data-sortable="true">TANGGAL PRESTASI</th>
								<th data-field="KETERANGAN_PRESTASI" data-sortable="true">KETERANGAN PRESTASI</th>
								<th data-field="FOTO_PRESTASI" data-sortable="true">FOTO PRESTASI</th>
							</tr>
							</thead>
							<tbody>
							<?php if ($prestasi !== null) : ?>
								<?php foreach ($prestasi as $key) : ?>
									<tr>
										<td><?= $key->NIS; ?></td>
										<td><?= $key->NAMA_PRESTASI; ?></td>
										<td><?= $key->TINGKAT_PRESTASI; ?></td>
										<td><?= $key->TANGGAL_PRESTASI; ?></td>
										<td><?= $key->KETERANGAN_PRESTASI; ?></td>
										<td><?= $key->FOTO_PRESTASI; ?></td>
									</tr>
								<?php endforeach;
							endif; ?>
							</tbody>
						</table>
					</div>
					<!-- /.widget-body -->
				</div>
				<!-- /.widget-bg -->
			</div>
		</div>
	</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
