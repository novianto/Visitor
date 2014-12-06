<?php
	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_name = "visitor";
	
	//1.Create a database connection
	$koneksi = mysqli_connect($db_host,$db_user,$db_pass,$db_name);
	//Test if connection succeeded
	if(mysqli_connect_errno()){
		die("Database connection failed: " .
			 mysqli_connect_error() .
			 " (" . mysqli_connect_errno() . ") "
			);
	}else{
		echo "Connection success";
	}
?>