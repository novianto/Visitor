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
<?php include("includes/layouts/header.php");?>
			<div id='bungkus_admin_menu'>
				<div id='header'>
					<h2>Admin Menu</h2>
					<span id="clock"><?php print date('H:i:s'); ?></span>
				</div><!--#header-->
				<div id='konten_admin_menu'>
					<h2><marquee behavior='ALTERNATE'>Welcome  <?php echo $b; ?></marquee></h2>
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
		
<?php include("includes/layouts/footer.php"); ?>
<?php
		}
}
 ?>