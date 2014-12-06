<?php
	require_once("includes/db_connection.php");
	session_start();

	$sql = "SELECT username FROM admins";
		$hasil = mysqli_query($koneksi,$sql);
		
		$a = mysqli_num_rows($hasil);
		for($i=1; $i<=$a; $i++){
			$baris = mysqli_fetch_assoc($hasil);
			if($_SESSION['login'] == $baris['username']){
				$a = $_SESSION['login'];
?>
		<!DOCTYPE html>
			<html>
			<head>
				<title>Admin Menu</title>
				<link rel='stylesheet' type='text/css' href='stylesheet/admin.css'/>
			</head>
			<body>
			<div id='bungkus_admin_menu'>
				<div id='header'>
					<h2>Admin Menu</h2>
				</div><!--#header-->
				<div id='konten_admin_menu'>
					<h2><marquee behavior='ALTERNATE'>Welcome  <?php echo $a; ?></marquee></h2>
					<table>
						<tr>
							<td>
								<a href='manage_content.php'>Manage Content</a>
							</td>
							<td>
								<a href='manage_admin.php'>Manage User</a>
							</td>
							<td>
								<a href='logout.php'>Logout</a>
							</td>
						</tr>
					</table>
				</div><!--#konten_admin_menu-->
			</div><!--#bungkus_admin_menu-->
			</body>
		</html>
<?php
	}
	else{
		/*echo "<script>";
		echo "alert('Login gagal, cek kembali username dan password Anda!')";
		echo "</script>";*/
		header("Location:login.php");
		
	}
}
 ?>