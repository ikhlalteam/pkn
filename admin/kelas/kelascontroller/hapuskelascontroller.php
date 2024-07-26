<?php
session_start();
include '../../../config/koneksi.php';

if (!isset($_SESSION['id_user'])) {
    $redirect = $config['base_url'] . 'login.php';
    header("Location: $redirect");
}

if (isset($_GET["hapus_data_kelas"])) {

    $id_kelas = $_GET["hapus_data_kelas"];

    $query = $conn->query("DELETE FROM tb_kelas WHERE id_kelas='$id_kelas'");

    if ($query) {
        $_SESSION['notifikasi']['success'] = "Hapus data <b>" . $_GET['id_kelas'] . "</b> berhasil";
    } else {
        $_SESSION['notifikasi']['fail'] = "Hapus data <b>" . $_GET['id_kelas'] . "</b> gagal !!!";
    }

    header('Location: ../kelas.php');
    exit();
}
