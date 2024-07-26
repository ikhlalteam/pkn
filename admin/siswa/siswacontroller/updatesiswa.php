<?php

$error_messages = array();

if (isset($_GET['id_siswa'])) {
    $sqlupdate = "SELECT * FROM tb_siswa where id_siswa='" . $_GET['id_siswa'] . "'";
    $query = mysqli_query($conn, $sqlupdate);
    if (mysqli_num_rows($query) > 0) {
        $queryResult = mysqli_fetch_array($query);
    }
}

if (isset($_POST['update'])) {

    // Handle file upload if a file is selected
    if (isset($_FILES['foto_siswa']['name']) && ($_FILES['foto_siswa']['name'] != '')) {
        $foto_siswa = '';
        $file_name = $_FILES['foto_siswa']['name'];
        $file_tmp = $_FILES['foto_siswa']['tmp_name'];
        $file_size = $_FILES['foto_siswa']['size'];
        $file_error = $_FILES['foto_siswa']['error'];

        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $allowed_extensions = array("jpg", "jpeg", "png");
        $upload_dir = "../../uploads/";
        $new_file_name = uniqid() . '.' . $file_ext;

        if (in_array($file_ext, $allowed_extensions)) {
            if ($file_error === 0) {
                if ($file_size <= 5 * 1024 * 1024) {
                    if (move_uploaded_file($file_tmp, $upload_dir . $new_file_name)) {
                        $foto_siswa = $new_file_name;
                    } else {
                        $error_messages[] = "Terjadi kesalahan saat mengunggah file.";
                    }
                } else {
                    $error_messages[] = "Ukuran file terlalu besar. Maksimal 5MB.";
                }
            } else {
                $error_messages[] = "Terjadi kesalahan saat mengunggah file.";
            }
        } else {
            $error_messages[] = "Ekstensi file tidak diperbolehkan. Hanya diperbolehkan JPG, JPEG, dan PNG.";
        }
    }

    $required_fields = array(
        'nomor_induk_siswa', 'nama_siswa', 'tempat_lahir', 'tanggal_lahir',
        'nomor_hp_siswa', 'email_siswa', 'alamat_tinggal', 'agama',
        'golongan_darah', 'jenis_kelamin', 'kewarganegaraan', 'tahun_masuk',
        'nomor_hp_orangtua', 'nama_ayah', 'pekerjaan_ayah', 'nama_ibu', 'pekerjaan_ibu', 'id_kelas'
    );

    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            $error_messages[] = "Field " . ucfirst(str_replace('_', ' ', $field)) . " harus diisi!";
        }
    }

    $field_lengths = array(
        'nomor_induk_siswa' => array('min' => 6, 'max' => 18),
        'nama_siswa' => array('min' => 4, 'max' => 50),
        'tempat_lahir' => array('min' => 4, 'max' => 18),
        'tanggal_lahir' => array('min' => 10, 'max' => 10),
        'nomor_hp_siswa' => array('min' => 10, 'max' => 13),
        'email_siswa' => array('min' => 6, 'max' => 50),
        'alamat_tinggal' => array('min' => 6, 'max' => 100),
        'golongan_darah' => array('min' => 1, 'max' => 5),
        'jenis_kelamin' => array('min' => 4, 'max' => 15),
        'kewarganegaraan' => array('min' => 3, 'max' => 25),
        'tahun_masuk' => array('min' => 10, 'max' => 10),
        'nomor_hp_orangtua' => array('min' => 10, 'max' => 13),
        'nama_ayah' => array('min' => 4, 'max' => 50),
        'pekerjaan_ayah' => array('min' => 4, 'max' => 25),
        'nama_ibu' => array('min' => 4, 'max' => 50),
        'pekerjaan_ibu' => array('min' => 4, 'max' => 25),
        'id_kelas' => array('min' => 1, 'max' => 25)
    );

    foreach ($field_lengths as $field => $length) {
        $field_value = $_POST[$field];
        if (strlen($field_value) < $length['min'] || strlen($field_value) > $length['max']) {
            $error_messages[] = "Panjang " . ucfirst(str_replace('_', ' ', $field)) . " harus antara " . $length['min'] . " dan " . $length['max'] . " karakter!";
        }
    }

    if (!preg_match("/^[0-9]{6,18}$/", $_POST['nomor_induk_siswa'])) {
        $error_messages[] = "Format Nomor Induk Siswa tidak valid. Harus terdiri dari 6-18 angka.";
    }

    if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $_POST['tanggal_lahir'])) {
        $error_messages[] = "Format Tanggal Lahir tidak valid. Harus dalam format YYYY-MM-DD.";
    }

    if (!ctype_digit($_POST['nomor_hp_siswa'])) {
        $error_messages[] = "Nomor HP Siswa harus berupa angka!";
    }

    if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $_POST['tahun_masuk'])) {
        $error_messages[] = "Format Tahun Masuk tidak valid. Harus dalam format YYYY-MM-DD.";
    }

    if (!ctype_digit($_POST['nomor_hp_orangtua'])) {
        $error_messages[] = "Nomor HP Orang Tua harus berupa angka!";
    }

    $fields_to_validate = array('nama_siswa', 'tempat_lahir', 'agama', 'golongan_darah',  'kewarganegaraan', 'nama_ayah', 'pekerjaan_ayah', 'nama_ibu', 'pekerjaan_ibu');
    foreach ($fields_to_validate as $field) {
        if (!preg_match('/^[a-zA-Z\s]+$/', $_POST[$field])) {
            $error_messages[] = ucfirst($field) . " hanya boleh terdiri dari huruf dan spasi!";
        }
    }

    if (empty($error_messages)) {
        if (isset($foto_siswa)) {
            $dataSiswaSqlUpdate = "UPDATE tb_siswa SET
                nomor_induk_siswa = '" . $_POST['nomor_induk_siswa'] . "', 
                nama_siswa = '" . $_POST['nama_siswa'] . "', 
                tempat_lahir = '" . $_POST['tempat_lahir'] . "', 
                tanggal_lahir = '" . $_POST['tanggal_lahir'] . "', 
                nomor_hp_siswa = '" . $_POST['nomor_hp_siswa'] . "', 
                email_siswa = '" . $_POST['email_siswa'] . "', 
                alamat_tinggal = '" . $_POST['alamat_tinggal'] . "', 
                agama = '" . $_POST['agama'] . "', 
                golongan_darah = '" . $_POST['golongan_darah'] . "',
                jenis_kelamin = '" . $_POST['jenis_kelamin'] . "', 
                kewarganegaraan = '" . $_POST['kewarganegaraan'] . "', 
                tahun_masuk = '" . $_POST['tahun_masuk'] . "', 
                nomor_hp_orangtua = '" . $_POST['nomor_hp_orangtua'] . "', 
                nama_ayah = '" . $_POST['nama_ayah'] . "',
                pekerjaan_ayah = '" . $_POST['pekerjaan_ayah'] . "',
                nama_ibu = '" . $_POST['nama_ibu'] . "',
                pekerjaan_ibu = '" . $_POST['pekerjaan_ibu'] . "',
                foto_siswa = '" . $foto_siswa . "',
                id_kelas = '" . $_POST['id_kelas'] . "'
                WHERE id_siswa = '" . $_GET['id_siswa'] . "'";
        } else {
            $dataSiswaSqlUpdate = "UPDATE tb_siswa SET
                nomor_induk_siswa = '" . $_POST['nomor_induk_siswa'] . "', 
                nama_siswa = '" . $_POST['nama_siswa'] . "', 
                tempat_lahir = '" . $_POST['tempat_lahir'] . "', 
                tanggal_lahir = '" . $_POST['tanggal_lahir'] . "', 
                nomor_hp_siswa = '" . $_POST['nomor_hp_siswa'] . "', 
                email_siswa = '" . $_POST['email_siswa'] . "', 
                alamat_tinggal = '" . $_POST['alamat_tinggal'] . "', 
                agama = '" . $_POST['agama'] . "', 
                golongan_darah = '" . $_POST['golongan_darah'] . "',
                jenis_kelamin = '" . $_POST['jenis_kelamin'] . "', 
                kewarganegaraan = '" . $_POST['kewarganegaraan'] . "', 
                tahun_masuk = '" . $_POST['tahun_masuk'] . "', 
                nomor_hp_orangtua = '" . $_POST['nomor_hp_orangtua'] . "', 
                nama_ayah = '" . $_POST['nama_ayah'] . "',
                pekerjaan_ayah = '" . $_POST['pekerjaan_ayah'] . "',
                nama_ibu = '" . $_POST['nama_ibu'] . "',
                pekerjaan_ibu = '" . $_POST['pekerjaan_ibu'] . "',
                id_kelas = '" . $_POST['id_kelas'] . "'
                WHERE id_siswa = '" . $_GET['id_siswa'] . "'";
        }

        if (mysqli_query($conn, $dataSiswaSqlUpdate)) {
            echo '<script>
            alert("Siswa berhasil diperbarui!");
            window.location.href="datasiswa.php"; 
            </script>';
            exit;
        } else {
            $error_messages[] = "Terjadi kesalahan saat memperbarui data siswa.";
        }
    }
}

if (isset($_POST['batal'])) {
    echo '<script>
        window.location.href="datasiswa.php"; 
        </script>';
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Data Siswa</title>
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
