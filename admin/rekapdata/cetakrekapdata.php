<?php 
include '../../config/koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
<<<<<<< HEAD
<title>SMK SDL </title>
=======
<title>SMK SDL</title>
>>>>>>> 9c8be2271a3a33871925f686978bf196bfe2924d
    <link rel="shortcut icon" href="<?= $config['base_url']; ?>images/logokrisma.png" />
</head>
<body>
<style type="text/css">
body {
font-family: arial; background-color : #ccc 
}
.bentukrekap {
width : 980px;margin:0 auto;background-color : #fff;height: auto ;padding: 20px;
}
table {
border-bottom : 5px solid # 000; padding: 2px
}
.tengah {
text-align : center;line-height: 5px;
}

 .tengahtablerekap{
 margin: 20px auto;
 border-collapse: collapse;
 }
 .tengahtablerekap th,
 .tengahtablerekap td{
 border: 1px solid #3c3c3c;
 padding: 5px 10px;

 }
.tengahtablerekap{
text-align: center;
}
hr {
    border: none;
    height: 1px;
    color: #333; 
    background-color: #333;
}
</style>
<div class = "bentukrekap">
<table width = "100%">
<tr>
  <td> <img src="../../images/logokrisma.png" width="120px"> </td>
  <td class = "tengah">
  <h2>LAPORAN HASIL REKAP DATA</h2>
   <h2>KESELURUHAN PRESENSI SISWA</h2>
<<<<<<< HEAD
      <h1>SMK SUNAN DRAJAT</h1>
      <b>KOMPLEK PONDOK PESANTREN SUNAN DRAJAT</b>
=======
      <h1>SMK SUNAN DRAJAT </h1>
      <b>KOMPLEK PONDOK PESANTREN SUNAN DRAJAT LAMONGAN</b>
>>>>>>> 9c8be2271a3a33871925f686978bf196bfe2924d
      <br>
      <hr>
  </td>
  
</tr>
</table>
<table class="tengahtablerekap">
<thead>
 <tr>
    <th>No</th>
    <th>Nama Siswa</th>
    <th>NIS</th>
    <th>Kelas</th>
    <th>Total Hadir</th>
    <th>Total Izin</th>
    <th>Total Sakit</th>
    <th>Total Tanpa Keterangan</th>
  </tr>
 </thead>
<tbody>
  <?php
                  $no = 1;
                  if (isset($_POST['do_filter'])) {
                    if (empty($_POST['id_kelas']) || empty($_POST['tgl_awal']) || empty($_POST['tgl_akhir'])) {
                      echo '<script>
                      alert("Silahkan pilih kelas dan tanggal yang valid!");
                      window.location.href="rekapdata.php"; 
                      </script>';
                      exit;
                    }

                    $filter_kelas = filter_injection($_POST['id_kelas']);
                    $tgl_awal = filter_injection($_POST['tgl_awal']);
                    $tgl_akhir = filter_injection($_POST['tgl_akhir']);

                    $query = mysqli_query($conn, "SELECT nomor_induk_siswa, nama_siswa, tb_kelas.kelas, id_siswa FROM `tb_siswa` JOIN tb_kelas ON tb_kelas.id_kelas = tb_siswa.id_kelas WHERE tb_kelas.id_kelas = '$filter_kelas'");
                    $filter_presensi = " AND DATE(tb_presensi.tanggal_presensi) BETWEEN '$tgl_awal' AND '$tgl_akhir'";
                  } else {
                    $query = mysqli_query($conn, 'SELECT nomor_induk_siswa, nama_siswa, tb_kelas.kelas, id_siswa FROM `tb_siswa` JOIN tb_kelas ON tb_kelas.id_kelas = tb_siswa.id_kelas');
                    $filter_presensi = "";
                  }
                  while ($row = mysqli_fetch_array($query)) {
                    $id_siswa = $row['id_siswa'];
                    $query_presensi = mysqli_query($conn, "SELECT 
                    SUM(CASE WHEN kehadiran = 'hadir' THEN 1 ELSE 0 END) AS total_hadir,
                    SUM(CASE WHEN kehadiran = 'izin' THEN 1 ELSE 0 END) AS total_izin,
                    SUM(CASE WHEN kehadiran = 'sakit' THEN 1 ELSE 0 END) AS total_sakit,
                    SUM(CASE WHEN kehadiran = 'tanpa keterangan' THEN 1 ELSE 0 END) AS total_tanpa_keterangan
                    FROM tb_presensi
                    WHERE id_siswa = '$id_siswa' $filter_presensi");
                    $row_presensi = mysqli_fetch_array($query_presensi);
                  ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?php echo $row['nama_siswa'] ?></td>
                      <td><?php echo $row['nomor_induk_siswa'] ?></td>
                      <td><?php echo $row['kelas'] ?></td>
                      <td><?php echo (int)$row_presensi['total_hadir'] ?></td>
                      <td><?php echo (int)$row_presensi['total_izin'] ?></td>
                      <td><?php echo (int)$row_presensi['total_sakit'] ?></td>
                      <td><?php echo (int)$row_presensi['total_tanpa_keterangan'] ?></td>
                    </tr>
                  <?php } ?>
</tbody>
</div>
<script>
 window.print();
 </script>
</body>
</html>
