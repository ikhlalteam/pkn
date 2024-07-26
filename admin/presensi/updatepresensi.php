<?php
include("../header.php");
include("../sidebar.php");
include 'presensicontroller/updatepresensicontroller.php';
// <!-- // tb_jadwal, id_jadwal, hari, id_kelas, id_pegawai, awal_jam, batas_jam, keterangan_jam -->
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Master Data Presensi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">Update Presensi</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">Presensi</h3>
                        </div>
                        <div class="card-body p-0">
                            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Tanggal Presensi</label>
                                        <div class="col-sm-10">
                                            <input type="datetime-local" class="form-control" id="tanggal_presensi" name="tanggal_presensi" value="<?php if (isset($queryResult['tanggal_presensi'])) echo $queryResult['tanggal_presensi']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Siswa</label>
                                        <div class="col-sm-10">
                                            
                                            <?= dropdown_dinamis('id_siswa', 'tb_siswa', 'nama_siswa', 'id_siswa',  $queryResult['id_siswa']); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Kehadiran</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="kehadiran" name="kehadiran" onchange="toggleSuratIzin()">
                                                <option value="hadir" <?= ($queryResult['kehadiran'] == 'hadir') ? 'selected' : ''; ?>>Hadir</option>
                                                <option value="sakit" <?= ($queryResult['kehadiran'] == 'sakit') ? 'selected' : ''; ?>>Sakit</option>
                                                <option value="tanpa keterangan" <?= ($queryResult['kehadiran'] == 'tanpa keterangan') ? 'selected' : ''; ?>>Tanpa Keterangan</option>
                                                <option value="izin" <?= ($queryResult['kehadiran'] == 'izin') ? 'selected' : ''; ?>>Izin</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div id="suratIzinContainer" style="<?= ($queryResult['kehadiran'] == 'hadir' || $queryResult['kehadiran'] == 'tanpa keterangan') ? 'display: none;' : ''; ?>">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label">Surat Izin</label>
                                            <div class="col-sm-10">
                                                <img src="<?= (isset($queryResult['surat_izin'])) ? "../../uploads/" . $queryResult['surat_izin'] : ''; ?>" width="360px">
                                                <input type="file" class="form-control" id="suratIzin" name="surat_izin">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary" name="update">Update</button>
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
<script>
    function toggleSuratIzin() {
        var kehadiranSelect = document.getElementById("kehadiran");
        var suratIzinContainer = document.getElementById("suratIzinContainer");

        if (kehadiranSelect.value === "sakit" || kehadiranSelect.value === "izin") {
            suratIzinContainer.style.display = "block";
        } else {
            suratIzinContainer.style.display = "none";
        }
    }
</script>