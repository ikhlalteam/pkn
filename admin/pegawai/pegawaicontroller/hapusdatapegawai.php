<?php
session_start();
include '../../../config/koneksi.php';

if (!isset($_SESSION['id_user'])) {
    $redirect = $config['base_url'] . 'login.php';
    header("Location: $redirect");
}

if (isset($_GET["hapus_data_pegawai"])) {

    $id_pegawai = $_GET["hapus_data_pegawai"];

    $query = $conn->query("DELETE FROM tb_pegawai WHERE id_pegawai='$id_pegawai'");

    if ($query) {
        $_SESSION['notifikasi']['success'] = "Hapus data <b>" . $_GET['id_pegawai'] . "</b> berhasil";
    } else {
        $_SESSION['notifikasi']['fail'] = "Hapus data <b>" . $_GET['id_pegawai'] . "</b> gagal !!!";
    }

    header('Location: ../pegawai.php');
    exit();
}
