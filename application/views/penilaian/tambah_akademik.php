<div class="container">
  <div class="row">
    <div class="col-md-8 offset-md-2 widget-holder">
      <div class="widget-bg">
        <div class="widget-body clearfix">
          <h5 class="box-title mr-b-0">Data Akademik Siswa</h5>
          <p class="text-muted">Tambahkan data akademik siswa TK Kristen YPKB Mojowarno</p>
          <form id="form-pendaftaran">
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="l36">NAMA SISWA</label>
                  <select class="form-control" name="nis" data-toggle="select2">
                    <?php if ($siswa !== null) : foreach ($siswa as $key) : ?>
                      <option value="<?= $key->NIS; ?>"><?= $key->NAMA_LENGKAP_SISWA; ?></option>
                    <?php endforeach;
                  endif; ?>
                </select>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label for="l36">KELAS</label>
                <select class="form-control" name="kelas" data-toggle="select2">
                  <?php if ($kelas !== null) : foreach ($kelas as $key) : ?>
                    <option value="<?= $key->ID_KELAS; ?>"><?= $key->NAMA_KELAS; ?></option>
                  <?php endforeach;
                endif; ?>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="form-group">
              <label class="form-control-label">SEMESTER</label>
              <select class="form-control" name="semester" data-toggle="select2" data-plugin-options='{"minimumResultsForSearch": -1}'>
                <option value="">PILIH </option>
                <option value="GANJIL">SEMESTER GANJIL</option>
                <option value="GENAP">SEMESTER GENAP</option>
              </select>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
              <label class="form-control-label">TAHUN AJARAN</label>
              <select class="form-control" name="tahun_ajaran" data-toggle="select2" data-plugin-options='{"minimumResultsForSearch": -1}'>
                <option value="">PILIH </option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="form-group">
              <label class="form-control-label">STATUS AKADEMIK</label>
              <select class="form-control" name="status_akademik" data-toggle="select2" data-plugin-options='{"minimumResultsForSearch": -1}'>
                <option value="">PILIH </option>
                <option value="AKTIF">AKTIF</option>
                <option value="TIDAK AKTIF">TIDAK AKTIF</option>
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
      url: "<?= base_url(); ?>api/tambah/akademik",
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
