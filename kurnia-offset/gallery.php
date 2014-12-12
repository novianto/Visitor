<?php include("includes/headerhtml.php"); ?>
<style>
	.frame{
		width:300px;
		height:300px;
		display :inline-block;
	}
	
	.frame img{
		width:280px;
		height:180px;
		border-radius:20px;
	}
</style>
				<div class='content'>
					<div id='content1'>
						<div id="menu">
							<ul>
								<li><a href='home.php'>HOME</a></li>
								<li style = "background:pink;color:blue;width:130px;-webkit-transition:all .7s ease-out;-moz-transition:all .7s ease-out;-ms-transition:all .7s ease-out;-o-transition:all .7s ease-out;transition:all .7s ease-out;"><a href='gallery.php'>GALLERY</a></li>
								<li><a href='about.php'>ABOUT US</a></li>
								<li><a href='contact.php'>CONTACT US</a></li>
							</ul>
						</div><!--menu-->
					</div><!--content1-->
					<div id='content2'>
						<?php while($baris = mysqli_fetch_assoc($hasil3)){?>
							<div class="frame">
							<img src='<?php echo $baris['gambar']; ?>' />
							<span><?php echo $baris['title']; ?></span>
							</div><!--#frame-->
						<?php 
							}
							mysqli_free_result($hasil3);
						?>
					</div><!--content2-->
				</div><!--content-->
<?php include("includes/footeerhtml.php"); ?>	