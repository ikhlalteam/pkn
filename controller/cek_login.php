<?php
// session_start();
// include 'config/database_connection.php';
include 'config/koneksi.php';


if (isset($_POST['loginpegawai'])) {

  $nip = filter_injection($_POST['nip']);
  $password = filter_injection($_POST['password']); // tidak di-hash dulu agar panjangnya bisa divalidasi
  $hashed_password = md5($password);

    // Validasi panjang username dan password
    $min_length = 5;
    $max_length = 50; // Sesuaikan dengan panjang maksimal yang diinginkan

     if (strlen($nip) < $min_length || strlen($nip) > $max_length) {
        echo '<script>
        alert("NIP harus memiliki panjang antara ' . $min_length . ' dan ' . $max_length . ' karakter.");
        window.location.href="loginpegawai.php";
        </script>';
        exit;
    }

    if (strlen($password) < $min_length || strlen($password) > $max_length) {
        echo '<script>
        alert("Password harus memiliki panjang antara ' . $min_length . ' dan ' . $max_length . ' karakter.");
        window.location.href="loginpegawai.php";
        </script>';
        exit;
    }
    // Validasi username harus hanya mengandung angka
if (!preg_match('/^[0-9]+$/', $nip)) {
    echo '<script>
    alert("Nip hanya boleh mengandung angka.");
    window.location.href="loginpegawai.php";
    </script>';
    exit;
}
// Validasi password harus mengandung angka, huruf, karakter spesial, dan tidak boleh ada spasi
    if (!preg_match('/^(?=.*[0-9])(?=.*[A-Za-z])(?=.*[@$!%*#?&])[\S]+$/', $password)) {
        echo '<script>
        alert("Password harus mengandung angka, huruf, karakter spesial (@$!%*#?&), dan tidak boleh ada spasi.");
        window.location.href="loginpegawai.php";
        </script>';
        exit;
    }



  $sql = "SELECT * FROM tb_pegawai where nip='$nip' AND password='$hashed_password'";

  $query = mysqli_query($conn, $sql);

  if (mysqli_num_rows($query) > 0) {
    $queryResult = mysqli_fetch_array($query);
    $_SESSION["id_user"] = $queryResult['id_pegawai'];
    $_SESSION["nip"] = $queryResult['nip'];
    $_SESSION["nama_pegawai"] = $queryResult['nama_pegawai'];
    $_SESSION["agama"] = $queryResult['agama'];
    $_SESSION["jenis_kelamin"] = $queryResult['jenis_kelamin'];
    $_SESSION["tempat_lahir"] = $queryResult['tempat_lahir'];
    $_SESSION["tanggal_lahir"] = $queryResult['tanggal_lahir'];
    $_SESSION["alamat"] = $queryResult['alamat'];
    $_SESSION["no_hp_guru"] = $queryResult['no_hp_guru'];
    $_SESSION["email_guru"] = $queryResult['email_guru'];
    $_SESSION["password"] = $queryResult['password'];
    $_SESSION["role_pegawai"] = $queryResult['id_role'];

    // if ($queryResult['jabatan'] == 'tatausaha') {
    //   $redirect = $config['base_url'] . 'tatausaha/index.php';
    //   header("Location: $redirect");

    // }elseif ($queryResult['jabatan'] == 'gurumatapelajaran') {
    //   $redirect = $config['base_url'] . 'gurumapel/index.php';
    //   header("Location: $redirect");

    // }elseif ($queryResult['jabatan'] == 'kepalasekolah') {
    //   $redirect = $config['base_url'] . 'kepsek/index.php';
    //   header("Location: $redirect");

    // }elseif ($queryResult['jabatan'] == 'walikelas') {
    //   $redirect = $config['base_url'] . 'walikelas/index.php';
    //   header("Location: $redirect");

    // }else{
    //   $redirect = $config['base_url'] . 'login.php?message=invalid';
    //   header("Location: $redirect");
    // }

    $redirect = $home_admin . 'index.php';
    echo '<script>
    window.location.href="' . $redirect . '"; 
    </script>';
    exit;
  } else {
    $redirect = $config['base_url'] . 'loginpegawai.php?message=invalid';
    header("Location: $redirect");
  }
}
