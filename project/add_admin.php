<?php require_once("includes/db_connection.php"); ?>

<?php
	if(isset($_POST["ADD"])){
		$User = $_POST["USER"];
		$Pass = $_POST["PASS"];
		
		$User = mysqli_real_escape_string($koneksi,$User);
		$Pass = mysqli_real_escape_string($koneksi,$Pass);
		
		
		$sql = "INSERT INTO admins ";
		$sql .= "(username, password) ";
		$sql .= "VALUES ('{$User}','{$Pass}')";
		
		mysqli_query($koneksi, $sql);
		header("Location:manage_admin.php");
	}
?>

<?php include("includes/layouts/header.php"); ?>
	<div id="bungkus_add_admin">
		<div id="header">
			<h2>Add Admin</h2>
		</div><!--#header-->
		<div id="konten_add_admin">
			<form action="add_admin.php" method="post">
				<table>
					<tr>
						<td>Username</td>
						<td> :</td>
						<td><input type="text" name="USER" value=""/></td>
					</tr>
					<tr>
						<td>Password</td>
						<td> :</td>
						<td><input type="password" name="PASS" value=""/></td>
					</tr>
					<tr>
						<td><input type="submit" name="ADD" value="Add New"/></td>
					</tr>
				</table>
			</form>	
			<br />
			<a href="manage_admin.php">Cancel</a>
		</div><!--#konten_add_admin-->
	</div><!--#bungkus_add_admin-->
<?php include("includes/layouts/footer.php"); ?>