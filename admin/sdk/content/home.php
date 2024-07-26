<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Device</title>
  <link rel="stylesheet" href="path/to/your/bootstrap.css">
  <script src="path/to/your/jquery.js"></script>
  <script src="path/to/your/bootstrap.js"></script>
  <script>
    function validateForm() {
      var serverIP = document.forms["deviceForm"]["i_serverIP"].value;
      var serverPort = document.forms["deviceForm"]["i_serverPort"].value;
      var devSN = document.forms["deviceForm"]["i_devSN"].value;
      
      if (serverIP == "" || serverPort == "" || devSN == "") {
        alert("All fields must be filled out");
        return false;
      }
      return true;
    }
  </script>
</head>
<body>

<form name="deviceForm" method="post" action="content/action.php" onsubmit="return validateForm()">
<?php 
include '../../../config/koneksi.php';
$sql = mysqli_query($conn,"SELECT * FROM tb_device");
$jml = mysqli_num_rows($sql);
if ($jml > 0) { 
  // Optional: You might want to add some additional logic or content here
} else {
  echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add Device</button>';
}
?>
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog modal-sm">
  <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Device</h4>
      </div>
      <div class="modal-body">
        <label>Server IP</label>
        <div class="input-group">
          <span class="input-group-addon">http://</span>
          <input name="i_serverIP" type="text" class="form-control">
        </div>
        <label>Server Port</label>
        <input name="i_serverPort" type="text" class="form-control">
        <label>Device SN</label>
        <input name="i_devSN" type="text" class="form-control">
      </div>
      <div class="modal-footer">
        <input class="btn btn-info" type="submit" name="b_addDev" value="Save">
        <button class="btn btn-info" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
</form>

</body>
</html>
