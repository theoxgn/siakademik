<div class="container">
  <div class="widget-list">
    <div class="row">
      <div class="col-md-12 widget-holder">
        <div class="widget-bg">
          <div class="widget-heading clearfix">
            <h5>Data Jenis Tagihan</h5>
            <div class="flex-1"></div>
            <div class="d-inline-flex align-items-center mt-3 mt-sm-0">
              <a class="btn btn-outline-info px-4 pd-tb-8" href="<?= base_url(); ?>master/tambah/jenis/tagihan">Tambah Jenis</a>
            </div>
          </div>
          <!-- /.widget-heading -->
          <div class="widget-body clearfix">
            <table class="table table-striped" data-toggle="datatables">
              <thead>
                <tr>
                  <th data-field="NO" data-sortable="true">NO</th>
                  <th data-field="NIS" data-sortable="true">JENIS TAGIHAN</th>
                  <th>ACTION</th>
                </tr>
              </thead>
              <tbody>
                <?php if ($tagihan !== null) : ?>
                  <?php $no = 1;
                  foreach ($tagihan as $key) : ?>
                    <tr>
                      <td><?= $no; ?></td>
                      <td><?= $key->NAMA_JENIS; ?></td>
                      <td>
                        <a href="<?= base_url()."master/update/jenis_tagihan/".$key->ID_JENIS ?>" class="btn btn-info btn-sm btn-circle"><i class="lnr lnr-pencil icon-sm"></i></a>
                        <button class="btn btn-danger btn-sm btn-circle" onclick="deleteData('<?= $key->ID_JENIS ?>', '<?= $key->NAMA_JENIS ?>')"><i class="lnr lnr-cross icon-sm"></i></button>
                      </td>
                    </tr>
                    <?php $no++;
                  endforeach;
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
function deleteData(id_jenis, nama_jenis) {
		Swal.fire({
			title: "Konfirmasi",
			text: "Apakah anda yakin akan menghapus data "+nama_jenis,
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
					url: "<?= base_url(); ?>api/delete/jenis_tagihan/"+id_jenis,
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