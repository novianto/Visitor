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
	<div id="bungkus_ganti_berita">
		<div id="header">
			<h2>Ganti Berita</h2>
		</div><!--#header-->
		<div id="konten_ganti_berita">
			<form action="uploadberita.php" method="post" enctype="multipart/form-data">
				<table>
					<tr>
						<td>Judul Berita yang ingin diganti</td>
						<td> :</td>
						<td><input type='text' name='judul_lama' value="" /></td>
					</tr>
					<tr>
						<td>Ganti Judul Berita</td>
						<td> :</td>
						<td><input type='text' name='judul_baru' value="" style="width:370px;"/></td>
					</tr>
					<tr>
						<td>Ganti Gambar Berita</td>
						<td> :</td>
						<td><input type="file" name="gbr_berita" /></td>
					</tr>
					<tr>
						<td>Ganti Isi Berita</td>
						<td> :</td>
						<td><textarea rows="7" cols="50" name='info_berita'></textarea></td>
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
		</div><!--#konten_ganti_berita-->
	</div><!--#bungkus_ganti_berita->
<?php include("includes/layouts/footer.php"); ?>
<?php
		}
}
 ?>