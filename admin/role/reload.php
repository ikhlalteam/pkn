<meta http-equiv="refresh" content="3; url=role.php">
<h1 style="text-align: center; color: green;">Anda akan dialihkan secara otomatis dalam 3 detik!</h1>
<hr>
<?php
include '../../config/koneksi.php';

function searchForUrl($url, $array)
{
    foreach ($array as $key => $val) {
        if ($val['directory_halaman'] === $url) {
            $arraynya = [
                'parent_halaman' => $val['parent_halaman'],
                'subparent_halaman' => $val['subparent_halaman'],
                'directory_halaman' => $val['directory_halaman'],
                'urutan_halaman' => $val['urutan_halaman'],
                'tampil_halaman' => $val['tampil_halaman'],
                'icon_halaman' => $val['icon_halaman']
            ];
            return $arraynya;
        }
    }
    return null;
}

// untuk mengurutkan dari urutan angka yang terkecil ke terbesar
function sortByOrder($a, $b)
{
    return $a['urutan_halaman'] - $b['urutan_halaman'];
}

// Flow:
// 1. get all page di tb_halaman, masukan ke variable
// 2. get all role di tb_role
// 3. looping tb_role, per role ambil halamannya. 
// 4. looping halaman, update informasi per halaman berdasarkan variable yang diambil pada point 1
// 5. simpan ke sebuah array, jadikan json lalu save lagi
// Note: sebelum disave ke db, maka generate juga html jsonnya

// 1. get all page di tb_halaman, masukan ke variable
$query_halaman_all = mysqli_query($conn, "SELECT * FROM tb_halaman");
while ($row = mysqli_fetch_array($query_halaman_all,  MYSQLI_ASSOC)) {
    $array_halaman_all[] = $row;
}
// 1. get all page di tb_halaman, masukan ke variable

// 2. get all role di tb_role
$query_role_all = mysqli_query($conn, "SELECT id_role, halaman FROM tb_role");
while ($row = mysqli_fetch_array($query_role_all,   MYSQLI_ASSOC)) {
    $array_role_all[] = $row;
}
// 2. get all role di tb_role

