<?php 
	require_once("includes/db_connection.php"); 
	session_start();

		$sql = "SELECT username FROM admins";
		$hasil = mysqli_query($koneksi,$sql);
		
		if(mysqli_num_rows($hasil)==0){
			header("Location:login.php");
		}else{
			$baris = mysqli_fetch_assoc($hasil);
			if($_SESSION['login'] == $baris['username']){
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
}
 ?>