<div class="container">
  <div class="row">
    <div class="col-md-8 offset-md-2 widget-holder">
      <div class="widget-bg">
        <div class="widget-body clearfix">
          <h5 class="box-title mr-b-0">Validasi Calon Siswa</h5>
          <p class="text-muted">Pastikan data calon siswa benar dan memasukkan NIK dan foto</p>
          <form id="form-pendaftaran">
            <div class="form-group">
              <label for="l36">CALON SISWA</label>
              <select class="form-control" onchange="get_detail(this.value);" id="siswa" name="calon_siswa" data-toggle="select2">
                <option value="">PILIH CALON SISWA</option>
                <?php if ($calon !== null) : foreach ($calon as $key) : ?>
                  <option value="<?= $key->ID_CALON; ?>"><?= $key->NAMA_CALON_SISWA; ?></option>
                <?php endforeach;
              endif; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="l38">ALAMAT</label>
            <input class="form-control" id="alamat" type="text" disabled>
          </div>
          <div class="form-group">
            <label for="l38">TANGGAL LAHIR</label>
            <input class="form-control" id="ttl" type="date" disabled>
          </div>
          <div class="form-group">
            <label for="l36">KATEGORI SISWA</label>
            <select class="form-control" name="kategori" data-toggle="select2">
              <option value="">PILIH KATEGORI SISWA</option>
              <option value="1">KELAS PERCOBAAN</option>
              <option value="2">KELAS REGULER</option>
            </select>
          </div>
          <div class="form-group">
            <label for="l38">NIK</label>
            <input class="form-control" name="nik" placeholder="NIK Siswa" type="number">
          </div>
          <div class="form-group">
            <label for="l38">FOTO</label>
            <input class="form-control" name="foto" type="file">
          </div>
          <div class="form-group">
            <label for="l36">STATUS</label>
            <select class="form-control" name="status" data-toggle="select2">
              <option value="">PILIH</option>
              <option value="DITERIMA">DITERIMA</option>
              <option value="AKTIF">AKTIF</option>
              <option value="TIDAK AKTIF">TIDAK AKTIF</option>
            </select>
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
      url: "<?= base_url(); ?>api/validasi",
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
  });

  get_detail = (e) => {
    if (e == '') {
      return;
    }
    console.log(e);
    $.ajax({
      type: "GET",
      url: "<?= base_url(); ?>api/siswa/" + e,
      dataType: "json",
      success: function(response) {
        console.log(response.data);
        $('#alamat').val(response.data.ALAMAT_CALON_SISWA);
        $('#ttl').val(response.data.TANGGAL_LAHIR_CALON_SISWA);
      }
    });
  }
</script>