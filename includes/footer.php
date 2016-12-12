<?php
	/*
	 * @author: Arpita Karkera
	 * @date: 4th December, 2016
	 * 
	 * Footer template file. To be included in every page.
	 *
	 */

	include_once(__DIR__ . '/../controls/mailer.php');
?>

		<footer>
			
			<div id="p" class="container-fluid">
			<p style="color:#FFFFFF">
			&copy; <?php echo date('Y'); ?>, RegDesk Inc.
			<br>
			<?php echo USER; ?>
			</p>
			
			<p class="text-right"><a href="developers.php" >Meet the Devs!</a></p>
			
			</div>
		</footer>
</body>
</html>