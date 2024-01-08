<div class="container">
	<div class="widget-list">
		<div class="row">
			<div class="col-md-12 widget-holder">
				<div class="widget-bg">
					<div class="widget-heading clearfix">
						<h5>Data Tagihan</h5>
						<div class="flex-1"></div>
					</div>
					<!-- /.widget-heading -->
					<div class="widget-body clearfix">
						<table class="table table-striped" data-toggle="datatables">
							<thead>
								<tr>
									<th data-field="IDTAGIHAN" data-sortable="true">ID TAGIHAN</th>
									<th data-field="ID_JENIS" data-sortable="true">JENIS TAGIHAN</th>
									<th data-field="NAMA_TAGIHAN" data-sortable="true">NAMA TAGIHAN</th>
									<th data-field="NOMINAL" data-sortable="true">NOMINAL</th>
									<th data-field="TANGGAL_TAGIHAN" data-sortable="true">TANGGAL TAGIHAN</th>
									<th data-field="TANGGAL_TERAKHIR_PEMBAYARAN" data-sortable="true">TANGGAL TERAKHIR PEMBAYARAN</th>
									<th>ACTION</th>
								</tr>
							</thead>
							<tbody>
								<?php if ($tagihan !== null) : ?>
									<?php foreach ($tagihan as $key) : ?>
										<tr>
											<td><?= $key->IDTAGIHAN; ?></td>
											<td><?= $key->ID_JENIS; ?></td>
											<td><?= $key->NAMA_TAGIHAN; ?></td>
											<td><?= $key->NOMINAL; ?></td>
											<td><?= $key->TANGGAL_TAGIHAN; ?></td>
											<td><?= $key->TANGGAL_TERAKHIR_PEMBAYARAN; ?></td>
											<td>
												<a class="btn btn-primary btn-sm btn-circle" href="<?= base_url() ?>siswa/detilpembayaran/<?= $key->IDTAGIHAN ?>"><i class="lnr lnr-list icon-sm"></i></a></td>
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
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
