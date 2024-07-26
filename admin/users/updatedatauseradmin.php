<?php
include("../header.php");
include("../sidebar.php");
include 'userscontroller/updateuseradmin.php';
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
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <form class="form-horizontal" action="" method="post">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label">ID User (ID Pegawai)</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="id_user" name="id_user" placeholder="Masukan ID User" value="<?php if (isset($queryResult['id_user'])) echo $queryResult['id_user']; ?>"required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="username" name="username" value="<?php if (isset($queryResult['username'])) echo $queryResult['username']; ?>" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                     <input type="password" class="form-control" id="password" name="password" required value="<?php if (isset($queryResult['password'])) echo $queryResult['password']; ?>" maxlength="50">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Level</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="level" name="level" value="<?php if (isset($queryResult['level'])) echo $queryResult['level']; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="email_admin" name="email_admin" value="<?php if (isset($queryResult['email_admin'])) echo $queryResult['email_admin']; ?>">
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                 <button type="submit" class="btn btn-primary" name="update">Simpan</button>
                  <button type="submit" class="btn btn-outline-warning float-right" name="batal">Batal</
                </div>
                <!-- /.card-footer -->
              </form>
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