<div class="container">
  <div class="widget-list">
    <div class="row">
      <div class="col-md-12 widget-holder">
        <div class="widget-bg">
          <div class="widget-heading clearfix">
            <h5>Data Pembayaran</h5>
            <div class="flex-1"></div>
            <div class="d-inline-flex align-items-center mt-3 mt-sm-0">
              <a class="btn btn-outline-info px-4 pd-tb-8" href="<?= base_url(); ?>tambah/pembayaran">Tambah Pembayaran</a> 
              <a class="btn btn-outline-info px-4 pd-tb-8" href="<?= base_url(); ?>Pembayaran/cetaklaporanPembayaran">Laporan Pembayaran</a>
            </div>
          </div>
          <!-- /.widget-heading -->
          <div class="widget-body clearfix">
            <form action="<?= base_url()."pembayaran" ?>" method="GET">
              <div class="row">
                <div class="col-md-6">
                  <label for="from">Dari Tanggal: </label>
                  <input type="date" name="from" id="from" class="form-control" value="<?= $from; ?>">
                </div>
                <div class="col-md-6">
                  <label for="from">Sampai Tanggal: </label>
                  <input type="date" name="to" id="to" class="form-control" value="<?= $to; ?>">
                </div>
              </div>
              <div class="row">
                <div class="col-md-3"><button class="btn btn-outline-primary mt-3">Cari Data</button></div>
              </div>
            </form>
            <table class="table table-striped" data-toggle="datatables">
              <thead>
                <tr>
                  <th data-field="NIS" data-sortable="true">ID TAGIHAN</th>
                  <th data-field="NIS" data-sortable="true">ATAS NAMA</th>
                  <th data-field="NAMA" data-sortable="true">TOTAL</th>
                  <th data-field="KATEGORI" data-sortable="true">TANGGAL</th>
                  <th data-field="KATEGORI" data-sortable="true">KETERANGAN</th>
                  <th data-field="NAMA" data-sortable="true">STATUS</th>
                  <th>ACTION</th>
                </tr>
              </thead>
              <tbody>
                <?php if ($pembayaran !== null) : ?>
                  <?php foreach ($pembayaran as $key) : ?>
                    <tr>
                      <td><?= $key->IDTAGIHAN; ?></td>
                      <td><?= $key->ATAS_NAMA; ?></td>
                      <td><?= $key->TOTAL; ?></td>
                      <td><?= $key->TANGGAL; ?></td>
                      <td><?= $key->KETERANGAN; ?></td>
                      <td><?= $key->STATUS; ?></td>
                      <td><a class="btn btn-primary btn-sm btn-circle" href="<?= base_url() ?>pembayaran/cetak-pembayaran/<?= $key->IDPEMBAYARAN ?>"><i class="lnr lnr-printer icon-sm"></i></a></td>
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
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
