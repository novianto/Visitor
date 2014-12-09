		<div id="footer">
			&copy; Copyright <?php echo date("Y"); ?> Kurnia
		</div><!--#footer-->
		<br/>
<<<<<<< HEAD
		<?php
			date_default_timezone_set('Asia/Jakarta');
			$date = date("Y-m-d H:i:s");
			echo $date;
		?>
=======
		<span id="clock"><?php print date('H:i:s'); ?></span> 

>>>>>>> origin/master
	</body>
</html>
<?php
	mysqli_close($koneksi);
?>