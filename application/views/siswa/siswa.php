<div class="container">
  <div class="widget-list">
    <div class="row">
      <div class="col-md-12 widget-holder">
        <div class="widget-bg">
          <div class="widget-heading clearfix">
            <h5>Data Siswa</h5>
            <div class="flex-1"></div>
            <div class="d-inline-flex align-items-center mt-3 mt-sm-0">
            </div>
          </div>
          <!-- /.widget-heading -->
          <div class="widget-body clearfix">
            <table class="table table-striped" data-toggle="datatables">
              <thead>
                <tr>
                  <th data-field="NIS" data-sortable="true">NIS</th>
                  <th data-field="NAMA" data-sortable="true">NAMA</th>
                  <th data-field="TGL LAHIR" data-sortable="true">TANGGAL LAHIR</th>
                  <th data-field="ALAMAT" data-sortable="true">ALAMAT</th>
                  <th data-field="JK" data-sortable="true">JK</th>
                  <th data-field="AGAMA" data-sortable="true">AGAMA</th>
                  <th data-field="KATEGORI" data-sortable="true">KATEGORI</th>
                  <th data-field="TANGGAL" data-sortable="true">TANGGAL LAHIR</th>
                  <th data-field="TANGGAL" data-sortable="true">FOTO</th>
                  <th>ACTION</th>
                </tr>
              </thead>
              <tbody>
                <?php if ($siswa !== null) : ?>
                  <?php foreach ($siswa as $key) : ?>
                    <tr>
                      <td><?= $key->NIS; ?></td>
                      <td><?= $key->NAMA_LENGKAP_SISWA; ?></td>
                      <td><?= $key->TANGGAL_LAHIR; ?></td>
                      <td><?= $key->ALAMAT_SISWA; ?></td>
                      <td><?= $key->JK_SISWA; ?></td>
                      <td><?= $key->AGAMA_SISWA; ?></td>
                      <td><?= $key->KATEGORI_SISWA; ?></td>
                      <td><?= $key->TANGGAL_LAHIR; ?></td>
                      <td><a href="<?= base_url()."assets/images/".$key->FOTO_SISWA ?>" target="_blank">Lihat Foto</a></td>
                      <td>
                        <a class="btn btn-primary btn-sm btn-circle" href="<?= base_url()."siswa/edit/".$key->NIS ?>"><i class="lnr lnr-pencil icon-sm"></i></a>
                        <button class="btn btn-danger btn-sm btn-circle" onclick="deleteData('<?= $key->NIS ?>', '<?= $key->NAMA_LENGKAP_SISWA ?>')"><i class="lnr lnr-cross icon-sm"></i></button>
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
<script type="text/javascript">
	function deleteData(nis, nama) {
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
					url: "<?= base_url(); ?>api/delete_siswa?nis="+nis,
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
