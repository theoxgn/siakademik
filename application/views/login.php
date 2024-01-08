<!DOCTYPE html>
<html lang="en">

<head>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/demo/favicon.png.html">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Masuk - TK Kristen YPKB Mojowarno</title>
  <!-- CSS -->
  <link href="https://fonts.googleapis.com/css?family=Karla:400,400i,700" rel="stylesheet" type="text/css">
  <link href="<?= base_url(); ?>assets/vendors/feather-icons/feather.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url(); ?>assets/vendors/linear-icons/style.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url(); ?>assets/vendors/mono-social-icons/monosocialiconsfont.css" rel="stylesheet" type="text/css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.4.0/css/perfect-scrollbar.min.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css">
  <!-- Head Libs -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
</head>

<body class="body-bg-full profile-page">
  <div id="wrapper" class="wrapper">
    <div class="row container-min-full-height">
      <div class="col-lg-8 p-3 login-left">
        <div class="w-50">
          <form class="text-center" id="form-login">

            <div class="form-group">
              <label class="text-info" for="example-email">NIP/NIS</label>
              <input type="text" placeholder="Masukkan NIP/NIS" class="form-control form-control-line" name="identity">
            </div>
            <div class="form-group">
              <label class="text-info" for="example-password">KATA SANDI</label>
              <input type="password" placeholder="password" class="form-control form-control-line" name="password">
            </div>

            <div class="form-group mr-b-20">
              <button class="btn btn-block btn-rounded btn-md btn-secondary text-uppercase fw-600 ripple" type="submit">Sign In</button>
            </div>
            <div id="loading" class="progress progress-md" style="display: none">
              <div class="progress-bar bg-info" style="width: 0%" role="progressbar"><span class="sr-only"></span>
              </div>
            </div>

          </form>
        </div>
        <!-- /.w-75 -->
      </div>
      <div class="col-lg-4 login-right d-lg-flex d-none pos-fixed pos-right text-inverse container-min-full-height" style="background-image: url('assets/img/site-bg.jpg')">
        <div class="login-content px-3 w-75 text-center">
          <h2 class="h3 mb-4 text-center fw-300">SELAMAT DATANG</h2>
          <p class="heading-font-family fw-300 letter-spacing-minus">
            Di Sistem Informasi Akademik Terintegrasi <br>
            TK Kristen YPBK Mojowarno
          </p>
        </div>
        <!-- /.login-content -->
      </div>
      <!-- /.login-right -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.wrapper -->
  <!-- Scripts -->
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/material-design.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script>
    $('#form-login').on('submit', (e) => {
      e.preventDefault();
      $('.btn').attr("disabled");
      $('#loading').show();
      $.ajax({
        type: "POST",
        url: "<?= base_url(); ?>api/login/",
        data: $('#form-login').serialize(),
        dataType: "json",
        success: (response) => {
          $('.progress-bar').attr("style", "width: 100%");
          setTimeout(() => {
            if (response.success) {
              Swal.fire({
                icon: 'success',
                title: 'Login berhasil!',
                text: 'tunggu sebentar, anda akan dialihkan ...'
              })
              window.location.reload();
            } else {
              Swal.fire({
                icon: 'error',
                title: 'Login gagal!',
                text: response.message
              })
            }
            $('.btn').removeAttr("disabled");
            $('#loading').hide();
          }, 1000);
          setTimeout(() => {
            $('.progress-bar').attr("style", "width: 0%");
          }, 1000);
        }
      });
    })
  </script>
</body>

</html>