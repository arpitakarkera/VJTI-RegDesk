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

		<footer style="padding: 0px;">
			<div class="container-fluid" style="padding: 0px;">
			<br>
			<div class="row" style="background-image:url('<?php if (basename($_SERVER['PHP_SELF']) == 'index.php') echo 'images/background.jpg'; else echo '../images/background.jpg'; ?>'); background-repeat: repeat; background-position: left bottom; background-attachment: fixed;width:100% padding: 0px;">
			<div class="col-sm-4 text-left">
			<div style="color:rgb(213,224,224); padding: 30px; vertical-align: center;">
			&copy; <?php echo date('Y'); ?>, RegDesk Inc.
			<br>
			<?php echo USER; ?>
			</div>
			</div>
			<div class="col-sm-4">
			</div>
			<div class="col-sm-4 text-right" style="padding: 30px; vertical-align: center; font-size: 15px;">
			<a href="developers.php">Meet the Devs!</a>
			</div>
			</div>
			<br>
			</div>
		</footer>
</body>
</html>