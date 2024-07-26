<?php
include("header.php");
include("sidebar.php");
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Selamat Datang di Beranda Sistem Presensi!</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Admin</li>
            <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <?php
  $query_guru = mysqli_query($conn, 'SELECT * FROM tb_pegawai');
  $jml_guru = mysqli_num_rows($query_guru);

  $query_siswa = mysqli_query($conn, 'SELECT * FROM tb_siswa');
  $jml_siswa = mysqli_num_rows($query_siswa);
  ?>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-lg-6 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h4 style="font-size:2vw;font-weight:bold;"><?= $jml_guru; ?></h4>
            <p>Jumlah Guru & Pegawai</p>
          </div>
          <div class="icon">
            <i class="fa fa-user"></i>
          </div>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-6 col-6">
        <!-- small box -->
        <div class="small-box bg-primary">
          <div class="inner">
            <h4 style="font-size:2vw;font-weight:bold;"><?= $jml_siswa; ?></h4>
            <p>Jumlah Siswa</p>
          </div>
          <div class="icon">
            <i class="fa fa-users"></i>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include("footer.php");
?>