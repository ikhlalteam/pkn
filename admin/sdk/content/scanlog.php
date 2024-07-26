<?php
include '../../../config/koneksi.php';
$sqldev = mysqli_query($conn, "SELECT * FROM tb_device");

function webservice($port, $url, $parameter)
{
	$curl = curl_init();
	set_time_limit(0);
	curl_setopt_array(
		$curl,
		array(
			CURLOPT_PORT => $port,
			CURLOPT_URL => "http://" . $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => $parameter,
			CURLOPT_HTTPHEADER => array(
				"cache-control: no-cache",
				"content-type: application/x-www-form-urlencoded"
			),
		)
	);
	$response = curl_exec($curl);
	$err = curl_error($curl);
	curl_close($curl);
	if ($err) {
		$response = ("Error #:" . $err);
	} else {
		$response;
	}
	return $response;
}

function CreateUserJSON()
{

	$header = '{"Result":true,"Data":[';
	$footer = "]}";
	$content = "";
	$sqlscan = mysqli_query($conn, "SELECT * FROM tb_scanlog");

	while ($datascan = mysqli_fetch_array($sqlscan)) {

		if ($content != "") {
			$content = $content . ',';
		}

		$content = $content . '{"no":"' . $i . '","sn":"' . $datascan[sn] . '","scan_date":"' . $datascan[scan_date] . '","pin":"' . $datascan[pin] .
			'","verifymode":' . $datascan[verifymode] . '","iomode":"' . $datascan[iomode] . '","workcode":"' . $datascan[workcode] . '}';
	}

	return ($header . $content . $footer);
}

function viewScan($conn)
{
	$sqlscan = mysqli_query($conn, "SELECT * FROM tb_scanlog");
	$jml = mysqli_num_rows($sqlscan);
	$i = 0;
	echo '
	<h3>Data Scanlog <span class="badge badge-info">' . $jml . '</span></h3>';
	while ($datascan = mysqli_fetch_array($sqlscan)) {
		$i++;
		echo "
		<td>" . $i . "</td>
		<td>" . $datascan[sn] . "</td>
		<td>" . $datascan[scan_date] . "</td>
		<td>" . $datascan[pin] . "</td>
		<td>" . $datascan[verifymode] . "</td>
		<td>" . $datascan[iomode] . "</td>
		<td>" . $datascan[workcode] . "</td>
		</tr>";
	}
	echo '
	</table>
	';
}
?>
<br>
<form method="post" action="index.php?m=content&p=scanlog">
	<div class="row">
		<div class="col-sm-2"><input type="submit" class="btn btn-primary btn-block" name="b_allScan" value="Get All Scanlog"></div>
		<div class="col-sm-2"><input type="submit" class="btn btn-primary btn-block" name="b_getNewScan" value="Get New Scanlog"></div>
		<div class="col-sm-2"><input type="submit" class="btn btn-primary btn-block" name="b_delScan" value="Delete Scanlog"></div>
		<div class="col-sm-2"><input type="submit" class="btn btn-primary btn-block" name="b_delScanDB" value="Clear Scanlog DB"></div>

	</div>

	<br>



	<table class="table table-hover">
		<tr>
			<th>No</th>
			<th>Serial Number</th>
			<th>Scan Date</th>
			<th>PIN</th>
			<th>Verify Mode</th>
			<th>IO Mode</th>
			<th>Work Code</th>
		</tr>
		<tr>

</form>

<?php
if (isset($_POST['b_delScanDB'])) {
	$querydel	= mysqli_query($conn, "delete from tb_scanlog");
	if ($querydel) {
		header("location: index.php?m=content&p=scanlog");
	} else {
		echo '<script>alert ("Failed !")</script>';
	}
}

