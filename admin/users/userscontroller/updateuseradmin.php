<?php


if (isset($_GET['id_user'])) {
    // $id_siswa= $_GET["id_siswa"];
    $sqlupdate = "SELECT * FROM users where id_user='" . $_GET['id_user'] . "'";
    $query = mysqli_query($conn, $sqlupdate);
    if (mysqli_num_rows($query) > 0) {
        $queryResult = mysqli_fetch_array($query);
    }
}
$error_messages = array();
if (isset($_POST['update'])) {
    if (empty($_POST['id_user']) ||empty($_POST['username']) || empty($_POST['password']) || empty($_POST['level']) || empty($_POST['email_admin'])) {
        $error_messages[] = "Semua field harus diisi!";
    }
    $field_lengths = array(
        'id_user' => array('min' => 1, 'max' => 11),
        'username' => array('min' => 5, 'max' => 20),
        'password' => array('min' => 8, 'max' => 50),
        'email_admin' => array('min' => 6, 'max' => 50)
       
    );
    foreach ($field_lengths as $field => $length) {
        $field_value = $_POST[$field];
        if (strlen($field_value) < $length['min'] || strlen($field_value) > $length['max']) {
            $error_messages[] = "Panjang " . ucfirst(str_replace('_', ' ', $field)) . " harus antara " . $length['min'] . " dan " . $length['max'] . " karakter!";
        }
    }
    if (!ctype_digit($_POST['id_user'])) {
        $error_messages[] = "Id User harus berupa angka!";
    }

    if (!preg_match('/^[A-Za-z0-9@$!%*#?&]+$/', $username)) {
        echo '<script>
        alert("Username hanya boleh mengandung angka, huruf, dan karakter spesial (@$!%*#?&) tanpa spasi.");
        window.location.href="updateuseradmin.php";
        </script>';
        exit;
    }

     // Validasi Email menggunakan filter bawaan PHP
    if (!filter_var($_POST['email_admin'], FILTER_VALIDATE_EMAIL)) {
        $error_messages[] = "Format Email tidak valid!";
    }

    if (empty($error_messages)) {
        $sql = " UPDATE users SET
        id_user='" . $_POST['id_user'] . "', 
        username='" . $_POST['username'] . "', 
        password= md5('" . $_POST['password'] . "'),
        level='" . $_POST['level'] . "', 
        email_admin='" . $_POST['email_admin'] . "'  
        WHERE id_user = '" . $_GET['id_user'] . "'";

        if (mysqli_query($conn, $sql)) {
            $redirect = $config['base_url'] . 'admin/users/user.php';
            echo '<script>
                alert("User berhasil diupdate!");
                window.location.href="' . $redirect . '"; 
                </script>';
            exit;
        } else {
            $error_messages[] = "Terjadi kesalahan saat memperbarui users.";
        }
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
