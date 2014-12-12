<?php 
	require_once("includes/db_connection.php"); 
	session_start();
?>

<?php

	$user = $_POST['USERNAME'];
	$pass = $_POST['PASSWORD'];

	$sql = "SELECT * FROM admins WHERE username = '$user'";
	$hasil = mysqli_query($koneksi,$sql);

	if(mysqli_num_rows($hasil)==0){//kalau hasil query tidak ada yg cocok dengan yang di form
		//echo "Username Tidak ditemukan";
		echo "<script>";
			echo "alert('Login gagal, cek kembali username dan password Anda!');";
			echo "window.location.href = 'login.php';";
			echo "</script>";
	}else{
		$baris = mysqli_fetch_assoc($hasil);
		
		$format = "$2y$10$";
		$hash = "TsuxOptrHslaUuweYhcv22";
		$salt = $format.$hash;
	

		$newpass = crypt($pass,$salt);
		$newpass = mysqli_real_escape_string($koneksi,$newpass);
		
		if($newpass == $baris['password']){
			$_SESSION['login'] = $user;
			header("Location:adminmenu.php");
			
		}else{
			
			echo "<script>";
			echo "alert('Login gagal, cek kembali username dan password Anda!');";
			echo "window.location.href = 'login.php';";
			echo "</script>";		
		}
	}
?>