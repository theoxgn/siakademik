<div class="container">
  <div class="row">
    <div class="col-md-8 offset-md-2 widget-holder">
      <div class="widget-bg">
        <div class="widget-body clearfix">
          <h5 class="box-title mr-b-0">Update Guru</h5>
          <p class="text-muted">Pastikan data guru benar</p>
          <form id="form-pendaftaran">
            <div class="form-group">
              <label for="l38">NIP</label>
              <input class="form-control" name="nip" type="text" placeholder="NIP" value="<?= $guru->NIP ?>">
            </div>
            <div class="form-group">
              <label for="l38">NAMA LENGKAP</label>
              <input class="form-control" name="nama" type="text" placeholder="Nama Lengkap" value="<?= $guru->NAMA_LENGKAP_GURU ?>">
            </div>
            <div class="form-group">
              <label for="l36">KOTA</label>
              <select class="form-control" id="siswa" name="kota" data-toggle="select2">
                <option value="">PILIH KOTA</option>
                <?php if ($kota !== null) : foreach ($kota as $key) : ?>
                  <option value="<?= $key->IDKOTA; ?>" <?= $key->IDKOTA == $guru->IDKOTA ? 'selected' : null ?>><?= $key->NAMAKOTA; ?></option>
                <?php endforeach;
              endif; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="l38">ALAMAT</label>
            <input class="form-control" name="alamat" placeholder="Alamat Guru" type="text" value="<?= $guru->ALAMAT_GURU ?>">
          </div>
          <div class="form-group">
            <label for="l38">TANGGAL LAHIR</label>
            <input class="form-control" name="tanggal" type="date" value=<?= $guru->TANGGAL_LAHIR_GURU ?>>
          </div>
          <div class="form-group">
            <label for="l36">JENIS KELAMIN</label>
            <select class="form-control" data-toggle="select2" name="jenis_kelamin">
              <option value="">PILIH JENIS KELAMIN</option>
              <option value="L" <?= $guru->JK_GURU == "L" ? 'selected' : null ?>>LAKI-LAKI</option>
              <option value="P" <?= $guru->JK_GURU == "P" ? 'selected' : null ?>>PEREMPUAN</option>
            </select>
          </div>

          <div class="form-group">
            <label for="l36">AGAMA</label>
            <select class="form-control" data-toggle="select2" name="agama">
              <option value="ISLAM" <?= $guru->AGAMA_GURU == "ISLAM" ? 'selected' : null ?>>Islam</option>
              <option value="KRISTEN" <?= $guru->AGAMA_GURU == "KRISTEN" ? 'selected' : null ?>>Kristen</option>
              <option value="KATOLIK" <?= $guru->AGAMA_GURU == "KATOLIK" ? 'selected' : null ?>>Katolik</option>
              <option value="HINDU" <?= $guru->AGAMA_GURU == "HINDU" ? 'selected' : null ?>>Hindu</option>
              <option value="BUDHA" <?= $guru->AGAMA_GURU == "BUDHA" ? 'selected' : null ?>>Budha</option>
              <option value="KHONGHUCU" <?= $guru->AGAMA_GURU == "KHONGHUCU" ? 'selected' : null ?>>Khonghucu</option>
            </select>
          </div>

          <div class="form-group">
            <label for="l36">STATUS GURU</label>
            <select class="form-control" data-toggle="select2" name="status">
              <option value="MENIKAH" <?= $guru->STATUS_GURU == "MENIKAH" ? 'selected' : null ?>>Sudah Menikah</option>
              <option value="BELUM MENIKAH" <?= $guru->STATUS_GURU == "MENIKAH" ? 'selected' : null ?>>Belum Menikah</option>
            </select>
          </div>

          <div class="form-group">
            <label for="l36">PENDIDIKAN TERAKHIR</label>
            <select class="form-control" data-toggle="select2" name="pendidikan">
              <option value="D1" <?= $guru->PENDIDIKAN_TERAKHIR == "D1" ? 'selected' : null ?>>D1</option>
              <option value="D2" <?= $guru->PENDIDIKAN_TERAKHIR == "D2" ? 'selected' : null ?>>D2</option>
              <option value="D3" <?= $guru->PENDIDIKAN_TERAKHIR == "D3" ? 'selected' : null ?>>D3</option>
              <option value="D4" <?= $guru->PENDIDIKAN_TERAKHIR == "D4" ? 'selected' : null ?>>D4</option>
              <option value="S1" <?= $guru->PENDIDIKAN_TERAKHIR == "S1" ? 'selected' : null ?>>S1</option>
              <option value="S2" <?= $guru->PENDIDIKAN_TERAKHIR == "S2" ? 'selected' : null ?>>S2</option>
            </select>
          </div>

          <div class="form-group">
            <label for="l36">STATUS KEPEGAWAIAN</label>
            <select class="form-control" data-toggle="select2" name="kepegawaian">
              <option value="PNS" <?= $guru->STATUS_KEPEGAWAIAN == "PNS" ? 'selected' : null ?>>PNS</option>
              <option value="SOKWAN" <?= $guru->STATUS_KEPEGAWAIAN == "SOKWAN" ? 'selected' : null ?>>SOKWAN</option>
              <option value="KONTRAK" <?= $guru->STATUS_KEPEGAWAIAN == "KONTRAK" ? 'selected' : null ?>>KONTRAK</option>
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
      url: "<?= base_url(); ?>api/update/guru/<?= $guru->NIP ?>",
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