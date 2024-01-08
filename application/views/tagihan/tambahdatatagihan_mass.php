<div class="container">
  <div class="row">
    <div class="col-md-8 offset-md-2 widget-holder">
      <div class="widget-bg">
        <div class="widget-body clearfix">
          <h5 class="box-title mr-b-0">Tambah Mass Data Tagihan</h5>
          <p class="text-muted">Tambahkan data tagihan siswa TK Kristen YPKB Mojowarno</p>
          <form id="form-pendaftaran">
            <div class="row">
              <div class="col-lg-12">
                <div class="form-group">
                  <label for="l36">JENIS TAGIHAN</label>
                  <select class="form-control" name="id_jenis" data-toggle="select2">
                    <?php if ($tagihan !== null) : foreach ($tagihan as $key) : ?>
                      <option value="<?= $key->ID_JENIS; ?>"><?= $key->NAMA_JENIS; ?></option>
                    <?php endforeach;
                  endif; ?>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="form-group">
                <label for="l30">NAMA TAGIHAN</label>
                <input class="form-control" name="nama_tagihan" placeholder="Tagihan bulan ...." type="text">
              </div>
            </div>
            <div class="col-lg-12">
              <div class="form-group">
                <label for="l37">NOMINAL</label>
                <input class="form-control" name="nominal" placeholder="100000" type="number">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label for="l37">TANGGAL TAGIHAN</label>
                <input class="form-control" name="tanggal_tagihan" placeholder="10-10-2019" type="date">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label for="l37">TANGGAL TERAKHIR PEMBAYARAN</label>
                <input class="form-control" name="tanggal_terakhir_pembayaran" placeholder="10-10-2019" type="date">
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
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script>
  $("#form-pendaftaran").on('submit', (e) => {
    e.preventDefault();
    $('.btn').attr("disabled");
    $('#loading').show();
    $.ajax({
      type: "POST",
      url: "<?= base_url(); ?>api/tambah/tagihan_mass",
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
            window.location.replace("<?= base_url(); ?>tagihan")
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