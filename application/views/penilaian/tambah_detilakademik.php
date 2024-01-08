<div class="container">
	<div class="row">
		<div class="col-md-8 offset-md-2 widget-holder">
			<div class="widget-bg">
				<div class="widget-body clearfix">
					<h5 class="box-title mr-b-0">Data Akademik Siswa</h5>
					<p class="text-muted">Tambahkan data akademik siswa TK Kristen YPKB Mojowarno</p>
					<form id="form-pendaftaran">
						<div class="row">
							<div class="col-lg-12">
								<div class="form-group">
									<label for="l36">BIDANG</label>
									<select class="form-control" name="id_bidang" data-toggle="select2">
										<?php
										if ($bidang !== null) {
											foreach ($bidang as $item) {
												echo "<option value='$item->ID_BIDANG'>$item->NAMA_BIDANG</option>";
											}
										}
										?>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<div class="form-group">
									<label for="l30">NARASI</label>
									<textarea class="form-control" name="narasi" placeholder="Narasi"></textarea>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<div class="form-group">
									<input type="file" class="custom-file-input" name="foto">
									<label class="custom-file-label" for="customFile">Pilih Foto</label>
								</div>
							</div>
						</div>
						<div class="form-actions btn-list">
							<button class="btn btn-primary" type="submit">KIRIM</button>
							<button class="btn btn-outline-default" type="reset">RESET</button>
						</div>
						<div id="loading" class="progress progress-md" style="display: none">
							<div class="progress-bar bg-info" style="width: 0%" role="progressbar"><span class="sr-only"></span>
							</div>
						</div>
						<input type="hidden" name="id_akademik" value="<?= $this->uri->segment(3); ?>">
					</form>
				</div>
				<!-- /.widget-body -->
			</div>
			<!-- /.widget-bg -->
		</div>
	</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
	$("#form-pendaftaran").on('submit', function (e) {
		e.preventDefault();
		$('.btn').attr("disabled");
		$('#loading').show();
		$.ajax({
			type: "POST",
			url: "<?= base_url(); ?>api/tambah/detilakademik",
			data: new FormData(document.getElementById('form-pendaftaran')),
			processData: false,
			contentType: false,
			dataType: "json",
			success: (response) => {
				$('.progress-bar').attr("style", "width: 100%");
				setTimeout(() => {
					Swal.fire({
						icon: response.success ? 'success' : 'error',
						title: response.success ? 'Berhasil!' : 'Gagal!',
						text: response.message
					})
					if (response.success) {
						window.location.replace("<?= base_url(); ?>akademik")
					}
					$('.btn').removeAttr("disabled");
					$('#loading').hide();
				}, 1000);
				setTimeout(() => {
					$('.progress-bar').attr("style", "width: 0%");
				}, 1000);
			}
		});
	});
</script>
