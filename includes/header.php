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
	<?php
		if (basename($_SERVER['PHP_SELF']) == 'index.php') {



			echo '<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
                    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
                    <link href="https://fonts.googleapis.com/css?family=Domine:700" rel="stylesheet">
                    <link href="https://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet">
                    <link href="https://fonts.googleapis.com/css?family=Acme" rel="stylesheet">  
                    <!-- jQuery library -->
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

                    <!-- Latest compiled JavaScript -->
                    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

                    <!--My css file-->
                    <link rel = "stylesheet" type = "text/css" href="css/index.css">';

		}
		else if (basename($_SERVER['PHP_SELF']) == 'signup.php' || basename($_SERVER['PHP_SELF']) == 'addevent.php') {
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
		echo '<header style="background-image: url("../images/newbgm.png");display:block;">
		<div class="contanier-fluid" style="padding-left:20px;padding-top:10px;">
		<div class="row" >
		<div class="col-sm-2">
		
		<img src="../images/logo.png" class="img-circle img-responsive" alt="VJTI RegDesk" width="50" height="50">
		
		</div>
		<div class="col-sm-2">
		
		<b style="font-size:25px;color:#FFFFFF">VJTI-RegDesk</b>
		
		</div>
		</div>
		<br>
		<br>
		</div> 

		</header>';
	}
?>