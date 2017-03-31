<?php
	/*
	 * @author: Arpita Karkera,Sunaina Punyani
	 * @date: 4th December, 2016
	 * 
	 * Footer template file. To be included in every page.
	 *
	 */

	include_once(__DIR__ . '/../controls/mailer.php');

	if( ! ini_get('date.timezone') )
	{
	    date_default_timezone_set('Asia/Kolkata');
	}
?>

<footer class="footer" style="background-image:url('<?php if (basename($_SERVER['PHP_SELF']) == 'index.php') echo 'images/background.jpg'; else echo '../images/background.jpg'; ?>'); background-repeat: repeat; background-position: left bottom; background-attachment: fixed;width:100% padding: 0px; border-top: 3px solid rgb(213,224,224);">
	<div class="container-fluid" style="padding: 0px;">
		<div class="row" style="">
			<div class="col-sm-4 text-left">
				<p style="color:rgb(213,224,224); padding: 30px; vertical-align: center;">
					&copy;
					<?php echo date('Y'); ?>, RegDesk Inc.
					<br>
					<?php echo USER; ?>
				</p>
			</div>
			<div class="col-sm-4">
			</div>
			<p class="col-sm-4 text-right" style="padding: 30px; vertical-align: center; font-size: 15px;">
				<a href="developers.php">Meet the Devs!</a>
		</div>
	</div>
</footer>
</body>

</html>