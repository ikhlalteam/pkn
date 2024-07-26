<?php
error_reporting(E_ALL);
include('../config/koneksi.php');

function fix_url($str)
{
    if (strpos($str, "./") !== false) {
        $str = str_replace("./", "", $str);
        return $str;
    } else {
        return $str;
    }
}

function fix_subparent($str)
{
    if ($str == ".") {
        $str = "Beranda";
        return $str;
    } else {
        $pecah = explode("/", $str);
        $str = $pecah[1];
        $str = fix_url($str);
        $str = str_replace("-", " ", $str);
        $str = str_replace("_", " ", $str);
        $str = ucwords($str);
        return $str;
    }
}

function ambil_string($awal, $akhir, $string)
{
    $bagi1 = explode($awal, $string);
    $bagi2 = explode($akhir, $bagi1[1]);
    $hasil = $bagi2[0];
    return trim($hasil);
}

function listFolderFiles($dir)
{
    $ffs = scandir($dir);
    global $i, $list, $conn, $arrayhalaman, $perubahan, $jsonhalaman;
    foreach ($ffs as $ff) {
        if ($ff != '.' && $ff != '..' && ($ff != 'header.php') && ($ff != 'sidebar.php') && ($ff != 'footer.php') && ($ff != 'scandir.php') && (fix_url($dir . '/' . $ff) != 'index.php')) {
            if (strpos($ff, '.php')) {
                $list[$i]['directory'] = fix_url($dir . '/' . $ff);
                $list[$i]['subparent'] = fix_subparent($dir);

                if (in_array($list[$i]['directory'], $jsonhalaman)) {
                    echo "exists : " . $list[$i]['directory'] . "<br>";
                } else {
                    $subparent_halaman = $list[$i]['subparent'];
                    $directory_halaman = $list[$i]['directory'];
                    mysqli_query($conn, "INSERT INTO tb_halaman (parent_halaman, subparent_halaman, directory_halaman) VALUES ('', '$subparent_halaman', '$directory_halaman')");
                    echo "not exists : " . $list[$i]['directory'] . "<br>";
                    $perubahan++;
                }

                $directory_halaman = fix_url($dir . '/' . $ff);

                $list['all'][] = $directory_halaman;
                $i++;
            }

            if (is_dir($dir . '/' . $ff)) {
                listFolderFiles($dir . '/' . $ff);
            }
        }
    }
    return $list;
}

// Refresh dulu isi dari tb_halaman_lengkap, pastikan sudah update dengan tb_halaman
$query = mysqli_query($conn, 'SELECT directory_halaman FROM tb_halaman');
while ($row = mysqli_fetch_array($query)) {
    $list_directory[] = $row[0];
}
$json_list_directory = json_encode($list_directory);
$hapus_tb_halaman_lengkap = mysqli_query($conn, "truncate table tb_halaman_lengkap");
$insert_tb_halaman_lengkap = mysqli_query($conn, "INSERT INTO tb_halaman_lengkap (halaman) VALUES ('$json_list_directory')");
echo "List Halaman sudah siap!<hr>";
// Refresh dulu isi dari tb_halaman_lengkap, pastikan sudah update dengan tb_halaman

$query = mysqli_query($conn, "select * from tb_halaman_lengkap");
$datastmtselectjson = mysqli_fetch_array($query);
$jsonhalaman = json_decode($datastmtselectjson['halaman'], 1);
$perubahan = 0;

$list = array();
$i = 0;
$dir    = './';
$files = array();
$files = listFolderFiles(dirname($dir));
if ($perubahan > 0) {
    $arrayhalaman = json_encode($files['all']);
    $hapus_tb_halaman_lengkap = mysqli_query($conn, "truncate table tb_halaman_lengkap");

    $insert_tb_halaman_lengkap = mysqli_query($conn, "INSERT INTO tb_halaman_lengkap (halaman) VALUES ('$arrayhalaman')");
}
