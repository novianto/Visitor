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
	$id = $_GET['ID'];
	$sql = "SELECT * FROM gallery WHERE id=$id";
	$hasil = mysqli_query($koneksi,$sql);
	$baris = mysqli_fetch_assoc($hasil);
		
	if(isset($_POST["SAVE"])){
		
		$Id = $_POST["ID"];
		$gambar = $_POST["gal"];
		$judul = $_POST["judul"];
		
		
		$sql = "UPDATE gallery SET ";
		$sql .= "judul = '{$judul}', ";
		$sql .= "gambar = '{$gambar}' ";
		$sql .= "WHERE id = $Id ";
		
		mysqli_query($koneksi,$sql);
		header("Location:gallery.php");
	}
?>

<?php include("includes/layouts/header.php"); ?>
	<div id="bungkus_manage_gal">
		<div id="header">
			<h2>Edit GALLERY</h2>
		</div><!--#header-->
		<div id="konten_edit_gal">
			<form action="editgal.php" method="post">
				<table>
					<tr>
						<td>GAMBAR</td>
						<td> :</td>
						<td><input type="file" name="gal" value="<?php echo $baris['gambar']; ?>" />
					</tr>
					<tr>
						<td>Judul</td>
						<td> : </td>
						<td><input type="text" name="judul" value="" />
					</tr>
					<tr>
						<td colspan="3">
							<input type="hidden" name="ID" value="<?php echo $baris['id']; ?>" />
							<input type="submit" name="SAVE" value="Save"/>						
						</td>
					</tr>
				</table>
			</form>
			<a href="gallery.php"> Cancel </a>
		</div><!--#konten_edit_gal-->
	</div><!--#bungkus_manage_gal-->
<?php include("includes/layouts/footer.php"); ?>
<?php
		}
}
 ?>