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
          <h1>Master Data Presensi</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active">Data Presensi</li>
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
              <h3 class="card-title">Data Presensi SMK SUNAN DRAJAT</h3>
              <a href="tambahpresensi.php" class="btn btn-outline-success float-right">Tambahkan Data</a>
              <a href="cetakpresensi.php" class="btn btn-info float-right mr-2">Cetak Data</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="tablePresensi" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Waktu Presensi</th>
                    <th>Siswa</th>
                    <th>Kehadiran</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $query = mysqli_query($conn, 'SELECT * FROM tb_presensi
                    JOIN tb_siswa ON tb_presensi.id_siswa = tb_siswa.id_siswa
                    GROUP BY id_presensi');
                  while ($row = mysqli_fetch_array($query)) {
                  ?>
                    <tr>
                      <td><?php echo $row['tanggal_presensi'] ?></td>
                      <td><?php echo $row['nama_siswa'] ?></td>
                      <td><?php echo $row['kehadiran'] ?></td>
                      <td>
                        <a href="updatepresensi.php?id_presensi=<?php echo $row['id_presensi'] ?>" class="btn btn-sm btn-outline-warning" data-target="<?php echo $row['id_presensi']; ?>"><i class="fas fa-pen"></i></a>

                        <a href="presensicontroller/hapuspresensicontroller.php?hapus_data_presensi=<?php echo $row['id_presensi'] ?>" onclick="return confirm('apakah anda yakin ingin menghapus?');" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                      </td>
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
  $(document).ready(function() {
    $('#tablePresensi').DataTable({
      dom: 'Bfrtip',
      buttons: []
    });
  });
</script>