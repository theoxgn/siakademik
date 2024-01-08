<div class="container">
  <div class="widget-list">
    <div class="row">
      <div class="col-md-12 widget-holder">
        <div class="widget-bg">
          <div class="widget-heading clearfix">
            <h5>Data Akademik Siswa</h5>
            <div class="flex-1"></div>
            <div class="d-inline-flex align-items-center mt-3 mt-sm-0">
              <a class="btn btn-outline-info px-4 pd-tb-8" href="<?= base_url(); ?>tambah/akademik">Tambah Akademik Siswa</a>
            </div>
          </div>
          <!-- /.widget-heading -->
          <div class="widget-body clearfix">
            <table class="table table-striped" data-toggle="datatables">
              <thead>
                <tr>
                  <th data-field="ID" data-sortable="true">ID</th>
                  <th data-field="SISWA" data-sortable="true">SISWA</th>
                  <th data-field="KELAS" data-sortable="true">KELAS</th>
                  <th data-field="SEMESTER" data-sortable="true">SEMESTER</th>
                  <th data-field="TAHUN_AJARAN" data-sortable="true">TAHUN AJARAN</th>
                  <th data-field="STATUS_AKADEMIK" data-sortable="true">STATUS AKADEMIK</th>
                  <th>ACTION</th>
                </tr>
              </thead>
              <tbody>
                <?php if ($akademik !== null) : ?>
                  <?php foreach ($akademik as $key) : ?>
                    <tr>
                      <td><?= $key->ID_AKADEMIK; ?></td>
                      <td><?= $key->NAMA_LENGKAP_SISWA; ?></td>
                      <td><?= $key->ID_KELAS; ?></td>
                      <td><?= $key->SEMESTER; ?></td>
                      <td><?= $key->TAHUN_AJARAN; ?></td>
                      <td><?= $key->STATUS_AKADEMIK; ?></td>
                      <td>
                        <?php if ($this->session->userdata('ROLE') == 'GURU'): ?>
                          <a href="<?= base_url(); ?>tambah/detilakademik/<?= $key->ID_AKADEMIK; ?>" class="btn btn-success btn-sm btn-circle"><i class="lnr lnr-plus-circle icon-sm"></i></a>
                        <?php endif; ?>
                        <a href="<?= base_url(); ?>akademik/<?= $key->ID_AKADEMIK; ?>" class="btn <?= $key->STATUS_PERSETUJUAN == 'DISETUJUI' ? 'btn-danger' : 'btn-success' ?> btn-sm btn-circle"><i class="lnr lnr-list icon-sm"></i></a>
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
