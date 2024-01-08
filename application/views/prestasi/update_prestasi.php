  <div class="row">
    <div class="col-md-8 offset-md-2 widget-holder">
      <div class="widget-bg">
        <div class="widget-body clearfix">
          <h5 class="box-title mr-b-0">Update Pretasi</h5>
          <p class="text-muted">Pastikan data prestasi benar</p>
          <form id="form-pendaftaran">
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="l30">NAMA PRESTASI</label>
                  <input class="form-control" name="nama_prestasi" placeholder="JUARA lOMBA BULU TANGKIS" type="text" value="<?= $prestasi->NAMA_PRESTASI ?>">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="l37">TANGGAL PRESTASI</label>
                  <input class="form-control" name="tanggal_prestasi" placeholder="10-10-2019" type="date" value="<?= $prestasi->TANGGAL_PRESTASI ?>">
                </div>
              </div>
            </div>
            <label class="form-control-label">TINGKAT PRESTASI</label>
            <select class="form-control" name="tingkat_prestasi" data-toggle="select2" data-plugin-options='{"minimumResultsForSearch": -1}'>
              <option value="">PILIH </option>
              <option value="Sekolah" <?= $prestasi->TINGKAT_PRESTASI == "Sekolah" ? 'selected' : null ?>>ANTAR SEKOLAH</option>
              <option value="Kecamatan" <?= $prestasi->TINGKAT_PRESTASI == "Kecamatan" ? 'selected' : null ?>>ANTAR KECAMATAN</option>
              <option value="Provinsi" <?= $prestasi->TINGKAT_PRESTASI == "Provinsi" ? 'selected' : null ?>>ANTAR PROVINSI</option>
              <option value="Nasional" <?= $prestasi->TINGKAT_PRESTASI == "Nasional" ? 'selected' : null ?>>NASIONAL</option>
              <option value="Internasional" <?= $prestasi->TINGKAT_PRESTASI == "Internasional" ? 'selected' : null ?>>INTERNASIONAL</option>
            </select>
            <div class="form-group">
              <label for="l38">KETERANGAN PRESTASI</label>
              <input class="form-control" name="keterangan_prestasi" placeholder="gatau" type="text" value="<?= $prestasi->KETERANGAN_PRESTASI ?>">
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
      url: "<?= base_url(); ?>api/update/prestasi/<?= $prestasi->ID_PRESTASI ?>",
      data: $('#form-pendaftaran').serialize(),
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
            window.location.replace("<?= base_url(); ?>prestasi/")
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
