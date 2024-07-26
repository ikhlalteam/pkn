<?php
include("../header.php");
include("../sidebar.php");
include 'presensicontroller/tambahpresensicontroller.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Master Presensi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">Presensi</li>
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
                        <h3 class="card-title">Presensi</h3>
                    </div>
                    <div class="card-body p-0">
                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="tanggal_presensi" class="col-sm-2 col-form-label">Tanggal Presensi</label>
                                    <div class="col-sm-10">
                                        <input type="datetime-local" class="form-control" id="tanggal_presensi" name="tanggal_presensi" value="<?php echo date('Y-m-d H:i:s'); ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="id_siswa" class="col-sm-2 col-form-label">Siswa</label>
                                    <div class="col-sm-10">
                                        <select id="id_siswa" name="id_siswa" class="form-control">
                                        <!-- Options akan dimuat melalui AJAX -->
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kehadiran" class="col-sm-2 col-form-label">Kehadiran</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="kehadiran" name="kehadiran" onchange="toggleSuratIzin()">
                                            <option value="tanpa keterangan">Tanpa Keterangan</option>
                                            <option value="sakit">Sakit</option>
                                            <option value="izin">Izin</option>
                                        </select>
                                    </div>
                                </div>
                                <div id="suratIzinContainer" style="display: none;">
                                    <div class="form-group row">
                                        <label for="suratIzin" class="col-sm-2 col-form-label">Surat Izin</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" id="suratIzin" name="surat_izin">
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
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include("../footer.php");
?>

<!-- Tambahkan CSS Select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- Tambahkan JS jQuery dan Select2 -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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

    $(document).ready(function() {
        $('#id_siswa').select2({
            placeholder: 'Cari siswa...',
            ajax: {
                url: 'search_student.php', // Ganti dengan URL ke script server-side Anda
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term // Kata kunci pencarian
                    };
                },
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                id: item.id_siswa,
                                text: item.nama_siswa
                            };
                        })
                    };
                },
                cache: true
            }
        });
    });
</script>
