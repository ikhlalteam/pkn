<?php
if (isset($_POST['insert'])) {

    $required_fields = array('tanggal_presensi', 'id_siswa', 'kehadiran');
    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            echo '<script>
            alert("Semua field harus diisi!");
            window.location.href="presensi.php"; 
            </script>';
            exit;
        }
    }
    
    // Validasi Siswa tidak boleh kosong dan terdata pada Database
    $id_siswa = $_POST['id_siswa'];
    // Lakukan validasi apakah siswa terdaftar dalam database

    // Validasi Kehadiran tidak boleh kosong
    if (strlen($_POST['kehadiran']) < 4 || strlen($_POST['kehadiran']) > 20) {
        echo '<script>
        alert("Kehadiran harus memiliki panjang minimal 4 karakter dan maksimal 20 karakter!");
        window.location.href="presensi.php"; 
        </script>';
        exit;
    }

    $surat_izin = '';
    if (isset($_FILES['surat_izin']) && !empty($_FILES['surat_izin']['tmp_name'])) {

        $file_name = $_FILES['surat_izin']['name'];
        $file_tmp = $_FILES['surat_izin']['tmp_name'];
        $file_size = $_FILES['surat_izin']['size'];
        $file_error = $_FILES['surat_izin']['error'];

        // Mendapatkan ekstensi file
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        // Daftar ekstensi yang diperbolehkan
        $allowed_extensions = array("jpg", "jpeg", "png");

        // Tentukan direktori penyimpanan file
        $upload_dir = "../../uploads/";

        // Generate nama file baru
        $new_file_name = uniqid() . '.' . $file_ext;

        // Validasi file
        if (in_array($file_ext, $allowed_extensions)) {
            if ($file_error === 0) {
                if ($file_size <= 5 * 1024 * 1024) { // Batasan ukuran file (5MB)
                    // Pindahkan file yang diupload ke direktori tujuan
                    if (move_uploaded_file($file_tmp, $upload_dir . $new_file_name)) {
                        $surat_izin = $new_file_name;
                    } else {
                        echo '<script>
                        alert("Terjadi kesalahan saat mengunggah file.");
                        window.location.href="presensi.php"; 
                        </script>';
                        exit;
                    }
                } else {
                    echo '<script>
                    alert("Ukuran file terlalu besar. Maksimal 5MB.");
                    window.location.href="presensi.php"; 
                    </script>';
                    exit;
                }
            } else {
                echo '<script>
                alert("Terjadi kesalahan saat mengunggah file.");
                window.location.href="presensi.php"; 
                </script>';
                exit;
            }
        } else {
            echo '<script>
            alert("Ekstensi file tidak diperbolehkan. Hanya diperbolehkan JPG, JPEG, dan PNG.");
            window.location.href="presensi.php"; 
            </script>';
            exit;
        }
    }

$sqlInsert = "INSERT INTO tb_presensi (tanggal_presensi, id_siswa, id_jadwal, kehadiran, surat_izin)
VALUES('" . $_POST['tanggal_presensi'] . "', '" . $_POST['id_siswa'] . "', 999, '" . $_POST['kehadiran'] . "', '" . $surat_izin . "')";


    if (mysqli_query($conn, $sqlInsert)) {
        $redirect = $config['base_url'] . 'admin/presensi/presensi.php';
        echo '<script>
        alert("presensi baru berhasil ditambahkan!");
            window.location.href="' . $redirect . '"; 
            </script>';
        exit;
    }
}

if (isset($_POST['batal'])) {
    $redirect = $config['base_url'] . 'admin/presensi/presensi.php';
    echo '<script>
        window.location.href="' . $redirect . '"; 
        </script>';
    exit;
}
