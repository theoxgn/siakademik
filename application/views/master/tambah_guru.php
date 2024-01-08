<div class="container">
  <div class="row">
    <div class="col-md-8 offset-md-2 widget-holder">
      <div class="widget-bg">
        <div class="widget-body clearfix">
          <h5 class="box-title mr-b-0">Tambah Guru</h5>
          <p class="text-muted">Pastikan data guru benar</p>
          <form id="form-pendaftaran">
            <div class="form-group">
              <label for="l38">NIP</label>
              <input class="form-control" name="nip" type="text" placeholder="NIP">
            </div>
            <div class="form-group">
              <label for="l38">NAMA LENGKAP</label>
              <input class="form-control" name="nama" type="text" placeholder="Nama Lengkap">
            </div>
            <div class="form-group">
              <label for="l36">KOTA</label>
              <select class="form-control" id="siswa" name="calon_siswa" data-toggle="select2">
                <option value="">PILIH KOTA</option>
                <?php if ($kota !== null) : foreach ($kota as $key) : ?>
                    <option value="<?= $key->IDKOTA; ?>"><?= $key->NAMAKOTA; ?></option>
                <?php endforeach;
                                                      endif; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="l38">ALAMAT</label>
              <input class="form-control" name="alamat" placeholder="Alamat Guru" type="text">
            </div>
            <div class="form-group">
              <label for="l38">TANGGAL LAHIR</label>
              <input class="form-control" name="tanggal" type="date">
            </div>
            <div class="form-group">
              <label for="l36">JENIS KELAMIN</label>
              <select class="form-control" data-toggle="select2" name="jenis_kelamin">
                <option value="">PILIH JENIS KELAMIN</option>
                <option value="L">LAKI-LAKI</option>
                <option value="P">PEREMPUAN</option>
              </select>
            </div>

            <div class="form-group">
              <label for="l36">AGAMA</label>
              <select class="form-control" data-toggle="select2" name="agama">
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen</option>
                <option value="Katolik">Katolik</option>
                <option value="Hindu">Hindu</option>
                <option value="Budha">Budha</option>
                <option value="Khonghucu">Khonghucu</option>
              </select>
            </div>

            <div class="form-group">
              <label for="l36">STATUS GURU</label>
              <select class="form-control" data-toggle="select2" name="status">
                <option value="Sudah Menikah">Sudah Menikah</option>
                <option value="Belum Menikah">Belum Menikah</option>
              </select>
            </div>

            <div class="form-group">
              <label for="l36">PENDIDIKAN TERAKHIR</label>
              <select class="form-control" data-toggle="select2" name="pendidikan">
                <option value="D1">D1</option>
                <option value="D2">D2</option>
                <option value="D3">D3</option>
                <option value="D4">D4</option>
                <option value="S1">S1</option>
                <option value="S2">S2</option>
              </select>
            </div>

            <div class="form-group">
              <label for="l36">STATUS KEPEGAWAIAN</label>
              <select class="form-control" data-toggle="select2" name="kepegawaian">
                <option value="PNS">PNS</option>
                <option value="SOKWAN">SOKWAN</option>
                <option value="KONTRAK">KONTRAK</option>
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
      url: "<?= base_url(); ?>api/tambah/guru",
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
            window.location.replace("<?= base_url(); ?>master/guru")
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