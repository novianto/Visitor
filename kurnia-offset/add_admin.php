<?php 
	require_once("includes/db_connection.php");
	session_start(); 
		$b = $_SESSION['login'];
		$sql = "SELECT username FROM admins where username = '$b'";
		$hasil = mysqli_query($koneksi,$sql);
		
		if(mysqli_num_rows($hasil)==0){
			header("Location:login.php");
		}else{
			$baris = mysqli_fetch_assoc($hasil);
			if($_SESSION['login'] == $baris['username']){
?>
<?php
	if(isset($_POST["ADD"])){
		$User = $_POST["USER"];
		$User = mysqli_real_escape_string($koneksi,$User);
		
		$User_replace = str_replace(" ","",$User);
		
		$Pass = $_POST["PASS"];
		$format = "$2y$10$";
		$hash = "TsuxOptrHslaUuweYhcv22";
		$salt = $format.$hash;
		
		$newpass = crypt($Pass,$salt);	
		$newpass = mysqli_real_escape_string($koneksi,$newpass);
		
		$sql = "INSERT INTO admins ";
		$sql .= "(username, password) ";
		$sql .= "VALUES ('{$User_replace}','{$newpass}')";
		
		mysqli_query($koneksi, $sql);
		header("Location:manage_admin.php");
	}
?>

<?php include("includes/layouts/header.php"); ?>
	<div id="bungkus_add_admin">
		<div id="header">
			<h2>Add Admin</h2>
		</div><!--#header-->
		<div id="konten_add_admin">
			<form action="add_admin.php" method="post">
				<table>
					<tr>
						<td>Username</td>
						<td> :</td>
						<td><input type="text" name="USER" value=""/></td>
					</tr>
					<tr>
						<td>Password</td>
						<td> :</td>
						<td><input type="password" name="PASS" value=""/></td>
					</tr>
					<tr>
						<td><input type="submit" name="ADD" value="Add New"/></td>
					</tr>
				</table>
			</form>	
			<br />
			<a href="manage_admin.php">Cancel</a>
		</div><!--#konten_add_admin-->
	</div><!--#bungkus_add_admin-->
<?php include("includes/layouts/footer.php"); ?>

<?php
	}
}
?>