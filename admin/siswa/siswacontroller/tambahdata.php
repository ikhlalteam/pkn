<?php

// function yang berfungsi ketika validasi masih ada yang salah, maka simpan inputan ke dalam session agar user tidak perlu mengisi ulang
function saveDataInput()
{
    $_SESSION['nomor_induk_siswa'] = $_POST['nomor_induk_siswa'];
    $_SESSION['nama_siswa'] = $_POST['nama_siswa'];
    $_SESSION['tempat_lahir'] = $_POST['tempat_lahir'];
    $_SESSION['tanggal_lahir'] = $_POST['tanggal_lahir'];
    $_SESSION['nomor_hp_siswa'] = $_POST['nomor_hp_siswa'];
    $_SESSION['email_siswa'] = $_POST['email_siswa'];
    $_SESSION['alamat_tinggal'] = $_POST['alamat_tinggal'];
    $_SESSION['agama'] = $_POST['agama'];
    $_SESSION['golongan_darah'] = $_POST['golongan_darah'];
    $_SESSION['jenis_kelamin'] = $_POST['jenis_kelamin'];
    $_SESSION['kewarganegaraan'] = $_POST['kewarganegaraan'];
    $_SESSION['tahun_masuk'] = $_POST['tahun_masuk'];
    $_SESSION['nomor_hp_orangtua'] = $_POST['nomor_hp_orangtua'];
    $_SESSION['nama_ayah'] = $_POST['nama_ayah'];
    $_SESSION['pekerjaan_ayah'] = $_POST['pekerjaan_ayah'];
    $_SESSION['nama_ibu'] = $_POST['nama_ibu'];
    $_SESSION['pekerjaan_ibu'] = $_POST['pekerjaan_ibu'];
    $_SESSION['id_kelas'] = $_POST['id_kelas'];
}

// function yang berfungsi untuk menghapus session ketika data berhasil diinputkan
function deleteDataInput()
{
    unset($_SESSION['nomor_induk_siswa']);
    unset($_SESSION['nama_siswa']);
    unset($_SESSION['tempat_lahir']);
    unset($_SESSION['tanggal_lahir']);
    unset($_SESSION['nomor_hp_siswa']);
    unset($_SESSION['email_siswa']);
    unset($_SESSION['alamat_tinggal']);
    unset($_SESSION['agama']);
    unset($_SESSION['golongan_darah']);
    unset($_SESSION['jenis_kelamin']);
    unset($_SESSION['kewarganegaraan']);
    unset($_SESSION['tahun_masuk']);
    unset($_SESSION['nomor_hp_orangtua']);
    unset($_SESSION['nama_ayah']);
    unset($_SESSION['pekerjaan_ayah']);
    unset($_SESSION['nama_ibu']);
    unset($_SESSION['pekerjaan_ibu']);
    unset($_SESSION['id_kelas']);
}

