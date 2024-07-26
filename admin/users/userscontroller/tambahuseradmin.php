<?php

if (isset($_POST['insert'])) {
    // Validasi input kosong
    if (empty($_POST['id_user']) ||empty($_POST['username']) || empty($_POST['password']) || empty($_POST['level']) || empty($_POST['email_admin'])) {
        echo '<script>
        alert("Semua field harus diisi!");
        window.location.href="user.php"; 
        </script>';
        exit;
    }

    // Validasi panjang input
    $min_id_user_length = 1;
    $max_id_user_length = 11;
    $min_username_length = 5; // Minimum panjang username
    $max_username_length = 20; // Maksimum panjang username
    $min_password_length = 8; // Minimum panjang password
    $max_password_length = 20; // Maksimum panjang password
    $max_email_length = 50; // Maksimum panjang email
    if (strlen($_POST['id_user']) < $min_id_user_length || strlen($_POST['id_user']) > $max_id_user_length) {
        echo '<script>
        alert("Panjang ID User harus antara ' . $min_id_user_length . ' dan ' . $max_id_user_length . ' karakter!");
        window.location.href="user.php"; 
        </script>';
        exit;
    }
    if (strlen($_POST['username']) < $min_username_length || strlen($_POST['username']) > $max_username_length) {
        echo '<script>
        alert("Panjang username harus antara ' . $min_username_length . ' dan ' . $max_username_length . ' karakter!");
        window.location.href="user.php"; 
        </script>';
        exit;
    }

    if (strlen($_POST['password']) < $min_password_length || strlen($_POST['password']) > $max_password_length) {
        echo '<script>
        alert("Panjang password harus antara ' . $min_password_length . ' dan ' . $max_password_length . ' karakter!");
        window.location.href="user.php"; 
        </script>';
        exit;
    }

    if (strlen($_POST['email_admin']) > $max_email_length) {
        echo '<script>
        alert("Panjang email tidak boleh melebihi ' . $max_email_length . ' karakter!");
        window.location.href="user.php"; 
        </script>';
        exit;
    }

    // validasi password
    if (!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{' . $min_password_length . ',}$/', $_POST['password'])) {
        echo '<script>
        alert("Password harus mengandung setidaknya satu angka, satu huruf kecil, dan satu huruf besar, serta memiliki panjang minimal ' . $min_password_length . ' karakter!");
        window.location.href="user.php"; 
        </script>';
        exit;
    }
    // validasi password

    $dataSiswaSqlInsert = " INSERT INTO users (
        id_user,
        username, 
        password, 
        level,
        email_admin)
    VALUES( 
    '" . $_POST['id_user'] . "', 
    '" . $_POST['username'] . "', 
    md5('" . $_POST['password'] . "'), 
    '" . $_POST['level'] . "', 
    '" . $_POST['email_admin'] . "')";

    if (mysqli_query($conn, $dataSiswaSqlInsert)) {
        $redirect = $config['base_url'] . 'admin/users/user.php';
         echo '<script>
            alert("User Admin Baru berhasil ditambahkan!");
            window.location.href="' . $redirect . '"; 
            </script>';
        exit;
    }
}

if (isset($_POST['batal'])) {
    $redirect = $config['base_url'] . 'admin/users/user.php';
    echo '<script>
    window.location.href="' . $redirect . '"; 
    </script>';
    exit;
}
?>
