<div class="container">
  <div class="row">
    <div class="col-md-8 offset-md-2 widget-holder">
      <div class="widget-bg">
        <div class="widget-body clearfix">
          <h5 class="box-title mr-b-0">DATA WALI MURID</h5>
          <p class="text-muted">Tambahkan data wali murid siswa TK Kristen YPKB Mojowarno</p>
          <form id="form-pendaftaran">
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="l30">NAMA LENGKAP</label>
                  <input class="form-control" name="nama" placeholder="Veyonathan Nico" type="text">
                </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group">
                  <label for="l36">NAMA SISWA</label>
                  <select class="form-control" name="siswa" data-toggle="select2">
                    <?php if ($siswa !== null) : foreach ($siswa as $key) : ?>
                      <option value="<?= $key->NIS; ?>"><?= $key->NAMA_LENGKAP_SISWA; ?></option>
                    <?php endforeach;
                  endif; ?>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label for="l36">TEMPAT LAHIR</label>
                <select class="form-control" name="tempat_lahir" data-toggle="select2">
                  <?php if ($kota !== null) : foreach ($kota as $key) : ?>
                    <option value="<?= $key->IDKOTA; ?>"><?= $key->NAMAKOTA; ?></option>
                  <?php endforeach;
                endif; ?>
              </select>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
              <label for="l37">TANGGAL LAHIR</label>
              <input class="form-control" name="ttl" placeholder="10-10-2019" type="date">
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="l38">ALAMAT</label>
          <input class="form-control" name="alamat" placeholder="JOMBANG" type="text">
        </div>
        <div class="form-group">
          <label class="form-control-label">JENIS KELAMIN</label>
          <select class="form-control" name="jenis_kelamin" data-toggle="select2" data-plugin-options='{"minimumResultsForSearch": -1}'>
            <option value="">PILIH JENIS KELAMIN</option>
            <option value="LAKI-LAKI">LAKI-LAKI</option>
            <option value="PEREMPUAN">PEREMPUAN</option>
          </select>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="form-group">
              <label for="l36">AGAMA</label>
              <select class="form-control" name="agama" data-toggle="select2" data-plugin-options='{"minimumResultsForSearch": -1}'>
                <option value="">PILIH </option>
                <option value="Kristen">KRISTEN</option>
                <option value="Katolik">KATOLIK</option>
                <option value="Islam">ISLAM</option>
                <option value="Hindu">HINDU</option>
                <option value="Budha">BUDHA</option>
                <option value="Konghucu">KONGHUCU</option>
              </select>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
              <label for="l37">NO HP</label>
              <input class="form-control" name="hp" placeholder="0822222222222" type="number">
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
      url: "<?= base_url(); ?>api/tambah/walimurid",
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
            window.location.replace("<?= base_url(); ?>walimurid")
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
