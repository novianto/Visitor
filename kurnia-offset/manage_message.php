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
	$sql = "SELECT * FROM message ORDER BY id DESC";
	$result = mysqli_query($koneksi,$sql);
?>
<?php include("includes/layouts/header.php"); ?>
	<div id="bungkus_manage_message">
		<div id="header">
			<h2>Manage Message</h2>
		</div><!--#header-->
		<div id="konten_manage_message">
			<h3>Pesan Terbaru</h3>	
			<table border="1">
				<tr>
					<td>
						Tanggal
					</td>
					<td>
						Jam
					</td>
					<td>
						Nama
					</td>
					<td>
						Email
					</td>
					<td>
						Action
					</td>
				</tr>
				<?php
					while($baris = mysqli_fetch_assoc($result)){
						echo "<tr>";
							echo "<td>" . $baris['tanggal'] . "</td>";
							echo "<td>" . $baris['waktu'] . "</td>";
							echo "<td>" . $baris['nama'] . "</td>";
							echo "<td>" . $baris['email'] . "</td>";
							echo "<td>";
								echo "<a id='bukapesan' href = 'open_message.php?ID=". $baris['id'] . "'>Buka Pesan</a>";
							echo "</td>";
						echo "</tr>";
					}
				?>
			</table>
			<br />
			<br />
			<a id="back" href = "manage_content.php">Back</a>
		</div><!--#konten_manage_message-->
	</div><!--#bungkus_manage_message-->
<?php include("includes/layouts/footer.php"); ?>
<?php
	}
}
 ?>