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
<?php include("includes/layouts/header.php"); ?>
	<div id="bungkus_manage_content">
		<div id="header">
			<h2>Manage Content</h2>
		</div><!--#header-->
		<div id="konten_manage_content">
			
		</div><!--#konten_manage_content-->
	</div><!--#bungkus_manage_content-->
<?php include("includes/layouts/footer.php"); ?>
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