// 3. looping tb_role, per role ambil halamannya. 
foreach ($array_role_all as $row_role) {
    $halaman_checker = [];
    $array_update_halaman = [];
    $id_role = $row_role['id_role'];
    $halaman_role = $row_role['halaman'];
    $array_halaman = json_decode($halaman_role, 1);
    // 4. looping halaman, update informasi per halaman berdasarkan variable yang diambil pada point 1
    foreach ($array_halaman as $row_halaman) {
        $link_halaman =  $row_halaman['directory_halaman'];
        $get_update_halaman = searchForUrl($link_halaman, $array_halaman_all);
        $array_update_halaman[] = $get_update_halaman;
    }
    // 4. looping halaman, update informasi per halaman berdasarkan variable yang diambil pada point 1

    // 5. simpan ke sebuah array, jadikan json lalu save lagi

    usort($array_update_halaman, 'sortByOrder');

    // proses generate html json
    $array_parent = [];
    foreach ($array_update_halaman as $row_halamannya) {
        if ($row_halamannya['tampil_halaman'] == 'Ya') {
            $array_parent[] = $row_halamannya['parent_halaman'];
        }
    }

    sort($array_parent);
    $col_parent = array_unique($array_parent);
    $col_subparent = array_unique(array_column($array_update_halaman, 'subparent_halaman'));
    $col_directory = array_unique(array_column($array_update_halaman, 'directory_halaman'));
    $html_menu = '<li class="nav-item">
            <a href="' . $home_admin . 'index.php" class="nav-link">
                <i class="fa fa-home"></i> <span>Home</span>
            </a>
        </li>';

    // flownya:
    // 1. looping semua yang punya parent + subparentnya
    // 2. looping yang hanya punya subparent

    // START: looping semua yang punya parent + subparentnya //
    foreach ($col_parent as $parent) {
        if (!empty($parent)) {
            $html_menu .= "<li class='nav-item'>
                    <a href='#' class='nav-link'>
                        <i class='fa fa-cog'></i> <span>$parent </span>
                        <span class='pull-right-container'>
                            <i class='fa fa-angle-left pull-right'></i>
                        </span>
                    </a>
                    <ul class='nav nav-treeview'>";
            $arr_halaman_isi = [];
            $arr_halaman_desc = [];
            foreach ($array_update_halaman as $halaman) {
                $parent_halaman = $halaman['parent_halaman'];
                $subparent_halaman = $halaman['subparent_halaman'];
                $directory_halaman = $home_admin . $halaman['directory_halaman'];
                $urutan_halaman = $halaman['urutan_halaman'];
                $tampil_halaman = $halaman['tampil_halaman'];
                $icon_halaman = ($halaman['icon_halaman'] == '') ? 'fa fa-arrow-right' : $halaman['icon_halaman'];

                if (($parent_halaman == $parent && $tampil_halaman == 'Ya') && in_array($directory_halaman, $halaman_checker) == false) {
                    $arr_halaman_isi[] = $subparent_halaman;
                    $push_arr_desc = array(
                        'directory_halaman' => $directory_halaman
                    );
                    $arr_halaman_desc[$subparent_halaman] = $push_arr_desc;
                    // $html_menu .= "<li><a href='$directory_halaman'><i class='$icon_halaman'></i> $subparent_halaman $badge_count</a></li>";
                    // array_push($halaman_checker, $directory_halaman);
                }
            }
            sort($arr_halaman_isi);
            foreach ($arr_halaman_isi as $key => $value) {
                $deskripsi_halaman = $arr_halaman_desc[$value];
                $html_menu .= "<li class='nav-item'><a href='" . $deskripsi_halaman['directory_halaman'] . "'  class='nav-link'><i class='$icon_halaman'></i> " . $value . "</a></li>";
                array_push($halaman_checker, $deskripsi_halaman['directory_halaman']);
            }
            $html_menu .= "
                    </ul>
                </li>";
        }
    }
    // END: looping semua yang punya parent + subparentnya //

    // START: looping yang hanya punya subparent //
    $arr_halaman_isi = [];
    $arr_halaman_desc = [];
    foreach ($array_update_halaman as $halaman) {
        $parent_halaman = $halaman['parent_halaman'];
        $subparent_halaman = $halaman['subparent_halaman'];
        $directory_halaman = $home_admin . $halaman['directory_halaman'];
        $urutan_halaman = $halaman['urutan_halaman'];
        $tampil_halaman = $halaman['tampil_halaman'];
        $icon_halaman = ($halaman['icon_halaman'] == '') ? 'fa fa-cog' : $halaman['icon_halaman'];

        // tampilkan jika:
        // 1. parentnya kosong dan di urlnya ada kata "index" 
        // 2. subparentnya bukan Home dan directorynya bukan index.php
        // 3. bukan directory yang ada /pdf/, /chartjs/ nya => ini bakalan diganti dengan $tampil_halaman == 'Ya'
        if (($parent_halaman == '' && $tampil_halaman == 'Ya')  && in_array($directory_halaman, $halaman_checker) == false) {
            $arr_halaman_isi[] = $subparent_halaman;
            $push_arr_desc = array(
                'directory_halaman' => $directory_halaman
            );
            $arr_halaman_desc[$subparent_halaman] = $push_arr_desc;
            // $html_menu .= "<li><a href='$directory_halaman'><i class='fa fa-gear'></i> $subparent_halaman $badge_count</a></li>";
            // array_push($halaman_checker, $directory_halaman);
        }
    }

    sort($arr_halaman_isi);
    foreach ($arr_halaman_isi as $key => $value) {
        $deskripsi_halaman = $arr_halaman_desc[$value];
        $html_menu .= "<li class='nav-item'><a href='" . $deskripsi_halaman['directory_halaman'] . "' class='nav-link'><i class='$icon_halaman'></i> " . $value . "</a></li>";
        array_push($halaman_checker, $deskripsi_halaman['directory_halaman']);
    }

    // END: looping yang hanya punya subparent //

    $open = fopen("../menu-html/" . $id_role . ".json", "w");
    fwrite($open, $html_menu);
    fclose($open);
    // proses generate html json

    $json_update_halaman = json_encode($array_update_halaman);
    $query_update = mysqli_query($conn, "UPDATE tb_role SET halaman = '$json_update_halaman' WHERE id_role = '$id_role'");
    if ($query_update) {
        echo "Role dengan ID $id_role berhasil diupdate!<br>";
    } else {
        echo "Role dengan ID $id_role gagal diupdate!<br>";
    }
    // 5. simpan ke sebuah array, jadikan json lalu save lagi
}
// 3. looping tb_role, per role ambil halamannya. 

?>