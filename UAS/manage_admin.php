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
			$sql = "DELETE FROM admins WHERE id = $_GET[ID]";
		}
		mysqli_query($koneksi,$sql);
	}

	$sql = "SELECT * FROM admins";
	$hasil = mysqli_query($koneksi,$sql);
?>
<?php include("includes/layouts/header.php"); ?>
	<div id="bungkus_manage_admin">
		<div id="header">
			<h2>Manage Admin</h2>
		</div><!--#header-->
		<div id="konten_manage_admin">
			<fieldset>
				<legend>
					Daftar User Admin:
				</legend>
			<table border="1">
				<tr>
					<td class="thead">
						Username
					</td>
					<td class="thead" colspan="2">
						Action
					</td>
				</tr>
				<?php 
					while($baris = mysqli_fetch_assoc($hasil)){
						echo "<tr>";
						echo "<td>" . $baris['username'] . "</td>";
						echo "<td><a href='edit_admin.php?ID=" . $baris['id'] . "'>EDIT</a></td>";
						echo "<td><a href='manage_admin.php?ACT=1&ID=" . $baris["id"] . "'>DELETE</a></td>";
						echo "</tr>";
					}
					mysqli_free_result($hasil);
				?>
			</table>
			<table id="button">
				<tr>
					<td>
						<a class="link" href="adminmenu.php">Cancel</a>
					</td>
					<td>
						<a class="link" href="add_admin.php">Add New</a>
					</td>
				</tr>
			</table>
			</fieldset>
		</div><!--#konten_manage_admin-->
	</div><!--#bungkus_manage_admin-->
<?php include("includes/layouts/footer.php"); ?>
<?php
		}
}
 ?>