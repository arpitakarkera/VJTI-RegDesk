<?php
	/*
	 * @author: Arpita Karkera,Sunaina Punyani
	 * @date: 4th December, 2016
	 * 
	 * Footer template file. To be included in every page.
	 *
	 */

	include_once(__DIR__ . '/../controls/mailer.php');
?>

		<footer   >
			
			<div class="container-fluid" style="background-image:url('../images/newbgm.png'); background-repeat: repeat; background-position: right top; background-attachment: fixed;width:100%">
			<br>
			<div class="row">
			<div class="col-sm-4 text-left" style="color:#FFFFFF">
			&copy; <?php echo date('Y'); ?>, RegDesk Inc.
			<br>
			<?php echo USER; ?>
			</div>
			<div class="col-sm-4">
			</div>
			<div class="col-sm-4 text-right">
			<a href="developers.php">Meet the Devs!</a>
			</div>
			</div>
			<br>
			
		</footer>
</body>
</html>