if ($datadev = mysqli_fetch_array($sqldev)) {

	/*if((isset($_POST['b_allScan'])) or (isset($_POST['b_delScan'])) or (isset($_POST['b_getNewScan']))){	
		if(isset($_POST['b_allScan'])){
			$url = $datadev[server_IP]."/scanlog/all/paging";
		}elseif (isset($_POST['b_delScan'])){
			$url = $datadev[server_IP]."/scanlog/del";
		}elseif (isset($_POST['b_getNewScan'])){
			$url = $datadev[server_IP]."/scanlog/new";
		}		
	}*/

	$sn = $datadev[device_sn];
	$port = $datadev[server_port];
	$parameter = "sn=" . $sn;

	if (isset($_POST['b_allScan'])) {

		$tgl_sekarang = date('Y-m-d');
		$session = true;
		$delSession = true;
		$pagingLimit = $_POST['i_pagingGetLog'];

		$url = $datadev[server_IP] . "/scanlog/all/paging";

		while ($session) {

			$parameter = "sn=" . $sn . "&limit=" . $pagingLimit;
			$server_output = webservice($port, $url, $parameter);
			$content = json_decode($server_output);

			// $arrayContent = [
			// 	'Data' => [
			// 		[
			// 			'SN' => 1111,
			// 			'ScanDate' => date('Y-m-d H:i:s'),
			// 			'PIN' => '72201920',
			// 			'VerifyMode' => '1',
			// 			'IOMode' => '0',
			// 			'WorkCode' => '0',
			// 		],
			// 		[
			// 			'SN' => 2222,
			// 			'ScanDate' => date('Y-m-d H:i:s'),
			// 			'PIN' => '1111',
			// 			'VerifyMode' => '1',
			// 			'IOMode' => '0',
			// 			'WorkCode' => '0',
			// 		],
			// 		[
			// 			'SN' => 3333,
			// 			'ScanDate' => date('Y-m-d H:i:s'),
			// 			'PIN' => '1234',
			// 			'VerifyMode' => '1',
			// 			'IOMode' => '0',
			// 			'WorkCode' => '0',
			// 		]
			// 	],
			// 	'IsSession' => false
			// ];
			// $encodeArray = json_encode($arrayContent);
			// $content = json_decode($encodeArray);


			if (count($content->Data) > 0) {

				if ($delSession) {
					$querydel = mysqli_query($conn, "delete from tb_scanlog");

					if ($querydel) {
					} else {
						echo '<script>alert ("Failed !")</script>';
					}

					$delSession = false;
				}

				foreach ($content->Data as $entry) {
					$Jsn = $entry->SN;
					$Jsd = $entry->ScanDate;
					$Jpin = $entry->PIN;
					$Jvm = $entry->VerifyMode;
					$Jim = $entry->IOMode;
					$Jwc = $entry->WorkCode;
					$sqlinsertscan	= 'insert into tb_scanlog (sn,scan_date,pin,verifymode,iomode,workcode) values ("' . $Jsn . '","' . $Jsd . '","' . $Jpin . '","' . $Jvm . '","' . $Jim . '","' . $Jwc . '")';
					$queryinsert	= mysqli_query($conn, $sqlinsertscan);
					/*if($queryinsert){
						}else{
							echo '<script>alert ("Failed !")</script>';
						}*/


					if ($entry->VerifyMode == 1) {
						// cek dulu, apakah PIN sudah sama dengan NIS yang terdaftar
						$queryCekSiswa = mysqli_query($conn, "SELECT * FROM tb_siswa WHERE nomor_induk_siswa = '$entry->PIN'");
						$rowCekSiswa = mysqli_fetch_array($queryCekSiswa);
						$jmlCekSiswa = mysqli_num_rows($queryCekSiswa);
						if ($jmlCekSiswa > 0) {
							// Jika sudah pastikan juga hari ini dia belum presensi
							$queryCekPresensi = mysqli_query($conn, "SELECT * FROM tb_presensi WHERE id_siswa = '" . $rowCekSiswa['id_siswa'] . "' AND id_jadwal = '999' AND DATE(tanggal_presensi) = '$tgl_sekarang'");
							$rowCekPresensi = mysqli_fetch_array($queryCekPresensi);
							$jmlCekPresensi = mysqli_num_rows($queryCekPresensi);
							if ($jmlCekPresensi == 0) {
								// jika belum, maka lakukan insert ke tb_presensi
								$insertPresensi	= "insert into tb_presensi (tanggal_presensi, id_siswa, id_jadwal, kehadiran, surat_izin) VALUES ('" . date('Y-m-d H:i:s') . "', '" . $rowCekSiswa['id_siswa'] . "', '999', 'hadir', '')";
								mysqli_query($conn, $insertPresensi);
							}
						}
					}
				}
			}

			if ($content->IsSession != $session) {
				$namafile = "JSOnDataScanLog.txt";
				$handle = fopen("content/" . $namafile, "w");
				if (!$handle) {
					$server_output = "Filed Save";
				} else {
					fwrite($handle, CreateUserJSON());
					$dirname = dirname($path) . "/JSOnDataScanLog.txt";
				}
				fclose($handle);
			}
			$session = $content->IsSession;
		}
	} elseif (isset($_POST['b_getNewScan'])) {

		$tgl_sekarang = date('Y-m-d');

		$url = $datadev[server_IP] . "/scanlog/new";
		$parameter = "sn=" . $sn;
		$server_output = webservice($port, $url, $parameter);

		$content = json_decode($server_output);

		foreach ($content as $key => $value) {
			if ((!is_array($value)) and ($value == 1)) {
				$querydel	= mysqli_query($conn, "delete from tb_scanlog");
				if ($querydel) {
				} else {
					echo '<script>alert ("Failed !")</script>';
				}
				foreach ($content->Data as $entry) {
					$Jsn = $entry->SN;
					$Jsd = $entry->ScanDate;
					$Jpin = $entry->PIN;
					$Jvm = $entry->VerifyMode;
					$Jim = $entry->IOMode;
					$Jwc = $entry->WorkCode;
					$sqlinsertscan	= 'insert into tb_scanlog (sn,scan_date,pin,verifymode,iomode,workcode) values ("' . $Jsn . '","' . $Jsd . '","' . $Jpin . '","' . $Jvm . '","' . $Jim . '","' . $Jwc . '")';
					$queryinsert	= mysqli_query($conn, $sqlinsertscan);

					if ($entry->VerifyMode == 1) {
						// cek dulu, apakah PIN sudah sama dengan NIS yang terdaftar
						$queryCekSiswa = mysqli_query($conn, "SELECT * FROM tb_siswa WHERE nomor_induk_siswa = '$entry->PIN'");
						$rowCekSiswa = mysqli_fetch_array($queryCekSiswa);
						$jmlCekSiswa = mysqli_num_rows($queryCekSiswa);
						if ($jmlCekSiswa > 0) {
							// Jika sudah pastikan juga hari ini dia belum presensi
							$queryCekPresensi = mysqli_query($conn, "SELECT * FROM tb_presensi WHERE id_siswa = '" . $rowCekSiswa['id_siswa'] . "' AND id_jadwal = '999' AND DATE(tanggal_presensi) = '$tgl_sekarang'");
							$rowCekPresensi = mysqli_fetch_array($queryCekPresensi);
							$jmlCekPresensi = mysqli_num_rows($queryCekPresensi);
							if ($jmlCekPresensi == 0) {
								// jika belum, maka lakukan insert ke tb_presensi
								$insertPresensi	= "insert into tb_presensi (tanggal_presensi, id_siswa, id_jadwal, kehadiran, surat_izin) VALUES ('" . date('Y-m-d H:i:s') . "', '" . $rowCekSiswa['id_siswa'] . "', '999', 'hadir', '')";
								mysqli_query($conn, $insertPresensi);
							}
						}
					}

					if ($queryinsert) {
					} else {
						echo '<script>alert ("Failed !")</script>';
					}
				}
			} elseif ((!is_array($value)) and (!$value == 1)) {
			}
		}
	} elseif (isset($_POST['b_delScan'])) {

		$url = $datadev[server_IP] . "/scanlog/del";
		$server_output = webservice($port, $url, $parameter);
	}
} else {
	if ((isset($_POST['b_allScan'])) or (isset($_POST['b_delScan'])) or (isset($_POST['b_getNewScan']))) {
		echo '
		<div class="col-sm-12"><br><div class="alert alert-danger">Please Insert Data Device</div></div>';
	}
}
echo viewScan($conn), '<textarea class="form-control" placeholder="Result" readonly="readonly">' . $server_output . "</textarea>";
?>