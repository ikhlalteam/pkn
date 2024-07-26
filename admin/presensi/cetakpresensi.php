<?php 
include '../../config/koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>KRISMA | PRESENSI</title>
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
  <h2>LAPORAN DATA PRESENSI SISWA</h2>
      <h1>SMK KRISTEN 5 KLATEN</h1>
      <b>Jln. Opak, Metuk, Tegalyoso, Klaten Selatan, Klaten, Jawa Tengah, Indonesia.</b>
      <hr>
  </td>
  
</tr>
</table>
<table class="tengahtablerekap">
<thead>
 <tr>
   <th>No.</th>
   <th>Waktu Presensi</th>
   <th>Nama Siswa</th>
   <th>Kehadiran</th>
 </tr>
 </thead>
<tbody>
  <?php
  $no=1;
  $query = mysqli_query($conn, 'SELECT * FROM tb_presensi
        JOIN tb_siswa ON tb_presensi.id_siswa = tb_siswa.id_siswa
        GROUP BY id_presensi');
  while ($row = mysqli_fetch_array($query)) {
  ?>
    <tr>
      <td><?php echo $no++ ?></td>
      <td><?php echo $row['tanggal_presensi'] ?></td>
      <td><?php echo $row['nama_siswa'] ?></td>
      <td><?php echo $row['kehadiran'] ?></td>
    </tr>
  <?php } ?>
</tbody>
</div>
<script>
 window.print();
 </script>
</body>
</html>