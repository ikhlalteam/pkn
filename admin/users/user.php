<?php
include("../header.php");
include("../sidebar.php");
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Master Data Users Admin</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active">Data Users Admin</li>
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
              <h3 class="card-title">Data Users Admin SMK Kristen 5 Klaten</h3>
              <a href="tambahdatauseradmin.php" class="btn btn-outline-success float-right">Tambahkan Data</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

              <!-- <input type="submit" value="Create new Project" class="btn btn-success"> -->
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>id_user</th>
                    <th>Username</th>
                    <th>Level</th>
                    <th>Email</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $query = mysqli_query($conn, 'SELECT * FROM users');
                  while ($row = mysqli_fetch_array($query)) {
                  ?>
                    <tr>
                      <td><?php echo $row['id_user'] ?></td>
                      <td><?php echo $row['username'] ?></td>
                      <td><?php echo $row['level'] ?></td>
                      <td><?php echo $row['email_admin'] ?></td>
                      <td>
                        <a href="updatedatauseradmin.php?id_user=<?php echo $row['id_user'] ?>" class="btn btn-sm btn-outline-warning" data-target="<?php echo $row['id_user']; ?>"><i class="fas fa-pen"></i></a>

                        <a href="lihatdatauseradmin.php?id_user=<?php echo $row['id_user'] ?>" class="btn btn-sm btn-outline-primary" data-target="<?php echo $row['id_user']; ?>"><i class="fas fa-eye"></i></a>

                        <a href="userscontroller/hapususeradmin.php?hapus_data_user=<?php echo $row['id_user'] ?>" onclick="return confirm('apakah anda yakin ingin menghapus?');" class="btn btn-sm btn-danger" type="submit" name="hapus_data_user"><i class="fas fa-trash"></i></a>
                      </td>
                    </tr>
                  <?php } ?>
                  <!--       <?php foreach ($siswa as $key => $siswa) : ?>
                    <tr>
                        <td><?= $siswa['nomor_induk_siswa'] ?></td>
                        <td><?= $siswa['nama_siswa'] ?></td>
                        <td><?= $siswa['tempat_lahir'] ?></td>
                        <td><?= $siswa['tanggal_lahir'] ?></td>
                        <td>
                            NA
                        </td>
                        <td>
                            NA
                        </td>
                    </tr>
                    <?php endforeach; ?> -->
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