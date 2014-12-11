<!--filename: home.php-->
<?php
	require_once("includes/db_connection.php");
	$sql = "SELECT *FROM logo";
	$hasil = mysqli_query($koneksi,$sql);
	$baris = mysqli_fetch_assoc($hasil);
	
	
	$sql2 = "SELECT *FROM news ORDER BY news_id DESC";
	$hasil2 = mysqli_query($koneksi,$sql2);
	
	$sql3 = "SELECT *FROM gallery";
	$hasil3 = mysqli_query($koneksi,$sql3);
	
?>
<!DOCTYPE html>
	<html>
		<head>
			<title>Home</title>
			<link rel='stylesheet' href='stylesheet/style.css' />
		</head>
		<body>
			<div id='bungkus2'>
				<div id='header'>
					<div id='logo'>
						<img src='<?php echo $baris['gbr_logo'];?>' width="200px" height="200px"/>
						<!--<h1><center>LOGO</center></h1>-->
					</div>
					<div id='nama'>
						<center><img src="stylesheet/images/Kurnia.png"/></center>
						<!--<h1><center>NAMA</center></h1>-->
					</div>
				</div>