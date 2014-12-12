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
<?php include("includes/layouts/header.php"); ?>
<?php
	$judul = $_POST['judul'];
	$gbr_berita = $_POST['gbr_berita'];
	$info_berita = $_POST['info_berita'];
	
	$file_name = $_FILES['gbr_berita']['name'];
	$file_size = $_FILES['gbr_berita']['size'];
	$file_tmp= $_FILES['gbr_berita']['tmp_name'];
	$a = explode(".",$file_name);
	$b = end($a);
	$c = strtolower($b);
	$ext_boleh = array("jpg","png","gif","bmp");
	if(in_array($c,$ext_boleh)){
		if($file_size <= 2*1024*1024){
			echo " Ukuran FILE OKE";
			$sumber = $file_tmp;
			$tujuan = "news/". $file_name;
			move_uploaded_file($sumber,$tujuan);
			
			$sql = "INSERT INTO news (news_judul,news_pic,news_info) 
			VALUES ('{$judul}','{$tujuan}','{$info_berita}')";
			mysqli_query($koneksi,$sql);
			if(mysqli_error($koneksi)){
				echo "UPLOAD GAGAL";
				echo mysqli_error($koneksi);
				die();
			}
			header('Location:home.php');
		}else {
			echo " UKURAN FILE TERLALU BESAR ";
	}
		echo " FILE boleh di UPLOAD ";
	}else {
		echo " FILE tidak diinjinkan ";
	}
	
?>


<?php include("includes/layouts/footer.php"); ?>
<?php
		}
}
 ?>