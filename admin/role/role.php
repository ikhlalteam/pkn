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
          <h1>Master Data Role</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active">Data Role</li>
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
              <h3 class="card-title">Data Role SMK SUNAN DRAJAT</h3>
              <a href="tambahrole.php" class="btn btn-outline-success float-right">Tambahkan Data</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

              <!-- <input type="submit" row="Create new Project" class="btn btn-success"> -->
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>ID role</th>
                    <th>Nama Role</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $query = mysqli_query($conn, 'SELECT * FROM tb_role');
                  while ($row = mysqli_fetch_array($query)) {
                  ?>
                    <tr>
                      <td><?php echo $row['id_role'] ?></td>
                      <td><?php echo $row['nama_role'] ?></td>
                      <td>
                        <a href="updaterole.php?id_role=<?php echo $row['id_role'] ?>" class="btn btn-sm btn-outline-warning" data-target="<?php echo $row['id_role']; ?>"><i class="fas fa-pen"></i></a>

                        <a href="rolecontroller/hapusrolecontroller.php?hapus_data_role=<?php echo $row['id_role'] ?>" onclick="return confirm('apakah anda yakin ingin menghapus?');" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
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