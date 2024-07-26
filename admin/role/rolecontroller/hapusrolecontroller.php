<?php
session_start();
include '../../../config/koneksi.php';

if (!isset($_SESSION['id_user'])) {
    $redirect = $config['base_url'] . 'login.php';
    header("Location: $redirect");
}

if (isset($_GET["hapus_data_role"])) {

    $id_role = $_GET["hapus_data_role"];

    $query = $conn->query("DELETE FROM tb_role WHERE id_role='$id_role'");

    if ($query) {
        $_SESSION['notifikasi']['success'] = "Hapus data <b>" . $id_role . "</b> berhasil";
    } else {
        $_SESSION['notifikasi']['fail'] = "Hapus data <b>" . $id_role . "</b> gagal !!!";
    }

    $redirect = $config['base_url'] . 'admin/role/role.php';
    echo '<script>
        window.location.href="' . $redirect . '"; 
        </script>';
    exit;
    exit();
}
