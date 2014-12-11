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
	$judul_lama = $_POST['judul_lama'];
	$judul_baru = $_POST['judul_baru'];
	$info = $_POST['info_berita'];
	
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
			
			$sql = "UPDATE news SET ";
			$sql .= "news_pic = '$tujuan',";
			$sql .= "news_judul = '$judul_baru',";
			$sql .= "news_info = '$info'";
			$sql .= "WHERE news_judul = '$judul_lama' ";
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