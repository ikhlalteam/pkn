<?php
// session_start();
// include 'config/database_connection.php';
include 'config/koneksi.php';

if (isset($_POST['loginadmin'])) {
    $username = filter_injection($_POST['username']);
    $password = filter_injection($_POST['password']); // tidak di-hash dulu agar panjangnya bisa divalidasi
    $hashed_password = md5($password);

    // Validasi panjang username dan password
    $min_length = 5;
    $max_length = 50; // Sesuaikan dengan panjang maksimal yang diinginkan

    if (strlen($username) < $min_length || strlen($username) > $max_length) {
        echo '<script>
        alert("Username harus memiliki panjang antara ' . $min_length . ' dan ' . $max_length . ' karakter.");
        window.location.href="loginadmin.php";
        </script>';
        exit;
    }

    if (strlen($password) < $min_length || strlen($password) > $max_length) {
        echo '<script>
        alert("Password harus memiliki panjang antara ' . $min_length . ' dan ' . $max_length . ' karakter.");
        window.location.href="loginadmin.php";
        </script>';
        exit;
    }

    // Validasi username harus mengandung angka, huruf, dan karakter spesial tanpa spasi
    if (!preg_match('/^[A-Za-z0-9@$!%*#?&]+$/', $username)) {
        echo '<script>
        alert("Username hanya boleh mengandung angka, huruf, dan karakter spesial (@$!%*#?&) tanpa spasi.");
        window.location.href="loginadmin.php";
        </script>';
        exit;
    }

    // Validasi password harus mengandung angka, huruf, karakter spesial, dan tidak boleh ada spasi
    if (!preg_match('/^(?=.*[0-9])(?=.*[A-Za-z])(?=.*[@$!%*#?&])[\S]+$/', $password)) {
        echo '<script>
        alert("Password harus mengandung angka, huruf, karakter spesial (@$!%*#?&), dan tidak boleh ada spasi.");
        window.location.href="loginadmin.php";
        </script>';
        exit;
    }

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$hashed_password'";
    $query = mysqli_query($conn, $sql);

    if (mysqli_num_rows($query) > 0) {
        $queryResult = mysqli_fetch_array($query);
        $_SESSION["id_user"] = $queryResult['id_user'];
        $_SESSION["username"] = $queryResult['username'];
        $_SESSION["password"] = $queryResult['password'];
        $_SESSION["level"] = $queryResult['level'];
        $_SESSION["email_admin"] = $queryResult['email_admin'];
        $_SESSION["foto_admin"] = $queryResult['foto_admin'];
        $_SESSION["status"] = $queryResult['status'];
        $_SESSION["role_pegawai"] = 1;

        if ($queryResult['level'] == 'admin') {
            $redirect = $config['base_url'] . 'admin/index.php';
            header("Location: $redirect");
        } else {
            $redirect = $config['base_url'] . 'loginadmin.php?message=invalid';
            header("Location: $redirect");
        }
    } else {
        $redirect = $config['base_url'] . 'loginadmin.php?message=invalid';
        header("Location: $redirect");
    }
}
?>
