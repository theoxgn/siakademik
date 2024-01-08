<div class="container">
	<div class="widget-list">
		<div class="row">
			<div class="col-md-12 widget-holder">
				<div class="widget-bg">
					<div class="widget-heading clearfix">
						<h5>Data Detil Akademik Siswa</h5>
						<div class="flex-1"></div>
					</div>
					<!-- /.widget-heading -->
					<div class="widget-body clearfix">
						<table class="table table-striped" data-toggle="datatables">
							<thead>
								<tr>
									<th data-field="ID" data-sortable="true">ID</th>
									<th data-field="SISWA" data-sortable="true">BIDANG</th>
									<th data-field="KELAS" data-sortable="true">NARASI</th>
								</tr>
							</thead>
							<tbody>
								<?php if ($detilakademik !== null) : ?>
									<?php foreach ($detilakademik as $key) : ?>
										<tr>
											<td><?= $key->ID_AKADEMIK; ?></td>
											<td><?= $key->NAMA_BIDANG; ?></td>
											<td><?= $key->NARASI; ?></td>
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
