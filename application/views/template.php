<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
  <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url(); ?>assets/img/logo.png">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/pace.css">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>TK Kristen YPKB Mojowarno</title>
  <!-- CSS -->
  <link href="https://fonts.googleapis.com/css?family=Karla:400,400i,700" rel="stylesheet" type="text/css">
  <link href="<?= base_url(); ?>assets/vendors/feather-icons/feather.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url(); ?>assets/vendors/linear-icons/style.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url(); ?>assets/vendors/mono-social-icons/monosocialiconsfont.css" rel="stylesheet" type="text/css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.4.0/css/perfect-scrollbar.min.css" rel="stylesheet" type="text/css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet" type="text/css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/jqvmap/1.5.1/jqvmap.min.css" rel="stylesheet" type="text/css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.18/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
  <!-- Head Libs -->
  <script src="<?= base_url(); ?>assets/js/modernizr.min.js"></script>
  <script data-pace-options='{ "ajax": false, "selectors": [ "img" ]}' src="<?= base_url(); ?>assets/js/pace.min.js"></script>
</head>

<body data-sidebar-skin="dark" data-header-skin="light" data-navbar-brand-skin="dark" data-sidebar-state="expand">
  <div id="wrapper" class="wrapper">
    <!-- HEADER & TOP NAVIGATION -->
    <nav class="navbar">
      <div class="container-fluid px-0 align-items-stretch">
        <!-- Logo Area -->
        <div class="navbar-header">
          <a href="index.html" class="navbar-brand">
            <img class="logo-expand" alt="" src="<?= base_url(); ?>assets/img/logo-white.png" width="130" height="70">
            <img class="logo-collapse" alt="" src="<?= base_url(); ?>assets/img/logo-collapse.png" width="90" height="40">
          </a>
        </div>
        <!-- /.navbar-header -->
        <!-- Left Menu & Sidebar Toggle -->
        <ul class="nav navbar-nav">
          <li class="sidebar-toggle dropdown"><a href="javascript:void(0)" class="ripple"><span><i class="list-icon lnr lnr-menu"></i></span></a>
          </li>
        </ul>
        <!-- /.navbar-left -->
        <div class="spacer"></div>
        <!-- Right Menu -->
        <ul class="nav navbar-nav d-none d-lg-flex ml-2 ml-0-rtl">
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span><i class="list-icon lnr lnr-alarm"></i> <span class="button-pulse bg-danger"></span> </span>Notifikasi</a>
            <div class="dropdown-menu dropdown-left dropdown-card animated flipInY">
              <div class="card">
                <header class="card-header d-flex justify-content-center align-items-center mb-0"><i class="lnr lnr-envelope fs-15 mr-2"></i> <span class="heading-font-family fw-400">Notifikasi baru</span>
                </header>
                <ul class="card-body list-unstyled dropdown-list-group">
                  <li><a href="#" class="media"><span class="d-flex thumb-xs2 user--online"><img src="<?= base_url(); ?>assets/demo/users/2.jpg" class="rounded-circle" alt=""> </span><span class="media-body"><span class="heading-font-family media-heading">Steve Smith</span> <span class="media-content">commented on your photo</span></span></a>
                  </li>
                  <li><a href="#" class="media"><span class="d-flex thumb-xs2"><img src="<?= base_url(); ?>assets/demo/users/1.jpg" class="rounded-circle" alt=""> </span><span class="media-body"><span class="heading-font-family media-heading">Emily Lee</span> <span class="media-content">posted a photo on your wall</span></span></a>
                  </li>
                  <li><a href="#" class="media"><span class="d-flex thumb-xs2"><img src="<?= base_url(); ?>assets/demo/users/3.jpg" class="rounded-circle" alt=""> </span><span class="media-body"><span class="heading-font-family media-heading">Christopher Palmer</span> <span class="media-content">just mentioned you in his new post</span></span></a>
                  </li>
                </ul>
              </div>
              <!-- /.card -->
            </div>
            <!-- /.dropdown-menu -->
          </li>
        </ul>
        <!-- /.navbar-right -->
        <!-- User Image with Dropdown -->
        <ul class="nav navbar-nav">
          <li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle dropdown-toggle-user ripple" data-toggle="dropdown"><span class="avatar thumb-xs"><img src="<?= base_url(); ?>assets/demo/users/6.jpg" class="rounded-circle" alt=""> <i class="list-icon lnr lnr-chevron-down"></i></span></a>
            <div class="dropdown-menu dropdown-left dropdown-card dropdown-card-profile animated flipInY">
              <div class="card">
                <ul class="list-unstyled card-body">
                  <li><a href="#"><span><span class="align-middle">Change Password</span></span></a>
                  </li>
                  <li><a href="<?= base_url(); ?>logout"><span><span class="align-middle">Sign Out</span></span></a>
                  </li>
                </ul>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.dropdown-card-profile -->
          </li>
          <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-nav -->
      </div>
      <!-- /.container -->
    </nav>
    <!-- /.navbar -->
    <div class="content-wrapper">
      <!-- SIDEBAR -->
      <aside class="site-sidebar scrollbar-enabled" data-suppress-scroll-x="true">
        <!-- Sidebar Menu -->
        <nav class="sidebar-nav">
          <ul class="nav in side-menu">
            <li class="menu-item"><a href="<?= base_url(); ?>"><i class="list-icon lnr lnr-home"></i> <span class="hide-menu">Dashboard</span></a></li>
            <?php if ($this->session->userdata('ROLE') == 'KEPSEK') : ?>
              <li class="menu-item-has-children"><a href="javascript:void(0);"><i class="list-icon lnr lnr-graduation-hat"></i> <span class="hide-menu">Siswa</span></a>
                <ul class="list-unstyled sub-menu">
                  <li><a href="<?= base_url(); ?>siswa">Data Siswa</a></li>
                </ul>
              </li>
              <li class="menu-item-has-children"><a href="javascript:void(0);"><i class="list-icon lnr lnr-chart-bars"></i> <span class="hide-menu">Akademik</span></a>
                <ul class="list-unstyled sub-menu">
                  <li><a href="<?= base_url(); ?>akademik">Data Akademik</a></li>
                </ul>
              </li>
              <li class="menu-item-has-children"><a href="javascript:void(0);"><i class="list-icon lnr lnr-printer"></i> <span class="hide-menu">Tagihan</span></a>
                <ul class="list-unstyled sub-menu">
                  <li><a href="<?= base_url(); ?>tagihan">Data Tagihan</a></li>
                  <li><a href="<?= base_url(); ?>tambah/tagihansiswa">Tambah Data Tagihan</a></li>
                </ul>
              </li>
              <li class="menu-item-has-children"><a href="javascript:void(0);"><i class="list-icon lnr lnr-license"></i> <span class="hide-menu">Pembayaran</span></a>
                <ul class="list-unstyled sub-menu">
                  <li><a href="<?= base_url(); ?>pembayaran">Data pembayaran</a></li>
                  <li><a href="<?= base_url(); ?>tambah/pembayaran">Tambah Data Pembayaran</a></li>
                </ul>
              </li>
              <li class="menu-item-has-children"><a href="javascript:void(0);"><i class="list-icon lnr lnr-license"></i> <span class="hide-menu">Prestasi</span></a>
                <ul class="list-unstyled sub-menu">
                  <li><a href="<?= base_url(); ?>prestasi">Data Prestasi</a></li>
                  <li><a href="<?= base_url(); ?>prestasi/tambah_prestasi">Tambah Data Prestasi</a></li>
                </ul>
              </li>
              <li class="menu-item-has-children"><a href="javascript:void(0);"><i class="list-icon lnr lnr-database"></i> <span class="hide-menu">Master</span></a>
                <ul class="list-unstyled sub-menu">
                  <li><a href="<?= base_url(); ?>master/guru">Data Guru</a></li>
                  <li><a href="<?= base_url(); ?>master/kelas">Data Kelas</a></li>
                  <li><a href="<?= base_url(); ?>master/bidang">Data Bidang Perkembangan</a></li>
                  <li><a href="<?= base_url(); ?>master/kota">Data Kota</a></li>
                  <li><a href="<?= base_url(); ?>master/tagihan">Data Jenis Tagihan</a></li>
                </ul>
              </li>
              <?php elseif ($this->session->userdata('ROLE') == 'GURU') : ?>
                <li class="menu-item-has-children"><a href="javascript:void(0);"><i class="list-icon lnr lnr-graduation-hat"></i> <span class="hide-menu">Siswa</span></a>
                  <ul class="list-unstyled sub-menu">
                    <li><a href="<?= base_url(); ?>siswa/pendaftaran">Pendaftaran Siswa</a></li>
                    <li><a href="<?= base_url(); ?>siswa">Data Siswa</a></li>
                    <li><a href="<?= base_url(); ?>siswa/validasi">Validasi Siswa</a></li>
                    <li><a href="<?= base_url(); ?>walimurid">Wali Murid</a></li>
                  </ul>
                </li>
                <li class="menu-item-has-children"><a href="javascript:void(0);"><i class="list-icon lnr lnr-chart-bars"></i> <span class="hide-menu">Akademik</span></a>
                  <ul class="list-unstyled sub-menu">
                    <li><a href="<?= base_url(); ?>akademik">Data Akademik</a></li>
                  </ul>
                </li>
                <li class="menu-item-has-children"><a href="javascript:void(0);"><i class="list-icon lnr lnr-printer"></i> <span class="hide-menu">Tagihan</span></a>
                  <ul class="list-unstyled sub-menu">
                    <li><a href="<?= base_url(); ?>tagihan">Data Tagihan</a></li>
                    <li><a href="<?= base_url(); ?>tambah/tagihansiswa">Buat Tagihan</a></li>
                  </ul>
                </li>
                <li class="menu-item-has-children"><a href="javascript:void(0);"><i class="list-icon lnr lnr-license"></i> <span class="hide-menu">Pembayaran</span></a>

                  <ul class="list-unstyled sub-menu">
                    <li><a href="<?= base_url(); ?>pembayaran">Data pembayaran</a></li>
                    <li><a href="<?= base_url(); ?>tambah/pembayaran">Tambah Data Pembayaran</a></li>
                  </ul>
                </li>
                <li class="menu-item-has-children"><a href="javascript:void(0);"><i class="list-icon lnr lnr-license"></i> <span class="hide-menu">Prestasi</span></a>
                  <ul class="list-unstyled sub-menu">
                    <li><a href="<?= base_url(); ?>prestasi">Data Prestasi</a></li>
                    <li><a href="<?= base_url(); ?>prestasi/tambah_prestasi">Tambah Data Prestasi</a></li>
                  </ul>
                </li>
                <?php elseif ($this->session->userdata('ROLE') == 'SISWA') : ?>
                  <li class="menu-item-has-children"><a href="javascript:void(0);"><i class="list-icon lnr lnr-printer"></i> <span class="hide-menu">Tagihan</span></a>
                   <ul class="list-unstyled sub-menu">
                    <li><a href="<?= base_url(); ?>siswa/tagihan">Data Tagihan</a></li>
                  </ul>
                </li>
                <li class="menu-item-has-children"><a href="javascript:void(0);"><i class="list-icon lnr lnr-license"></i> <span class="hide-menu">Pembayaran</span></a>
                 <ul class="list-unstyled sub-menu">
                  <li><a href="<?= base_url(); ?>siswa/pembayaran">Data pembayaran</a></li>
                </ul>
              </li>
              <li class="menu-item-has-children"><a href="javascript:void(0);"><i class="list-icon lnr lnr-license"></i> <span class="hide-menu">Prestasi</span></a>
               <ul class="list-unstyled sub-menu">
                <li><a href="<?= base_url(); ?>siswa/prestasi">Data Prestasi</a></li>
              </ul>
            </li>
            <li class="menu-item-has-children"><a href="javascript:void(0);"><i class="list-icon lnr lnr-chart-bars"></i> <span class="hide-menu">Akademik</span></a>
             <ul class="list-unstyled sub-menu">
              <li><a href="<?= base_url(); ?>siswa/akademik">Data Akademik</a></li>
            </ul>
          </li>
          <?php else : ?>

          <?php endif; ?>
        </ul>
        <!-- /.side-menu -->
      </nav>
      <!-- /.sidebar-nav -->
    </aside>
    <!-- /.site-sidebar -->
    <main class="main-wrapper clearfix">
      <?php $this->load->view($view); ?>
    </main>
    <!-- /.main-wrappper -->
    <!-- RIGHT SIDEBAR -->
  </div>
  <!-- /.content-wrapper -->
  <!-- FOOTER -->
  <footer class="footer text-center">
    <div class="container"><span>Copyright @ 2020. All rights reserved</span>
    </div>
    <!-- /.container -->
  </footer>
</div>
<!--/ #wrapper -->
<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/2.7.9/metisMenu.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.4.0/perfect-scrollbar.min.js"></script>
<script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/countup.js/1.9.2/countUp.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-sparklines/2.1.2/jquery.sparkline.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/js/template.js"></script>
<!-- <script src="<?= base_url(); ?>assets/js/custom.js"></script> -->
<script>
  $(document).ready(() => {
    $('#time').html(new Date());

  })
</script>
</body>

</html>
