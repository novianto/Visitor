<?php include("includes/layouts/header.php");
	  require_once("includes/db_connection.php"); ?>
	<div id="bungkus_login">
		<div id="header_login">
			<img src="stylesheet/images/logo.jpg" width = "100%"/>
			<h2>Welcome to the Admin page</h2>
		</div>
		<div id="bungkus_konten_login">
			<div id="konten_header">
				<img src="stylesheet/images/Administrator.gif"/>
			</div><!--#konten_header-->
			<form action="login_proses.php" method="post">
				<div id="konten_login">
				<table>
					<tr>
						<td colspan="2">
							<span id="clock"><?php print date('H:i:s'); ?></span>						
						</td>
					</tr>
					<tr>	
						<td>Username</td>
						<td> : </td>
						<td><input type="text" name="USERNAME" value="" required/></td>
					</tr>
					<tr>
						<td>Password</td>
						<td> : </td>
						<td><input type="password" name="PASSWORD" value="" required/></td>
					</tr>
				</table>
				</div><!--#konten_login-->
				<div id="konten_submit">
					<input type="submit" name="LOGIN" value="Login"/>
				</div><!--#konten_submit-->
			</form>
		</div><!--#bungkus_konten_login-->
	</div><!--#bungkus_login-->
<?php include("includes/layouts/footer.php"); ?>