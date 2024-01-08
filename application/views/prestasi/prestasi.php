<div class="container">
  <div class="widget-list">
    <div class="row">
      <div class="col-md-12 widget-holder">
        <div class="widget-bg">
          <div class="widget-heading clearfix">
            <h5>Data Prestasi Siswa</h5>
            <div class="flex-1"></div>
            <div class="d-inline-flex align-items-center mt-3 mt-sm-0">
              <a class="btn btn-outline-info px-4 pd-tb-8" href="<?= base_url(); ?>tambah/prestasisiswa">Tambah Prestasi Siswa</a>
            </div>
          </div>
          <div class="widget-body clearfix">
            <table class="table table-striped" data-toggle="datatables">
              <thead>
                <tr>
                  <th data-field="NIS" data-sortable="true">SISWA</th>
                  <th data-field="NAMA_PRESTASI" data-sortable="true">NAMA PRESTASI</th>
                  <th data-field="TINGKAT_PRESTASI" data-sortable="true">TINGKAT PRESTASI</th>
                  <th data-field="TANGGAL_PRESTASI" data-sortable="true">TANGGAL PRESTASI</th>
                  <th data-field="KETERANGAN_PRESTASI" data-sortable="true">KETERANGAN PRESTASI</th>
                  <th>ACTION</th>
                </tr>
              </thead>
              <tbody>
                <?php if ($prestasi !== null) : ?>
                  <?php foreach ($prestasi as $key) : ?>
                    <tr>
                      <td><?= $key->NIS; ?></td>
                      <td><?= $key->NAMA_PRESTASI; ?></td>
                      <td><?= $key->TINGKAT_PRESTASI; ?></td>
                      <td><?= $key->TANGGAL_PRESTASI; ?></td>
                      <td><?= $key->KETERANGAN_PRESTASI; ?></td>
                      <td>
                        <a href="<?= base_url()."prestasi/update/prestasi/".$key->ID_PRESTASI ?>" class="btn btn-info btn-sm btn-circle"><i class="lnr lnr-pencil icon-sm"></i></a>
                        <button class="btn btn-danger btn-sm btn-circle" onclick="deleteData('<?= $key->ID_PRESTASI ?>', '<?= $key->NAMA_PRESTASI ?>')"><i class="lnr lnr-cross icon-sm"></i></button>
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
  function deleteData(id_prestasi, nama_prestasi) {
    Swal.fire({
      title: "Konfirmasi",
      text: "Apakah anda yakin akan menghapus data "+nama_prestasi,
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
          url: "<?= base_url(); ?>api/delete/prestasi/"+id_prestasi,
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
