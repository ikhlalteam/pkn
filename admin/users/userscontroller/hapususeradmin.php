<?php
session_start();
include '../../../config/koneksi.php';

if (!isset($_SESSION['id_user'])) {
    $redirect = $config['base_url'] . 'login.php';
    header("Location: $redirect");
}

if (isset($_GET["hapus_data_user"])) {

    $id_user = $_GET["hapus_data_user"];

    $query = $conn->query("DELETE FROM users WHERE id_user='$id_user'");

    if ($query) {
        $_SESSION['notifikasi']['success'] = "Hapus data <b>" . $_GET['id_user'] . "</b> berhasil";
    } else {
        $_SESSION['notifikasi']['fail'] = "Hapus data <b>" . $_GET['id_user'] . "</b> gagal !!!";
    }

    header('Location: ../user.php');
    exit();
}
