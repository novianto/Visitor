<?php 
	/*
	require_once("includes/db_connection.php"); 
	session_start();

	$sql = "SELECT username FROM admins";
		$hasil = mysqli_query($koneksi,$sql);
		
		$a = mysqli_num_rows($hasil);
		for($i=1; $i<=$a; $i++){
			$baris = mysqli_fetch_assoc($hasil);
			if($_SESSION['login'] == $baris['username']){
				$a = $_SESSION['login'];
	*/
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
	$id = $_GET['ID'];
	
	$sql = "SELECT * FROM admins WHERE id=$id";
	$hasil = mysqli_query($koneksi,$sql);
	
	$baris = mysqli_fetch_assoc($hasil);
		
	if(isset($_POST["SAVE"])){
		
		$Id = $_POST["ID"];
		$User = $_POST["USER"];
		$User = mysqli_real_escape_string($koneksi,$User);
		
		$User_replace = str_replace(" ","",$User);
		
		$Pass = $_POST["PASS"];
		
		$format = "$2y$10$";
		$hash = "TsuxOptrHslaUuweYhcv22";
		$salt = $format.$hash;
		
		$newpass = crypt($Pass,$salt);	
		$newpass = mysqli_real_escape_string($koneksi,$newpass);
		
		$sql = "UPDATE admins SET ";
		$sql .= "username = '{$User_replace}', ";
		$sql .= "password = '{$newpass}' ";
		$sql .= "WHERE id = $Id ";
		
		mysqli_query($koneksi,$sql);
		
		header("Location:manage_admin.php");
	}
?>

<?php include("includes/layouts/header.php"); ?>
	<div id="bungkus_manage_admin">
		<div id="header">
			<h2>Edit Admin</h2>
		</div><!--#header-->
		<div id="konten_edit_admin">
			<form action="edit_admin.php" method="post">
				<table>
					<tr>
						<td>Username</td>
						<td> :</td>
						<td><input type="text" name="USER" value="<?php echo $baris['username']; ?>" required/>
					</tr>
					<tr>
						<td>Password</td>
						<td> : </td>
						<td><input type="password" name="PASS" value="" required/>
					</tr>
					<tr>
						<td colspan="3">
							<input type="hidden" name="ID" value="<?php echo $baris['id']; ?>" />
							<input type="submit" name="SAVE" value="Save"/>						
						</td>
					</tr>
				</table>
			</form>
			<a href="manage_admin.php"> Cancel </a>
		</div><!--#konten_edit_admin-->
	</div><!--#bungkus_manage_admin-->
<?php include("includes/layouts/footer.php"); ?>
<?php
	/*
	}
	else{
		echo "<script>";
		echo "alert('Login gagal, cek kembali username dan password Anda!')";
		echo "</script>";
		header("Location:login.php");
		
	}
}
*/
		}
}
 ?>