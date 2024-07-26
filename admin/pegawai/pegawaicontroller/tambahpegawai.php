<?php
// function yang berfungsi ketika validasi masih ada yang salah, maka simpan inputan ke dalam session agar user tidak perlu mengisi ulang
function saveDataInput()
{
    $_SESSION['nip'] = $_POST['nip'];
    $_SESSION['nama_pegawai'] = $_POST['nama_pegawai'];
    $_SESSION['agama'] = $_POST['agama'];
    $_SESSION['jenis_kelamin'] = $_POST['jenis_kelamin'];
    $_SESSION['tempat_lahir'] = $_POST['tempat_lahir'];
    $_SESSION['tanggal_lahir'] = $_POST['tanggal_lahir'];
    $_SESSION['alamat'] = $_POST['alamat'];
    $_SESSION['nomor_hp_guru'] = $_POST['nomor_hp_guru'];
    $_SESSION['email_guru'] = $_POST['email_guru'];
    $_SESSION['golongan'] = $_POST['golongan'];
    $_SESSION['pendidikan'] = $_POST['pendidikan'];
    $_SESSION['jabatan'] = $_POST['jabatan'];
    $_SESSION['id_role'] = $_POST['id_role'];
    $_SESSION['password'] = $_POST['password'];
}

// function yang berfungsi untuk menghapus session ketika data berhasil diinputkan
function deleteDataInput()
{
    unset($_SESSION['nip']);
    unset($_SESSION['nama_pegawai']);
    unset($_SESSION['agama']);
    unset($_SESSION['jenis_kelamin']);
    unset($_SESSION['tempat_lahir']);
    unset($_SESSION['tanggal_lahir']);
    unset($_SESSION['alamat']);
    unset($_SESSION['nomor_hp_guru']);
    unset($_SESSION['email_guru']);
    unset($_SESSION['golongan']);
    unset($_SESSION['pendidikan']);
    unset($_SESSION['jabatan']);
    unset($_SESSION['id_role']);
    unset($_SESSION['password']);
}

