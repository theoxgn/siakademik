<div class="container">
  <div class="row">
    <div class="col-md-8 offset-md-2 widget-holder">
      <div class="widget-bg">
        <div class="widget-body clearfix">
          <h5 class="box-title mr-b-0">Data Prestasi Siswa</h5>
          <p class="text-muted">Tambahkan data prestasi siswa TK Kristen YPKB Mojowarno</p>
          <form id="form-pendaftaran">
            <div class="row">
              <div class="col-lg-12">
                <div class="form-group">
                  <label for="l36">NAMA SISWA</label>
                  <select class="form-control" name="nis" data-toggle="select2">
                    <?php if ($prestasi !== null) : foreach ($prestasi as $key) : ?>
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
                <label for="l30">NAMA PRESTASI</label>
                <input class="form-control" name="nama_prestasi" placeholder="JUARA lOMBA BULU TANGKIS" type="text">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label for="l37">TANGGAL PRESTASI</label>
                <input class="form-control" name="tanggal_prestasi" placeholder="10-10-2019" type="date">
              </div>
            </div>
          </div>
          <label class="form-control-label">TINGKAT PRESTASI</label>
          <select class="form-control" name="tingkat_prestasi" data-toggle="select2" data-plugin-options='{"minimumResultsForSearch": -1}'>
            <option value="">PILIH </option>
            <option value="sekolah">ANTAR SEKOLAH</option>
            <option value="kecamatan">ANTAR KECAMATAN</option>
            <option value="provinsi">ANTAR PROVINSI</option>
            <option value="nasional">NASIONAL</option>
            <option value="internasional">INTERNASIONAL</option>
          </select>
          <div class="form-group">
            <label for="l38">KETERANGAN PRESTASI</label>
            <input class="form-control" name="keterangan_prestasi" placeholder="gatau" type="text">
          </div>
          <div class="form-group">
            <input type="file" class="custom-file-input" name="foto">
            <label class="custom-file-label" for="customFile">Pilih Foto</label>
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
      url: "<?= base_url(); ?>api/tambah/prestasi",
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
            window.location.replace("<?= base_url(); ?>prestasi")
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
