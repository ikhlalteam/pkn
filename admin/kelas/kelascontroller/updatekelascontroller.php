<?php  

if (isset($_GET['id_kelas'])) {
    $sqlupdate = "SELECT * FROM tb_kelas WHERE id_kelas='" . $_GET['id_kelas'] . "'";
    $query = mysqli_query($conn, $sqlupdate);
    if (mysqli_num_rows($query) > 0) {
        $queryResult = mysqli_fetch_array($query);
    }
}

$errors = array();

if (isset($_POST['update'])) {
    $kodekelas = trim($_POST['kodekelas']);
    $kelas = trim($_POST['kelas']);
    $keterangan = trim($_POST['keterangan']);

    // Validasi Kode Kelas hanya terdiri dari angka dan tidak boleh mengandung spasi
    if (empty($kodekelas)) {
        $errors['kodekelas'] = "Kode Kelas tidak boleh kosong.";
    } elseif (!ctype_digit($kodekelas) || strpos($kodekelas, ' ') !== false) {
        $errors['kodekelas'] = "Kode Kelas hanya boleh terdiri dari angka dan tidak boleh mengandung spasi.";
    } elseif (strlen($kodekelas) < 5 || strlen($kodekelas) > 10) {
        $errors['kodekelas'] = "Kode Kelas harus memiliki panjang antara 5 hingga 10 karakter.";
    }

    // Validasi Kelas tidak boleh kosong, hanya boleh terdiri dari huruf, angka dan spasi
    if (empty($kelas)) {
        $errors['kelas'] = "Kelas tidak boleh kosong.";
    } elseif (!preg_match('/^[a-zA-Z0-9 ]+$/', $kelas)) {
        $errors['kelas'] = "Kelas hanya boleh terdiri dari huruf, angka, dan spasi.";
    } elseif (strlen($kelas) < 3 || strlen($kelas) > 50) {
        $errors['kelas'] = "Kelas harus memiliki panjang antara 3 hingga 50 karakter.";
    }

    // Validasi Keterangan tidak boleh kosong, hanya boleh terdiri dari huruf, angka, spasi, dan karakter spesial tertentu
    if (empty($keterangan)) {
        $errors['keterangan'] = "Keterangan tidak boleh kosong.";
    } elseif (!preg_match('/^[a-zA-Z0-9 .,!?@#%&()-]+$/', $keterangan)) {
        $errors['keterangan'] = "Keterangan hanya boleh terdiri dari huruf, angka, spasi, dan karakter spesial (. , ! ? @ # % & ( ) -).";
    } elseif (strlen($keterangan) < 10 || strlen($keterangan) > 255) {
        $errors['keterangan'] = "Keterangan harus memiliki panjang antara 10 hingga 255 karakter.";
    }

    // Jika tidak ada kesalahan, lakukan query update
    if (empty($errors)) {
        $sql = "UPDATE tb_kelas SET
                kodekelas='$kodekelas',
                kelas='$kelas', 
                keterangan='$keterangan'
                WHERE id_kelas = '" . $_GET['id_kelas'] . "'";

        if (mysqli_query($conn, $sql)) {
            $redirect = $config['base_url'] . 'admin/kelas/kelas.php';
            echo '<script>
            alert("Kelas berhasil diperbarui!");
            window.location.href="' . $redirect . '"; 
            </script>';
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

if (isset($_POST['batal'])) {
    $redirect = $config['base_url'] . 'admin/kelas/kelas.php';
    echo '<script>
            window.location.href="' . $redirect . '"; 
          </script>';
    exit;
}
?>
