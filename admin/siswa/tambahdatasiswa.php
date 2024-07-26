<?php
include("../header.php");
include("../sidebar.php");
include 'siswacontroller/tambahdata.php';

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

    <!-- Default box -->
    <div class="row">
      <div class="col-md-12">
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Tambah Data Siswa</h3>
          </div>
          <div class="card-body p-0">
            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">Nomor Induk Siswa</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nomor_induk_siswa" name="nomor_induk_siswa" placeholder="Masukan Nomor Induk Siswa" value="<?= isset($_SESSION['nomor_induk_siswa']) ? $_SESSION['nomor_induk_siswa'] : ''; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">Nama Siswa</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" placeholder="Masukan Nama Siswa" value="<?= isset($_SESSION['nama_siswa']) ? $_SESSION['nama_siswa'] : ''; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">Tempat Lahir</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Masukan Tempat Lahir" value="<?= isset($_SESSION['tempat_lahir']) ? $_SESSION['tempat_lahir'] : ''; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Masukan Tanggal Lahir" value="<?= isset($_SESSION['tanggal_lahir']) ? $_SESSION['tanggal_lahir'] : ''; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">Nomor HP Siswa</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nomor_hp_siswa" name="nomor_hp_siswa" placeholder="Masukan Nomor HP Siswa" value="<?= isset($_SESSION['nomor_hp_siswa']) ? $_SESSION['nomor_hp_siswa'] : ''; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="email_siswa" name="email_siswa" placeholder="Masukan Email Siswa" value="<?= isset($_SESSION['email_siswa']) ? $_SESSION['email_siswa'] : ''; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">Alamat Tinggal</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="alamat_tinggal" name="alamat_tinggal" placeholder="Masukan Alamat Tinggal" value="<?= isset($_SESSION['alamat_tinggal']) ? $_SESSION['alamat_tinggal'] : ''; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">Agama</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="agama" name="agama">
                      <option disabled selected>Pilih Agama</option>
                      <option <?= (isset($_SESSION['agama']) && $_SESSION['agama'] == 'Kristen Protestan') ? 'selected' : '' ?> value="Kristen Protestan">Kristen Protestan</option>
                      <option <?= (isset($_SESSION['agama']) && $_SESSION['agama'] == 'Katolik') ? 'selected' : '' ?> value="Katolik">Katolik</option>
                      <option <?= (isset($_SESSION['agama']) && $_SESSION['agama'] == 'Islam') ? 'selected' : '' ?> value="Islam">Islam</option>
                      <option <?= (isset($_SESSION['agama']) && $_SESSION['agama'] == 'Hindu') ? 'selected' : '' ?> value="Hindu">Hindu</option>
                      <option <?= (isset($_SESSION['agama']) && $_SESSION['agama'] == 'Buddha') ? 'selected' : '' ?> value="Buddha">Buddha</option>
                      <option <?= (isset($_SESSION['agama']) && $_SESSION['agama'] == 'Konghucu') ? 'selected' : '' ?> value="Konghucu">Konghucu</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">Golongan Darah</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="golongan_darah" name="golongan_darah">
                      <option disabled selected>Pilih Gol Darah</option>
                      <option <?= (isset($_SESSION['golongan_darah']) && $_SESSION['golongan_darah'] == 'A') ? 'selected' : '' ?> value="A">A</option>
                      <option <?= (isset($_SESSION['golongan_darah']) && $_SESSION['golongan_darah'] == 'AB') ? 'selected' : '' ?> value="AB">AB</option>
                      <option <?= (isset($_SESSION['golongan_darah']) && $_SESSION['golongan_darah'] == 'B') ? 'selected' : '' ?> value="B">B</option>
                      <option <?= (isset($_SESSION['golongan_darah']) && $_SESSION['golongan_darah'] == 'O') ? 'selected' : '' ?> value="O">O</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                      <option disabled selected>Pilih Jenis Kelamin</option>
                      <option <?= (isset($_SESSION['jenis_kelamin']) && $_SESSION['jenis_kelamin'] == 'Laki-laki') ? 'selected' : '' ?> value="Laki-laki">Laki-laki</option>
                      <option <?= (isset($_SESSION['jenis_kelamin']) && $_SESSION['jenis_kelamin'] == 'Perempuan') ? 'selected' : '' ?> value="Perempuan">Perempuan</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">Kewarganegaraan</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="kewarganegaraan" name="kewarganegaraan">
                      <option disabled selected>Pilih Kewarganegaraan</option>
                      <option <?= (isset($_SESSION['kewarganegaraan']) && $_SESSION['kewarganegaraan'] == 'WNI') ? 'selected' : '' ?> value="WNI">WNI</option>
                      <option <?= (isset($_SESSION['kewarganegaraan']) && $_SESSION['kewarganegaraan'] == 'WNA') ? 'selected' : '' ?> value="WNA">WNA</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">Tahun Masuk</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="tahun_masuk" name="tahun_masuk" placeholder="Masukan Tahun Masuk" value="<?= isset($_SESSION['tahun_masuk']) ? $_SESSION['tahun_masuk'] : ''; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">Nomor HP Orang Tua</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nomor_hp_orangtua" name="nomor_hp_orangtua" placeholder="Masukan Nomor HP Orang Tua" value="<?= isset($_SESSION['nomor_hp_orangtua']) ? $_SESSION['nomor_hp_orangtua'] : ''; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">Nama Ayah</label>
                  <div class="col-sm-10">
                    <!-- Jika ada session, maka ambil dari session dulu -->
                    <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" placeholder="Masukan Nama Ayah" value="<?= isset($_SESSION['nama_ayah']) ? $_SESSION['nama_ayah'] : ''; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">Pekerjaan Ayah</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah" placeholder="Masukan Pekerjaan Ayah" value="<?= isset($_SESSION['pekerjaan_ayah']) ? $_SESSION['pekerjaan_ayah'] : ''; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">Nama Ibu</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" placeholder="Masukan Nama Ibu" value="<?= isset($_SESSION['nama_ibu']) ? $_SESSION['nama_ibu'] : ''; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">Pekerjaan Ibu</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu" placeholder="Masukan Pekerjaan Ibu" value="<?= isset($_SESSION['pekerjaan_ibu']) ? $_SESSION['pekerjaan_ibu'] : ''; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">Kelas</label>
                  <div class="col-sm-10">
                    <?php
                    if (isset($_SESSION['id_kelas'])) {
                      $id_kelas = $_SESSION['id_kelas'];
                    } else {
                      $id_kelas = null;
                    }
                    ?>
                    <?= dropdown_dinamis('id_kelas', 'tb_kelas', 'kelas', 'id_kelas', $id_kelas); ?>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">Foto Siswa</label>
                  <div class="col-sm-10">
                    <input type="file" name="foto_siswa" class="form-control">
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary" name="insert">Simpan</button>
                <button type="submit" class="btn btn-outline-warning float-right" name="batal">Batal</ </div>
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