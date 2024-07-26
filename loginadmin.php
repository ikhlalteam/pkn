<?php
session_start();
// include 'config/database_connection.php';
include 'controller/cek_login_admin.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SMKSDL</title>
  <link rel="shortcut icon" href="https://th.bing.com/th/id/OLC.NTJfswW5MHqYyQ480x360?&rs=1&pid=ImgDetMain" />
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="vendor/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="vendor/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="vendor/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="#"><b>SMK</b>SDL</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Silahkan Login Admin Website Presensi</p>
        <?php
        if (isset($_GET['message']) && $_GET['message'] == 'invalid') {
        ?>
          <div class="alert alert-danger" role="alert">
            Login gagal, silahkan ulangi lagi dengan data yang benar!
          </div>
        <?php
        }
        ?>


        <form action="" method="post">
          <div class="input-group mb-3">
            <input type="username" class="form-control" id="username" name="username" placeholder="Username">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block" name="loginadmin">Masuk</button>
        </form>

        <div class="social-auth-links text-center mb-3">
          <p>- Atau -</p>
          <a href="loginpegawai.php" class="btn btn-block btn-danger">
            <i class="fas fa-users mr-2"></i> Login Sebagai Pegawai
          </a>
        </div>
        <!-- /.social-auth-links -->
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="vendor/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="vendor/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="vendor/dist/js/adminlte.min.js"></script>
</body>

</html>