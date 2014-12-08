		<div id="footer">
			&copy; Copyright <?php echo date("Y"); ?> Kurnia
		</div><!--#footer-->
		<br/>
		<span id="clock"><?php print date('H:i:s'); ?></span> 

	</body>
</html>
<?php
	mysqli_close($koneksi);
?>