<div class="container">
  <div class="row">
    <div class="col-md-8 offset-md-2 widget-holder">
      <div class="widget-bg">
        <div class="widget-body clearfix">
          <h5 class="box-title mr-b-0">Tambah Data Pembayaran</h5>
          <p class="text-muted">Tambahkan data Pembayaran siswa TK Kristen YPKB Mojowarno</p>
          <form id="form-pendaftaran">
            <div class="row">
              <div class="col-lg-12">
                <div class="form-group">
                  <label for="l36">ID TAGIHAN</label>
                  <select class="form-control" onchange="get_detail(this.value);" id="idtagihan" name="idtagihan" data-toggle="select2">
                    <option value="">PILIH</option>
                    <?php if ($tagihan !== null) : foreach ($tagihan as $key) : ?>
                      <option value="<?= $key->IDTAGIHAN; ?>"><?= $key->IDTAGIHAN; ?></option>
                    <?php endforeach;
                  endif; ?>
                </select>
              </div>
            </div>
          </div><!-- 
          <div class="row">
            <div class="col-lg-3">
              <div class="form-group">
                <label for="l38">NAMA SISWA</label>
                <input class="form-control" id="nis" type="varchar" disabled>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="form-group">
                <label for="l38">JENIS TAGIHAN</label>
                <input class="form-control" id="jenis_tagihan" type="varchar" disabled>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="form-group">
                <label for="l38">NAMA TAGIHAN</label>
                <input class="form-control" id="nama_tagihan" type="varchar" disabled>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="form-group">
                <label for="l38">NOMINAL TAGIHAN</label>
                <input class="form-control" id="nominal" type="varchar" disabled>
              </div>
            </div>
          </div> -->
          <div id="border-success">
            <label> Nama Siswa : <p id="nama"></p> </label><br>
            <label>Jenis Tagihan : <p id="jenis_tagihan"></p></label><br>
            <label>Nominal : <p id="nominal"></p></label><br>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="form-group">
                <label for="l30">ATAS NAMA</label>
                <input class="form-control" name="atas_nama" placeholder="Tagihan untuk siswa" type="text">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label for="l37">TOTAL</label>
                <input class="form-control" name="total" placeholder="Rp. 00000" type="number">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label for="l37">TANGGAL</label>
                <input class="form-control" name="tanggal" placeholder="10-10-2019" type="date">
              </div>
            </div>
          </div>
          <div class="row">

            <div class="col-lg-6">
              <div class="form-group">
                <label for="l38">KETERANGAN</label>
                <input class="form-control" id="nama_tagihan" type="varchar" disabled>
              </div>
<!--             <div class="col-lg-6">
              <div class="form-group">
                <label for="l37">c</label>
                <input class="form-control" id="nama_tagihan" name="keterangan" placeholder="" type="varchar">
              </div> -->
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label">STATUS</label>
                <select class="form-control" name="status" data-toggle="select2" data-plugin-options='{"minimumResultsForSearch": -1}'>
                  <option value="">PILIH STATUS</option>
                  <option value="LUNAS">LUNAS</option>
                  <option value="CICILAN">CICILAN</option>
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
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script>
  $("#form-pendaftaran").on('submit', (e) => {
    e.preventDefault();
    $('.btn').attr("disabled");
    $('#loading').show();
    $.ajax({
      type: "POST",
      url: "<?= base_url(); ?>api/tambah/pembayaran",
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
            window.location.replace("<?= base_url(); ?>pembayaran")
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
      url: "<?= base_url(); ?>api/detailtagihan/" + e,
      dataType: 'json',
      error : function(XMLHttpRequest, textStatus, errorThrown) {
        alert('error');
      },
      success: function(response) {
        console.log(response.data);
        //$("#table_layout").(response);
        $('#nama').html(response.data.NAMA_LENGKAP_SISWA);
        $('#nama_tagihan').val(response.data.NAMA_TAGIHAN);
        $('#jenis_tagihan').html(response.data.NAMA_JENIS);
        $('#nominal').html(response.data.NOMINAL);
        //$('#atas_nama').html(response.data.NAMA);
      }
    });

  }
</script>