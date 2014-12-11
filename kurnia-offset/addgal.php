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
<?php include("includes/layouts/header.php"); 
	$sql = "SELECT * FROM gallery";
	$hasil = mysqli_query($koneksi,$sql);
	$baris = mysqli_fetch_assoc($hasil);
?>
	<div id="bungkus_ganti_gal">
		<div id="header">
			<h2>Manage Gallery</h2>
		</div><!--#header-->
		<div id="konten_ganti_gal">
			<form action="uploadgallery.php" method="post" enctype="multipart/form-data">
				<table>
					<tr>
						<td>Tambah Gallery</td>
					</tr>
					<tr>
						<td>Judul</td>
						<td> :</td>
						<td><input type="text" name="judul" value="" /></td>
					</tr>
					<tr>
						<td>Gambar</td>
						<td> :</td>
						<td><input type="file" name="gbr" /></td>
					</tr>
					<tr>
						<td colspan="3">
							<input type="hidden" name="ID" value="<?php echo $baris['id']; ?>" />
							<input type="submit" name="simpan" value="Save"/>						
						</td>
					</tr>
				</table>
			</form>
			<a href="manage_content.php"> Cancel </a>
		</div><!--#konten_ganti_gal-->
	</div><!--#bungkus_ganti_gal->
<?php include("includes/layouts/footer.php"); ?>
<?php
		}
}
 ?>
