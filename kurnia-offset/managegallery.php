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
	if(isset($_GET['ACT'])){
		if($_GET['ACT']==1){
			$sql = "DELETE FROM gallery WHERE id = $_GET[ID]";
		}
		mysqli_query($koneksi,$sql);
	}

	$sql = "SELECT * FROM gallery";
	$hasil = mysqli_query($koneksi,$sql);
?>
<?php include("includes/layouts/header.php"); ?>
<style>
	.frame{
		width:300px;
		height:300px;
		display :inline-block;
	}
	
	.frame img{
		width:280px;
		height:180px;
		border-radius:20px;
	}
</style>
	<div id="bungkus_manage_gallery">
		<div id="header">
			<center><h2>GALLERY</h2></center>
		</div><!--#header-->
		<button><a href='addgal.php'>ADD</a></button><br /><br /><br />
		
		<?php while($baris = mysqli_fetch_assoc($hasil)){?>
		<div class="frame">
			<img src='<?php echo $baris['gambar']; ?>' />
			<span><?php echo $baris['title']; ?></span>
			<?php 
				echo "<button><a href='editgal.php?ID=" . $baris['id'] . "'>EDIT</a></button>";
				echo "<button><a href='gallery.php?ACT=1&ID=" . $baris["id"] . "'>DELETE</a></button>";
			?>
		</div><!--#frame-->
			<?php 
					}
					mysqli_free_result($hasil);
				?>
				
				<br />
				<a href="manage_content.php">BACK</a>
	</div><!--#bungkus_manage_gallery-->
<?php include("includes/layouts/footer.php"); ?>
<?php
		}
}
 ?>
