<div class="container">
	<div class="widget-list">
		<div class="row">
			<div class="col-md-12 widget-holder">
				<div class="widget-bg">
					<div class="widget-heading clearfix">
						<h5>Data Detil Akademik Siswa</h5>
						<div class="flex-1"></div>
						<div class="d-inline-flex align-items-center mt-3 mt-sm-0">
							<?php if ($this->session->userdata('ROLE') == 'GURU' && $status_persetujuan === 'DISETUJUI') : ?>
								<a class="btn btn-outline-info px-4 pd-tb-8" href="<?= base_url()."akademik/cetak-detilakademik/".$this->uri->segment(2); ?>">Cetak Akademik</a>
								<?php elseif ($this->session->userdata('ROLE') == 'KEPSEK' && $status_persetujuan == 'BELUM DISETUJUI'): ?>
									<button class="btn btn-outline-success px-4 pd-tb-8" onclick="setujui('<?= $this->uri->segment(2)?>')">Setujui Akademik</button>
								<?php endif; ?>
							</div>
						</div>
						<!-- /.widget-heading -->
						<div class="widget-body clearfix">
							<table class="table table-striped" data-toggle="datatables">
								<thead>
									<tr>
										<th data-field="ID" data-sortable="true">ID</th>
										<th data-field="BIDANG" data-sortable="true">BIDANG</th>
										<th data-field="NARASI" data-sortable="true">NARASI</th>
										<th data-field="FOTO" data-sortable="true">FOTO</th>
									</tr>
								</thead>
								<tbody>
									<?php if ($detilakademik !== null) : ?>
										<?php foreach ($detilakademik as $key) : ?>
											<tr>
												<td><?= $key->ID_AKADEMIK; ?></td>
												<td><?= $key->NAMA_BIDANG; ?></td>
												<td><?= $key->NARASI; ?></td>
												<td><a href="<?= base_url()."assets/images/".$key->FOTO ?>" target="_blank">Lihat Foto</a></td>
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
	<script>
		function setujui(id_akademik) {
			Swal.fire({
				title: "Konfirmasi",
				text: "Setujui data?",
				type: "warning",
				animation: "slide-from-top",
				showCancelButton: true,
				confirmButtonText: "Ya",
				cancelButtonText: "Tidak",
				closeOnConfirm: false,
				showLoaderOnConfirm: true,
				closeOnCancel: false
			}).then((result) => {
				if(result.value) {
					$.ajax({
						type: "POST",
						url: "<?= base_url(); ?>api/update_status_detilakademik/"+id_akademik,
						success: (response) => {
							setTimeout(() => {
								response = JSON.parse(response)
								if (response.success) {
									Swal.fire({
										icon: 'success',
										title: 'Data berhasil diupdate!',
										text: 'tunggu sebentar, anda akan dialihkan ...'
									})
									window.location.replace('../akademik')
								} else {
									Swal.fire({
										icon: 'error',
										title: 'Data gagal diupdate!',
										text: response.message
									})
								}
							}, 1000);
						}
					});
				}
			})
		}
	</script>
