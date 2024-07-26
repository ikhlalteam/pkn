<?php
if (isset($_GET['id_pegawai'])) {
    $sqlupdate = "SELECT * FROM tb_pegawai where id_pegawai='" . $_GET['id_pegawai'] . "'";
    $query = mysqli_query($conn, $sqlupdate);
    if (mysqli_num_rows($query) > 0) {
        $queryResult = mysqli_fetch_array($query);
    }
}

$error_messages = array();

if (isset($_POST['update'])) {
    if (empty($_POST['nip']) || empty($_POST['nama_pegawai']) || empty($_POST['agama']) || empty($_POST['jenis_kelamin']) || empty($_POST['tempat_lahir']) || empty($_POST['tanggal_lahir']) || empty($_POST['alamat']) || empty($_POST['no_hp_guru']) || empty($_POST['email_guru']) || empty($_POST['golongan']) || empty($_POST['pendidikan']) || empty($_POST['jabatan']) || empty($_POST['password'])) {
        $error_messages[] = "Semua field harus diisi!";
    }

    $fields_length = array(
        'nip' => array('min' => 10, 'max' => 18),
        'nama_pegawai' => array('min' => 3, 'max' => 50),
        'agama' => array('min' => 4, 'max' => 18),
        'jenis_kelamin' => array('min' => 4, 'max' => 18),
        'tempat_lahir' => array('min' => 3, 'max' => 18),
        'tanggal_lahir' => array('min' => 10, 'max' => 10), // Format tanggal (YYYY-MM-DD)
        'alamat' => array('min' => 6, 'max' => 50), // Sesuaikan maksimal 50 karakter
        'no_hp_guru' => array('min' => 6, 'max' => 13),
        'email_guru' => array('min' => 6, 'max' => 50), // Sesuaikan maksimal 50 karakter
        'golongan' => array('min' => 6, 'max' => 18),
        'pendidikan' => array('min' => 6, 'max' => 18),
        'jabatan' => array('min' => 6, 'max' => 25),
        'password' => array('min' => 5, 'max' => 50),
    );

    foreach ($fields_length as $field => $length) {
        if (strlen($_POST[$field]) < $length['min'] || strlen($_POST[$field]) > $length['max']) {
            $error_messages[] = "Panjang " . str_replace('_', ' ', $field) . " harus antara " . $length['min'] . " dan " . $length['max'] . " karakter!";
        }
    }

    if (!ctype_digit($_POST['nip'])) {
        $error_messages[] = "NIP harus berupa angka!";
    }

    if (!ctype_digit($_POST['no_hp_guru'])) {
        $error_messages[] = "Nomor HP Guru harus berupa angka!";
    }
     if (!preg_match('/^[a-zA-Z-\s]+$/', $_POST['jenis_kelamin'])) {
        echo '<script>
        alert("jenis kelamin hanya boleh terdiri dari huruf, dan special karakter!");
        window.location.href="pegawai.php"; 
        </script>';
        exit;
    }

    $tanggal_lahir = $_POST['tanggal_lahir'];
    if (!DateTime::createFromFormat('Y-m-d', $tanggal_lahir) || $tanggal_lahir != date('Y-m-d', strtotime($tanggal_lahir))) {
        $error_messages[] = "Format Tanggal Lahir tidak valid!";
    }

    if (!filter_var($_POST['email_guru'], FILTER_VALIDATE_EMAIL)) {
        $error_messages[] = "Format Email tidak valid!";
    }

    $fields_to_validate = array('nama_pegawai', 'agama', 'tempat_lahir', 'jabatan');
    foreach ($fields_to_validate as $field) {
        if (!preg_match('/^[a-zA-Z\s]+$/', $_POST[$field])) {
            $error_messages[] = ucfirst(str_replace('_', ' ', $field)) . " hanya boleh terdiri dari huruf dan spasi!";
        }
    }

    if (empty($error_messages)) {
        $sql = "UPDATE tb_pegawai SET
        nip = '" . $_POST['nip'] . "', 
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
        id_role = '" . $_POST['id_role'] . "',
        password = md5('" . $_POST['password'] . "')
        WHERE id_pegawai = '" . $_GET['id_pegawai'] . "'";

        if (mysqli_query($conn, $sql)) {
            $redirect = $config['base_url'] . 'admin/pegawai/pegawai.php';
            echo '<script>
                alert("Pegawai berhasil diperbarui!");
                window.location.href="' . $redirect . '"; 
                </script>';
            exit;
        } else {
            $error_messages[] = "Terjadi kesalahan saat memperbarui data pegawai!";
        }
    }
}

if (isset($_POST['batal'])) {
    $redirect = $config['base_url'] . 'admin/pegawai/pegawai.php';
    echo '<script>
        window.location.href="' . $redirect . '"; 
        </script>';
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Pegawai</title>
    <link rel="stylesheet" href="path/to/bootstrap.css">
</head>
<body>
    <div class="container">
        <?php if (!empty($error_messages)): ?>
            <div class="alert alert-danger">
                <?php foreach ($error_messages as $message): ?>
                    <p><?php echo $message; ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        
    </div>
</body>
</html>
