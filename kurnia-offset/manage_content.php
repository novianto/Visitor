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
<?php include("includes/layouts/header.php"); ?>
	<div id="bungkus_manage_content">
		<div id="header">
			<h2>Manage Content</h2>
		</div><!--#header-->
		<div id="konten_manage_content">
				<div id="manage">
					<div id="man_home">
						<div id="back_man"></div>
						<div id="man_list">
							<a href="gantilogo.php" id="edit_logo"></a>
							<a href="gantiberita.php" id="edit_news"></a>
							<a href="tambahberita.php" id="add_news"></a>
						</div><!--man_list-->
					</div><!--man_home-->
					<div id="man_2">
						<a href="managegallery.php" id="man_gallery"></a>
						<a href="manage_message.php" id="man_contact"></a>			
					</div><!--man_2-->
				</div><!--manage-->
				<div id="go">
					<center><a href="adminmenu.php"><img src="stylesheet/images/back.png" /></a></center>
				</div>
		</div><!--#konten_manage_content-->
	</div><!--#bungkus_manage_content-->
<?php include("includes/layouts/footer.php"); ?>
<?php
		}
}
 ?>	