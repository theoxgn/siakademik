<div class="container">
  <div class="widget-list">
    <div class="row">
      <div class="col-md-12 widget-holder">
        <div class="widget-bg">
          <div class="widget-heading clearfix">
            <h5>Data Wali Murid Siswa</h5>
            <div class="flex-1"></div>
            <div class="d-inline-flex align-items-center mt-3 mt-sm-0">
              <a class="btn btn-outline-info px-4 pd-tb-8" href="<?= base_url(); ?>tambah/walimurid">Tambah Wali Murid Siswa</a>
            </div>
          </div>
          <div class="widget-body clearfix">
            <table class="table table-striped" data-toggle="datatables">
              <thead>
                <tr>
                  <th data-field="NAMA" data-sortable="true">NAMA WALI</th>
                  <th data-field="NAMA" data-sortable="true">NAMA SISWA</th>
                  <th data-field="ALAMAT" data-sortable="true">ALAMAT</th>
                  <th data-field="JK" data-sortable="true">JK</th>
                  <th data-field="NO HP" data-sortable="true">NO HP</th>
                  <th>ACTION</th>
                </tr>
              </thead>
              <tbody>
                <?php if ($walimurid !== null) : ?>
                  <?php foreach ($walimurid as $key) : ?>
                    <tr>
                      <td><?= $key->NAMA; ?></td>
                      <td><?= $key->NAMA_LENGKAP_SISWA; ?></td>
                      <td><?= $key->ALAMAT; ?></td>
                      <td><?= $key->JK; ?></td>
                      <td><?= $key->NOHP; ?></td>
                      <td>
                        <a href="<?= base_url()."prestasi/update/prestasi/".$key->IDWALI ?>" class="btn btn-info btn-sm btn-circle"><i class="lnr lnr-pencil icon-sm"></i></a>
                        <button class="btn btn-danger btn-sm btn-circle" onclick="deleteData('<?= $key->IDWALI ?>', '<?= $key->NAMA ?>')"><i class="lnr lnr-cross icon-sm"></i></button>
                      </td>
                    </tr>
                  <?php endforeach;
                endif; ?>
              </tbody>
            </table>
          </div>
          <!-- /.widget-body -->
        </div>
        <!-- /.widget-bg -->
      </div>
    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
  function deleteData(idwali, nama) {
    Swal.fire({
      title: "Konfirmasi",
      text: "Apakah anda yakin akan menghapus data "+nama,
      type: "warning",
      animation: "slide-from-top",
      showCancelButton: true,
      confirmButtonText: "Ya",
      cancelButtonText: "Tidak",
      closeOnConfirm: false,
      showLoaderOnConfirm: true,
      closeOnCancel: false
    }).then((result) => {
      if(result.value) {
        $.ajax({
          type: "POST",
          url: "<?= base_url(); ?>api/delete/walimurid/"+idwali,
          success: (response) => {
            setTimeout(() => {
              response = JSON.parse(response)
              if (response.success) {
                Swal.fire({
                  icon: 'success',
                  title: response.message,
                  text: 'tunggu sebentar, anda akan dialihkan ...'
                })
                window.location.reload();
              } else {
                Swal.fire({
                  icon: 'error',
                  title: response.message
                })
              }
            }, 1000);
          }
        });
      }
    })
  }
</script>
