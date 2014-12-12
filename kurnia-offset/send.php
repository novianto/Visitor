<?php
	require_once("includes/db_connection.php"); 
	
	$Tanggal = $_GET['d'];
	$Waktu = $_GET['t'];
	
	$Nama = $_POST['NAMA'];
	$Nama = mysqli_real_escape_string($koneksi, $Nama);
	$Email = $_POST['EMAIL'];
	$Email = mysqli_real_escape_string($koneksi, $Email);
	$Pesan = $_POST['PESAN'];
	$Pesan = mysqli_real_escape_string($koneksi, $Pesan);
	
	//echo $Nama . "&" . $Email . "&" . $Pesan . "&" . $Waktu;
	
	$sql = "INSERT INTO message (nama, email, pesan, tanggal, waktu)
			VALUES ('{$Nama}', '{$Email}', '{$Pesan}', '{$Tanggal}', '{$Waktu}')";
	mysqli_query($koneksi, $sql);
	
	echo "<script>";
	echo "alert('Pesan Anda Telah Dikirim');";
	echo "window.location.href = 'contact.php';";
	echo "</script>";
	
	//echo $Nama . "& " . $Email . "& " . $Pesan . "& " . $Tgl . "& " . $Time;
?>