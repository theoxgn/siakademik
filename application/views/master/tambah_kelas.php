<div class="container">
  <div class="row">
    <div class="col-md-8 offset-md-2 widget-holder">
      <div class="widget-bg">
        <div class="widget-body clearfix">
          <h5 class="box-title mr-b-0">Tambah Kelas</h5>
          <p class="text-muted">Pastikan data kelas benar</p>
          <form id="form-pendaftaran">
            <div class="form-group">
              <label for="l38">NAMA KELAS</label>
              <input class="form-control" name="NAMA_KELAS" type="text" placeholder="Masukkan Nama Kelas">
            </div>
            <div class="row">
              <div class="col-lg-12">
                <div class="form-group">
                  <label for="l36">GURU PENANGGUNGJAWAB</label>
                  <select class="form-control" name="GURU" data-toggle="select2">
                    <option value="">PILIH GURU</option>
                    <?php if ($guru !== null) : foreach ($guru as $key) : ?>
                        <option value="<?= $key->NIP; ?>"><?= $key->NAMA_LENGKAP_GURU; ?></option>
                    <?php endforeach;
                                                      endif; ?>
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
      url: "<?= base_url(); ?>api/tambah/kelas",
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
            window.location.replace("<?= base_url(); ?>master/kelas")
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