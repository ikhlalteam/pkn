<?php
include("../header.php");
include("../sidebar.php");
?>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Master Rekap Data</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active">Rekap Data</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Rekap Data SMK SUNAN DRAJAT</h3>
              <a href="cetakrekapdata.php" class="btn btn-info float-right">Cetak Data</a>
              <br>
              <hr>
              <form method="POST">
                <?php
                if (isset($_POST['do_filter']) && isset($_POST['id_kelas']) && isset($_POST['tgl_awal']) && isset($_POST['tgl_akhir'])) {
                  $filter_kelas = filter_injection($_POST['id_kelas']);
                  $tgl_awal = filter_injection($_POST['tgl_awal']);
                  $tgl_akhir = filter_injection($_POST['tgl_akhir']);

                  $queryHitungKelas = mysqli_query($conn, "SELECT COUNT(id_siswa) as jml FROM `tb_siswa` WHERE id_kelas = '$filter_kelas'");
                  $rowHitungKelas = mysqli_fetch_array($queryHitungKelas);
                  $jmlHitungKelas = $rowHitungKelas['jml'];

                  $queryHitungPresensi = mysqli_query($conn, "SELECT COUNT(id_presensi) as jml FROM `tb_presensi` JOIN tb_siswa ON tb_presensi.id_siswa = tb_siswa.id_siswa WHERE DATE(tanggal_presensi) BETWEEN '$tgl_awal' AND '$tgl_akhir' AND tb_siswa.id_kelas = '$filter_kelas' AND id_jadwal = '999'");
                  $rowHitungPresensi = mysqli_fetch_array($queryHitungPresensi);
                  $jmlHitungPresensi = $rowHitungPresensi['jml'];

                  if ($jmlHitungKelas == $jmlHitungPresensi) {
                    $tipe_alert = 'success';
                    $pesan_alert = '<strong>Sukses!</strong> Semua siswa di kelas ini sudah mengisi presensi pada rentang tanggal yang dipilih.';
                  } else {
                    $tipe_alert = 'warning';
                    $pesan_alert = '<strong>Perhatian!</strong> Belum semua siswa di kelas ini mengisi presensi pada rentang tanggal yang dipilih.';
                  }
                ?>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="alert alert-<?= $tipe_alert; ?> alert-dismissible fade show" role="alert">
                        <?= $pesan_alert; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    </div>
                  </div>
                <?php
                }
                ?>
                <div class="row">
                  <div class="col-md-4 form-group">
                    <label for="kelasFilter">Kelas:</label>
                    <?= dropdown_dinamis('id_kelas', 'tb_kelas', 'kelas', 'id_kelas', null, null, true); ?>
                  </div>
                  <div class="col-md-4 form-group">
                    <label for="tglAwal">Tanggal Awal:</label>
                    <input type="date" name="tgl_awal" class="form-control" required>
                  </div>
                  <div class="col-md-4 form-group">
                    <label for="tglAkhir">Tanggal Akhir:</label>
                    <input type="date" name="tgl_akhir" class="form-control" required>
                  </div>
                  <div class="col-md-4 form-group">
                    <br>
                    <button id="filterButton" name="do_filter" class="btn btn-primary btn-block">Filter</button>
                  </div>
                </div>
              </form>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="tablePresensi" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>NIS</th>
                    <th>Kelas</th>
                    <th>Total Hadir</th>
                    <th>Total Izin</th>
                    <th>Total Sakit</th>
                    <th>Total Tanpa Keterangan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  if (isset($_POST['do_filter'])) {
                    if (empty($_POST['id_kelas']) || empty($_POST['tgl_awal']) || empty($_POST['tgl_akhir'])) {
                      echo '<script>
                      alert("Silahkan pilih kelas dan tanggal yang valid!");
                      window.location.href="rekapdata.php"; 
                      </script>';
                      exit;
                    }

                    $filter_kelas = filter_injection($_POST['id_kelas']);
                    $tgl_awal = filter_injection($_POST['tgl_awal']);
                    $tgl_akhir = filter_injection($_POST['tgl_akhir']);

                    $query = mysqli_query($conn, "SELECT nomor_induk_siswa, nama_siswa, tb_kelas.kelas, id_siswa FROM `tb_siswa` JOIN tb_kelas ON tb_kelas.id_kelas = tb_siswa.id_kelas WHERE tb_kelas.id_kelas = '$filter_kelas'");
                    $filter_presensi = " AND DATE(tb_presensi.tanggal_presensi) BETWEEN '$tgl_awal' AND '$tgl_akhir'";
                  } else {
                    $query = mysqli_query($conn, 'SELECT nomor_induk_siswa, nama_siswa, tb_kelas.kelas, id_siswa FROM `tb_siswa` JOIN tb_kelas ON tb_kelas.id_kelas = tb_siswa.id_kelas');
                    $filter_presensi = "";
                  }
                  while ($row = mysqli_fetch_array($query)) {
                    $id_siswa = $row['id_siswa'];
                    $query_presensi = mysqli_query($conn, "SELECT 
                    SUM(CASE WHEN kehadiran = 'hadir' THEN 1 ELSE 0 END) AS total_hadir,
                    SUM(CASE WHEN kehadiran = 'izin' THEN 1 ELSE 0 END) AS total_izin,
                    SUM(CASE WHEN kehadiran = 'sakit' THEN 1 ELSE 0 END) AS total_sakit,
                    SUM(CASE WHEN kehadiran = 'tanpa keterangan' THEN 1 ELSE 0 END) AS total_tanpa_keterangan
                    FROM tb_presensi
                    WHERE id_siswa = '$id_siswa' $filter_presensi");
                    $row_presensi = mysqli_fetch_array($query_presensi);
                  ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?php echo $row['nama_siswa'] ?></td>
                      <td><?php echo $row['nomor_induk_siswa'] ?></td>
                      <td><?php echo $row['kelas'] ?></td>
                      <td><?php echo (int)$row_presensi['total_hadir'] ?></td>
                      <td><?php echo (int)$row_presensi['total_izin'] ?></td>
                      <td><?php echo (int)$row_presensi['total_sakit'] ?></td>
                      <td><?php echo (int)$row_presensi['total_tanpa_keterangan'] ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include("../footer.php");
?>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
<script>
  $('#tablePresensi').DataTable({
    dom: 'Bfrtip',
    buttons: []
  });
</script>