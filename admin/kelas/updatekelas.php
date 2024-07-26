<?php
include("../header.php");
include("../sidebar.php");
include 'kelascontroller/updatekelascontroller.php';
?>

<!-- Content Wrapper. Contains page content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Master Data Kelas</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Admin</li>
            <li class="breadcrumb-item"><a href="#">Update Kelas</a></li>
           
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Kelas</h3>
          </div>
          <div class="card-body p-0">
            <form class="form-horizontal" action="" method="post">
              <div class="card-body">
                <div class="form-group row">
                  <label for="kodekelas" class="col-sm-2 col-form-label">Kode Kelas</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="kodekelas" name="kodekelas" value="<?php if (isset($queryResult['kodekelas'])) echo htmlspecialchars($queryResult['kodekelas']); ?>">
                    <?php if (isset($errors['kodekelas'])): ?>
                        <span class="text-danger"><?php echo $errors['kodekelas']; ?></span>
                    <?php endif; ?>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="kelas" name="kelas" value="<?php if (isset($queryResult['kelas'])) echo htmlspecialchars($queryResult['kelas']); ?>">
                    <?php if (isset($errors['kelas'])): ?>
                        <span class="text-danger"><?php echo $errors['kelas']; ?></span>
                    <?php endif; ?>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?php if (isset($queryResult['keterangan'])) echo htmlspecialchars($queryResult['keterangan']); ?>">
                    <?php if (isset($errors['keterangan'])): ?>
                        <span class="text-danger"><?php echo $errors['keterangan']; ?></span>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary" name="update">Simpan</button>
                <button type="submit" class="btn btn-outline-warning float-right" name="batal">Batal</button>
              </div>
              <!-- /.card-footer -->
            </form>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include("../footer.php");
?>
