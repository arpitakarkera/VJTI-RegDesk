<?php
	/*
	 * @author: Arpita Karkera
	 * @date: 4th December, 2016
	 * 
	 * Header template file. To be included in every page.
	 *
	 */
?>

<!DOCTYPE html>
<html>
<head>
	<!--Dynamically render the title. If not set just show "VJTI RegDesk". Value of title is set before including the header.-->
	<title>VJTI-RegDesk<?php if(isset($title)) echo " | ".$title; ?></title>
</head>
<body>
<!--Display navigation bar for all pages except index page-->
<?php
	if (basename($_SERVER['PHP_SELF']) != 'index.php') {
		echo '<header>';
		// some other stuff
		echo '</header>';
	}
?>