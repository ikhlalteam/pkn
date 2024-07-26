<?php

if (isset($_GET['id_presensi'])) {
    // $id_siswa= $_GET["id_siswa"];
    $sqlupdate = "SELECT * FROM tb_presensi where id_presensi='" . $_GET['id_presensi'] . "'";
    $query = mysqli_query($conn, $sqlupdate);
    if (mysqli_num_rows($query) > 0) {
        $queryResult = mysqli_fetch_array($query);
    }
}
if (isset($_POST['update'])) {
    
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

    $sql = " UPDATE tb_presensi SET
    tanggal_presensi='" . $_POST['tanggal_presensi'] . "', 
    id_siswa='" . $_POST['id_siswa'] . "',
    id_jadwal='" . $_POST['id_jadwal'] . "',
    kehadiran='" . $_POST['kehadiran'] . "',
    surat_izin='" . $surat_izin . "'
    WHERE id_presensi = '" . $_GET['id_presensi'] . "'";

    if (mysqli_query($conn, $sql)) {
        $redirect = $config['base_url'] . 'admin/presensi/presensi.php';
        echo '<script>
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
