<?php
include("../header.php");
include("../sidebar.php");
function getNamaHari($date)
{
  $namaHari = [
    1 => 'Senin',
    2 => 'Selasa',
    3 => 'Rabu',
    4 => 'Kamis',
    5 => 'Jumat',
    6 => 'Sabtu',
    7 => 'Minggu'
  ];

  $dayNumber = date('N', strtotime($date));

  return $namaHari[$dayNumber];
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Master Data Siswa</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active">Data Siswa</li>
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
              <h3 class="card-title">Data Siswa SMK SUNAN DRAJAT</h3>
              <a href="tambahdatasiswa.php" class="btn btn-outline-success float-right">Tambahkan Data</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

              <!-- <input type="submit" value="Create new Project" class="btn btn-success"> -->
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Nomor Induk Siswa</th>
                    <th>Nama Siswa</th>
                    <th>Tanggal Lahir</th>
                    <th>Kelas</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $query = mysqli_query($conn, 'SELECT * FROM tb_siswa 
                        INNER JOIN tb_kelas ON tb_siswa.id_kelas = tb_kelas.id_kelas');
                  while ($row = mysqli_fetch_array($query)) {
                  ?>
                    <tr>
                      <td><?php echo $row['nomor_induk_siswa'] ?></td>
                      <td><?php echo $row['nama_siswa'] ?></td>
                      <td><?php echo $row['tanggal_lahir'] ?> <?php echo getNamaHari($row['tanggal_lahir']) ?> </td>
                      <td><?php echo $row['kelas'] ?></td>

                      <td>
                        <a href="updatedatasiswa.php?id_siswa=<?php echo $row['id_siswa'] ?>" class="btn btn-sm btn-outline-warning" data-target="<?php echo $row['id_siswa']; ?>"><i class="fas fa-pen"></i></a>

                        <a href="lihatdatasiswa.php?id_siswa=<?php echo $row['id_siswa'] ?>" class="btn btn-sm btn-outline-primary" data-target="<?php echo $row['id_siswa']; ?>"><i class="fas fa-eye"></i></a>

                        <a href="hapusdatasiswa.php?hapus_data_siswa=<?php echo $row['id_siswa'] ?>" onclick="return confirm('apakah anda yakin ingin menghapus?');" class="btn btn-sm btn-danger" type="submit" name="hapus_data_siswa"><i class="fas fa-trash"></i></a>
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