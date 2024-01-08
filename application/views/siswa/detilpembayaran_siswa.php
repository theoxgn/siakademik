<div class="container">
	<div class="widget-list">
		<div class="row">
			<div class="col-md-12 widget-holder">
				<div class="widget-bg">
					<div class="widget-heading clearfix">
						<h5>Data Detil Pembayaran Siswa</h5>
					</div>
					<!-- /.widget-heading -->
					<div class="widget-body clearfix">
						<table class="table table-striped" data-toggle="datatables">
							<thead>
								<tr>
									<th data-field="NIS" data-sortable="true">ID TAGIHAN</th>
									<th data-field="NIS" data-sortable="true">ATAS NAMA</th>
									<th data-field="NAMA" data-sortable="true">TOTAL</th>
									<th data-field="KATEGORI" data-sortable="true">TANGGAL</th>
									<th data-field="KATEGORI" data-sortable="true">KETERANGAN</th>
									<th data-field="NAMA" data-sortable="true">STATUS</th>
								</tr>
							</thead>
							<tbody>
								<?php if ($pembayaran !== null) : ?>
									<?php foreach ($pembayaran as $key) : ?>
										<tr>
											<td><?= $key->IDTAGIHAN; ?></td>
											<td><?= $key->ATAS_NAMA; ?></td>
											<td><?= $key->TOTAL; ?></td>
											<td><?= $key->TANGGAL; ?></td>
											<td><?= $key->KETERANGAN; ?></td>
											<td><?= $key->STATUS; ?></td>
										</tr>
									<?php endforeach;
								endif; ?>
							</tbody>
<!-- 
							<section class="mt-0">
								<h6 class="icon-box-title my-0">Rp<span class="counter"><? $total ?></span></h6>
								<p class="mb-0">Total Pembayaran</p>
							</section> -->
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
