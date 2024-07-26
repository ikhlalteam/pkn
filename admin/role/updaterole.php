<?php
include("../header.php");
include("../sidebar.php");
$sqlupdate = "SELECT * FROM tb_role where id_role='" . filter_injection($_GET['id_role'])  . "'";
$query = mysqli_query($conn, $sqlupdate);
if (mysqli_num_rows($query) > 0) {
    $queryResult = mysqli_fetch_array($query);
}
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Master Data Role</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">Data Role</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">Role</h3>
                        </div>
                        <div class="card-body p-0">

                            <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css"> -->
                            <link rel="stylesheet" href="style-toggle.css">
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
                            <script type="text/javascript" src="simpletreemenu.js"></script>
                            <link rel="stylesheet" type="text/css" href="simpletree.css">
                            <style type="text/css">
                                #dis {
                                    display: none;
                                }
                            </style>

                            <div id="dis">

                            </div>

                            <form id='formnya' onsubmit="return posting(event);">
                                <input type='hidden' name='id' id="id" value='<?php echo $queryResult['id_role']; ?>' />
                                <table class='table table-bordered'>
                                    <tr>
                                        <td>Masukan Nama Role: </td>
                                        <td><input type='text' name='nama_role' id="nama_role" class='form-control' placeholder="Masukan Nama Role" value="<?php echo $queryResult['nama_role']; ?>" required /></td>
                                    </tr>
                                    <tr>
                                        <td>Full administrator?</td>
                                        <td><label class='tgl tgl-gray' style='font-size:20px'>
                                                <input type="checkbox" name="chk" id="chk" onchange="checkAll(this)" value="all">
                                                <span data-on="Iya" data-off="Tidak"></span>
                                            </label></td>
                                    </tr>
                                </table>
                                <hr>
                                <ul id="treemenu1" class="treeview">
                                    <?php
                                    function get_subparent($parent = '')
                                    {
                                        global $conn, $queryResult;
                                        $query = mysqli_query($conn, "SELECT id_halaman, subparent_halaman FROM tb_halaman WHERE parent_halaman = '$parent' GROUP BY subparent_halaman");

                                        $array_checked = json_decode($queryResult['halaman'], 1);
                                        $array_checked = @array_column($array_checked, 'directory_halaman');

                                        while ($row_subparent = mysqli_fetch_array($query)) {
                                            $id_halaman = $row_subparent['id_halaman'];
                                            $subparent = $row_subparent['subparent_halaman'];
                                            echo "<li>$subparent <label class='tgl tgl-gray' style='font-size:10px'>
          <input type=\"checkbox\" name=\"select_role[]\" class=\"row_role\" data-subparent=\"$subparent\" id=\"$id_halaman\" onclick=\"selectSubParent('$id_halaman','$subparent')\">
          <span>&nbsp;&nbsp;</span>
          </label><ul>";
                                            $query_dir = mysqli_query($conn, "SELECT * FROM tb_halaman WHERE subparent_halaman = '$subparent'");
                                            while ($row_dir = mysqli_fetch_array($query_dir)) {
                                                $id_halaman = $row_dir['id_halaman'];
                                                $parent_halaman = $row_dir['parent_halaman'];
                                                $subparent_halaman = $row_dir['subparent_halaman'];
                                                $tampil_halaman = $row_dir['tampil_halaman'];
                                                $urutan_halaman = $row_dir['urutan_halaman'];
                                                $icon_halaman = $row_dir['icon_halaman'];
                                                $dir_halaman = $row_dir['directory_halaman'];

                                                if (@in_array($dir_halaman, $array_checked)) {
                                                    $checked = 'checked';
                                                } else {
                                                    $checked = '';
                                                }

                                                echo "<li>$dir_halaman <label class='tgl tgl-gray' style='font-size:10px'>
            <input type='checkbox' name='select_role[]' class=\"row_role\" id='$id_halaman' value='$parent_halaman|$subparent_halaman|$dir_halaman|$urutan_halaman|$tampil_halaman|$icon_halaman' data-subparent='$subparent_halaman' $checked>
            <span>&nbsp;&nbsp;</span>
            </label></li>";
                                            }
                                            echo "</ul></li>";
                                        }
                                    }

                                    // khusus yang punya parent
                                    $query = mysqli_query($conn, "SELECT parent_halaman FROM tb_halaman WHERE parent_halaman != '' GROUP BY parent_halaman");
                                    while ($row_parent = mysqli_fetch_array($query)) {
                                        $parent = $row_parent['parent_halaman'];
                                        echo "<li>$parent<ul>";
                                        get_subparent($parent);
                                        echo "</ul></li>";
                                    }
                                    // khusus yang punya parent

                                    // khusus yang tidak punya parent
                                    get_subparent();
                                    // khusus yang tidak punya paren
                                    ?>
                                </ul>

                                <button type="submit" class="btn btn-primary form-control" name="btn-update" id="btn-update" style="width: 100%;height:50px;position: fixed;bottom: 0;margin: 0px;left: 0px;right: 0px;padding-top: 9px;z-index:1;">
                                    <span class="glyphicon glyphicon-plus text-center"></span> Save Updates
                                </button>
                            </form>

                            <script type="text/javascript">
                                ddtreemenu.createTree("treemenu1", true);
                            </script>

                            <script type="text/javascript">
                                function checkAll(ele) {
                                    var checkboxes = document.getElementsByTagName('input');
                                    if (ele.checked) {
                                        for (var i = 0; i < checkboxes.length; i++) {
                                            if (checkboxes[i].type == 'checkbox' && checkboxes[i].name != 'chk') {
                                                checkboxes[i].disabled = true;
                                                $('#treemenu1').hide();
                                            }
                                        }
                                    } else {
                                        for (var i = 0; i < checkboxes.length; i++) {
                                            if (checkboxes[i].type == 'checkbox' && checkboxes[i].name != 'chk') {
                                                checkboxes[i].disabled = false;
                                                $('#treemenu1').show();
                                            }
                                        }
                                    }
                                }
                            </script>
                            <script>
                                function selectSubParent(idhalaman, subparent) {
                                    if (subparent != 'System Produksi') {
                                        if ($('[id="' + idhalaman + '"]').prop("checked") == false) {
                                            $('[data-subparent="' + subparent + '"]').prop('checked', false);
                                            // jika sudah terceklist, tidak ada apa-apa
                                        } else {
                                            $('[data-subparent="' + subparent + '"]').prop('checked', true);
                                        }
                                    }
                                }
                            </script>

                            <script>
                                function posting(e) {
                                    e.preventDefault();
                                    // var selected = $(".row_role").attr("checked", "true");
                                    // var selected = $('.row_role:checkbox:checked');
                                    var selected = [];
                                    $('.row_role:input:checked').each(function() {
                                        selected.push($(this).attr('value'));
                                    });

                                    // var datastring = $("#formnya").serialize();
                                    // console.log(datastring);
                                    var jsonnya = Object.assign({}, selected);
                                    var id = $('#id').val();
                                    var nama_role = $('#nama_role').val();
                                    var chk = $('#chk:checked').val();

                                    $.ajax({
                                        url: 'rolecontroller/updaterolecontroller.php',
                                        type: "POST",
                                        processData: false,
                                        data: JSON.stringify({
                                            id: id,
                                            nama_role: nama_role,
                                            chk: chk,
                                            select_role: jsonnya
                                        }),
                                        // dataType: 'json',
                                        success: function(data, textStatus, jQxhr) {
                                            if (data == 'sukses') {
                                                alert("Berhasil disimpan, Role Anda akan direload terlebih dahulu!");
                                                window.location.href = "reload.php";
                                                return true;
                                            } else if (data == 'gagal') {
                                                alert("Gagal disimpan!");
                                                window.location.href = "index.php";
                                                return false;
                                            } else if (data == 'sudah ada') {
                                                alert("Nama Role ini sudah ada!");
                                                return false;
                                            } else if (data == 'centang dulu') {
                                                alert("Minimal centang 1 halaman terlebih dahulu!");
                                                return false;
                                            }
                                            console.log(data);
                                        },
                                        error: function(jqXhr, textStatus, errorThrown) {
                                            console.log(data);
                                            alert("Gagal disimpan!");
                                            return false;
                                        }
                                    });
                                }
                            </script>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include("../footer.php");
?>