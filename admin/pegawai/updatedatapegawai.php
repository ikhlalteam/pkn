<?php
include("../header.php");
include("../sidebar.php");
include 'pegawaicontroller/updatepegawai.php';

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
            <li class="breadcrumb-item"><a href="#">Update Pegawai</a></li>
      
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
            <h3 class="card-title">Tambah Data Pegawai</h3>
          </div>
          <div class="card-body p-0">
            <form class="form-horizontal" action="" method="post">
              <div class="card-body">
                <div class="form-group row">
                  <label for="nip" class="col-sm-2 col-form-label">Nomor Induk Pegawai</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nip" name="nip" value="<?php if (isset($queryResult['nip'])) echo $queryResult['nip']; ?>" maxlength="18" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="nama_pegawai" class="col-sm-2 col-form-label">Nama Pegawai</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" value="<?php if (isset($queryResult['nama_pegawai'])) echo $queryResult['nama_pegawai']; ?>" maxlength="50" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="agama" class="col-sm-2 col-form-label">Agama</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="agama" name="agama" required>
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
                  <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                      <option><?php if (isset($queryResult['jenis_kelamin'])) echo $queryResult['jenis_kelamin']; ?></option>
                      <option>Laki - laki</option>
                      <option>Perempuan</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?php if (isset($queryResult['tempat_lahir'])) echo $queryResult['tempat_lahir']; ?>" maxlength="50" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?php if (isset($queryResult['tanggal_lahir'])) echo $queryResult['tanggal_lahir']; ?>" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?php if (isset($queryResult['alamat'])) echo $queryResult['alamat']; ?>" maxlength="100" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="no_hp_guru" class="col-sm-2 col-form-label">Nomor HP Guru</label>
                  <div class="col-sm-10">
                    <input type="tel" class="form-control" id="no_hp_guru" name="no_hp_guru" value="<?php if (isset($queryResult['no_hp_guru'])) echo $queryResult['no_hp_guru']; ?>" maxlength="12" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="email_guru" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="email_guru" name="email_guru" value="<?php if (isset($queryResult['email_guru'])) echo $queryResult['email_guru']; ?>" required>
                  </div>
                </div>
                <div class="form-group row">
                    <label for="golongan" class="col-sm-2 col-form-label">Golongan</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="golongan" name="golongan" required>
                            <option value="">Pilih Golongan</option>
                            <option value="Golongan III/a" <?php if (isset($queryResult['golongan']) && $queryResult['golongan'] == "Golongan III/a") echo "selected"; ?>>Golongan III/a</option>
                            <option value="Golongan III/b" <?php if (isset($queryResult['golongan']) && $queryResult['golongan'] == "Golongan III/b") echo "selected"; ?>>Golongan III/b</option>
                            <option value="Golongan III/c" <?php if (isset($queryResult['golongan']) && $queryResult['golongan'] == "Golongan III/c") echo "selected"; ?>>Golongan III/c</option>
                            <option value="Golongan III/d" <?php if (isset($queryResult['golongan']) && $queryResult['golongan'] == "Golongan III/d") echo "selected"; ?>>Golongan III/d</option>
                            <option value="Golongan IV/a" <?php if (isset($queryResult['golongan']) && $queryResult['golongan'] == "Golongan IV/a") echo "selected"; ?>>Golongan IV/a</option>
                            <option value="Golongan IV/b" <?php if (isset($queryResult['golongan']) && $queryResult['golongan'] == "Golongan IV/b") echo "selected"; ?>>Golongan IV/b</option>
                            <option value="Golongan IV/c" <?php if (isset($queryResult['golongan']) && $queryResult['golongan'] == "Golongan IV/c") echo "selected"; ?>>Golongan IV/c</option>
                            <option value="Golongan IV/d" <?php if (isset($queryResult['golongan']) && $queryResult['golongan'] == "Golongan IV/d") echo "selected"; ?>>Golongan IV/d</option>
                            <option value="Golongan IV/e" <?php if (isset($queryResult['golongan']) && $queryResult['golongan'] == "Golongan IV/e") echo "selected"; ?>>Golongan IV/e</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pendidikan" class="col-sm-2 col-form-label">Pendidikan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="pendidikan" name="pendidikan" value="<?php if (isset($queryResult['pendidikan'])) echo $queryResult['pendidikan']; ?>" maxlength="50">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?php if (isset($queryResult['jabatan'])) echo $queryResult['jabatan']; ?>" maxlength="50">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="id_role" class="col-sm-2 col-form-label">Role</label>
                    <div class="col-sm-10">
                        <?= dropdown_dinamis('id_role', 'tb_role', 'nama_role', 'id_role', $queryResult['id_role']); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" name="password" required value="<?php if (isset($queryResult['password'])) echo $queryResult['password']; ?>" >
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
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include("../footer.php");
?>