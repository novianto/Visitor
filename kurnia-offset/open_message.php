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
	$ID = $_GET['ID'];
	
	$sql = "SELECT * FROM message WHERE id = $ID";
	$result = mysqli_query($koneksi, $sql);
?>
<?php include("includes/layouts/header.php"); ?>
	<div id="bungkus_open_message">
		<div id="header">
			<h2>Open Message</h2>
		</div><!--#header-->
		<div id="konten_open_message">
			<?php $baris = mysqli_fetch_assoc($result)?>
			<table>
				<tr>
					<td colspan="2">
						<h3>Pesan Dari: <?php echo $baris['nama']; ?></h3>
					</td>
				</tr>
				<tr>
					<td> Email </td>
					<td> : </td>
					<td> <?php echo $baris['email']; ?> </td>
				</tr>
				<tr>
					<td> Tanggal </td>
					<td> : </td>
					<td> <?php echo $baris['tanggal']; ?> </td>
				</tr>
				<tr>
					<td> Jam </td>
					<td> : </td>
					<td> <?php echo $baris['waktu']; ?> </td>
				</tr>
			</table>
			<hr>
			<p>
				Message:<br />
				<?php echo $baris['pesan']; ?>
			</p>
			<br />
			<br />
			<a id="back" href="manage_message.php">Close</a>
		</div><!--#konten_open_message-->
	</div><!--#bungkus_open_message-->
<?php include("includes/layouts/footer.php"); ?>
<?php
	}
}
 ?>