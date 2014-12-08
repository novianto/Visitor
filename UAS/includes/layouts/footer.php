		<div id="footer">
			&copy; Copyright <?php echo date("Y"); ?> Kurnia
		</div><!--#footer-->
		<br/>
		<?php
			date_default_timezone_set('Asia/Jakarta');
			$date = date("Y-m-d H:i:s");
			echo $date;
		?>
	</body>
</html>
<?php
	mysqli_close($koneksi);
?>