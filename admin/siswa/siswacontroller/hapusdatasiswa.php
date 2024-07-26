<?php 
session_start();
include '../../config/koneksi.php';

if(!isset($_SESSION['id_user'])){
  $redirect = $config['base_url'] . 'login.php';
  header("Location: $redirect");
}

if (isset($_GET["hapus_data_siswa"])) {
    
    $id_siswa = $_GET["hapus_data_siswa"];

    $query = $conn->query("DELETE FROM tb_siswa WHERE id_siswa='$id_siswa'");

    if ($query) {
        $_SESSION['notifikasi']['success'] = "Hapus data <b>" . $_GET['id_siswa'] . "</b> berhasil";
    } else {
        $_SESSION['notifikasi']['fail'] = "Hapus data <b>" . $_GET['id_siswa'] . "</b> gagal !!!";
    }

    header('Location: datasiswa.php');
    exit();

}

    


?>