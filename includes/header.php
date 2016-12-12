<?php
	/*
	 * @author:Sunaina Punyani, Arpita Karkera
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
	<?php
		if (basename($_SERVER['PHP_SELF']) == 'index.php') {
			echo '<link rel="stylesheet" type="text/css" href="../css/indexstyle.css">  
			
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Domine:700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Acme" rel="stylesheet">';



		}
		else if (basename($_SERVER['PHP_SELF']) == 'signup.php') {
			//for sign-up
			echo' <link href="https://fonts.googleapis.com/css?family=Mirza:600" rel="stylesheet"> 
			<link href="https://fonts.googleapis.com/css?family=Architects+Daughter" rel="stylesheet">
			<style>
  label {
font-family:cursive;
font-weight: bold;
}
.firstLabel {
    margin-right: 50px;
}
</style>'; 

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
		echo '<header>';
		// some other stuff
		echo '</header>';
	}
?>