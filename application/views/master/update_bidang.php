<div class="container">
  <div class="row">
    <div class="col-md-8 offset-md-2 widget-holder">
      <div class="widget-bg">
        <div class="widget-body clearfix">
          <h5 class="box-title mr-b-0">Update Bidang Perkembangan</h5>
          <p class="text-muted">Pastikan data bidang perkembangan benar</p>
          <form id="form-pendaftaran">
            <div class="form-group">
              <label for="l38">NAMA Bidang</label>
              <input class="form-control" name="NAMA_BIDANG" type="text" placeholder="Masukkan Nama Bidang Perkembangan" value="<?= $bidang->NAMA_BIDANG ?>">
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
      url: "<?= base_url(); ?>api/update/bidang/<?= $bidang->ID_BIDANG ?>",
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
            window.location.replace("<?= base_url(); ?>master/bidang")
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