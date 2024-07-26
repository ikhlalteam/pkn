<?php
ini_set("display_errors", 0);
error_reporting(0);
date_default_timezone_set('Asia/Jakarta');
$server = "localhost";
$username = "root";
$password = "";
$database = "krisma";
$config['base_url'] = "http://localhost/krisma/";
$home_admin = $config['base_url'] . "admin/";

$conn = new mysqli($server, $username, $password, $database);


if ($conn->connect_errno) {
  echo "Failed to connect to MySQL: " . $conn->connect_error;
  exit();
}

function filter_injection($data)
{
  global $conn;
  $filter = mysqli_real_escape_string($conn, stripslashes(strip_tags(htmlspecialchars($data, ENT_QUOTES))));
  return $filter;
}

function dropdown_dinamis($name, $table, $field, $pk, $selected = null, $order = null, $required = false)
{
  global $conn;

  if ($required) {
    $is_required = 'required';
  } else {
    $is_required = '';
  }

  $cmb = "<select name='$name' class='form-control' $is_required>";
  if ($order) {
    $orderQuery = " ORDER BY $field $order";
  } else {
    $orderQuery = "";
  }

  $query = "SELECT * FROM $table" . $orderQuery;
  $result = mysqli_query($conn, $query);

  while ($row = mysqli_fetch_assoc($result)) {
    $cmb .= "<option value='" . $row[$pk] . "'";
    $cmb .= $selected == $row[$pk] ? " selected='selected'" : '';
    $cmb .= ">" . strtoupper($row[$field]) . "</option>";
  }

  $cmb .= "</select>";

  return $cmb;
}

// function average($arr){
// 	if (!is_array($arr)) return false;
// 	return array_sum($arr)/count($arr);
// }

// function cek_admin_session(){
// 	$level = $_SESSION[level];
// 	if ($level != 'admin' AND $cekakses <= '0'){
// 		echo "<script>document.location='index.php';</script>";
// 	}
// }
