<?php
include("../header.php");
include("../sidebar.php");
include 'updateprofilcontroller/updateprofilcontroller.php';

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Update Profil</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active">Update Profil</li>
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
            <h3 class="card-title">Update Profil</h3>
          </div>
          <div class="card-body p-0">
            <form class="form-horizontal" action="" method="post">
              <div class="card-body">
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">Nomor Induk Pegawai</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nip" value="<?php if (isset($queryResult['nip'])) echo $queryResult['nip']; ?>" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">Nama Pegawai</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" value="<?php if (isset($queryResult['nama_pegawai'])) echo $queryResult['nama_pegawai']; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">Agama</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="agama" name="agama">
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
                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                      <option><?php if (isset($queryResult['jenis_kelamin'])) echo $queryResult['jenis_kelamin']; ?></option>
                      <option>Laki - laki</option>
                      <option>Perempuan</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">Tempat Lahir</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?php if (isset($queryResult['tempat_lahir'])) echo $queryResult['tempat_lahir']; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?php if (isset($queryResult['tanggal_lahir'])) echo $queryResult['tanggal_lahir']; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">Alamat</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?php if (isset($queryResult['alamat'])) echo $queryResult['alamat']; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">Nomor HP Guru</label>
                  <div class="col-sm-10">
                    <input type="tel" class="form-control" id="no_hp_guru" name="no_hp_guru" value="<?php if (isset($queryResult['no_hp_guru'])) echo $queryResult['no_hp_guru']; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="email_guru" name="email_guru" value="<?php if (isset($queryResult['email_guru'])) echo $queryResult['email_guru']; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">Golongan</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="golongan" name="golongan">
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
                    <input type="text" class="form-control" id="pendidikan" name="pendidikan" value="<?php if (isset($queryResult['pendidikan'])) echo $queryResult['pendidikan']; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">Jabatan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?php if (isset($queryResult['jabatan'])) echo $queryResult['jabatan']; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">Password</label>
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