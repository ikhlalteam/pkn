<?php
include("../header.php");
include("../sidebar.php");
include 'siswacontroller/updatesiswa.php';

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
            <h3 class="card-title">Update Data Siswa</h3>
          </div>
          <div class="card-body p-0">
            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">Nomor Induk Siswa</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nomor_induk_siswa" name="nomor_induk_siswa" value="<?php if (isset($queryResult['nomor_induk_siswa'])) echo $queryResult['nomor_induk_siswa']; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">Nama Siswa</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="<?php if (isset($queryResult['nama_siswa'])) echo $queryResult['nama_siswa']; ?>">
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
                  <label for="" class="col-sm-2 col-form-label">Nomor HP Siswa</label>
                  <div class="col-sm-10">
                    <input type="tel" class="form-control" id="nomor_hp_siswa" name="nomor_hp_siswa" value="<?php if (isset($queryResult['nomor_hp_siswa'])) echo $queryResult['nomor_hp_siswa']; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email_siswa" value="<?php if (isset($queryResult['email_siswa'])) echo $queryResult['email_siswa']; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">Alamat Tinggal</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="alamat_tinggal" name="alamat_tinggal" value="<?php if (isset($queryResult['alamat_tinggal'])) echo $queryResult['alamat_tinggal']; ?>">
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
                  <label for="" class="col-sm-2 col-form-label">Golongan Darah</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="golongan_darah" name="golongan_darah">
                      <option><?php if (isset($queryResult['golongan_darah'])) echo $queryResult['golongan_darah']; ?></option>
                      <option>A</option>
                      <option>AB</option>
                      <option>B</option>
                      <option>O</option>
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
                  <label for="" class="col-sm-2 col-form-label">Kewarganegaraan</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="kewarganegaraan" name="kewarganegaraan">
                      <option><?php if (isset($queryResult['kewarganegaraan'])) echo $queryResult['kewarganegaraan']; ?></option>
                      <option>WNI</option>
                      <option>WNA</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">Tahun Masuk</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" id="tahun_masuk" name="tahun_masuk" value="<?php if (isset($queryResult['tahun_masuk'])) echo $queryResult['tahun_masuk']; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">Nomor HP Orang Tua</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nomor_hp_orangtua" name="nomor_hp_orangtua" value="<?php if (isset($queryResult['nomor_hp_orangtua'])) echo $queryResult['nomor_hp_orangtua']; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">Nama Ayah</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" value="<?php if (isset($queryResult['nama_ayah'])) echo $queryResult['nama_ayah']; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">Pekerjaan Ayah</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah" value="<?php if (isset($queryResult['pekerjaan_ayah'])) echo $queryResult['pekerjaan_ayah']; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">Nama Ibu</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" value="<?php if (isset($queryResult['nama_ibu'])) echo $queryResult['nama_ibu']; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">Pekerjaan Ibu</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu" value="<?php if (isset($queryResult['pekerjaan_ibu'])) echo $queryResult['pekerjaan_ibu']; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">Kelas</label>
                  <div class="col-sm-10">
                    <?= dropdown_dinamis('id_kelas', 'tb_kelas', 'kelas', 'id_kelas', $queryResult['id_kelas']); ?>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">Foto Siswa</label>
                  <div class="col-sm-10">
                    <img src="<?= (isset($queryResult['foto_siswa'])) ? "../../uploads/" . $queryResult['foto_siswa'] : ''; ?>" width="150px"><br>
                    <input type="file" name="foto_siswa" class="form-control">
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