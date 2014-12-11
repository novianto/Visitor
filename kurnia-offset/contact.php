<?php include("includes/headerhtml.php"); ?>
				<div class='content'>
					<div id='menu'>
						<ul>
							<li><a href='home.php'>HOME</a></li>
							<li><a href='gallery.php'>GALLERY</a></li>
							<li><a href='about.php'>ABOUT US</a></li>
							<li style = "background:pink;color:blue;width:130px;-webkit-transition:all .7s ease-out;-moz-transition:all .7s ease-out;-ms-transition:all .7s ease-out;-o-transition:all .7s ease-out;transition:all .7s ease-out;"><a href='contact.php'>CONTACT US</a></li>
						</ul>
					</div>
					<div id='content2'>
						<div id="news" style="height:300px;">
						<form action="send.php?d=<?php date_default_timezone_set('Asia/Jakarta');$date = date('Y-m-d', time());echo $date;?>&t=<?php date_default_timezone_set('Asia/Jakarta');$time = date('H:i:s', time());echo $time;?>" method="post">
						<table>
							<tr>
								<td>
									Hubungi Kami
								</td>
							</tr>
							<tr>
								<td>
									Nama
								</td>
								<td>
									:
								</td>
								<td>
									<input type="text" name="NAMA" value="" placeholder="Nama" style="width:200px;" required/>
								</td>
							</tr>
							<tr>
								<td>
									Email
								</td>
								<td>
									:
								</td>
								<td>
									<input type="text" name="EMAIL" value="" placeholder="Email" style="width:200px;"required/>
								</td>
							</tr>
							<tr>
								<td valign="top">
									Pesan
								</td>
								<td valign="top">
									:
								</td>
								<td>
									<textarea style="width:200px;" placeholder = "Ketikkan Pesan Anda" name = "PESAN" rows="5"required></textarea>
								</td>
							</tr>
							<tr>
								<td colspan="3" align="right">
									<input type="submit" name="SEND" value="Kirim"/>
								</td>
							</tr>
						</table>
						</form>
						</div><!--news-->
						<div class="clear">
						</div>
					</div><!--content2-->
					<div class="clear">
					</div>
				</div><!--content-->
<?php include("includes/footeerhtml.php"); ?>	