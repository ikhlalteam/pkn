<?php
include '../../../config/koneksi.php';
$data = json_decode(file_get_contents('php://input'), true);

if (isset($data)) {
    // untuk mengurutkan dari urutan angka yang terkecil ke terbesar
    function sortByOrder($a, $b)
    {
        return $a['urutan_halaman'] - $b['urutan_halaman'];
    }

    $id = $data['id'];
    $nama_role = $data['nama_role'];
    $select_roles = @$data['select_role'];
    $check_all = @$data['chk'];

    // if (@count($select_roles) >= 999) {
    //   $check_all = 'all';
    // }

    if (isset($check_all) && $check_all == 'all') {
        $query = mysqli_query($conn, "SELECT parent_halaman, subparent_halaman, directory_halaman, urutan_halaman, tampil_halaman, icon_halaman FROM tb_halaman ORDER BY parent_halaman, subparent_halaman, urutan_halaman");
        while ($row = mysqli_fetch_array($query,  MYSQLI_ASSOC)) {
            $array_halaman_nya[] = $row;
        }
        usort($array_halaman_nya, 'sortByOrder');
        $list_halaman = json_encode($array_halaman_nya);
    } else {
        if (count($select_roles) == 0) {
            echo "centang dulu";
            exit;
        }
        foreach ($select_roles as $select_role) {
            $pecah = explode("|", $select_role);
            $parent_halaman = $pecah[0];
            $subparent_halaman = $pecah[1];
            $directory_halaman = $pecah[2];
            $urutan_halaman = $pecah[3];
            $tampil_halaman = $pecah[4];
            $icon_halaman = $pecah[5];
            $array_halaman_nya[] = [
                'parent_halaman' => $parent_halaman,
                'subparent_halaman' => $subparent_halaman,
                'directory_halaman' => $directory_halaman,
                'urutan_halaman' => $urutan_halaman,
                'tampil_halaman' => $tampil_halaman,
                'icon_halaman' => $icon_halaman
            ];
        }
        @usort($array_halaman_nya, 'sortByOrder');
        $list_halaman = json_encode($array_halaman_nya);
    }

    $query_nama_role = mysqli_query($conn, "select * from tb_role where nama_role = '$nama_role'");
    if (mysqli_num_rows($query_nama_role) > 1) {
        echo "sudah ada";
        exit;
    } else {
        $query_update = mysqli_query($conn, "UPDATE tb_role SET nama_role = '$nama_role', halaman = '$list_halaman' WHERE id_role='$id'");
        if ($query_update) {
            // proses generate html json
            $id_role = mysqli_insert_id($conn);
            $array_parent = [];
            foreach ($array_halaman_nya as $row_halamannya) {
                if ($row_halamannya['tampil_halaman'] == 'Ya') {
                    $array_parent[] = $row_halamannya['parent_halaman'];
                }
            }

            sort($array_parent);
            $col_parent = array_unique($array_parent);
            $col_subparent = array_unique(array_column($array_halaman_nya, 'subparent_halaman'));
            $col_directory = array_unique(array_column($array_halaman_nya, 'directory_halaman'));
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

                    foreach ($array_halaman_nya as $halaman) {
                        $parent_halaman = $halaman['parent_halaman'];
                        $subparent_halaman = $halaman['subparent_halaman'];
                        $directory_halaman = $home_admin . $halaman['directory_halaman'];
                        $urutan_halaman = $halaman['urutan_halaman'];
                        $tampil_halaman = $halaman['tampil_halaman'];
                        $icon_halaman = ($halaman['icon_halaman'] == '') ? 'fa fa-arrow-right' : $halaman['icon_halaman'];

                        if ($parent_halaman == $parent && $tampil_halaman == 'Ya') {
                            $html_menu .= "<li class='nav-item'><a href='$directory_halaman' class='nav-link'><i class='$icon_halaman'></i> $subparent_halaman</a></li>";
                        }
                    }

                    $html_menu .= "
                    </ul>
                </li>";
                }
            }
            // END: looping semua yang punya parent + subparentnya //

            // START: looping yang hanya punya subparent //
            foreach ($array_halaman_nya as $halaman) {
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
                if ($parent_halaman == '' && $halaman['directory_halaman'] != 'index.php' && $tampil_halaman == 'Ya') {
                    $html_menu .= "<li class='nav-item'><a href='$directory_halaman' class='nav-link'><i class='$icon_halaman'></i> $subparent_halaman</a></li>";
                }
            }
            // END: looping yang hanya punya subparent //

            $open = fopen("../../menu-html/" . $id_role . ".json", "w");
            fwrite($open, $html_menu);
            fclose($open);
            // proses generate html json
            echo "sukses";
        } else {
            echo "gagal";
        }
    }
}
