<?php 
	require_once("includes/db_connection.php"); 
	session_start();
?>

<?php

	$user = $_POST['USERNAME'];
	$user_replace = str_replace(" ","",$user);
	$pass = $_POST['PASSWORD'];

	$sql = "SELECT * FROM admins WHERE username = '$user_replace'";
	$hasil = mysqli_query($koneksi,$sql);

	if(mysqli_num_rows($hasil)==0){//kalau hasil query tidak ada yg cocok dengan yang di form
		//echo "Username Tidak ditemukan";
		header("Location:login.php");
	}else{
		//echo "Username Ada";
		$baris = mysqli_fetch_assoc($hasil);
		
		$format = "$2y$10$";
		$hash = "TsuxOptrHslaUuweYhcv22";
		$salt = $format.$hash;
	
		$passbaru = crypt($baris['password'],$salt);
		$newpass = crypt($pass,$salt);
		$newpass = mysqli_real_escape_string($koneksi,$newpass);
		
		if($newpass == $passbaru){
			//echo "password cocok";
			$_SESSION['login'] = $user_replace;
			header("Location:adminmenu.php");
			//echo "<br/>".$_SESSION['login']."<br/>".$newpass."<br/>".$baris['password'];
		}else{
			
			echo "<script>";
			echo "alert('Login gagal, cek kembali username dan password Anda!')";
			echo "</script>";
			//header("Location:login.php");
			
		}
	}
?>


