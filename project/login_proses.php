<?php 
	session_start();
	require_once("includes/db_connection.php"); 
?>

<?php //filename:login_proses.php

	$user = $_POST['USERNAME'];
	$pass = $_POST['PASSWORD'];

	$sql = "SELECT * FROM admins WHERE username = '$user'";
	$hasil = mysqli_query($koneksi,$sql);

	if(mysqli_num_rows($hasil)==0){//kalau hasil query tidak ada yg cocok dengan yang di form
		//echo "Username Tidak ditemukan";
		header("Location:login.php");
	}else{
		//echo "Username Ada";
		$baris = mysqli_fetch_assoc($hasil);
		if($pass == $baris['password']){
			//echo "password cocok";
			$_SESSION['login'] = $_POST['USERNAME'];;
			header("Location:adminmenu.php");
		}else{
			//echo "password tidak cocok";
			header("Location:login.php");
		}	
	}
?>


