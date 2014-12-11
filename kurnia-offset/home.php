<?php include("includes/headerhtml.php"); ?>
				<div class='content'>
					<div id="menu">
							<ul>
								<li style = "background:pink;color:blue;width:130px;-webkit-transition:all .7s ease-out;-moz-transition:all .7s ease-out;-ms-transition:all .7s ease-out;-o-transition:all .7s ease-out;transition:all .7s ease-out;"><a href='home.php'>HOME</a></li>
								<li><a href='gallery.php'>GALLERY</a></li>
								<li><a href='about.php'>ABOUT US</a></li>
								<li><a href='contact.php'>CONTACT US</a></li>
							</ul>
					</div><!--menu-->
					<div id='content2'>
						<div id='news'>
						<table width="100%">
						<?php while($baris2 = mysqli_fetch_assoc($hasil2)){ ?>
							<tr>
								<td><img width="100px" height="100px"src='<?php echo $baris2['news_pic'];?>'/></td>
								<td colspan=2 valign="top">
									<p align="justify">
									<h2><?php echo $baris2['news_judul']; ?></h2>
									<span><?php echo $baris2['news_info']; ?></span>
								</td>
							</tr>
							<tr>
								<td colspan=3>
									<hr width="100%" />
								</td>
							</tr>
						<?php
							}
						?>
						</table>
						</div><!--news-->
					</div><!--content2-->
				</div><!--content-->
<?php include("includes/footeerhtml.php"); ?>	
