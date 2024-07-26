<?php
session_start();
include 'config.php'; // Include your database connection file

$error_messages = array();

if (isset($_SESSION["id_user"])) {
    $sqlupdate = "SELECT * FROM tb_pegawai WHERE id_pegawai='" . $_SESSION["id_user"] . "'";
    $query = mysqli_query($conn, $sqlupdate);
    if (mysqli_num_rows($query) > 0) {
        $queryResult = mysqli_fetch_array($query);
    }
}

if (isset($_POST['update'])) {
    if (empty($_POST['nama_pegawai']) || empty($_POST['agama']) || empty($_POST['jenis_kelamin']) || empty($_POST['tempat_lahir']) || empty($_POST['tanggal_lahir']) || empty($_POST['alamat']) || empty($_POST['no_hp_guru']) || empty($_POST['email_guru']) || empty($_POST['golongan']) || empty($_POST['pendidikan']) || empty($_POST['jabatan']) || empty($_POST['password'])) {
        $error_messages[] = "Semua field harus diisi!";
    }

    // Validasi panjang minimal dan maksimal untuk setiap input
    $field_lengths = array(
        'nama_pegawai' => array('min' => 3, 'max' => 50),
        'agama' => array('min' => 4, 'max' => 18),
        'jenis_kelamin' => array('min' => 4, 'max' => 18),
        'tempat_lahir' => array('min' => 3, 'max' => 18),
        'tanggal_lahir' => array('min' => 10, 'max' => 10),
        'alamat' => array('min' => 6, 'max' => 50),
        'no_hp_guru' => array('min' => 6, 'max' => 13),
        'email_guru' => array('min' => 6, 'max' => 50),
        'golongan' => array('min' => 6, 'max' => 18),
        'pendidikan' => array('min' => 6, 'max' => 18),
        'jabatan' => array('min' => 6, 'max' => 25),
        'password' => array('min' => 5, 'max' => 50)
    );

    foreach ($field_lengths as $field => $length) {
        $field_value = $_POST[$field];
        if (strlen($field_value) < $length['min'] || strlen($field_value) > $length['max']) {
            $error_messages[] = "Panjang " . ucfirst(str_replace('_', ' ', $field)) . " harus antara " . $length['min'] . " dan " . $length['max'] . " karakter!";
        }
    }

    if (!ctype_digit($_POST['no_hp_guru'])) {
        $error_messages[] = "Nomor HP Guru harus berupa angka!";
    }

    // Validasi Tanggal Lahir
    $tanggal_lahir = $_POST['tanggal_lahir'];
    if (!DateTime::createFromFormat('Y-m-d', $tanggal_lahir) || $tanggal_lahir != date('Y-m-d', strtotime($tanggal_lahir))) {
        $error_messages[] = "Format Tanggal Lahir tidak valid!";
    }

    // Validasi Email menggunakan filter bawaan PHP
    if (!filter_var($_POST['email_guru'], FILTER_VALIDATE_EMAIL)) {
        $error_messages[] = "Format Email tidak valid!";
    }

    $fields_validate = array('nama_pegawai');
    foreach ($fields_validate as $f) {
        if (!preg_match('/^[a-zA-Z .,!?@#%&()-]+$/', $_POST[$f])) {
            $error_messages[] = ucfirst($f) . " hanya boleh terdiri dari huruf, spesial karakter dan spasi!";
        }
    }

    // Validasi karakter untuk nama pegawai, agama, jenis kelamin, tempat lahir, jabatan
    $fields_to_validate = array('agama', 'tempat_lahir', 'jabatan');
    foreach ($fields_to_validate as $field) {
        if (!preg_match('/^[a-zA-Z\s]+$/', $_POST[$field])) {
            $error_messages[] = ucfirst($field) . " hanya boleh terdiri dari huruf dan spasi!";
        }
    }

    if (empty($error_messages)) {
        $sql = "UPDATE tb_pegawai SET
            nama_pegawai = '" . $_POST['nama_pegawai'] . "', 
            agama = '" . $_POST['agama'] . "', 
            jenis_kelamin = '" . $_POST['jenis_kelamin'] . "', 
            tempat_lahir = '" . $_POST['tempat_lahir'] . "', 
            tanggal_lahir = '" . $_POST['tanggal_lahir'] . "', 
            alamat = '" . $_POST['alamat'] . "', 
            no_hp_guru = '" . $_POST['no_hp_guru'] . "', 
            email_guru = '" . $_POST['email_guru'] . "',
            golongan = '" . $_POST['golongan'] . "', 
            pendidikan = '" . $_POST['pendidikan'] . "', 
            jabatan = '" . $_POST['jabatan'] . "', 
            password = md5('" . $_POST['password'] . "')
            WHERE id_pegawai = '" . $_SESSION["id_user"] . "'";

        if (mysqli_query($conn, $sql)) {
            $redirect = $config['base_url'] . 'admin/updateprofil/updateprofil.php';
            echo '<script>
                alert("Profil berhasil diupdate!");
                window.location.href="' . $redirect . '"; 
                </script>';
            exit;
        } else {
            $error_messages[] = "Terjadi kesalahan saat memperbarui profil.";
        }
    }
}

if (isset($_POST['batal'])) {
    $redirect = $config['base_url'] . 'admin/index.php';
    echo '<script>
        window.location.href="' . $redirect . '"; 
        </script>';
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <div class="container">
        <?php
    if (!empty($error_messages)) {
        echo '<div class="alert alert-danger">';
        foreach ($error_messages as $error) {
            echo '<p>' . $error . '</p>';
        }
        echo '</div>';
    }
    ?>

    </div>
</body>
</html>
