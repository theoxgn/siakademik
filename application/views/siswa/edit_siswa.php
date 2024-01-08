<div class="container">
	<div class="row">
		<div class="col-md-8 offset-md-2 widget-holder">
			<div class="widget-bg">
				<div class="widget-body clearfix">
					<h5 class="box-title mr-b-0">Pembaruan Data Siswa</h5>
					<form id="form-pendaftaran">
						<div class="row">
							<div class="col-lg-12">
								<div class="form-group">
									<label for="l30">NAMA LENGKAP</label>
									<input class="form-control" name="nama_lengkap" placeholder="Veyonathan Nico" type="text" value="<?= $siswa->NAMA_LENGKAP_SISWA ?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<div class="form-group">
									<label for="l37">TANGGAL LAHIR</label>
									<input class="form-control" name="tanggal_lahir" placeholder="10-10-2019" type="date" value="<?= $siswa->TANGGAL_LAHIR; ?>">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="l38">ALAMAT</label>
							<input class="form-control" name="alamat" placeholder="JOMBANG" type="text" value="<?= $siswa->ALAMAT_SISWA; ?>">
						</div>
						<div class="form-group">
							<label class="form-control-label">JENIS KELAMIN</label>
							<select class="form-control" name="jenis_kelamin" data-toggle="select2" data-plugin-options='{"minimumResultsForSearch": -1}'>
								<option value="">PILIH JENIS KELAMIN</option>
								<option value="L" <?= $siswa->JK_SISWA == 'L' ? 'selected' : null ?>>LAKI-LAKI</option>
								<option value="P" <?= $siswa->JK_SISWA == 'P' ? 'selected' : null ?>>PEREMPUAN</option>
							</select>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<div class="form-group">
									<label for="l36">AGAMA</label>
									<select class="form-control" name="agama" data-toggle="select2" data-plugin-options='{"minimumResultsForSearch": -1}'>
										<option value="">PILIH </option>
										<option value="Kristen" <?= $siswa->AGAMA_SISWA == 'Kristen' ? 'selected' : null ?>>KRISTEN</option>
										<option value="Katolik" <?= $siswa->AGAMA_SISWA == 'Katolik' ? 'selected' : null ?>>KATOLIK</option>
										<option value="Islam" <?= $siswa->AGAMA_SISWA == 'Islam' ? 'selected' : null ?>>ISLAM</option>
										<option value="Hindu" <?= $siswa->AGAMA_SISWA == 'Hindu' ? 'selected' : null ?>>HINDU</option>
										<option value="Budha" <?= $siswa->AGAMA_SISWA == 'Budha' ? 'selected' : null ?>>BUDHA</option>
										<option value="Konghucu" <?= $siswa->AGAMA_SISWA == 'Konghucu' ? 'selected' : null ?>>KONGHUCU</option>
									</select>
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
	$("#form-pendaftaran").on('submit', (e) => {
		e.preventDefault();
		$('.btn').attr("disabled");
		$('#loading').show();
		$.ajax({
			type: "POST",
			url: "<?= base_url(); ?>api/update/siswa/<?= $siswa->NIS; ?>",
			data: $('#form-pendaftaran').serialize(),
			dataType: "json",
			success: (response) => {
				$('.progress-bar').attr("style", "width: 100%");
				setTimeout(() => {
					if (response.success) {
						Swal.fire({
							icon: 'success',
							title: 'Berhasil!',
							text: response.message
						})
						window.location.replace("<?= base_url(); ?>siswa")
					} else {
						Swal.fire({
							icon: 'error',
							title: 'Gagal!',
							text: response.message
						})
					}
					$('.btn').removeAttr("disabled");
					$('#loading').hide();
				}, 1000);
				setTimeout(() => {
					$('.progress-bar').attr("style", "width: 0%");
				}, 1000);
			}
		});
	})
</script>