if (isset($_POST['insert'])) { // Mengambil informasi file yang diupload
    $foto_siswa = '';
    $file_name = $_FILES['foto_siswa']['name'];
    $file_tmp = $_FILES['foto_siswa']['tmp_name'];
    $file_size = $_FILES['foto_siswa']['size'];
    $file_error = $_FILES['foto_siswa']['error'];

    // Mendapatkan ekstensi file
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    // Daftar ekstensi yang diperbolehkan
    $allowed_extensions = array("jpg", "jpeg", "png");

    // Tentukan direktori penyimpanan file
    $upload_dir = "../../uploads/";

    // Generate nama file baru
    $new_file_name = uniqid() . '.' . $file_ext;

    // Validasi file
    if (in_array($file_ext, $allowed_extensions)) {
        if ($file_error === 0) {
            if ($file_size <= 5 * 1024 * 1024) { // Batasan ukuran file (5MB)
                // Pindahkan file yang diupload ke direktori tujuan
                if (move_uploaded_file($file_tmp, $upload_dir . $new_file_name)) {
                    $foto_siswa = $new_file_name;
                } else {
                    echo '<script>
                    alert("Terjadi kesalahan saat mengunggah file.");
                    window.location.href="tambahdatasiswa.php"; 
                    </script>';

                    saveDataInput();
                    exit;
                }
            } else {
                echo '<script>
                alert("Ukuran file terlalu besar. Maksimal 5MB.");
                window.location.href="tambahdatasiswa.php"; 
                </script>';

                saveDataInput();
                exit;
            }
        } else {
            echo '<script>
            alert("Terjadi kesalahan saat mengunggah file.");
            window.location.href="tambahdatasiswa.php"; 
            </script>';

            saveDataInput();
            exit;
        }
    } else {
        echo '<script>
        alert("Ekstensi file tidak diperbolehkan. Hanya diperbolehkan JPG, JPEG, dan PNG.");
        window.location.href="tambahdatasiswa.php"; 
        </script>';

        saveDataInput();
        exit;
    }
    // Validasi input tidak boleh kosong
    $required_fields = array(
        'nomor_induk_siswa',
        'nama_siswa',
        'tempat_lahir',
        'tanggal_lahir',
        'nomor_hp_siswa',
        'email_siswa',
        'alamat_tinggal',
        'agama',
        'golongan_darah',
        'jenis_kelamin',
        'kewarganegaraan',
        'tahun_masuk',
        'nomor_hp_orangtua',
        'nama_ayah',
        'pekerjaan_ayah',
        'nama_ibu',
        'pekerjaan_ibu',
        'id_kelas'
    );

    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            echo '<script>
            alert("Semua field harus diisi!");
            window.location.href="tambahdatasiswa.php"; 
            </script>';

            saveDataInput();
            exit;
        }
    }

    // Validasi panjang minimal dan maksimal untuk setiap input
    $field_lengths = array(
        'nomor_induk_siswa' => array('min' => 6, 'max' => 18),
        'nama_siswa' => array('min' => 4, 'max' => 50),
        'tempat_lahir' => array('min' => 4, 'max' => 18),
        'tanggal_lahir' => array('min' => 10, 'max' => 10), // Format tanggal (YYYY-MM-DD)
        'nomor_hp_siswa' => array('min' => 10, 'max' => 13),
        'email_siswa' => array('min' => 6, 'max' => 50),
        'alamat_tinggal' => array('min' => 6, 'max' => 100),
        'golongan_darah' => array('min' => 1, 'max' => 5),
        'jenis_kelamin' => array('min' => 4, 'max' => 15),
        'kewarganegaraan' => array('min' => 3, 'max' => 25),
        'tahun_masuk' => array('min' => 10, 'max' => 10), // Format tanggal (YYYY-MM-DD)
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
            echo '<script>
            alert("Panjang ' . $field . ' harus antara ' . $length['min'] . ' dan ' . $length['max'] . ' karakter!");
            window.location.href="tambahdatasiswa.php"; 
            </script>';

            saveDataInput();
            exit;
        }
    }

    // Validasi format NIS (Nomor Induk Siswa)
    if (!preg_match("/^[0-9]{6,18}$/", $_POST['nomor_induk_siswa'])) {
        echo '<script>
        alert("Format Nomor Induk Siswa tidak valid. Harus terdiri dari 6-18 angka.");
        window.location.href="tambahdatasiswa.php"; 
        </script>';

        saveDataInput();
        exit;
    }

    // Validasi format Tanggal Lahir (YYYY-MM-DD)
    if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $_POST['tanggal_lahir'])) {
        echo '<script>
        alert("Format Tanggal Lahir tidak valid. Harus dalam format YYYY-MM-DD.");
        window.location.href="tambahdatasiswa.php"; 
        </script>';

        saveDataInput();
        exit;
    }

    // Validasi format Nomor HP Siswa
    if (!preg_match('/^\d+$/', $_POST['nomor_hp_siswa'])) {
        echo '<script>
        alert("Nomor HP Siswa harus berupa angka!");
        window.location.href="tambahdatasiswa.php"; 
        </script>';

        saveDataInput();
        exit;
    }
    // Validasi format Tanggal Lahir (YYYY-MM-DD)
    if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $_POST['tahun_masuk'])) {
        echo '<script>
        alert("Format Tahun Masuk tidak valid. Harus dalam format YYYY-MM-DD.");
        window.location.href="tambahdatasiswa.php"; 
        </script>';

        saveDataInput();
        exit;
    }

    // Validasi format Nomor HP Orang Tua
    if (!preg_match('/^\d+$/', $_POST['nomor_hp_orangtua'])) {
        echo '<script>
        alert("Nomor HP Orang Tua harus berupa angka!");
        window.location.href="tambahdatasiswa.php"; 
        </script>';

        saveDataInput();
        exit;
    }
    if (!preg_match('/^[a-zA-Z-\s]+$/', $_POST['jenis_kelamin'])) {
        echo '<script>
        alert("jenis kelamin hanya boleh terdiri dari huruf, dan special karakter!");
        window.location.href="pegawai.php"; 
        </script>';

        saveDataInput();
        exit;
    }

    $fields_to_validate = array('nama_siswa', 'tempat_lahir', 'agama', 'golongan_darah', 'kewarganegaraan', 'nama_ayah', 'pekerjaan_ayah', 'nama_ibu', 'pekerjaan_ibu');
    foreach ($fields_to_validate as $field) {
        if (!preg_match('/^[a-zA-Z\s]+$/', $_POST[$field])) {
            echo '<script>
            alert("' . ucfirst($field) . ' hanya boleh terdiri dari huruf dan spasi!");
            window.location.href="tambahdatasiswa.php"; 
            </script>';

            saveDataInput();
            exit;
        }
    }


    $dataSiswaSqlInsert = " INSERT INTO tb_siswa (
    	nomor_induk_siswa, 
        nama_siswa, 
        tempat_lahir,
        tanggal_lahir,
        nomor_hp_siswa,
        email_siswa,
        alamat_tinggal,
        agama,
        golongan_darah,
        jenis_kelamin,
        kewarganegaraan,
        tahun_masuk,
        nomor_hp_orangtua,
        nama_ayah,
        pekerjaan_ayah,
        nama_ibu,
        pekerjaan_ibu,
        foto_siswa,
        id_kelas)
    VALUES( 
    '" . $_POST['nomor_induk_siswa'] . "', 
    '" . $_POST['nama_siswa'] . "', 
    '" . $_POST['tempat_lahir'] . "', 
    '" . $_POST['tanggal_lahir'] . "', 
    '" . $_POST['nomor_hp_siswa'] . "', 
    '" . $_POST['email_siswa'] . "', 
    '" . $_POST['alamat_tinggal'] . "', 
    '" . $_POST['agama'] . "', 
    '" . $_POST['golongan_darah'] . "',
    '" . $_POST['jenis_kelamin'] . "', 
    '" . $_POST['kewarganegaraan'] . "', 
    '" . $_POST['tahun_masuk'] . "', 
    '" . $_POST['nomor_hp_orangtua'] . "', 
    '" . $_POST['nama_ayah'] . "',
    '" . $_POST['pekerjaan_ayah'] . "',
    '" . $_POST['nama_ibu'] . "',
    '" . $_POST['pekerjaan_ibu'] . "',
    '" . $foto_siswa . "',
    '" . $_POST['id_kelas'] . "')";

    if (mysqli_query($conn, $dataSiswaSqlInsert)) {
        $redirect = $config['base_url'] . 'admin/siswa/datasiswa.php';
        echo '<script>
        alert("Siswa baru berhasil ditambahkan!");
        window.location.href="' . $redirect . '"; 
        </script>';
        deleteDataInput();
        exit;
    }
}

if (isset($_POST['batal'])) {
    $redirect = $config['base_url'] . 'admin/siswa/datasiswa.php';
    echo '<script>
        window.location.href="' . $redirect . '"; 
        </script>';
    exit;
}
