<?php
session_start();
include '../../../config/koneksi.php';

if (!isset($_SESSION['id_user'])) {
    $redirect = $config['base_url'] . 'login.php';
    header("Location: $redirect");
}

if (isset($_GET["hapus_data_presensi"])) {

    $id_presensi = $_GET["hapus_data_presensi"];

    $query = $conn->query("DELETE FROM tb_presensi WHERE id_presensi='$id_presensi'");

    if ($query) {
        $_SESSION['notifikasi']['success'] = "Hapus data <b>" . $_GET['id_presensi'] . "</b> berhasil";
    } else {
        $_SESSION['notifikasi']['fail'] = "Hapus data <b>" . $_GET['id_presensi'] . "</b> gagal !!!";
    }

    $redirect = $config['base_url'] . 'admin/presensi/presensi.php';
    echo '<script>
        window.location.href="' . $redirect . '"; 
        </script>';
    exit;
    exit();
}
