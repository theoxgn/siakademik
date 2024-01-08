<div class="page-title-expand">
  <div class="container">
    <div class="row">
      <div>
        <h4 class="my-1">Halo, Selamat Datang <?= $this->session->userdata('ROLE'); ?>!</h4>
        <p class="mb-0">Tagihan terakhir anda pada tanggal <span id="time"></span>.
        </p>
      </div>
      <div class="flex-1"></div>
      <div class="d-inline-flex align-items-center mt-3 mt-sm-0">
        <button class="btn btn-outline-default px-4 pd-tb-10">Buat Report</button>
      </div>
      <!-- /.d-inline-flex -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->
</div>

<div class="container">
  <div class="row">
    <div class="col-lg-6">
      <div class="widget-list row">
        <!-- /.widget-holder -->
        <div class="widget-holder col-6">
          <div class="widget-bg">
            <div class="widget-body bg-secondary text-inverse px-4 pt-3 pb-4 radius-3">
              <div class="icon-box icon-box-centered flex-1 my-0 p-0">
                <header class="align-self-center"><a href="#" class="bg-grey fs-30 text-muted"><i class="lnr lnr-graduation-hat icon-lg"></i></a>
                </header>
                <section class="mt-0">
                  <h6 class="icon-box-title my-0"><span class="counter"><?= $siswa; ?></span></h6>
                  <p class="mb-0">Jumlah Siswa</p>
                </section>
              </div>
              <!-- /.icon-box -->
            </div>
            <!-- /.widget-body -->
          </div>
          <!-- /.widget-bg -->
        </div>

        <div class="widget-holder col-6">
          <div class="widget-bg">
            <div class="widget-body bg-success text-inverse px-4 pt-3 pb-4 radius-3">
              <div class="icon-box icon-box-centered flex-1 my-0 p-0">
                <header class="align-self-center"><a href="#" class="bg-grey fs-30 text-muted"><i class="lnr lnr-graduation-hat icon-lg"></i></a>
                </header>
                <section class="mt-0">
                  <h6 class="icon-box-title my-0"><span class="counter">25</span></h6>
                  <p class="mb-0">Jumlah Siswa KP</p>
                </section>
              </div>
              <!-- /.icon-box -->
            </div>
            <!-- /.widget-body -->
          </div>
          <!-- /.widget-bg -->
        </div>
        <!-- /.widget-holder -->
        <div class="widget-holder col-6">
          <div class="widget-bg">
            <div class="widget-body bg-danger text-inverse px-4 pt-3 pb-4 radius-3">
              <div class="icon-box icon-box-centered flex-1 my-0 p-0">
                <header class="align-self-center"><a href="#" class="bg-grey fs-30 text-muted"><i class="lnr lnr-page-break icon-lg"></i></a>
                </header>
                <section class="mt-0">
                  <h6 class="icon-box-title my-0"><span class="counter">1</span></h6>
                  <p class="mb-0">Total Pembayaran</p>
                </section>
              </div>
              <!-- /.icon-box -->
            </div>
            <!-- /.widget-body -->
          </div>
          <!-- /.widget-bg -->
        </div>

        <div class="widget-holder col-6">
          <div class="widget-bg">
            <div class="widget-body bg-warning px-4 pt-3 pb-4">
              <div class="icon-box icon-box-centered text-inverse flex-1 my-0 p-0 radius-3">
                <header class="align-self-center"><a href="#" class="bg-grey fs-30 text-muted"><i class="lnr lnr-printer icon-lg"></i></a>
                </header>
                <section class="mt-0">
                  <h6 class="icon-box-title my-0">Rp<span class="counter">2032910239</span></h6>
                  <p class="mb-0">Total Tagihan Siswa</p>
                </section>
              </div>
              <!-- /.icon-box -->
            </div>
            <!-- /.widget-body -->
          </div>
          <!-- /.widget-bg -->
        </div>
        <!-- /.widget-holder -->
      </div>
      <!-- /.widget-list -->
    </div>
    <!-- /.col-lg-4 -->
    <div class="col-lg-6">
      <div class="widget-list">
        <div class="widget-holder widget-full-height">
          <div class="widget-bg">
            <div class="widget-body pb-4">
              <div class="d-flex align-items-end flex-sm-wrap">
                <div class="icon-box icon-box-side icon-box-sm mr-3 my-0">
                  <header class="mx-3 align-self-center"><a href="#" class="text-success"><i class="fa fa-circle"></i></a>
                  </header>
                  <section>
                    <h6 class="icon-box-title mb-0">4 Cores</h6>
                    <p class="mb-0">CPU Power</p>
                  </section>
                </div>
                <!-- /.icon-box -->
                <div class="icon-box icon-box-side icon-box-sm mr-3 my-0">
                  <header class="mx-3 align-self-center"><a href="#" class="text-secondary"><i class="fa fa-circle"></i></a>
                  </header>
                  <section>
                    <h6 class="icon-box-title mb-0">120 GB</h6>
                    <p class="mb-0">Disc Space</p>
                  </section>
                </div>
                <!-- /.icon-box -->
                <p class="ml-3 pl-3 mb-0 d-none d-xl-block">Lorem ipsum dolor sit amet, consectetur
                  <br>adipisicing elit amet cumque cupiditate</p>
              </div>
              <!-- /.d-flex -->
              <div style="height: 200px; margin-top: 20px">
                <canvas id="chartsJsSiteStatistics"></canvas>
              </div>
            </div>
            <!-- /.widget-body -->
          </div>
          <!-- /.widget-bg -->
        </div>
        <!-- /.widget-holder -->
      </div>
      <!-- /.widget-list -->
    </div>
    <!-- /.col-lg-8 -->
  </div>
</div>