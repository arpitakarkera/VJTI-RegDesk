<?php
	/*
	 * @author: Sunaina Punyani, Arpita Karkera
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
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<!--Fonts-->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:700|PT+Sans:400,700|Raleway:500" rel="stylesheet">
	<style type="text/css">
		body {
			font-family:'PT Sans', sans-serif;
			padding-bottom: 0px;
		}
	</style>
	<?php
		if (basename($_SERVER['PHP_SELF']) == 'index.php') {
			echo '<link rel = "stylesheet" type = "text/css" href="css/index.css">';
		}
		else if (basename($_SERVER['PHP_SELF']) == 'dashboard.php') {
			
			echo '<link rel = "stylesheet" type = "text/css" href = "../css/dashboard.css">';
		}
		// similarly you can add more
		else {
			// default one
		}
	?>
</head>
<body>
<!--Display navigation bar for all pages except index page-->
<?php
	if (basename($_SERVER['PHP_SELF']) != 'index.php') {
		echo '<header style="background-image: url(\'../images/background.jpg\');">
		
		<div class="row" style="padding-top:1.2%;padding-bottom:1.2%;">
		<div class="span4" style="padding-left:5%;">
		<a href="../index.php">
		<img style="float:left;padding-left:0%;padding-top:0%;" src="../images/logo.png" class="img-responsive" alt="VJTI RegDesk" width="40" height="40">
		</a>
		
		<div style="font-size:25px;color:rgb(213,224,224);font-weight:bold;padding-top:0.6%">&nbsp;&nbsp;<a href="../index.php" style="text-decoration:none;color:rgb(213,224,224);">VJTI RegDesk</a></div>
		
		</div>
		</div>
		</header>';
	}
?>