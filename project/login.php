<?php include("includes/layouts/header.php");
	  require_once("includes/db_connection.php"); ?>
	<div id="bungkus_login">
		<div id="header">
			<h2>Login Administrator</h2>
		</div>
		<div id="bungkus_konten_login">
			<div id="konten_header">
				<h2>Welcome!!!</h2>
			</div><!--#konten_header-->
			<div id="konten_login">
				<form action="login_proses.php" method="post">
					<table>
						<tr>	
							<td>Username</td>
							<td> : </td>
							<td><input type="text" name="USERNAME" value=""/></td>
						</tr>
						<tr>
							<td>Password</td>
							<td> : </td>
							<td><input type="password" name="PASSWORD" value=""/></td>
						</tr>
						<tr>
							<td colspan="3"><input type="submit" name="LOGIN" value="Login"/></td>
						</tr>
					</table>
				</form>
			</div><!--#konten_login-->
		</div><!--#bungkus_konten_login-->
	</div><!--#bungkus_login-->
<?php include("includes/layouts/footer.php"); ?>