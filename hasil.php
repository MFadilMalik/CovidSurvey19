<?php 
	session_start();
	if (isset($_POST['end'])) {
		session_destroy();
		echo "<script>document.location.href='index.php'</script>";
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Hasil</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<style type="text/css">
	.result{
		margin-top: 15%;
		background-color: #138496;
		padding: 2%;
	}
</style>
<body>
	<div class="result">
	<center>
	<h1><?php echo @$_SESSION['nama']; ?>,</h1>
	<h2>Tingkat resiko kamu terkena COVID-19 adalah <?php echo @$_SESSION['status'] ?></h2>
	<br>
	<a class="btn btn-info" href="end.php">Selesai</a>
	<br><br>
	<h6>Stay safe teman-teman</h6>
	<h6>#DiRumahAja</h6>
	</center>
	</div>
</body>
</html>