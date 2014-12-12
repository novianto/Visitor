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
<?php include("includes/layouts/header.php"); 

?>
<?php
	$file_name = $_FILES['logo']['name'];
	$file_size = $_FILES['logo']['size'];
	$file_tmp= $_FILES['logo']['tmp_name'];
	$a = explode(".",$file_name);
	$b = end($a);
	$c = strtolower($b);
	$ext_boleh = array("jpg","png","gif","bmp");
	if(in_array($c,$ext_boleh)){
		if($file_size <= 2*1024*1024){
			echo " Ukuran FILE OKE";
			$sumber = $file_tmp;
			$tujuan = "logo/". $file_name;
			move_uploaded_file($sumber,$tujuan);
					
			$sql = "UPDATE logo SET ";
			$sql .= "gbr_logo = '$tujuan'";
			$sql .= "WHERE id_logo = 1 ";
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