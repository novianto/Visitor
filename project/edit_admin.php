<?php require_once("includes/db_connection.php"); ?>
<?php
	$id = $_GET['ID'];
	
	$sql = "SELECT * FROM admins WHERE id=$id";
	$hasil = mysqli_query($koneksi,$sql);
	
	$baris = mysqli_fetch_assoc($hasil);
	
	if(isset($_POST["SAVE"])){
		$Id = $_POST["ID"];
		$User = $_POST["USER"];
		$User = mysqli_real_escape_string($koneksi,$User);
		
		$Pass = $_POST["PASS"];
		$Pass = mysqli_real_escape_string($koneksi,$Pass);
		
		$sql = "UPDATE admins SET ";
		$sql .= "username = '{$User}', ";
		$sql .= "password = '{$Pass}' ";
		$sql .= "WHERE id = $Id ";
		
		mysqli_query($koneksi,$sql);
		
		header("Location:manage_admin.php");
	}
?>

<?php include("includes/layouts/header.php"); ?>
	<div id="bungkus_manage_admin">
		<div id="header">
			<h2>Edit Admin</h2>
		</div><!--#header-->
		<div id="konten_edit_admin">
			<form action="edit_admin.php" method="post">
				<table>
					<tr>
						<td>Username</td>
						<td> :</td>
						<td><input type="text" name="USER" value="<?php echo $baris['username']; ?>"/>
					</tr>
					<tr>
						<td>Password</td>
						<td> : </td>
						<td><input type="password" name="PASS" value=""/>
					</tr>
					<tr>
						<td colspan="3">
							<input type="hidden" name="ID" value="<?php echo $baris['id']; ?>" />
							<input type="submit" name="SAVE" value="Save"/>						
						</td>
					</tr>
				</table>
			</form>
			<a href="manage_admin.php"> Cancel </a>
		</div><!--#konten_edit_admin-->
	</div><!--#bungkus_manage_admin-->
<?php include("includes/layouts/footer.php"); ?>