if (isset($_POST['insert'])) {
    // Validasi input tidak boleh kosong
    $required_fields = array('nip', 'nama_pegawai', 'agama', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'nomor_hp_guru', 'email_guru', 'golongan', 'pendidikan', 'jabatan', 'password', 'id_role');
    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            echo '<script>
            alert("Semua field harus diisi!");
            window.location.href="tambahdatapegawai.php"; 
            </script>';
            saveDataInput();
            exit;
        }
    }

    // Validasi panjang minimal dan maksimal untuk setiap input
    $fields_length = array(
        'nip' => array('min' => 10, 'max' => 18),
        'nama_pegawai' => array('min' => 3, 'max' => 50),
        'agama' => array('min' => 4, 'max' => 18),
        'jenis_kelamin' => array('min' => 4, 'max' => 18),
        'tempat_lahir' => array('min' => 3, 'max' => 18),
        'tanggal_lahir' => array('min' => 10, 'max' => 10), // Format tanggal (YYYY-MM-DD)
        'alamat' => array('min' => 6, 'max' => 50),
        'nomor_hp_guru' => array('min' => 6, 'max' => 13),
        'email_guru' => array('min' => 6, 'max' => 50), // Misalkan maksimal 50 karakter
        'golongan' => array('min' => 6, 'max' => 18),
        'pendidikan' => array('min' => 6, 'max' => 18),
        'jabatan' => array('min' => 6, 'max' => 25),
        'password' => array('min' => 5, 'max' => 18),
    );

    foreach ($fields_length as $field => $length) {
        if (strlen($_POST[$field]) < $length['min'] || strlen($_POST[$field]) > $length['max']) {
            echo '<script>
            alert("Panjang ' . $field . ' harus antara ' . $length['min'] . ' hingga ' . $length['max'] . ' karakter!");
            window.location.href="tambahdatapegawai.php"; 
            </script>';
            saveDataInput();
            exit;
        }
    }

    // Validasi NIP hanya terdiri dari angka dan tidak mengandung spasi
    if (!ctype_digit($_POST['nip']) || strpos($_POST['nip'], ' ') !== false) {
        echo '<script>
        alert("NIP harus terdiri dari angka dan tidak mengandung spasi!");
        window.location.href="tambahdatapegawai.php"; 
        </script>';
        saveDataInput();
        exit;
    }

    // Validasi Tanggal Lahir
    $tanggal_lahir = $_POST['tanggal_lahir'];
    if (!DateTime::createFromFormat('Y-m-d', $tanggal_lahir) || $tanggal_lahir != date('Y-m-d', strtotime($tanggal_lahir))) {
        echo '<script>
        alert("Format Tanggal Lahir tidak valid!");
        window.location.href="tambahdatapegawai.php"; 
        </script>';
        saveDataInput();
        exit;
    }

    // Validasi Email menggunakan filter bawaan PHP
    if (!filter_var($_POST['email_guru'], FILTER_VALIDATE_EMAIL)) {
        echo '<script>
        alert("Format Email tidak valid!");
        window.location.href="tambahdatapegawai.php"; 
        </script>';
        saveDataInput();
        exit;
    }

    // Validasi karakter untuk nama pegawai, agama, tempat lahir, golongan, pendidikan, jabatan
    $fields_to_validate = array('nama_pegawai', 'agama', 'tempat_lahir', 'jabatan');
    foreach ($fields_to_validate as $field) {
        if (!preg_match('/^[a-zA-Z\s]+$/', $_POST[$field])) {
            echo '<script>
            alert("' . ucfirst($field) . ' hanya boleh terdiri dari huruf dan spasi!");
            window.location.href="tambahdatapegawai.php"; 
            </script>';
            saveDataInput();
            exit;
        }
    }
    if (!preg_match('/^[a-zA-Z-\s]+$/', $_POST['jenis_kelamin'])) {
        echo '<script>
        alert("jenis kelamin hanya boleh terdiri dari huruf, dan special karakter!");
        window.location.href="tambahdatapegawai.php"; 
        </script>';
        saveDataInput();
        exit;
    }

    // Validasi Nomor HP Guru hanya terdiri dari angka dan tidak mengandung spasi
    if (!ctype_digit($_POST['nomor_hp_guru']) || strpos($_POST['nomor_hp_guru'], ' ') !== false) {
        echo '<script>
        alert("Nomor HP Guru harus terdiri dari angka dan tidak mengandung spasi!");
        window.location.href="tambahdatapegawai.php"; 
        </script>';
        saveDataInput();
        exit;
    }

    // Validasi Password hanya terdiri dari huruf, angka, dan special karakter, tidak boleh spasi
    if (!preg_match('/^[a-zA-Z0-9!@#$%^&*()_]+$/', $_POST['password'])) {
        echo '<script>
        alert("Password hanya boleh terdiri dari huruf, angka, dan special karakter, tanpa spasi!");
        window.location.href="tambahdatapegawai.php"; 
        </script>';
        saveDataInput();
        exit;
    }

    $sqlInsert = "INSERT INTO tb_pegawai (
    nip,
    nama_pegawai,
    agama,
    jenis_kelamin,
    tempat_lahir,
    tanggal_lahir,
    alamat,
    no_hp_guru,
    email_guru,
    golongan,
    pendidikan,
    jabatan,
    password,
    id_role)
    VALUES(
    '" . $_POST['nip'] . "',
    '" . $_POST['nama_pegawai'] . "',
    '" . $_POST['agama'] . "', 
    '" . $_POST['jenis_kelamin'] . "',
    '" . $_POST['tempat_lahir'] . "',
    '" . $_POST['tanggal_lahir'] . "',
    '" . $_POST['alamat'] . "',
    '" . $_POST['nomor_hp_guru'] . "',
    '" . $_POST['email_guru'] . "',
    '" . $_POST['golongan'] . "',
    '" . $_POST['pendidikan'] . "',
    '" . $_POST['jabatan'] . "',
    md5('" . $_POST['password'] . "'),
    '" . $_POST['id_role'] . "')";

    if (mysqli_query($conn, $sqlInsert)) {
        $redirect = $config['base_url'] . 'admin/pegawai/pegawai.php';
        echo '<script>
        alert("Pegawai baru berhasil ditambahkan!");
        window.location.href="' . $redirect . '"; 
        </script>';
        deleteDataInput();
        exit;
    }
}
if (isset($_POST['batal'])) {
    $redirect = $config['base_url'] . 'admin/pegawai/pegawai.php';
    echo '<script>
        window.location.href="' . $redirect . '"; 
        </script>';
    exit;
}
