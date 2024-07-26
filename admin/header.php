<?php
session_start();
include __DIR__ . '/../config/koneksi.php';


if (!isset($_SESSION['id_user'])) {
    $redirect = $config['base_url'] . 'loginadmin.php';
    header("Location: $redirect");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SMKSDL</title>
    <link rel="shortcut icon" href="<?= $config['base_url']; ?>https://th.bing.com/th/id/OLC.NTJfswW5MHqYyQ480x360?&rs=1&pid=ImgDetMain" />

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= $config['base_url']; ?>vendor/plugins/fontawesome-free/css/all.min.css">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="<?= $config['base_url']; ?>vendor/plugins/bs-stepper/css/bs-stepper.min.css">
    <!-- Datatables -->
    <link rel="stylesheet" href="<?= $config['base_url']; ?>vendor/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= $config['base_url']; ?>vendor/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= $config['base_url']; ?>vendor/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= $config['base_url']; ?>vendor/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?= $config['base_url']; ?>logout.php" class="nav-link">Logout</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= $config['base_url']; ?>admin/updateprofil/updateprofil.php">
                        Admin
                        <!-- <i class="fas fa-sign-out-alt">Logout</i> -->
                    </a>
                </li>
                <li class="nav-item">
                    <div class="image user-panel">
                        <img src="<?= $config['base_url']; ?>vendor/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->