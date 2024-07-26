<?php
include("../header.php");
include("../sidebar.php");
?>
<script type="text/javascript">
	$(function() {
		$('form').on('submit', function(e) {
			$(this).before("<center><img src='images/hourglass.gif' alt='loading' /></center>").fadeOut();
		});
	});
</script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<br>
	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header">

							<?php
							if (($_GET['p']) !== 'auto') {
							?>
								<div>
									<?php
									echo '
										<h3>Device</h3>
										<table class="table table-condensed">
											<tr>
												<th>Server IP</th>
												<th>Server Port</th>
												<th>Device SN</th>
												<th></th>
											</tr>
											<tr>';
									$tampil = "SELECT * FROM tb_device";
									$sql = mysqli_query($conn, $tampil);
									while ($data = mysqli_fetch_array($sql)) {
										echo "
													<td>" . $data[server_IP] . "</td>
													<td>" . $data[server_port] . "</td>
													<td>" . $data[device_sn] . "</td>"; ?>
										<td><a href="content/action.php?id=<?php echo $data['No']; ?>" onclick="return confirm('delete this record ?');"><input class="btn btn-danger" type="submit" value="delete"></a></td>
										</tr>
								<?php
									}
								}
								echo '</table>';

								?>

								</div>


								<div class="card-body">
									<?php
									if (!isset($_GET['p'])) {
										include('content/home.php');
									} else {
										$page = $_GET['p'];
										$modul = $_GET['m'];
										include $modul . '/' . $page . ".php";
									} ?>
								</div>


						</div>
					</div>
				</div>
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