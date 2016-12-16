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
		else if (basename($_SERVER['PHP_SELF']) == 'signup.php' || basename($_SERVER['PHP_SELF']) == 'addevent.php') {
			//
			echo '<link rel = "stylesheet" type = "text/css" href = "../css/form.css">';
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
		echo '<header style="background-image: url(\'../images/background.jpg\');display:block;">
		<div class="contanier-fluid" >
		<div class="row" >
		<a href="../index.php"><div class="col-sm-1" style="padding-left:50px;padding-top:12px;">
		<img src="../images/logo.png" class="img-responsive" alt="VJTI RegDesk" width="52" height="52">
		</div></a>
		<a href="../index.php" style="text-decoration:none"><div style="padding-top:20px">
		<b style="font-size:25px;color:rgb(213,224,224);font-weight:bold;" class="text-left">VJTI RegDesk</b>
		</div></a>
		<br>
		</div></div>
		</header>';
	}
?>