<?php
include("../header.php");
include("../sidebar.php");
include 'pegawaicontroller/tambahpegawai.php';
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
            <li class="breadcrumb-item"><a href="tambahdatapegawai.php">Daftar Pegawai</a></li>
            
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
                    <input type="text" class="form-control" id="nip" name="nip" placeholder="Masukkan NIP (min 10, max 18 karakter)" value="<?= isset($_SESSION['nip']) ? $_SESSION['nip'] : ''; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="nama_pegawai" class="col-sm-2 col-form-label">Nama Pegawai</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" placeholder="Masukkan Nama Pegawai (min 3, max 50 karakter)" value="<?= isset($_SESSION['nama_pegawai']) ? $_SESSION['nama_pegawai'] : ''; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="agama" class="col-sm-2 col-form-label">Agama</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="agama" name="agama">
                      <option disabled selected>Pilih Agama</option>
                      <option <?= (isset($_SESSION['agama']) && $_SESSION['agama'] == 'Kristen Protestan') ? 'selected' : ''?> value="Kristen Protestan">Kristen Protestan</option>
                      <option <?= (isset($_SESSION['agama']) && $_SESSION['agama'] == 'Katolik') ? 'selected' : ''?> value="Katolik">Katolik</option>
                      <option <?= (isset($_SESSION['agama']) && $_SESSION['agama'] == 'Islam') ? 'selected' : ''?> value="Islam">Islam</option>
                      <option <?= (isset($_SESSION['agama']) && $_SESSION['agama'] == 'Hindu') ? 'selected' : ''?> value="Hindu">Hindu</option>
                      <option <?= (isset($_SESSION['agama']) && $_SESSION['agama'] == 'Buddha') ? 'selected' : ''?> value="Buddha">Buddha</option>
                      <option <?= (isset($_SESSION['agama']) && $_SESSION['agama'] == 'Konghucu') ? 'selected' : ''?> value="Konghucu">Konghucu</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                      <option disabled selected>Pilih Jenis Kelamin</option>
                      <option <?= (isset($_SESSION['jenis_kelamin']) && $_SESSION['jenis_kelamin'] == 'Laki-laki') ? 'selected' : ''?> value="Laki-laki">Laki-laki</option>
                      <option <?= (isset($_SESSION['jenis_kelamin']) && $_SESSION['jenis_kelamin'] == 'Perempuan') ? 'selected' : ''?> value="Perempuan">Perempuan</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan Tempat Lahir (min 3, max 50 karakter)" value="<?= isset($_SESSION['tempat_lahir']) ? $_SESSION['tempat_lahir'] : ''; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= isset($_SESSION['tanggal_lahir']) ? $_SESSION['tanggal_lahir'] : ''; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat (min 3, max 50 karakter)" value="<?= isset($_SESSION['alamat']) ? $_SESSION['alamat'] : ''; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="nomor_hp_guru" class="col-sm-2 col-form-label">Nomor HP Guru</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nomor_hp_guru" name="nomor_hp_guru" placeholder="Masukkan Nomor HP Guru (min 6, max 13 karakter)" value="<?= isset($_SESSION['nomor_hp_guru']) ? $_SESSION['nomor_hp_guru'] : ''; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="email_guru" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="email_guru" name="email_guru" placeholder="Masukkan Email (min 6, max 50 karakter)" value="<?= isset($_SESSION['email_guru']) ? $_SESSION['email_guru'] : ''; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="golongan" class="col-sm-2 col-form-label">Golongan</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="golongan" name="golongan">
                      <option disabled selected>Pilih Golongan</option>
                      <option <?= (isset($_SESSION['golongan']) && $_SESSION['golongan'] == 'Golongan III/a') ? 'selected' : ''?> value="Golongan III/a">Golongan III/a</option>
                      <option <?= (isset($_SESSION['golongan']) && $_SESSION['golongan'] == 'Golongan III/b') ? 'selected' : ''?> value="Golongan III/b">Golongan III/b</option>
                      <option <?= (isset($_SESSION['golongan']) && $_SESSION['golongan'] == 'Golongan III/c') ? 'selected' : ''?> value="Golongan III/c">Golongan III/c</option>
                      <option <?= (isset($_SESSION['golongan']) && $_SESSION['golongan'] == 'Golongan III/d') ? 'selected' : ''?> value="Golongan III/d">Golongan III/d</option>
                      <option <?= (isset($_SESSION['golongan']) && $_SESSION['golongan'] == 'Golongan IV/a') ? 'selected' : ''?> value="Golongan IV/a">Golongan IV/a</option>
                      <option <?= (isset($_SESSION['golongan']) && $_SESSION['golongan'] == 'Golongan IV/b') ? 'selected' : ''?> value="Golongan IV/b">Golongan IV/b</option>
                      <option <?= (isset($_SESSION['golongan']) && $_SESSION['golongan'] == 'Golongan IV/c') ? 'selected' : ''?> value="Golongan IV/c">Golongan IV/c</option>
                      <option <?= (isset($_SESSION['golongan']) && $_SESSION['golongan'] == 'Golongan IV/d') ? 'selected' : ''?> value="Golongan IV/d">Golongan IV/d</option>
                      <option <?= (isset($_SESSION['golongan']) && $_SESSION['golongan'] == 'Golongan IV/e') ? 'selected' : ''?> value="Golongan IV/e">Golongan IV/e</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="pendidikan" class="col-sm-2 col-form-label">Pendidikan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="pendidikan" name="pendidikan" placeholder="Masukkan Pendidikan (min 3, max 50 karakter)" value="<?= isset($_SESSION['pendidikan']) ? $_SESSION['pendidikan'] : ''; ?>">
                  </div>
                </div>
                <div class="form-group row">
                <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Masukkan Jabatan (min 3, max 50 karakter)" value="<?= isset($_SESSION['jabatan']) ? $_SESSION['jabatan'] : ''; ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="id_role" class="col-sm-2 col-form-label">Role</label>
                <div class="col-sm-10">
                  <?php 
                  if(isset($_SESSION['id_role'])){
                    $id_role = $_SESSION['id_role'];
                  }else{
                    $id_role = null;
                  }
                  ?>
                  
                  <?= dropdown_dinamis('id_role', 'tb_role', 'nama_role', 'id_role', $id_role); ?>
                </div>
              </div>
              <div class="form-group row">
                  <label for="password" class="col-sm-2 col-form-label">Password</label>
                  <div class="col-sm-10 input-group">
                      <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password (min 5, max 18 karakter)" value="<?= isset($_SESSION['password']) ? $_SESSION['password'] : ''; ?>">
                      <div class="input-group-append">
                          <span class="input-group-text">
                              <i class="fa fa-eye" id="togglePassword"></i>
                          </span>
                      </div>
                  </div>
              </div>

              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary" name="insert">Simpan</button>
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
<script>
document.getElementById("togglePassword").addEventListener("click", function() {
    var passwordInput = document.getElementById("password");
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
    } else {
        passwordInput.type = "password";
    }
});
</script>

<?php
include("../footer.php");
?>