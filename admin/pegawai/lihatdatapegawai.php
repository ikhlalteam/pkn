<?php
include("../header.php");
include("../sidebar.php");
if (isset($_GET['id_pegawai'])) {
  $sql = "SELECT * FROM tb_pegawai where id_pegawai='" . $_GET['id_pegawai'] . "'";
  $query = mysqli_query($conn, $sql);
  if (mysqli_num_rows($query) > 0) {
    $queryResult = mysqli_fetch_array($query);
  }
}


?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Master Data Pegawai</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Admin</li>
            <li class="breadcrumb-item"><a href="#">Lihat Pegawai</a></li>
            
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>


      <!-- Main content -->
      <section class="content">

        <!-- Default box -->
        <div class="row">
          <div class="col-md-12">
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Lihat Data Pegawai</h3>
              </div>
              <div class="card-body p-0">
                <form class="form-horizontal" action="" method="post">
                 <div class="card-body">
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">Nomor Induk Pegawai</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nip" name="nip" disabled value="<?php if (isset($queryResult['nip'])) echo $queryResult['nip']; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">Nama Pegawai</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" disabled value="<?php if (isset($queryResult['nama_pegawai'])) echo $queryResult['nama_pegawai']; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">Agama</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="agama" name="agama" disabled>
                      <option><?php if (isset($queryResult['agama'])) echo $queryResult['agama']; ?></option>
                      <option>Kristen Protestan</option>
                      <option>Katholik</option>
                      <option>Islam</option>
                      <option>Budha</option>
                      <option>Hindu</option>
                      <option>Konghucu</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" disabled>
                      <option><?php if (isset($queryResult['jenis_kelamin'])) echo $queryResult['jenis_kelamin']; ?></option>
                      <option>Laki - laki</option>
                      <option>Perempuan</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">Tempat Lahir</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" disabled value="<?php if (isset($queryResult['tempat_lahir'])) echo $queryResult['tempat_lahir']; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" disabled value="<?php if (isset($queryResult['tanggal_lahir'])) echo $queryResult['tanggal_lahir']; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">Alamat</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="alamat" name="alamat" disabled value="<?php if (isset($queryResult['alamat'])) echo $queryResult['alamat']; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">Nomor HP Guru</label>
                  <div class="col-sm-10">
                    <input type="tel" class="form-control" id="no_hp_guru" name="no_hp_guru" disabled value="<?php if (isset($queryResult['no_hp_guru'])) echo $queryResult['no_hp_guru']; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="email_guru" name="email_guru" disabled value="<?php if (isset($queryResult['email_guru'])) echo $queryResult['email_guru']; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">Golongan</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="golongan" name="golongan" disabled>
                      <option><?php if (isset($queryResult['golongan'])) echo $queryResult['golongan']; ?></option>
                      <option>Golongan III/a</option>
                      <option>Golongan III/b</option>
                      <option>Golongan III/c</option>
                      <option>Golongan III/d</option>
                      <option>Golongan IV/a</option>
                      <option>Golongan IV/b</option>
                      <option>Golongan IV/c</option>
                      <option>Golongan IV/d</option>
                      <option>Golongan IV/e</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">Pendidikan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="pendidikan" name="pendidikan" disabled value="<?php if (isset($queryResult['pendidikan'])) echo $queryResult['pendidikan']; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">Jabatan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="jabatan" name="jabatan" disabled value="<?php if (isset($queryResult['jabatan'])) echo $queryResult['jabatan']; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">Role</label>
                  <div class="col-sm-10">
                    <?= dropdown_dinamis('id_role', 'tb_role', 'nama_role', 'id_role', $queryResult['id_role']); ?>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" name="password" disabled value="<?php if (isset($queryResult['password'])) echo $queryResult['password']; ?>">
                  </div>
                </div>
              </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <a href="pegawai.php" class="btn btn-outline-warning float-right">Kembali</a>
                  </div>
                  <!-- /.card-footer -->
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.card -->

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <a href="https://unisla.ac.id/"><b>INFORMATIKA</b> UNIVERSITAS ISLAM LAMONGAN</a>
      </div>
      <strong>Copyright &copy; <script>
          document.write(new Date().getFullYear())
        </script> PRESENSI SMK SUNAN DRAJAT</a></strong> 
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="../../vendor/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../vendor/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- BS-Stepper -->
  <script src="../../vendor/plugins/bs-stepper/js/bs-stepper.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../vendor/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../../vendor/dist/js/demo.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="../../vendor/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../../vendor/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="../../vendor/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../../vendor/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="../../vendor/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="../../vendor/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>

  <script>
    $(function() {
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
</body>

</html>